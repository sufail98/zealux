<?php 
namespace App\Controllers;

use App\Models\PurchaseModel;
use App\Models\FrontpageModel;

class Purchase extends BaseController
{
	
    function __construct()
	{
		$this->purchaseModel = new PurchaseModel();
		$this->frontModel = new FrontpageModel();
	}

	public function index()
	{
		$session = session();
		if(!empty($_SESSION['user'])){
			$data['stores'] = $this->frontModel->AllStores();
			$data['products'] = $this->purchaseModel->Products();
			$data['products2'] = $this->purchaseModel->Products();
			return view('purchase',$data);
		} else {
			return redirect()->to('admin');
		}
	}
	public function GetColors()
	{
		$session = session();
		if(!empty($_SESSION['user'])){
		    $productId = $this->request->getPost('product_id');
		    $colors = $this->purchaseModel->getColorsByProductId($productId);
		    return $this->response->setJSON($colors);
	    } else {
			return redirect()->to('admin');
		}
	}
	public function PurchaseList()
	{
		$session = session();
		if(!empty($_SESSION['user'])){
			$data['stores'] = $this->frontModel->AllStores();
			return view('purchase_list',$data);
		} else {
			return redirect()->to('admin');
		}
	}
	public function getPurchaseReportByDate()
	{
		$session = session();
	    if (!empty($_SESSION['user'])) {
	        $fromDate = $this->request->getPost('from_date');
	        $toDate = $this->request->getPost('to_date');
	        $allreport = $this->request->getPost('allreport');
	        $store_id = $this->request->getPost('store');

	        $start = $this->request->getPost('start');
	        $length = $this->request->getPost('length');
	        $draw = $this->request->getPost('draw');
	        $searchValue = $this->request->getPost('search')['value'] ?? '';

	        // Get total count of records before filtering
	        $totalRecords = $this->purchaseModel->countTotalRecords($fromDate, $toDate, $allreport, $store_id);

	        // Get filtered data with pagination
	        $report = $this->purchaseModel->getPurchaseReport($fromDate, $toDate, $allreport, $store_id, $start, $length, $searchValue);

	        return $this->response->setJSON([
	            'data' => $report,
	            "draw" => intval($this->request->getPost('draw')),
	            "recordsTotal" => $totalRecords,
	            "recordsFiltered" => $totalRecords
	        ]);
	    } else {
	        return redirect()->to('admin');
	    }
	}
	public function SavePurchase()
	{
		$session = session();
		if(!empty($_SESSION['user'])){

		    $data = [
	        	'store_id' => $this->request->getPost('store'),
	        	'purchase_date' => $this->request->getPost('pdate'),
	            'description' => $this->request->getPost('remarks')
	        ];

	        $product = $this->request->getPost('product');
			$color = $this->request->getPost('color');
			$qty = $this->request->getPost('qty');
			$selected_color_name = $this->request->getPost('selected_color_name');

	        $insertid = $this->purchaseModel->Add_purchase($data);

			for($i=0; $i<count($product); $i++){
				$data1[]=[
					'purchaseId' => $insertid,
					'product_id' => $product[$i],
					'color_id' => $color[$i],
					'color_name' => $selected_color_name[$i],
					'qty' => $qty[$i]
				];

				$stockdata = [
		        	'voucher_type' => 'purchase',
		        	'voucher_no' => $insertid,
		            'document_no' => $insertid,
		            'pid' => $product[$i],
		            'color' => $selected_color_name[$i],
		            'inward_qty' => $qty[$i],
		            'outward_qty' => 0,
		            'purchase_rate' => 0,
		            'sales_rate' => 0,
		            'stock_date' => $this->request->getPost('pdate'),
		           	'store_id' => $this->request->getPost('store'),
		           	'CreatedUser' => $_SESSION['user_id'],
					'CreatedDate' => date('Y-m-d H:i:s')
		        ];
	        	$add_stock = $this->purchaseModel->Add_Stock($stockdata);
	        	if (!$add_stock) {
		            $session->setFlashdata('alert', 'error|Oops...|Failed to insert stock. Try Again');
		        	return redirect()->to('purchase');
		        }
			}

	        if($insertid){
	        	if (count($product) > 0) {
					$insertsplit = $this->purchaseModel->InsertPurchasesplitMdl($data1);
					if($insertsplit){
						$session->setFlashdata('alert', 'success|Success...|Added Successfully');
            			return redirect()->to('purchase-list');
					}else{
						$session->setFlashdata('alert', 'error|Oops...|Failed to insert details. Try Again');
		        		return redirect()->to('purchase-list');
					}	
				}
				$session->setFlashdata('alert', 'success|Success...|Added Successfully');
            	return redirect()->to('purchase-list');
					
			}else{
				$session->setFlashdata('alert', 'error|Oops...|Try Again');
		        return redirect()->to('purchase-list');
			}

	    } else {
			return redirect()->to('admin');
		}
	}
	public function EditPurchase($id)
	{
		$session = session();
		if(!empty($_SESSION['user'])){
			$data['stores'] = $this->frontModel->AllStores();
			$data['products'] = $this->purchaseModel->Products();
			$data['products2'] = $this->purchaseModel->Products();
			$data['editdata'] = $this->purchaseModel->PurchaseEditMdl($id);
			$data['editsplitdata'] = $this->purchaseModel->PurchaseSplitEditMdl($id);
			return view('edit_purchase',$data);
		} else {
			return redirect()->to('admin');
		}
	}
	public function UpdatePurchase()
	{
		$session = session();
		if(!empty($_SESSION['user'])){

		    $data = [
	        	'purchase_id' => $this->request->getPost('pid'),
	        	'store_id' => $this->request->getPost('store'),
	        	'purchase_date' => $this->request->getPost('pdate'),
	            'description' => $this->request->getPost('remarks')
	        ];

	        $product = $this->request->getPost('product');
			$color = $this->request->getPost('color');
			$qty = $this->request->getPost('qty');
			$selected_color_name = $this->request->getPost('selected_color_name');

	        $update = $this->purchaseModel->UpdatePurchaseMaster($data);
	        $delete_existing_stock = $this->purchaseModel->Delete_stock($this->request->getPost('pid'));

			for($i=0; $i<count($product); $i++){
				$data1[]=[
					'purchaseId' => $this->request->getPost('pid'),
					'product_id' => $product[$i],
					'color_id' => $color[$i],
					'color_name' => $selected_color_name[$i],
					'qty' => $qty[$i]
				];

				$stockdata = [
		        	'voucher_type' => 'purchase',
		        	'voucher_no' => $this->request->getPost('pid'),
		            'document_no' => $this->request->getPost('pid'),
		            'pid' => $product[$i],
		            'color' => $selected_color_name[$i],
		            'inward_qty' => $qty[$i],
		            'outward_qty' => 0,
		            'purchase_rate' => 0,
		            'sales_rate' => 0,
		            'stock_date' => $this->request->getPost('pdate'),
		           	'store_id' => $this->request->getPost('store'),
		           	'CreatedUser' => $_SESSION['user_id'],
					'CreatedDate' => date('Y-m-d H:i:s')
		        ];
	        	$add_stock = $this->purchaseModel->Add_Stock($stockdata);
	        	if (!$add_stock) {
		            $session->setFlashdata('alert', 'error|Oops...|Failed to update stock. Try Again');
		        	return redirect()->to('purchase');
		        }
			}

	        if($update){
	        	if (count($product) > 0) {
					$updatesplit = $this->purchaseModel->UpdatePurchasesplitMdl($data1);
					if($updatesplit){
						$session->setFlashdata('alert', 'success|Success...|Updated Successfully');
            			return redirect()->to('purchase-list');
					}else{
						$session->setFlashdata('alert', 'error|Oops...|Failed to update details. Try Again');
		        		return redirect()->to('purchase-list');
					}	
				}
				$session->setFlashdata('alert', 'success|Success...|Updated Successfully');
            	return redirect()->to('purchase-list');
					
			}else{
				$session->setFlashdata('alert', 'error|Oops...|Try Again');
		        return redirect()->to('purchase-list');
			}

	    } else {
			return redirect()->to('admin');
		}
	}
	public function DeletePurchase($id)
	{
		$session = session();
		if(!empty($_SESSION['user'])){
			$query = $this->purchaseModel->DeletePurchaseMdl($id);
			if($query){
				$session->setFlashdata('alert', 'success|Success...|Deleted Successfully');
            	return redirect()->to('purchase-list');
			}
		} else {
			return redirect()->to('admin');
		}
	}

	
}