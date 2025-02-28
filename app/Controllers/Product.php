<?php 
namespace App\Controllers;

use App\Models\ProductModel;
use App\Models\GroupsModel;
use App\Models\LensModel;
use App\Models\SizeModel;
use App\Models\FeaturesModel;

class Product extends BaseController
{
	
    function __construct()
	{
		$this->productModel = new ProductModel();
		$this->groupModel = new GroupsModel();
		$this->lensModel = new LensModel();
		$this->sizeModel = new SizeModel();
		$this->featuresModel = new FeaturesModel();

		date_default_timezone_set('Asia/Kolkata');

	}
	public function Products()
	{
		$session = session();
		if(!empty($_SESSION['user'])){
			$data['products'] = $this->productModel->AllProducts();
			$productIds = array_column($data['products'], 'pid');
			$data['product_images'] = $this->productModel->getImagesByProductIds($productIds);
			return view('products_list',$data);
		} else {
			return view('login');
		}
	}
	public function AddProduct()
	{
		$session = session();
		if(!empty($_SESSION['user'])){
			$data['groups'] = $this->groupModel->AllGroups();
			$data['lens'] = $this->lensModel->AllLenses();
			$data['size'] = $this->sizeModel->AllSizes();
			$data['features'] = $this->featuresModel->AllFeatures();
			return view('product_add',$data);
		} else {
			return view('login');
		}
	}

	public function SaveProduct()
	{
		$session = session();
		if(!empty($_SESSION['user'])){

			$data['productName'] = $this->request->getPost('pname');
			$data['barcode'] = $this->request->getPost('barcode');
			$data['brand'] = $this->request->getPost('brand');
			$data['group'] = $this->request->getPost('group');
			$data['description'] = $this->request->getPost('pdescription');
			$data['mrp'] = $this->request->getPost('mrp');
			$data['sales_rate'] = $this->request->getPost('salesrate');
			$data['model'] = $this->request->getPost('model');
			$data['warranty_days'] = $this->request->getPost('warranty');
			$data['purchase_rate'] = $this->request->getPost('purchase_rate');
			$data['active_status'] = $this->request->getPost('visibilitystatus');
			$supportedLense = $this->request->getPost('supportedlense');
			$data['supportedLense'] = is_array($supportedLense) ? implode(',', $supportedLense) : NULL;
			$size = $this->request->getPost('size');
			$data['size'] = is_array($size) ? implode(',', $size) : NULL;
			$feature = $this->request->getPost('features');
			$data['feature'] = is_array($feature) ? implode(',', $feature) : NULL; 
			$data['publish_date'] = $this->request->getPost('publishdate');
			$data['publish_time'] = $this->request->getPost('publishtime');
			$data['CreatedDate'] = date('Y-m-d H:i:s');

			$colorname = $this->request->getPost('colorname');
			$colorcode = $this->request->getPost('colorcode');
			$stock = $this->request->getPost('stock');

			$insertid = $this->productModel->InsertProduct($data);

			$data1 = []; 
			for ($i = 0; $i < count($colorname); $i++) {
				$product_images = $this->request->getFileMultiple('product_images'.$i);

			    $imageArray = [];
			   
	            if (isset($product_images) && is_array($product_images)) {
		            foreach ($product_images as $img) {
		                if ($img->isValid() && !$img->hasMoved()) {
		                    $newName = $img->getRandomName();
		                    if ($img->move('./images/product', $newName)) {
		                        $imageArray[] = $newName;  // Add filename to array
		                    }
		                }
		            }
		        }
			   
			    $data1[] = [
			        'pid' => $insertid,
			        'colorName' => $colorname[$i],
			        'colorCode' => $colorcode[$i],
		            'stock' => $stock[$i],
			        'colorImage' => json_encode($imageArray), 
			        'store_id' => 1,
			        'CreatedDate' => date('Y-m-d H:i:s')
			    ];

			    $stockdata[] = [
		        	'voucher_type' => 'opening stock',
		        	'voucher_no' => $insertid,
		            'document_no' => $insertid,
		            'pid' => $insertid,
		            'color' => $colorname[$i],
		            'inward_qty' => $stock[$i],
		            'outward_qty' => 0,
		            'purchase_rate' => $this->request->getPost('purchase_rate'),
		            'sales_rate' => $this->request->getPost('salesrate'),
		            'stock_date' => date('Y-m-d'),
		            'store_id' => 1,
					'CreatedDate' => date('Y-m-d H:i:s'),
	            	'CreatedUser' => $_SESSION['user_id']

		        ];
	
			}

			if($insertid){
				if (count($colorname) > 0) {
					$insertsplit = $this->productModel->InsertItemImagesMdl($data1);
					if($insertsplit){
						$add_stock = $this->productModel->AddStock($stockdata);
			        	if (!$add_stock) {
				            $session->setFlashdata('alert', 'error|Oops...|Failed to add Stock.Try Again');
		            		return redirect()->to('add-product');
				        }
						$session->setFlashdata('alert', 'success|Success...|Added Successfully');
            			return redirect()->to('add-product');
					}else{
						$session->setFlashdata('alert', 'error|Oops...|Try Again');
		            	return redirect()->to('add-product');
					}	
				}
				$session->setFlashdata('alert', 'success|Success...|Added Successfully');
            	return redirect()->to('add-product');
			}else{
				$session->setFlashdata('alert', 'error|Oops...|Try Again');
		        return redirect()->to('add-product');
			}
			
		} else {
			return view('login');
		}
		
	}
	public function ProductEdit($id)
	{
		$session = session();
		if(!empty($_SESSION['user'])){
			$data['groups'] = $this->groupModel->AllGroups();
			$data['lens'] = $this->lensModel->AllLenses();
			$data['size'] = $this->sizeModel->AllSizes();
			$data['features'] = $this->featuresModel->AllFeatures();
			$data['editdata'] = $this->productModel->ProductEditMdl($id);
			$data['editsplitdata'] = $this->productModel->ProductSplitEditMdl($id);
			return view('product_edit',$data);
		} else {
			return view('login');
		}
	}
	public function UpdateProduct()
	{
		$session = session();
		if(!empty($_SESSION['user'])){

			$data['productName'] = $this->request->getPost('pname');
			$data['barcode'] = $this->request->getPost('barcode');
			$data['brand'] = $this->request->getPost('brand');
			$data['group'] = $this->request->getPost('group');
			$data['description'] = $this->request->getPost('pdescription');
			$data['mrp'] = $this->request->getPost('mrp');
			$data['sales_rate'] = $this->request->getPost('salesrate');
			$data['model'] = $this->request->getPost('model');
			$data['warranty_days'] = $this->request->getPost('warranty');
			$data['purchase_rate'] = $this->request->getPost('purchase_rate');
			$data['active_status'] = $this->request->getPost('visibilitystatus');
			$supportedLense = $this->request->getPost('supportedlense');
			$data['supportedLense'] = is_array($supportedLense) ? implode(',', $supportedLense) : NULL;
			$size = $this->request->getPost('size');
			$data['size'] = is_array($size) ? implode(',', $size) : NULL;
			$feature = $this->request->getPost('features');
			$data['feature'] = is_array($feature) ? implode(',', $feature) : NULL; 
			$data['publish_date'] = $this->request->getPost('publishdate');
			$data['publish_time'] = $this->request->getPost('publishtime');
			$data['CreatedDate'] = date('Y-m-d H:i:s');
			$data['pid'] = $this->request->getPost('pid');

			$colorname = $this->request->getPost('colorname');
			$colorcode = $this->request->getPost('colorcode');
			$stock = $this->request->getPost('stock');

			$update = $this->productModel->updateProduct($data);

			$data1 = []; 
			for ($i = 0; $i < count($colorname); $i++) {
				$existingImages = $this->productModel->getExistingColorImage($this->request->getPost('pid'), $colorname[$i]);
				$product_images = $this->request->getFileMultiple('product_images'.$i);


			    $imageArray = [];
			   
	            if (isset($product_images) && is_array($product_images)) {
		            foreach ($product_images as $img) {
		                if ($img->isValid() && !$img->hasMoved()) {
		                    $newName = $img->getRandomName();
		                    if ($img->move('./images/product', $newName)) {
		                        $imageArray[] = $newName;  
		                    }
		                }
		            }

		        }

		        // If no new images are uploaded, use the existing images
			    if (empty($imageArray) && !empty($existingImages)) {
			        $imageArray = json_decode($existingImages->colorImage); // Use existing images from the DB
			    }
			   
			    $data1[] = [
			        'pid' => $this->request->getPost('pid'),
			        'colorName' => $colorname[$i],
			        'colorCode' => $colorcode[$i],
		            'stock' => $stock[$i],
			        'colorImage' => json_encode($imageArray), 
			        'store_id' => 1,
			        'CreatedDate' => date('Y-m-d H:i:s')
			    ];

			    $stockdata[] = [
		        	'voucher_type' => 'opening stock',
		        	'voucher_no' => $this->request->getPost('pid'),
		            'document_no' => $this->request->getPost('pid'),
		            'pid' => $this->request->getPost('pid'),
		            'color' => $colorname[$i],
		            'inward_qty' => $stock[$i],
		            'outward_qty' => 0,
		            'purchase_rate' => $this->request->getPost('purchase_rate'),
		            'sales_rate' => $this->request->getPost('salesrate'),
		            'stock_date' => date('Y-m-d'),
		            'store_id' => 1,
					'CreatedDate' => date('Y-m-d H:i:s'),
	            	'CreatedUser' => $_SESSION['user_id']

		        ];
			}

			if($update){
				
				$insertsplit = $this->productModel->UpdateImagesplitMdl($data1,$this->request->getPost('pid'));
				if($insertsplit){
					$add_stock = $this->productModel->UpdateStock($stockdata);
		        	if (!$add_stock) {
			            $session->setFlashdata('alert', 'error|Oops...|Failed to add Stock.Try Again');
	            		return redirect()->to('edit-product');
			        }
					$session->setFlashdata('alert', 'success|Success...|Updated Successfully');
            		return redirect()->to('edit-product/' . $this->request->getPost('pid'));
				}
			}else{
				$session->setFlashdata('alert', 'error|Oops...|Try Again');
		        return redirect()->to('edit-product');
			}
			
		} else {
			return view('login');
		}
		
	}

	public function ProductDelete($id)
	{
		$session = session();
		if(!empty($_SESSION['user'])){
			$query = $this->productModel->ProductDeleteMdl($id);
			if($query){
				$session->setFlashdata('alert', 'success|Success...|Deleted Successfully');
            	return redirect()->to('products');
			}
		} else {
			return view('login');
		}
	}
	
}