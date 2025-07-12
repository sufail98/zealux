<?php 
namespace App\Controllers;

use App\Models\ProductModel;
use App\Models\SalesModel;
use App\Models\FeaturesModel;
use App\Models\LensModel;
use App\Models\LensCreationModel;
use App\Models\LensFeaturesModel;
use App\Models\GroupsModel;
use App\Models\LensCoatingModel;
use App\Models\PrevilageCardModel;
use App\Models\BreakageWarrantyModel;
use App\Models\FrontpageModel;
use App\Models\EyeTestModel;

use Dompdf\Dompdf;
use Dompdf\Options;


class Sales extends BaseController
{
	
    function __construct()
	{
		$this->productModel = new ProductModel();
		$this->saleModel = new SalesModel();
		$this->featuresModel = new FeaturesModel();
		$this->lensModel = new LensModel();
		$this->lenscreationModel = new LensCreationModel();
		$this->lensfeaturesModel = new LensFeaturesModel();
		$this->groupModel = new GroupsModel();
		$this->lensCoatingModel = new LensCoatingModel();
		$this->previlageModel = new PrevilageCardModel();
		$this->warrantyModel = new BreakageWarrantyModel();
		$this->frontModel = new FrontpageModel();
		$this->eyeTestModel = new EyeTestModel();

		date_default_timezone_set('Asia/Kolkata');

	}
	public function index()
	{
		$session = session();
		if(!empty($_SESSION['user'])){
			$store_id = $_SESSION['store_id'];
			$data['products'] = $this->productModel->AllProducts($store_id);
			$productIds = array_column($data['products'], 'pid');
			$data['product_images'] = $this->productModel->getImagesByProductIds($productIds);
			$data['groups'] = $this->groupModel->AllGroups();
			
			return view('sales',$data);
		} else {
			return view('login');
		}
	}
	public function getSalesDataByBarcode()
	{
		$session = session();
	    $query = $this->request->getGet('query'); // Get the search query
	    $limit = $this->request->getGet('limit') ?: 10; // Optional limit
	    $offset = $this->request->getGet('offset') ?: 0; // Optional offset
	    $store_id = $_SESSION['store_id'];
	    $products = $this->productModel->searchProducts($query, $limit, $offset, $store_id);
		$productIds = array_column($products, 'pid');
	    $productImages = $this->productModel->getImagesByProductIds($productIds);

	    echo json_encode([
	        'products' => $products,
	        'product_images' => $productImages
	    ]);
	}
	public function get_all_products() {
		$session = session();
		$store_id = $_SESSION['store_id'];
        $products = $this->productModel->AllProducts($store_id);
		$productIds = array_column($products, 'pid');
		$productImages = $this->productModel->getImagesByProductIds($productIds);

        // Return the result as a JSON response
        echo json_encode([
            'products' => $products,
            'product_images' => $productImages
        ]);
    }

	public function get_product_details($id) 
	{
		$session = session();
		if(!empty($_SESSION['user'])){
			$data['features'] = $this->featuresModel->AllFeatures();
			$data['lens'] = $this->lensModel->AllLenses();
	        $data['editdata'] = $this->saleModel->productDetails($id); 
	        $group_id = $data['editdata']['product_details'][0]->group;  
	        $data['similarproduct'] = $this->saleModel->similarProducts($group_id); 
	        $data['group_id'] = $group_id;
	        $isPrivilegeApplied = $this->groupModel->getGroupDetails($group_id);
	        $data['isPrivilegeApplied'] = $isPrivilegeApplied->isPrivilegeApplied;
			$data['lenslist'] = $this->lenscreationModel->AllLenses();
			$data['lensfeatures'] = $this->lensfeaturesModel->AllLensFeatures();
			$data['lenscoating'] = $this->lensCoatingModel->AllLensCoating();
			$data['salesmans'] = $this->saleModel->Salesmanlist();
			$data['types'] = $this->previlageModel->AllprevilageTypes();
			$data['maxtestno'] = $this->eyeTestModel->MaxTestno();
			return view('product_details',$data);

	    } else {
			return view('login');
		}
	}
	public function GetEyetestDetails()
	{
		$session = session();
		if(!empty($_SESSION['user'])){

		    $id = $this->request->getGet('id');
		    $eye = $this->saleModel->EyetestDetails($id);

		    if ($eye) {
		        return $this->response->setJSON([
		            'status' => 'success',
		            'data' => $eye
		        ]);
		    } else {
		        return $this->response->setJSON([
		            'status' => 'error',
		            'message' => 'Not found'
		        ]);
		    }
	    } else {
			return view('login');
		}
	}
	public function GetCoupon() {
		$session = session();
		if(!empty($_SESSION['user'])){

		    $couponCode = $this->request->getGet('coupon');
		    $coupen = $this->saleModel->getCouponcode($couponCode);
		    // var_dump($coupen);

		    if ($coupen) {
		        echo json_encode(['valid' => true, 'coupen' => $coupen]);
		    } else {
		        echo json_encode(['valid' => false]);
		    }
	    } else {
			return view('login');
		}
	}
	public function GetLenses($id) {
		$session = session();
		if(!empty($_SESSION['user'])){

		    $lenslist = $this->saleModel->getLensListById($id);
    		return $this->response->setJSON($lenslist);
	    } else {
			return view('login');
		}
	}
	public function getEyeDetails()
	{
		$session = session();
		if(!empty($_SESSION['user'])){

		    $id = $this->request->getGet('id');
		    $eye = $this->saleModel->EyetestDetails($id);

		    if ($eye) {
		        return $this->response->setJSON([
		            'status' => 'success',
		            'data' => $eye
		        ]);
		    } else {
		        return $this->response->setJSON([
		            'status' => 'error',
		            'message' => 'data not found'
		        ]);
		    }
	    } else {
			return view('login');
		}	
	}
	public function GetDeliveryDays() {
		$session = session();
		if(!empty($_SESSION['user'])){

		    $lensid = $this->request->getGet('lensid');
		    $data = $this->saleModel->getDelivery_days($lensid);
		    // var_dump($coupen);

		    if ($data) {
		        echo json_encode(['valid' => true, 'days' => $data->delivery_days]);
		    } else {
		        echo json_encode(['valid' => false]);
		    }
	    } else {
			return view('login');
		}
	}

	public function GetPrevilageUser($id) {
		$session = session();
		if(!empty($_SESSION['user'])){

		    $users = $this->saleModel->PrevilageUserById($id);
    		return $this->response->setJSON($users);
	    } else {
			return view('login');
		}
	}

	public function SaveCartData() {
		$session = session();
		if(!empty($_SESSION['user'])){
		    $requestData = json_decode($this->request->getBody(), true);

	        $productData = $requestData['productData'];

	        $salesMasterData = [
	        	'invoice_no' => $this->saleModel->MaxInvoiceno(),
	        	'invoice_date' => date('Y-m-d'),
	            'customer_name' => $requestData['customer_name'],
	            'phone' => $requestData['mobile'],
	            'email' => $requestData['email'],
	            'salesman_id' => $requestData['salesman'],
	            'total_amount' => $requestData['tot_amt'],
	            'coupen_id' => $requestData['coupen_id'],
	            'coupen_disc_amt' => $requestData['discount_amount'],
	            'coupon_disc_percentage' => $requestData['coupon_disc_percentage'],
	            'previlage_id' => $requestData['previlage_id'],
	            'delivered' => $requestData['delivered'],
	            'advance_amont' => $requestData['advance_amt'],
	            'balance_amount' => $requestData['bal_amount'],
	            'payment_mode' => $requestData['pay_mode'],
	            'Return_MasterId' => $requestData['return_masterid'],
	            'Return_Amount' => $requestData['return_amt'],
	            'warranty_amt' => $requestData['warranty_amt'],
	            'warranty_id' => $requestData['warranty_id'],
	            'CreatedUser' => $_SESSION['user_id'],
	            'store_id' => $_SESSION['store_id'],
				'CreatedDate' => date('Y-m-d H:i:s')
	        ];

			if (!empty($requestData['return_masterid'])) {
        		$voucher_type = 'new sales';
        	}else{
        		$voucher_type = 'sales';
        	}


	        $salesMasterId = $this->saleModel->insertSalesMaster($salesMasterData);
	        if (!$salesMasterId) {
	            return $this->response->setJSON([
	                'success' => false,
	                'message' => 'Failed to save sales master data.'
	            ]);
	        }
	    	
		    $isDownload = $requestData['isDownload'];

			$salesDetails = []; 
			foreach ($productData as $item) {

			    $salesDetailData = [
			        'sales_masterId' => $salesMasterId, 
			        'pid' => $item['product_details']['product_id'],
			        'product_rate' => str_replace('₹', '', $item['product_details']['product_price']),
			        'product_discount' => str_replace('₹', '', $item['product_details']['product_discount']),
			        'product_image' => $item['product_details']['product_image'],
			        'color_name' => $item['product_details']['product_color_name'],
			        'color_code' => $item['product_details']['product_color_code'],
			        'lensid' => $item['lens_details']['lens_id'] ?? '',
			        'lens_rate' => str_replace('₹', '', $item['lens_details']['lens_price'] ?? ''),
			        'lens_discount' => str_replace('₹', '', $item['lens_details']['lens_discount'] ?? ''),
			        'coating_id' => $item['coating_details']['coating_id'] ?? '',
			        'coating_rate' => str_replace('₹', '', $item['coating_details']['coating_price'] ?? ''),
			        'coating_discount' => str_replace('₹', '', $item['coating_details']['coating_discount'] ?? ''),
			        'eyetest_id' => isset($item['medical_record']['eye_id']) ? $item['medical_record']['eye_id'] : 0,
			        'delivery_date' => $item['lens_details']['exp_delivery_date'] ?? '',
			        'store_id' => $_SESSION['store_id']
			    ];
			    $salesDetails[] = $salesDetailData;

			    $stockdata = [
		        	'voucher_type' => $voucher_type,
		        	'voucher_no' => $salesMasterId,
		            'document_no' => $salesMasterData['invoice_no'],
		            'pid' => $item['product_details']['product_id'],
		            'color' => $item['product_details']['product_color_name'],
		            'inward_qty' => 0,
		            'outward_qty' => 1,
		            'purchase_rate' => 0,
		            'sales_rate' => str_replace('₹', '', $item['product_details']['product_price']),
		            'stock_date' => $salesMasterData['invoice_date'],
		           	'store_id' => $_SESSION['store_id'],
		           	'CreatedUser' => $_SESSION['user_id'],
					'CreatedDate' => date('Y-m-d H:i:s')
		        ];
	        	$add_stock = $this->saleModel->Add_Stock($stockdata);
	        	if (!$add_stock) {
		            return $this->response->setJSON([
		                'success' => false,
		                'message' => 'Failed to add stock details.'
		            ]);
		        }

				if (!empty($item['medical_record']) && !empty($item['medical_record']['eye_id'])) {
			        $frameMeasurement = json_encode($item['medical_record']['frame_measurement']);
			        $Prescription = json_encode($item['medical_record']['Prescription']);
			        $eyeTestId = $item['medical_record']['eye_id'];

			        // Update frame_measurement in tbl_eye_test
			        $this->saleModel->updateFrameMeasurement($eyeTestId, $frameMeasurement, $Prescription);
			    }
			}


			if (!empty($salesDetails)) {
			    $success = $this->saleModel->insertSalesDetail($salesDetails);
			    if (!$success) {
		            return $this->response->setJSON([
		                'success' => false,
		                'message' => 'Failed to save invoice details data.'
		            ]);
		        }

		        $invoicedata = [
	        		'voucherType' => 'sales',
		        	'InvoiceNo' => $salesMasterData['invoice_no'],
		        	'master_invoice_date' => $salesMasterData['invoice_date'],
		            'sales_masterId' => $salesMasterId,
		            'PaymentMode' =>$requestData['pay_mode'],
		            'BillAmount' => $requestData['tot_amt'],
		            'PendingAmount' => $requestData['tot_amt'],
		            'PaidAmount' => $requestData['advance_amt'],
		            'Balance' => $requestData['bal_amount'],
		            'SalesManId' => $requestData['salesman'],
		            'store_id' => $_SESSION['store_id'],
		            'CreatedUser' => $_SESSION['user_id'],
					'CreatedDate' => date('Y-m-d H:i:s')
		        ];

	        	$add_invoiceReceipt = $this->saleModel->Add_InvoiceReceipt($invoicedata);
	        	if (!$add_invoiceReceipt) {
		            return $this->response->setJSON([
		                'success' => false,
		                'message' => 'Failed to save invoice receipt data.'
		            ]);
		        }

			    $MasterData = $this->saleModel->SalesReportData($salesMasterId);
				$DetailData = $this->saleModel->SalesDetailsReportData($salesMasterId);
				$salesman = $this->saleModel->SalesmanName($MasterData[0]->salesman_id);
				$privilege_details = $this->saleModel->privilegeDetails($MasterData[0]->previlage_id);
				$coupen_details = $this->saleModel->coupenDetails($MasterData[0]->coupen_id);
				$ReturnAmount = $this->saleModel->getReturnamount($MasterData[0]->Return_MasterId);
				$warranty_details = $this->warrantyModel->WarrantyEditMdl($MasterData[0]->warranty_id);
				$header_image = $this->saleModel->getHeaderImage($MasterData[0]->store_id);

				$combinedData = [
				    'salesMasterData' => [
				        'invoice_no' => $MasterData[0]->invoice_no,
				        'invoice_date' => $MasterData[0]->invoice_date,
				        'customer_name' => $MasterData[0]->customer_name,
				        'phone' => $MasterData[0]->phone,
				        'email' => $MasterData[0]->email,
				        'salesman_id' => $MasterData[0]->salesman_id,
				        'total_amount' => $MasterData[0]->total_amount,
				        'coupen_id' => $MasterData[0]->coupen_id,
				        'coupen_disc_amt' => $MasterData[0]->coupen_disc_amt,
				        'previlage_id' => $MasterData[0]->previlage_id,
		            	'delivered' => $MasterData[0]->delivered,
				        'CreatedDate' => $MasterData[0]->CreatedDate,
				        'advance_amont' => $MasterData[0]->advance_amont,
				        'balance_amount' => $MasterData[0]->balance_amount,
				        'payment_mode' => $MasterData[0]->payment_mode,
				        'salesman_name' => $salesman,
						'header_name' => $MasterData[0]->delivered == 1 ? 'Sales Invoice' : 'Sales Order',
						'paid_amount' => $this->saleModel->SumofPaidAmt($MasterData[0]->invoice_no),
						'privilege_phone' => $privilege_details->phone ?? '',
				        'privilege_name' => $privilege_details->name ?? '',
				        'privilege_expiry' => $privilege_details->to_date ?? '',
				        'coupen_code' => $coupen_details->coupen_code ?? '',
				        'ReturnAmount' => $ReturnAmount ?? '',
				        'warranty_amt' => $warranty_details[0]->sales_rate ?? '',
		        		'warranty_name' => $warranty_details[0]->name ?? '',
		        		'header_image' => $header_image,

				    ],
				    'salesDetailData' => array_map(function($salesItem) {
				        $formattedDeliveryDate = date("F j, Y", strtotime($salesItem->delivery_date));
				        return [
				            'sales_masterId' => $salesItem->sales_masterId,
				            'product_id' => $salesItem->pid,
				            'barcode' => $this->saleModel->getBarcode($salesItem->pid),
				            'product_name' => $salesItem->productName,
				            'product_color' => 'Selected Color: '.$salesItem->color_name,
				            'product_rate' => $salesItem->product_rate,
				            'product_discount' => $salesItem->product_discount,
				            'product_image' => !empty($salesItem->product_image) ? $salesItem->product_image : base_url('/images/no-img.jpg'),
				            'lens_id' => $salesItem->lensid,
				            'lens_name' => $salesItem->lensName,
				            'lens_price' => $salesItem->lens_rate,
				            'lens_discount' => $salesItem->lens_discount,
				            'exp_delivery' => 'Expected delivery date: ' . $formattedDeliveryDate,
				            'coating_id' => $salesItem->coating_id,
				            'coating_name' => $salesItem->coating_name,
				            'coating_desc' => $salesItem->description,
				            'coating_price' => $salesItem->coating_rate,
				            'coating_discount' => $salesItem->coating_discount,
				            'eyetest_id' => $salesItem->eyetest_id,
				            'prescription' => json_decode($salesItem->Prescription, true), // Assuming it is JSON
				            'frame_measurement' => json_decode($salesItem->frame_measurement, true) // Assuming it is JSON
				        ];
				    }, $DetailData)
				];

			    if($success){

			    	if ($isDownload == 1) {
                        $options = new Options();
                        $options->set('defaultFont', 'DejaVu Sans');
                        $options->set('isRemoteEnabled', true);
                        $pdf = new Dompdf($options);

                        // Load HTML from the view
                        $html = view('invoice_pdf', $combinedData);
                        $pdf->loadHtml($html);
                        $pdf->setPaper('A4', 'portrait');
                        $pdf->render();

                        // Get the PDF output
                        $output = $pdf->output();
                        $pdfFileName = 'zealux_invoice_' . $salesMasterData['invoice_no'] . '.pdf';
                        $base64PDF = base64_encode($output);

                        return $this->response->setJSON([
					        'success' => true,
					        'message' => 'Data saved successfully.',
					        'pdf_base64' => $base64PDF,  // Send base64-encoded PDF in response
					        'pdf_name' => $pdfFileName,
					        'MasterData' => $MasterData
					    ]);

                        // $pdf->stream($pdfFileName, ['Attachment' => false]);

                       
                    }
			    	if(!empty($requestData['email'])){
			    		$email = \Config\Services::email();
				    	$email->setTo($requestData['email']);
					    $email->setFrom('sales@zealuxeyeboutique.com', 'ZEALUX Eye Boutique');
					    $email->setSubject('Sales Invoice');
					    $email->setMessage('Thank you for your purchase! Please find your invoice attached.');
					  
					    $options = new Options();
				        $options->set('defaultFont', 'DejaVu Sans');
				        $options->set('isRemoteEnabled', true); 
						$pdf = new Dompdf($options);

						// Load HTML from the view
				        $html = view('invoice_pdf', $combinedData);
				        $pdf->loadHtml($html);
				        $pdf->setPaper('A4', 'portrait');
				        $pdf->render();

				        // Get the PDF output
				        $output = $pdf->output();
				        $pdfFileName = 'zealux_invoice_' . $salesMasterData['invoice_no'] . '.pdf';

				        // save to folder
				        // $pdfSavePath = FCPATH . 'images/' . $pdfFileName;
				        // file_put_contents($pdfSavePath, $output);
					    // $email->attach($pdfSavePath);

					    // Attach the PDF directly without saving to disk
						$email->attach($output, 'application/pdf', $pdfFileName, true);

					    
					    if ($email->send()) {
					        return $this->response->setJSON([
					            'success' => true,
					            'message' => 'Data saved successfully.',
					        	'MasterData' => $MasterData

					        ]);
					    } else {
					        log_message('error', 'Failed to send email: ' . $email->printDebugger());
				            return $this->response->setJSON([
							    'success' => false,
							    'message' => 'Data saved, but email failed to send. ',
					        	'MasterData' => []

							]);
					    }
			    	}
			        return $this->response->setJSON([
			            'success' => true,
			            'message' => 'Data saved successfully.',
					    'MasterData' => $MasterData
			        ]);
			    }else{

					return $this->response->setJSON([
			            'success' => false,
			            'message' => 'Failed to save sales details data.',
					    'MasterData' => []

			        ]);
			    }
			}else{
				return $this->response->setJSON([
		            'success' => false,
		            'message' => 'No cart details.'
		        ]);
			}
			

	    } else {
			return view('login');
		}
	}

	public function SaveReturnData() {
		$session = session();
		if(!empty($_SESSION['user'])){
		    $requestData = json_decode($this->request->getBody(), true);

	        $returnDetails = $requestData['returnData']['return_details'][0];
    		$masterId = $requestData['returnData']['master_id'];

	        $MasterData = $this->saleModel->SalesReportData($masterId);
			$DetailData = $this->saleModel->SalesReportDetailsData($returnDetails['details_id']);
			$salesman = $this->saleModel->SalesmanName($MasterData[0]->salesman_id);
	
            $returndata = [
	        	'SalesMasterId' => $masterId,
	        	'ReturnNo' => $this->saleModel->MaxReturnNo(),
	            'ReturnDate' => date('Y-m-d'),
	            'Customername' => $MasterData[0]->customer_name,
	            'Phone' => $MasterData[0]->phone,
			    'Email' => $MasterData[0]->email,
	            'Salesmanid' => $requestData['salesman'],
	            'TotalbillAmount' => $MasterData[0]->total_amount,
	            'ReturnAmount' => $requestData['returnData']['returnBillAmount'],
	            'isWarrantyApplied' => $requestData['isWarrantyApplied'],
				'CreatedDate' => date('Y-m-d H:i:s'),
				'store_id' => $_SESSION['store_id'],
	            'CreatedUser' => $_SESSION['user_id']
	        ];

        	$rmasterid = $this->saleModel->Add_return_master($returndata);
        	if (!$rmasterid) {
	            return $this->response->setJSON([
	                'success' => false,
	                'message' => 'Failed to add stock details.'
	            ]);
	        }

	        $base64Image = $requestData['rimage'];
	        $returnImagePath = null;

	        if (!empty($base64Image)) {
	            // Decode Base64 and save image to server
	            $imageData = explode(',', $base64Image);
	            $decodedImage = base64_decode($imageData[1]);
	            $imageName = uniqid() . '.png'; // Generate a unique file name
	            $imagePath = FCPATH . 'images/sales_return/' . $imageName;

	            if (file_put_contents($imagePath, $decodedImage)) {
	                $returnImagePath =  $imageName; // Save relative path
	            }
	        }
		    
	        if($rmasterid){
        		// $update_Salesmaster = $this->saleModel->updateReturnSalesmaster($masterId, $rmasterid, $requestData['returnData']['returnBillAmount']);

        		// if (!$update_Salesmaster) {
		        //     return $this->response->setJSON([
		        //         'success' => false,
		        //         'message' => 'Failed to update Return details in sales master.'
		        //     ]);
		        // }

	        	$stockdata = [
		        	'voucher_type' => 'return',
		        	'voucher_no' => $masterId,
		            'document_no' => $returnDetails['invoice_no'],
		            'pid' => $returnDetails['product_id'],
		            'color' => $returnDetails['color_name'],
		            'inward_qty' => 1,
		            'outward_qty' => 0,
		            'purchase_rate' => 0,
		            'sales_rate' => $returnDetails['product_rate'],
		            'stock_date' => $returnDetails['invoice_date'],
					'store_id' => $_SESSION['store_id'],
					'CreatedUser' => $_SESSION['user_id'],
					'CreatedDate' => date('Y-m-d H:i:s')
		        ];
	        	$add_stock = $this->saleModel->Add_Stock($stockdata);
	        	if (!$add_stock) {
		            return $this->response->setJSON([
		                'success' => false,
		                'message' => 'Failed to add stock details.'
		            ]);
		        }
	        	$returndetails = [
		        	'Return_MasterId' => $rmasterid,
		        	'Sales_MasterId' => $masterId,
		            'Sales_detailsId' => $returnDetails['details_id'],
		            'pid' => $DetailData[0]->pid,
		            'color_name' => $DetailData[0]->color_name,
				    'color_code' => $DetailData[0]->color_code,
		            'lensid' => $DetailData[0]->lensid,
		            'coating_id' => $DetailData[0]->coating_id,
		            'product_rate' => $DetailData[0]->product_rate,
					'product_discount' => $DetailData[0]->product_discount,
		            'product_image' => $DetailData[0]->product_image,
		            'lens_rate' => $DetailData[0]->lens_rate,
		            'lens_discount' => $DetailData[0]->lens_discount,
		            'coating_rate' => $DetailData[0]->coating_rate,
		            'coating_discount' => $DetailData[0]->coating_discount,
		            'eyetest_id' => $DetailData[0]->eyetest_id,
		            'ReturnDescription' => $requestData['desc'],
		            'ReturnImage' => $returnImagePath,
		            'CreatedDate' => date('Y-m-d H:i:s'),
		            'store_id' => $_SESSION['store_id'],
	            	'CreatedUser' => $_SESSION['user_id']
		        ];
        		$details = $this->saleModel->Add_return_deatils($returndetails);
        		if($details){
        			$update_Salesdetails = $this->saleModel->updateSalesDetailsStatus($returnDetails['details_id']);

	        		if (!$update_Salesdetails) {
			            return $this->response->setJSON([
			                'success' => false,
			                'message' => 'Failed to update Return details status.'
			            ]);
			        }
			        return $this->response->setJSON([
			            'success' => true,
			            'message' => 'Return Added successfully.' 
			        ]);
        		}else{
        			return $this->response->setJSON([
		                'success' => false,
		                'message' => 'Failed to add Return data.'
		            ]);
        		}

	        }else{
	        	return $this->response->setJSON([
	                'success' => false,
	                'message' => 'Failed to add details data.'
	            ]);
	        }	
	    } else {
			return view('login');
		}
	}
	public function getSalesReturns()
	{
		$session = session();
		if(!empty($_SESSION['user']))
		{
		    $returns = $this->saleModel->salesReturnList();
		    return $this->response->setJSON($returns);
	    } else {
			return view('login');
		}
	}

	public function pdfsend()
	{
        $options = new Options();
        $options->set('defaultFont', 'DejaVu Sans');
        $options->set('isRemoteEnabled', true); 
        // $pdf->setOptions($options);
		$pdf = new Dompdf($options);

		$privilege_details = $this->saleModel->privilegeDetails(10);
		$coupen_details = $this->saleModel->coupenDetails(3);
		$ReturnAmount = $this->saleModel->getReturnamount(63);
		$warranty_details = $this->warrantyModel->WarrantyEditMdl(2);
		$header_image = $this->saleModel->getHeaderImage(2);

		$combinedData = [
		    'salesMasterData' => [
		        'invoice_no' => 2,
		        'invoice_date' => '2024-11-06',
		        'customer_name' => 'Inthisham',
		        'phone' => '7559808602',
		        'email' => 'inthisham012@gmail.com',
		        'salesman_id' => 1,
		        'total_amount' => 1300.00,
		        'coupen_id' => 3,
		        'coupen_disc_amt' => 100,
		        'previlage_id' => 10,
	            'delivered' => 1,
		        'CreatedDate' => '2024-11-11 21:14:44',
		        'advance_amont' => 1300.00,
	            'balance_amount' => 0.00,
	            'payment_mode' => 'Gpay',
		        'salesman_name' => 'Ziyadh',
		        'header_name' => 'Sales Invoice',
		        'paid_amount' => 300.00,
		        'privilege_phone' => $privilege_details->phone ?? '',
		        'privilege_name' => $privilege_details->name ?? '',
		        'privilege_expiry' => $privilege_details->to_date ?? '',
		        'coupen_code' => $coupen_details->coupen_code ?? '',
		        'ReturnAmount' => $ReturnAmount ?? '',
		        'warranty_amt' => $warranty_details[0]->sales_rate ?? '',
		        'warranty_name' => $warranty_details[0]->name ?? '',
		        'header_image' => $header_image,


		    ],
		    'salesDetailData' => [
		          [
				    'sales_masterId' => 25,
                    'product_id' => 165,
                    'barcode' => 656565545,
                    'product_name' => 'Voyage Exclusive Black Polarized Wayfarer Sunglasses For Men & Women - PMG4582',
                    'product_color' => 'Selected Color: White',
                    'product_rate' => 1299.00,
                    'product_discount' => 485.07,
                    'product_image' => 'https://zealuxeyeboutique.com/images/product/1732451547_67c26c213ebb08b77c2e.jpg',
                    'lens_id' => 24,
                    'lens_name' => 'Zealux Night Drive lens' ,
                    'lens_price' => 1300,
                    'lens_discount' => 485.44,
                    'exp_delivery' => 'Expected delivery date: November 30, -0001',
                    'coating_id' => 0,
                    'coating_name' => 'Blue Cutting',
                    'coating_desc' => '',
                    'coating_price' => 500.00,
                    'coating_discount' => 186.71,
                    'eyetest_id' => 13,
                    'prescription' => '{"right":{"sph":"65","cyl":"8","axis":"89","add":"23","pd":"11"},"left":{"sph":"99","cyl":"8","axis":"56","add":"23","pd":"52"}}',
				    'frame_measurement' => '{"right":{"segmentheight":"","fittingheight":"5"},"left":{"segmentheight":"5","fittingheight":"45"}}'
				],
				[
				   'sales_masterId' => 25,
                    'product_id' => 165,
                    'barcode' => 6565445,
                    'product_name' => 'Zealux Tr Full Frame',
                    'product_color' => 'Selected Color: White',
                    'product_rate' => 1299.00,
                    'product_discount' => 485.07,
                    'product_image' => 'https://zealuxeyeboutique.com/images/product/1731502683_e9ae9d3175273024e9f4.jpg',
                    'lens_id' => 24,
                    'lens_name' => 'Zealux Night Drive lens' ,
                    'lens_price' => 1300,
                    'lens_discount' => 485.44,
                    'exp_delivery' => 'Expected delivery date: November 30, -0001',
                    'coating_id' => 0,
                    'coating_name' => 'Blue Cutting',
                    'coating_desc' => '',
                    'coating_price' => 500.00,
                    'coating_discount' => 186.71,
                    'eyetest_id' => 13,
                    'prescription' => '{"right":{"sph":"65","cyl":"8","axis":"89","add":"23","pd":"11"},"left":{"sph":"99","cyl":"8","axis":"56","add":"23","pd":"52"}}',
				    'frame_measurement' => '{"right":{"segmentheight":"","fittingheight":"5"},"left":{"segmentheight":"5","fittingheight":"45"}}'
				]
				// [
				//     'sales_masterId' => 6,
				//     'product_id' => 9,
				//     'product_name' => 'ooo',
				//     'product_color' => 'Selected Color: black',
				//     'product_rate' => 52265.00,
				//     'product_discount' => 0,
				//     'product_image' => 'http://localhost/ecommerce/images/product/1729653938_8e2c58302fa602849b19.jpg',
				//     'lens_id' => null,
				//     'lens_name' => '',
				//     'lens_price' => null,
				//     'lens_discount' => 0,
				//     'exp_delivery' => '',
				//     'coating_name' => 'Vincent Chase',
				//     'coating_desc' => 'dfsg',
				//     'coating_price' => 2000.00,
				//     'coating_discount' => 2000.00,
				//     'eyetest_id' => null,
				//     'prescription' => [],
				//     'frame_measurement' => []
				// ]
				
		    ]
		];

        // Load HTML from the view
        $html = view('invoice_pdf', $combinedData);
        $pdf->loadHtml($html);
        $pdf->setPaper('A4', 'portrait');
        $pdf->render();

        // Get the PDF output
        $output = $pdf->output();
        $pdfFileName = 'invoice_' . time() . '.pdf';

         $pdf->stream('invoice_' . time() . '.pdf', ['Attachment' => false]);

	}
	public function DailyCollectionReport()
	{
		$session = session();
		if(!empty($_SESSION['user'])){
			return view('daily_collection_report');
		} else {
			return view('login');
		}
	}
	public function getDailyReportByDate()
	{
		$session = session();
		if(!empty($_SESSION['user'])){
		    $fromDate = $this->request->getPost('from_date');
		    $toDate = $this->request->getPost('to_date');
		    $pay_mode = $this->request->getPost('pay_mode');
		    $invoice_no = $this->request->getPost('invoice_no');
		    $cutomer = $this->request->getPost('cutomer');
		    $mobile = $this->request->getPost('mobile');
		    $user = $_SESSION['user_id'];

		    $report = $this->saleModel->getDailyReport($fromDate, $toDate, $pay_mode, $invoice_no, $cutomer, $mobile, $user);
		    return $this->response->setJSON($report);
	    } else {
			return view('login');
		}
	}
	public function CustomerReviewReport()
	{
		$session = session();
		if(!empty($_SESSION['user'])){
			return view('customer_review_report');
		} else {
			return view('login');
		}
	}
	public function CustomerReviewReportByDate()
	{
		$session = session();
	    if (!empty($_SESSION['user'])) {
	        $fromDate = $this->request->getPost('from_date');
	        $toDate = $this->request->getPost('to_date');
	        $allreport = $this->request->getPost('allreport');

	        $user = $_SESSION['user_id'];

	        $start = $this->request->getPost('start');
	        $length = $this->request->getPost('length');
	        $draw = $this->request->getPost('draw');

	        // Get total count of records before filtering
	        $totalRecords = $this->saleModel->countReviewTotalRecords($fromDate, $toDate, $allreport, $user);

	        // Get filtered data with pagination
	        $report = $this->saleModel->getCustomerReviewReport($fromDate, $toDate, $allreport, $user, $start, $length);

	        return $this->response->setJSON([
	            'data' => $report,
	            "draw" => intval($this->request->getPost('draw')),
	            "recordsTotal" => $totalRecords,
	            "recordsFiltered" => $totalRecords
	        ]);
	    } else {
	        return view('login');
	    }
	}
	public function SalesReport()
	{
		$session = session();
		if(!empty($_SESSION['user'])){

			if($_SESSION['user_type'] == 'admin' || $_SESSION['user_type'] == 'user'){
	        	$store_id = $_SESSION['store_id'];
	        }else{
	        	$store_id = '';
	        }
			$data['stores'] = $this->frontModel->AllStores($store_id);
			return view('sales_report',$data);
		} else {
			return view('login');
		}
	}

	public function getSalesReportByDate()
	{
		$session = session();
	    if (!empty($_SESSION['user'])) {
	        $fromDate = $this->request->getPost('from_date');
	        $toDate = $this->request->getPost('to_date');
	        $status = $this->request->getPost('status');
	        $mobile = $this->request->getPost('mobile');
	        $cname = $this->request->getPost('cname');
	        $allreport = $this->request->getPost('allreport');

	        if($_SESSION['user_type'] == 'user'){
	        	$store_id = $_SESSION['store_id'];
	        }else{
	        	$store_id = $this->request->getPost('store');
	        }

	        $user = $_SESSION['user_id'];

	        $start = $this->request->getPost('start');
	        $length = $this->request->getPost('length');
	        $draw = $this->request->getPost('draw');

	        // Get total count of records before filtering
	        $totalRecords = $this->saleModel->countTotalRecords($fromDate, $toDate, $status, $allreport, $mobile, $cname, $user, $store_id);

	        // Get filtered data with pagination
	        $report = $this->saleModel->getSalesReport($fromDate, $toDate, $status, $allreport, $mobile, $cname, $user, $store_id, $start, $length);

	        $overallTotal = 0;
	        $paidTotal = 0;
	        $balanceTotal = 0;

	        // Loop through the report to calculate totals
	        foreach ($report as $row) {
	            $overallTotal += floatval($row->total_amount ?? 0);
	            $paidTotal += floatval($row->totalPaid ?? 0);
	            $balanceTotal += floatval(($row->total_amount - $row->totalPaid) ?? 0);
	        }

	        return $this->response->setJSON([
	            'data' => $report,
	            "draw" => intval($this->request->getPost('draw')),
	            "recordsTotal" => $totalRecords,
	            "recordsFiltered" => $totalRecords,
	            'overalltotal' => number_format($overallTotal, 2, '.', ''),
	            'paidTotal' => number_format($paidTotal, 2, '.', ''),
	            'balanceTotal' => number_format($balanceTotal, 2, '.', '')
	        ]);
	    } else {
	        return view('login');
	    }
	}

	public function DeletedSalesReport()
	{
		$session = session();
		if(!empty($_SESSION['user'])){
			if($_SESSION['user_type'] == 'admin' || $_SESSION['user_type'] == 'user'){
	        	$store_id = $_SESSION['store_id'];
	        }else{
	        	$store_id = '';
	        }
			$data['stores'] = $this->frontModel->AllStores($store_id);
			return view('deleted_sales_report',$data);
		} else {
			return view('login');
		}
	}
	public function getDeletedSalesReportByDate()
	{
		$session = session();
		if(!empty($_SESSION['user'])){
		    $fromDate = $this->request->getPost('from_date');
		    $toDate = $this->request->getPost('to_date');
		    $user = $_SESSION['user_id'];

		    if($_SESSION['user_type'] == 'user'){
	        	$store_id = $_SESSION['store_id'];
	        }else{
	        	$store_id = $this->request->getPost('store');
	        }
		    $report = $this->saleModel->getDeletedSalesReports($fromDate, $toDate, $user, $store_id);
		    return $this->response->setJSON($report);
	    } else {
			return view('login');
		}
	}
	public function invoicePrint($id)
	{
		$salesMasterData = $this->saleModel->SalesReportData($id);
		$salesDetailData = $this->saleModel->SalesDetailsReportData($id);
		$header_image = $this->saleModel->getHeaderImage($salesMasterData[0]->store_id);

		$salesman = $this->saleModel->SalesmanName($salesMasterData[0]->salesman_id);

        $options = new Options();
        $options->set('defaultFont', 'DejaVu Sans');
        $options->set('isRemoteEnabled', true); 
        // $pdf->setOptions($options);
		$pdf = new Dompdf($options);

		$privilege_details = $this->saleModel->privilegeDetails($salesMasterData[0]->previlage_id);
		$coupen_details = $this->saleModel->coupenDetails($salesMasterData[0]->coupen_id);
		$ReturnAmount = $this->saleModel->getReturnamount($salesMasterData[0]->Return_MasterId);
		$warranty_details = $this->warrantyModel->WarrantyEditMdl($salesMasterData[0]->warranty_id);

		$combinedData = [
		    'salesMasterData' => [
		        'invoice_no' => $salesMasterData[0]->invoice_no,
		        'invoice_date' => $salesMasterData[0]->invoice_date,
		        'customer_name' => $salesMasterData[0]->customer_name,
		        'phone' => $salesMasterData[0]->phone,
		        'email' => $salesMasterData[0]->email,
		        'salesman_id' => $salesMasterData[0]->salesman_id,
		        'total_amount' => $salesMasterData[0]->total_amount,
		        'coupen_id' => $salesMasterData[0]->coupen_id,
		        'coupen_disc_amt' => $salesMasterData[0]->coupen_disc_amt,
		        'previlage_id' => $salesMasterData[0]->previlage_id,
	            'delivered' => $salesMasterData[0]->delivered,
		        'CreatedDate' => $salesMasterData[0]->CreatedDate,
		        'advance_amont' => $salesMasterData[0]->advance_amont,
		        'balance_amount' => $salesMasterData[0]->balance_amount,
		        'payment_mode' => $salesMasterData[0]->payment_mode,
		        'salesman_name' => $salesman,
				'header_name' => $salesMasterData[0]->delivered == 1 ? 'Sales Invoice' : 'Sales Order',
				'paid_amount' => $this->saleModel->SumofPaidAmt($salesMasterData[0]->invoice_no),
		        'privilege_phone' => $privilege_details->phone ?? '',
		        'privilege_name' => $privilege_details->name ?? '',
		        'privilege_expiry' => $privilege_details->to_date ?? '',
		        'coupen_code' => $coupen_details->coupen_code ?? '',
		        'ReturnAmount' => $ReturnAmount ?? '',
		        'warranty_amt' => $warranty_details[0]->sales_rate ?? '',
		        'warranty_name' => $warranty_details[0]->name ?? '',
		        'header_image' => $header_image,

		    ],
		    'salesDetailData' => array_map(function($salesItem) {
		    	$formattedDeliveryDate = date("F j, Y", strtotime($salesItem->delivery_date));
		        return [
		            'sales_masterId' => $salesItem->sales_masterId,
		            'product_id' => $salesItem->pid,
		            'barcode' => $this->saleModel->getBarcode($salesItem->pid),
		            'product_name' => $salesItem->productName,
		            'product_color' => 'Selected Color: '.$salesItem->color_name,
		            'product_rate' => $salesItem->product_rate,
		            'product_discount' => $salesItem->product_discount,
		            'product_image' => !empty($salesItem->product_image) ? $salesItem->product_image : base_url('/images/no-img.jpg'),
		            'lens_id' => $salesItem->lensid,
		            'lens_name' => $salesItem->lensName,
		            'lens_price' => $salesItem->lens_rate,
		            'lens_discount' => $salesItem->lens_discount,
		            'exp_delivery' => 'Expected delivery date: ' . $formattedDeliveryDate,
		            'coating_id' => $salesItem->coating_id,
		            'coating_name' => $salesItem->coating_name,
		            'coating_desc' => $salesItem->description,
		            'coating_price' => $salesItem->coating_rate,
		            'coating_discount' => $salesItem->coating_discount,
		            'eyetest_id' => $salesItem->eyetest_id,
		            'prescription' => json_decode($salesItem->Prescription, true), // Assuming it is JSON
		            'frame_measurement' => json_decode($salesItem->frame_measurement, true) // Assuming it is JSON
		        ];
		    }, $salesDetailData)
		];

		// echo '<pre>';
		// print_r($combinedData);
		// echo '</pre>';
		// exit;

        // Load HTML from the view
        $html = view('invoice_pdf', $combinedData);
        $pdf->loadHtml($html);
        $pdf->setPaper('A4', 'portrait');
        $pdf->render();

        // Get the PDF output
        $output = $pdf->output();
		$pdfFileName = 'zealux_invoice_' . $salesMasterData[0]->invoice_no . '.pdf';

        $pdf->stream($pdfFileName, ['Attachment' => true]);
        exit();

	}
	public function invoiceWhatsapp($id)
	{
		$salesMasterData = $this->saleModel->SalesReportData($id);
		$salesDetailData = $this->saleModel->SalesDetailsReportData($id);
		$salesman = $this->saleModel->SalesmanName($salesMasterData[0]->salesman_id);

        $options = new Options();
        $options->set('defaultFont', 'DejaVu Sans');
        $options->set('isRemoteEnabled', true); 
        // $pdf->setOptions($options);
		$pdf = new Dompdf($options);

		$privilege_details = $this->saleModel->privilegeDetails($salesMasterData[0]->previlage_id);
		$coupen_details = $this->saleModel->coupenDetails($salesMasterData[0]->coupen_id);
		$ReturnAmount = $this->saleModel->getReturnamount($salesMasterData[0]->Return_MasterId);
		$warranty_details = $this->warrantyModel->WarrantyEditMdl($salesMasterData[0]->warranty_id);
		$header_image = $this->saleModel->getHeaderImage($salesMasterData[0]->store_id);

		$combinedData = [
		    'salesMasterData' => [
		        'invoice_no' => $salesMasterData[0]->invoice_no,
		        'invoice_date' => $salesMasterData[0]->invoice_date,
		        'customer_name' => $salesMasterData[0]->customer_name,
		        'phone' => $salesMasterData[0]->phone,
		        'email' => $salesMasterData[0]->email,
		        'salesman_id' => $salesMasterData[0]->salesman_id,
		        'total_amount' => $salesMasterData[0]->total_amount,
		        'coupen_id' => $salesMasterData[0]->coupen_id,
		        'coupen_disc_amt' => $salesMasterData[0]->coupen_disc_amt,
		        'previlage_id' => $salesMasterData[0]->previlage_id,
	            'delivered' => $salesMasterData[0]->delivered,
		        'CreatedDate' => $salesMasterData[0]->CreatedDate,
		        'advance_amont' => $salesMasterData[0]->advance_amont,
		        'balance_amount' => $salesMasterData[0]->balance_amount,
		        'payment_mode' => $salesMasterData[0]->payment_mode,
		        'salesman_name' => $salesman,
				'header_name' => $salesMasterData[0]->delivered == 1 ? 'Sales Invoice' : 'Sales Order',
				'paid_amount' => $this->saleModel->SumofPaidAmt($salesMasterData[0]->invoice_no),
		        'privilege_phone' => $privilege_details->phone ?? '',
		        'privilege_name' => $privilege_details->name ?? '',
		        'privilege_expiry' => $privilege_details->to_date ?? '',
		        'coupen_code' => $coupen_details->coupen_code ?? '',
		        'ReturnAmount' => $ReturnAmount ?? '',
		        'warranty_amt' => $warranty_details[0]->sales_rate ?? '',
		        'warranty_name' => $warranty_details[0]->name ?? '',
		        'header_image' => $header_image,

		    ],
		    'salesDetailData' => array_map(function($salesItem) {
		    	$formattedDeliveryDate = date("F j, Y", strtotime($salesItem->delivery_date));
		        return [
		            'sales_masterId' => $salesItem->sales_masterId,
		            'product_id' => $salesItem->pid,
		            'barcode' => $this->saleModel->getBarcode($salesItem->pid),
		            'product_name' => $salesItem->productName,
		            'product_color' => 'Selected Color: '.$salesItem->color_name,
		            'product_rate' => $salesItem->product_rate,
		            'product_discount' => $salesItem->product_discount,
		            'product_image' => !empty($salesItem->product_image) ? $salesItem->product_image : base_url('/images/no-img.jpg'),
		            'lens_id' => $salesItem->lensid,
		            'lens_name' => $salesItem->lensName,
		            'lens_price' => $salesItem->lens_rate,
		            'lens_discount' => $salesItem->lens_discount,
		            'exp_delivery' => 'Expected delivery date: ' . $formattedDeliveryDate,
		            'coating_id' => $salesItem->coating_id,
		            'coating_name' => $salesItem->coating_name,
		            'coating_desc' => $salesItem->description,
		            'coating_price' => $salesItem->coating_rate,
		            'coating_discount' => $salesItem->coating_discount,
		            'eyetest_id' => $salesItem->eyetest_id,
		            'prescription' => json_decode($salesItem->Prescription, true), // Assuming it is JSON
		            'frame_measurement' => json_decode($salesItem->frame_measurement, true) // Assuming it is JSON
		        ];
		    }, $salesDetailData)
		];

        // Load HTML from the view
        $html = view('invoice_pdf', $combinedData);
        $pdf->loadHtml($html);
        $pdf->setPaper('A4', 'portrait');
        $pdf->render();

        // Get the PDF output
        $output = $pdf->output();
		$pdfFileName = 'zealux_invoice_' . $salesMasterData[0]->invoice_no . '.pdf';

        $pdf->stream($pdfFileName, ['Attachment' => false]);
        exit();

	}
	public function invoiceMail()
	{
		$session = session();
		if(!empty($_SESSION['user'])){

		    $id = $this->request->getGet('id');
		    $salesMasterData = $this->saleModel->SalesReportData($id);
			$salesDetailData = $this->saleModel->SalesDetailsReportData($id);
			$salesman = $this->saleModel->SalesmanName($salesMasterData[0]->salesman_id);
			$privilege_details = $this->saleModel->privilegeDetails($salesMasterData[0]->previlage_id);
			$coupen_details = $this->saleModel->coupenDetails($salesMasterData[0]->coupen_id);
			$ReturnAmount = $this->saleModel->getReturnamount($salesMasterData[0]->Return_MasterId);
			$warranty_details = $this->warrantyModel->WarrantyEditMdl($salesMasterData[0]->warranty_id);
			$header_image = $this->saleModel->getHeaderImage($salesMasterData[0]->store_id);

			$combinedData = [
			    'salesMasterData' => [
			        'invoice_no' => $salesMasterData[0]->invoice_no,
			        'invoice_date' => $salesMasterData[0]->invoice_date,
			        'customer_name' => $salesMasterData[0]->customer_name,
			        'phone' => $salesMasterData[0]->phone,
			        'email' => $salesMasterData[0]->email,
			        'salesman_id' => $salesMasterData[0]->salesman_id,
			        'total_amount' => $salesMasterData[0]->total_amount,
			        'coupen_id' => $salesMasterData[0]->coupen_id,
			        'coupen_disc_amt' => $salesMasterData[0]->coupen_disc_amt,
			        'previlage_id' => $salesMasterData[0]->previlage_id,
	            	'delivered' => $salesMasterData[0]->delivered,
			        'CreatedDate' => $salesMasterData[0]->CreatedDate,
			        'advance_amont' => $salesMasterData[0]->advance_amont,
			        'balance_amount' => $salesMasterData[0]->balance_amount,
			        'payment_mode' => $salesMasterData[0]->payment_mode,
			        'salesman_name' => $salesman,
					'header_name' => $salesMasterData[0]->delivered == 1 ? 'Sales Invoice' : 'Sales Order',
					'paid_amount' => $this->saleModel->SumofPaidAmt($salesMasterData[0]->invoice_no),
					'privilege_phone' => $privilege_details->phone ?? '',
			        'privilege_name' => $privilege_details->name ?? '',
			        'privilege_expiry' => $privilege_details->to_date ?? '',
			        'coupen_code' => $coupen_details->coupen_code ?? '',
			        'ReturnAmount' => $ReturnAmount ?? '',
			        'warranty_amt' => $warranty_details[0]->sales_rate ?? '',
		        	'warranty_name' => $warranty_details[0]->name ?? '',
		        	'header_image' => $header_image,

			    ],
			    'salesDetailData' => array_map(function($salesItem) {
			        $formattedDeliveryDate = date("F j, Y", strtotime($salesItem->delivery_date));
			        return [
			            'sales_masterId' => $salesItem->sales_masterId,
			            'product_id' => $salesItem->pid,
			            'barcode' => $this->saleModel->getBarcode($salesItem->pid),
			            'product_name' => $salesItem->productName,
			            'product_color' => 'Selected Color: '.$salesItem->color_name,
			            'product_rate' => $salesItem->product_rate,
			            'product_discount' => $salesItem->product_discount,
			            'product_image' => !empty($salesItem->product_image) ? $salesItem->product_image : base_url('/images/no-img.jpg'),
			            'lens_id' => $salesItem->lensid,
			            'lens_name' => $salesItem->lensName,
			            'lens_price' => $salesItem->lens_rate,
			            'lens_discount' => $salesItem->lens_discount,
			            'exp_delivery' => 'Expected delivery date: ' . $formattedDeliveryDate,
			            'coating_id' => $salesItem->coating_id,
			            'coating_name' => $salesItem->coating_name,
			            'coating_desc' => $salesItem->description,
			            'coating_price' => $salesItem->coating_rate,
			            'coating_discount' => $salesItem->coating_discount,
			            'eyetest_id' => $salesItem->eyetest_id,
			            'prescription' => json_decode($salesItem->Prescription, true), // Assuming it is JSON
			            'frame_measurement' => json_decode($salesItem->frame_measurement, true) // Assuming it is JSON
			        ];
			    }, $salesDetailData)
			];

	        if(!empty($salesMasterData[0]->email)){
	    		$email = \Config\Services::email();
		    	$email->setTo($salesMasterData[0]->email);
			    $email->setFrom('sales@zealuxeyeboutique.com', 'ZEALUX Eye Boutique');
			    $email->setSubject('Sales Invoice');
			    $email->setMessage('Thank you for your purchase! Please find your invoice attached.');

			    $options = new Options();
		        $options->set('defaultFont', 'DejaVu Sans');
		        $options->set('isRemoteEnabled', true); 
				$pdf = new Dompdf($options);

		        $html = view('invoice_pdf', $combinedData);
		        $pdf->loadHtml($html);
		        $pdf->setPaper('A4', 'portrait');
		        $pdf->render();

		        // Get the PDF output
		        $output = $pdf->output();
				$pdfFileName = 'zealux_invoice_' . $salesMasterData[0]->invoice_no . '.pdf';
				$email->attach($output, 'application/pdf', $pdfFileName, true);

			    if ($email->send()) {
                    return $this->response->setJSON([
				        'success' => true,
				        'message' => 'Mail sended successfully.'
				    ]);

			    } else {
			        log_message('error', 'Failed to send email: ' . $email->printDebugger());
		            return $this->response->setJSON([
					    'success' => false,
					    'message' => 'Failed to send mail. ' 
					]);
			    }
	    	}else{
	    		return $this->response->setJSON([
				    'success' => false,
				    'message' => 'Failed. Try Again'
				]);
	    	}

	    } else {
			return view('login');
		}	
	}
	public function invoiceView($id)
	{
		$session = session();
		if(!empty($_SESSION['user'])){

			$data['salesMasterData'] = $this->saleModel->SalesReportData($id);
			$data['salesDetailData'] = $this->saleModel->SalesDetailsReportData($id);
			$data['salesman'] = $this->saleModel->SalesmanName($data['salesMasterData'][0]->salesman_id);
			$data['salesmans'] = $this->saleModel->Salesmanlist();
			$data['paid_amt_sum'] = $this->saleModel->SumofPaidAmt($data['salesMasterData'][0]->invoice_no);

			return view('invoice_items',$data);
		} else {
			return view('login');
		}
	}
	public function SaveInvoiceReceipt()
	{
		$session = session();
		if(!empty($_SESSION['user'])){
			$data['voucherType'] = 'receipt';
		    $data['sales_masterId'] = $this->request->getPost('master_id');
			$data['master_invoice_date'] = $this->request->getPost('invoice_date');
			$data['SalesManId'] = $this->request->getPost('salesman');
			$data['Balance'] = $this->request->getPost('balance');
			$data['BillAmount'] = $this->request->getPost('billamt');
			$data['PendingAmount'] = $this->request->getPost('pending');
			$data['PaidAmount'] = $this->request->getPost('paid');
			$data['PaymentMode'] = $this->request->getPost('pay_mode');
			$data['ReferanceNo'] = $this->request->getPost('refno');
			$data['InvoiceNo'] = $this->request->getPost('invoice_no');
			$data['CreatedUser'] = $_SESSION['user_id'];
			$data['store_id'] = $_SESSION['store_id'];
			$data['CreatedDate'] = date('Y-m-d H:i:s');

			$insertid = $this->saleModel->Add_InvoiceReceipt($data);

			if($insertid){
				$delivered = $this->request->getPost('delivered');
				$id = $this->request->getPost('master_id');
			    if ($delivered == '1') {
			        $this->saleModel->updateDeliveredStatus($id);

			        $salesMasterData = $this->saleModel->SalesReportData($id);
					$salesDetailData = $this->saleModel->SalesDetailsReportData($id);
					$salesman = $this->saleModel->SalesmanName($salesMasterData[0]->salesman_id);
					$privilege_details = $this->saleModel->privilegeDetails($salesMasterData[0]->previlage_id);
					$coupen_details = $this->saleModel->coupenDetails($salesMasterData[0]->coupen_id);
					$ReturnAmount = $this->saleModel->getReturnamount($salesMasterData[0]->Return_MasterId);
					$warranty_details = $this->warrantyModel->WarrantyEditMdl($salesMasterData[0]->warranty_id);
					$header_image = $this->saleModel->getHeaderImage($salesMasterData[0]->store_id);


					$combinedData = [
					    'salesMasterData' => [
					        'invoice_no' => $salesMasterData[0]->invoice_no,
					        'invoice_date' => $salesMasterData[0]->invoice_date,
					        'customer_name' => $salesMasterData[0]->customer_name,
					        'phone' => $salesMasterData[0]->phone,
					        'email' => $salesMasterData[0]->email,
					        'salesman_id' => $salesMasterData[0]->salesman_id,
					        'total_amount' => $salesMasterData[0]->total_amount,
					        'coupen_id' => $salesMasterData[0]->coupen_id,
					        'coupen_disc_amt' => $salesMasterData[0]->coupen_disc_amt,
					        'previlage_id' => $salesMasterData[0]->previlage_id,
	            			'delivered' => $salesMasterData[0]->delivered,
					        'CreatedDate' => $salesMasterData[0]->CreatedDate,
					        'advance_amont' => $salesMasterData[0]->advance_amont,
					        'balance_amount' => $salesMasterData[0]->balance_amount,
					        'payment_mode' => $salesMasterData[0]->payment_mode,
					        'salesman_name' => $salesman,
							'header_name' => $salesMasterData[0]->delivered == 1 ? 'Sales Invoice' : 'Sales Order',
							'paid_amount' => $this->saleModel->SumofPaidAmt($salesMasterData[0]->invoice_no),
							'privilege_phone' => $privilege_details->phone ?? '',
					        'privilege_name' => $privilege_details->name ?? '',
					        'privilege_expiry' => $privilege_details->to_date ?? '',
					        'coupen_code' => $coupen_details->coupen_code ?? '',
					        'ReturnAmount' => $ReturnAmount ?? '',
					        'warranty_amt' => $warranty_details[0]->sales_rate ?? '',
		        			'warranty_name' => $warranty_details[0]->name ?? '',
		        			'header_image' => $header_image,

					    ],
					    'salesDetailData' => array_map(function($salesItem) {
					        $formattedDeliveryDate = date("F j, Y", strtotime($salesItem->delivery_date));
					        return [
					            'sales_masterId' => $salesItem->sales_masterId,
					            'product_id' => $salesItem->pid,
					            'barcode' => $this->saleModel->getBarcode($salesItem->pid),
					            'product_name' => $salesItem->productName,
					            'product_color' => 'Selected Color: '.$salesItem->color_name,
					            'product_rate' => $salesItem->product_rate,
					            'product_discount' => $salesItem->product_discount,
					            'product_image' => !empty($salesItem->product_image) ? $salesItem->product_image : base_url('/images/no-img.jpg'),
					            'lens_id' => $salesItem->lensid,
					            'lens_name' => $salesItem->lensName,
					            'lens_price' => $salesItem->lens_rate,
					            'lens_discount' => $salesItem->lens_discount,
					            'exp_delivery' => 'Expected delivery date: ' . $formattedDeliveryDate,
					            'coating_id' => $salesItem->coating_id,
					            'coating_name' => $salesItem->coating_name,
					            'coating_desc' => $salesItem->description,
					            'coating_price' => $salesItem->coating_rate,
					            'coating_discount' => $salesItem->coating_discount,
					            'eyetest_id' => $salesItem->eyetest_id,
					            'prescription' => json_decode($salesItem->Prescription, true), // Assuming it is JSON
					            'frame_measurement' => json_decode($salesItem->frame_measurement, true) // Assuming it is JSON
					        ];
					    }, $salesDetailData)
					];

			        if(!empty($salesMasterData[0]->email)){
			    		$email = \Config\Services::email();
				    	$email->setTo($salesMasterData[0]->email);
					    $email->setFrom('sales@zealuxeyeboutique.com', 'ZEALUX Eye Boutique');
					    $email->setSubject('Sales Invoice');
					    $email->setMessage('Thank you for your purchase! Please find your invoice attached.');


					    $options = new Options();
				        $options->set('defaultFont', 'DejaVu Sans');
				        $options->set('isRemoteEnabled', true); 
				        // $pdf->setOptions($options);
						$pdf = new Dompdf($options);
				        // Load HTML from the view
				        $html = view('invoice_pdf', $combinedData);
				        $pdf->loadHtml($html);
				        $pdf->setPaper('A4', 'portrait');
				        $pdf->render();

				        // Get the PDF output
				        $output = $pdf->output();
						$pdfFileName = 'zealux_invoice_' . $salesMasterData[0]->invoice_no . '.pdf';
						$email->attach($output, 'application/pdf', $pdfFileName, true);

                        $base64PDF = base64_encode($output);

					    if ($email->send()) {
	                        return $this->response->setJSON([
						        'success' => true,
						        'message' => 'Data saved successfully.',
						        'pdf_base64' => $base64PDF, 
						        'pdf_name' => $pdfFileName
						    ]);

					    } else {
					        log_message('error', 'Failed to send email: ' . $email->printDebugger());
				            return $this->response->setJSON([
							    'success' => false,
							    'pdf_base64' => $base64PDF, 
						        'pdf_name' => $pdfFileName,
							    'message' => 'Data saved, but email failed to send. '
							]);
					    }
			    	}
			    }
				return $this->response->setJSON(['success' => true, 'message' => 'Data saved successfully.']);
			}else{
				return $this->response->setJSON(['success' => false,'message' => 'Try Again. ']);
			}
			
		} else {
			return view('login');
		}	
	}
	public function InvoiceDelete($id)
	{
		$session = session();
		if(!empty($_SESSION['user'])){

			$salesMasterData = $this->saleModel->SalesReportData($id);

			$salesMasterhistory = [
	        	'history_id' => $this->saleModel->MaxHistoryId(),
	        	'invoice_no' => $salesMasterData[0]->invoice_no,
	        	'invoice_date' => $salesMasterData[0]->invoice_date,
	            'customer_name' => $salesMasterData[0]->customer_name,
	            'phone' => $salesMasterData[0]->phone,
	            'email' => $salesMasterData[0]->email,
	            'salesman_id' => $salesMasterData[0]->salesman_id,
	            'total_amount' => $salesMasterData[0]->total_amount,
	            'advance_amont' => $salesMasterData[0]->advance_amont,
	            'balance_amount' => $salesMasterData[0]->balance_amount,
	            'payment_mode' => $salesMasterData[0]->payment_mode,
	            'coupen_id' => $salesMasterData[0]->coupen_id,
	            'coupen_disc_amt' => $salesMasterData[0]->coupen_disc_amt,
	            'coupon_disc_percentage' => $salesMasterData[0]->coupon_disc_percentage,
	            'previlage_id' => $salesMasterData[0]->previlage_id,
	            'delivered' => $salesMasterData[0]->delivered,
	            'Return_MasterId' => $salesMasterData[0]->Return_MasterId,
	            'Return_Amount' => $salesMasterData[0]->Return_Amount,
	            'warranty_amt' => $salesMasterData[0]->warranty_amt,
	            'warranty_id' => $salesMasterData[0]->warranty_id,
	            'store_id' => 1,
	            'CreatedUser' => $salesMasterData[0]->CreatedUser,
				'CreatedDate' => $salesMasterData[0]->CreatedDate,
				'deleted_user' => $_SESSION['user_id'],
	            'store_id' => $_SESSION['store_id'],
				'deleted_date' => date('Y-m-d'),
	        ];

	        $salesHistoryId = $this->saleModel->insertSalesMasterHistory($salesMasterhistory);

	        if($salesHistoryId){
				$DetailData = $this->saleModel->SalesDetailsReportData($id);

				$combinedData = [
				    'salesDetailData' => array_map(function($salesItem) use ($salesHistoryId) {

				        return [
				            'salesmaster_history_id' => $salesHistoryId,
				            'sales_masterId' => $salesItem->sales_masterId,
				            'pid' => $salesItem->pid,
				            'barcode' => $this->saleModel->getBarcode($salesItem->pid),
				            'color_name' => $salesItem->color_name,
				            'color_code' => $salesItem->color_code,
				            'lensid' => $salesItem->lensid,
				            'coating_id' => $salesItem->coating_id,
				            'product_rate' => $salesItem->product_rate,
				            'product_discount' => $salesItem->product_discount,
				            'product_image' =>  $salesItem->product_image,
				            'lens_rate' => $salesItem->lens_rate,
				            'lens_discount' => $salesItem->lens_discount,
				            'coating_rate' => $salesItem->coating_rate,
				            'coating_discount' => $salesItem->coating_discount,
				            'eyetest_id' => $salesItem->eyetest_id,
				            'return_status' => $salesItem->return_status,
				            'delivery_date' => $salesItem->delivery_date,
				            'store_id' => $salesItem->store_id,
				        ];
				    }, $DetailData)
				];
				$salesDetailsHistoryId = $this->saleModel->insertSalesDetailHistory($combinedData['salesDetailData']);
				if($salesDetailsHistoryId){
					$invoiceData = $this->saleModel->SalesInvoiceData($id);

					$combinedData = [
					    'salesInvoiceData' => array_map(function($salesInvoice) use ($salesHistoryId) {

					        return [
					            'SalesMaster_historyId' => $salesHistoryId,
					            'voucherType' => $salesInvoice->voucherType,
					            'master_invoice_date' => $salesInvoice->master_invoice_date,
					            'sales_masterId' => $salesInvoice->sales_masterId,
					            'InvoiceNo' => $salesInvoice->InvoiceNo,
					            'PaymentMode' => $salesInvoice->PaymentMode,
					            'ReferanceNo' => $salesInvoice->ReferanceNo,
					            'BillAmount' => $salesInvoice->BillAmount,
					            'PendingAmount' => $salesInvoice->PendingAmount,
					            'PaidAmount' =>  $salesInvoice->PaidAmount,
					            'Balance' => $salesInvoice->Balance,
					            'SalesManId' => $salesInvoice->SalesManId,
					            'store_id' => $salesInvoice->store_id,
					            'CreatedUser' => $salesInvoice->CreatedUser,
								'CreatedDate' => $salesInvoice->CreatedDate,
					        ];
					    }, $invoiceData)
					];
					$salesInvoiceId = $this->saleModel->insertSalesInvoiceHistory($combinedData['salesInvoiceData']);
					if(!$salesInvoiceId){
						$session->setFlashdata('alert', 'error|Oops...|Failed to insert sales invoice history.Try Again');
	            		return redirect()->to('sales-report');
					}
				}else{
		        	$session->setFlashdata('alert', 'error|Oops...|Failed to insert sales detail history.Try Again');
	            	return redirect()->to('sales-report');
		        }
	        }else{
	        	$session->setFlashdata('alert', 'error|Oops...|Try Again');
            	return redirect()->to('sales-report');
	        }

			$query = $this->saleModel->InvoiceDeleteMdl($id);
			if($query){
				$session->setFlashdata('alert', 'success|Success...|Deleted Successfully');
            	return redirect()->to('sales-report');
			}
		} else {
			return view('login');
		}
	}
	public function BillWiseProfitReport()
	{
		$session = session();
		if(!empty($_SESSION['user'])){
			return view('bill_wise_profit_report');
		} else {
			return view('login');
		}
	}
	public function BillWiseProfitReportByDate()
	{
		$session = session();
		if(!empty($_SESSION['user'])){
		    $fromDate = $this->request->getPost('from_date');
		    $toDate = $this->request->getPost('to_date');

		    $report = $this->saleModel->getBillWiseProfitReport($fromDate, $toDate);
		    return $this->response->setJSON($report);
	    } else {
			return view('login');
		}
	}
	public function AccountSummaryReport()
	{
		$session = session();
		if(!empty($_SESSION['user'])){
			return view('account_summary_report');
		} else {
			return view('login');
		}
	}
	public function AccountSummaryReportByDate()
	{
		$session = session();
		if(!empty($_SESSION['user'])){
		    $fromDate = $this->request->getPost('from_date');
		    $toDate = $this->request->getPost('to_date');

		    $report = $this->saleModel->getAccountSummaryReport($fromDate, $toDate);
		    return $this->response->setJSON($report);
	    } else {
			return view('login');
		}
	}
	public function getTotalPurchaseCount()
	{
		$session = session();
		if(!empty($_SESSION['user'])){

		    $id = $this->request->getGet('id');
		    $count = $this->saleModel->TotalPurchaseCount($id);

	        return $this->response->setJSON([
	            'status' => 'success',
	            'data' => $count
	        ]);
		   
	    } else {
			return view('login');
		}	
	}
	public function SalesReturn()
	{
		$session = session();
		if(!empty($_SESSION['user'])){
			return view('sales_return');
		} else {
			return view('login');
		}
	}
	public function getSalesReturnByFilter()
	{
		$session = session();
		if(!empty($_SESSION['user'])){
		    $fromDate = $this->request->getPost('from_date');
		    $toDate = $this->request->getPost('to_date');
		    $invoice_no = $this->request->getPost('invoice_no');
		    $cutomer = $this->request->getPost('cutomer');
		    $mobile = $this->request->getPost('mobile');
		    $user = $_SESSION['user_id'];

		    $report = $this->saleModel->getSalesReturn($fromDate, $toDate, $invoice_no, $cutomer, $mobile, $user);
		    return $this->response->setJSON($report);
	    } else {
			return view('login');
		}
	}
	public function ReturnView($id)
	{
		$session = session();
		if(!empty($_SESSION['user'])){

			$data['salesMasterData'] = $this->saleModel->SalesReportData($id);
			$data['salesDetailData'] = $this->saleModel->SalesDetailsReportData($id);
			$data['salesman'] = $this->saleModel->SalesmanName($data['salesMasterData'][0]->salesman_id);
			$data['salesmans'] = $this->saleModel->Salesmanlist();
			$data['paid_amt_sum'] = $this->saleModel->SumofPaidAmt($data['salesMasterData'][0]->invoice_no);

			return view('return_items',$data);
		} else {
			return view('login');
		}
	}
	public function getFrameWarranty()
	{
		$session = session();
		if(!empty($_SESSION['user'])){

		    $id = $this->request->getGet('id');
		    $frame = $this->saleModel->getFrameWarrantyData($id);

		    if ($frame) {
		        return $this->response->setJSON([
		            'status' => 'success',
		            'data' => $frame
		        ]);
		    } else {
		        return $this->response->setJSON([
		            'status' => 'error',
		            'message' => 'Product not found'
		        ]);
		    }
	    } else {
			return view('login');
		}	
	}
	public function getFramePurchaseDate()
	{
		$session = session();
		if(!empty($_SESSION['user'])){

		    $id = $this->request->getGet('id');
		    $frame = $this->saleModel->getFramePurchaseDateData($id);

		    if ($frame) {
		        return $this->response->setJSON([
		            'status' => 'success',
		            'data' => $frame
		        ]);
		    } else {
		        return $this->response->setJSON([
		            'status' => 'error',
		            'message' => 'Frame Purchase Date not found'
		        ]);
		    }
	    } else {
			return view('login');
		}	
	}
	public function getLensWarranty()
	{
		$session = session();
		if(!empty($_SESSION['user'])){

		    $id = $this->request->getGet('id');
		    $lens = $this->saleModel->getLensWarrantyData($id);

		    if ($lens) {
		        return $this->response->setJSON([
		            'status' => 'success',
		            'data' => $lens
		        ]);
		    } else {
		        return $this->response->setJSON([
		            'status' => 'error',
		            'message' => 'Lens not found'
		        ]);
		    }
	    } else {
			return view('login');
		}	
	}

	public function getColorWiseStock() {
		$session = session();
		if(!empty($_SESSION['user'])){

		    $pid = $this->request->getGet('pid');
		    $color = $this->request->getGet('color');

	        $data = $this->saleModel->ColorWiseStock($pid, $color); 

		    // var_dump($data);

		    if ($data) {
		        echo json_encode(['valid' => true, 'data' => $data]);
		    } else {
		        echo json_encode(['valid' => false]);
		    }
	    } else {
			return view('login');
		}
	}
	public function StockReport()
	{
		$session = session();
		if(!empty($_SESSION['user'])){
			$data['groups'] = $this->groupModel->AllGroups();
			return view('stock_report',$data);
		} else {
			return view('login');
		}
	}
	public function getStockReport()
	{
		$session = session();
		if(!empty($_SESSION['user'])){
		    $name = $this->request->getPost('name');
		    $barcode = $this->request->getPost('barcode');
		    $group = $this->request->getPost('group');
		    $model = $this->request->getPost('model');
		    $store_id = $_SESSION['store_id'];

		    $products = $this->saleModel->stockReportMdl($name, $barcode, $group, $model, $store_id);
			$productIds = array_column($products, 'pid');
			$product_images = $this->saleModel->getImagesByProductIds($productIds);

		    if ($products && $product_images) {
		        echo json_encode(['valid' => true, 'products' => $products, 'product_images' => $product_images]);
		    } else {
		        echo json_encode(['valid' => false]);
		    }

	    } else {
			return view('login');
		}
	}

	public function getEyetestUsers()
	{
		$session = session();
		if(!empty($_SESSION['user'])){

		    $query = $this->request->getPost('query');

		    if (!$query) {
		        return $this->response->setJSON([]); 
		    }

		    $data = $this->saleModel->EyetestUsersMdl($query);
		    return $this->response->setJSON($data);

	    } else {
			return view('login');
		}
	}
	public function getLensCleanerDetails()
	{
		$session = session();
		if(!empty($_SESSION['user'])){

		    $barcode = $this->request->getGet('barcode');
		    $details = $this->saleModel->ProductDataByBarcode($barcode);

	        return $this->response->setJSON([
	            'status' => 'success',
	            'data' => $details
	        ]);
		   
	    } else {
			return view('login');
		}	
	}
	public function GetCoatingDetails() {
		$session = session();
		if(!empty($_SESSION['user'])){

		    $lensid = $this->request->getGet('lensid');

			$data = $this->saleModel->GetCoating_Details($lensid); 
			$lensCoatingId = array_map('intval', explode(',', $data->lensCoatingId));

			$lensCoatings = $this->saleModel->Coating_Data($lensCoatingId); 
			$lensfeatures = $this->lensfeaturesModel->AllLensFeatures(); 

			$coatings = [];

			foreach ($lensCoatings as $c) {
			    $lens_features = explode(',', $c->lensFeaturesId ?? '');

			    $featureList = [];
			    foreach ($lensfeatures as $f) {
			        if (in_array($f->id, $lens_features)) {
			            $featureList[] = [
			                'id'         => $f->id,
			                'image'      => base_url('images/lensfeatures/' . $f->image),
			                'description'=> $f->description,
			                'lensName'   => $data->lensName
			            ];
			        }
			    }

			    $coatings[] = [
			        'id'           => $c->id,
			        'coating_name' => $c->coating_name,
			        'amount'       => $c->amount,
			        'description'  => $c->description,
			        'image'        => $c->image,
			        'features'     => $featureList
			    ];
			}

			return $this->response->setJSON([
			    'valid'         => true,
			    'lensCoatingId' => $coatings
			]);



		    // if ($lensCoatings) {
		    //     echo json_encode(['valid' => true, 'lensCoatingId' => $lensCoatings]);
		    // } else {
		    //     echo json_encode(['valid' => false]);
		    // }
	    } else {
			return view('login');
		}
	}


	public function SaveMedicalRecord()
	{
		$session = session();
		if(!empty($_SESSION['user'])){

			$data['Testno'] = $this->request->getPost('testno');
			$data['Test_date'] = $this->request->getPost('testdate');
			$data['CustomerName'] = $this->request->getPost('cutomer');
			$data['dob'] = $this->request->getPost('ndob');
			$data['CustomerAge'] = $this->request->getPost('age');
			$data['Gender'] = $this->request->getPost('gender');
			$data['MobileNo1'] = $this->request->getPost('mob1');
			$data['MobileNo2'] = $this->request->getPost('mob2');
			$data['Email'] = $this->request->getPost('email');

			$prescription_sph_right = $this->request->getPost('nsphrr');
			$prescription_sph_left = $this->request->getPost('nsphll');
			$prescription_cyl_right = $this->request->getPost('ncylrr');
			$prescription_cyl_left = $this->request->getPost('ncylll');
			$prescription_axis_right = $this->request->getPost('naxisrr');
			$prescription_axis_left = $this->request->getPost('naxisll');
			$prescription_add_right = $this->request->getPost('naddrr');
			$prescription_add_left = $this->request->getPost('naddll');
			$prescription_pd_right = $this->request->getPost('npdrr');
			$prescription_pd_left = $this->request->getPost('npdll');

			$Prescription = json_encode([
			    'right' => ['sph' => $prescription_sph_right, 'cyl' => $prescription_cyl_right, 'axis' => $prescription_axis_right, 'add' => $prescription_add_right, 'pd' => $prescription_pd_right],
			    'left' => ['sph' => $prescription_sph_left, 'cyl' => $prescription_cyl_left, 'axis' => $prescription_axis_left, 'add' => $prescription_add_left, 'pd' => $prescription_pd_left]
			]);

			$data['Prescription'] = $Prescription;

			$segmentheight_right = $this->request->getPost('segmentheight_right');
			$fittingheight_right = $this->request->getPost('fittingheight_right');
			$segmentheight_left = $this->request->getPost('segmentheight_left');
			$fittingheight_left = $this->request->getPost('fittingheight_left');

			$frame_measurement = json_encode([
			    'right' => ['segmentheight' => $segmentheight_right, 'fittingheight' => $fittingheight_right],
			    'left' => ['segmentheight' => $segmentheight_left, 'fittingheight' => $fittingheight_left]
			]);
			$data['frame_measurement'] = $frame_measurement;

			$data['CreatedDate'] = date('Y-m-d H:i:s');
			$data['CreatedUser'] = $_SESSION['user_id'];
			$data['store_id'] = $_SESSION['store_id'];

			$insertid = $this->eyeTestModel->InsertEyeTest($data);

			if($insertid){
				return $this->response->setJSON(['status' => 'success']);
			}else{
				return $this->response->setJSON(['status' => 'failed']);
			}
			
		} else {
			return view('login');
		}	
	}





	// public function Testmail()
	// {
	// 	$email = \Config\Services::email();
    // 	$email->setTo('webtechzera@gmail.com');
	//     $email->setFrom('sales@zealuxeyeboutique.com', 'ZEALUX Eye Boutique');
	//     $email->setSubject('Test Sales Invoice');
	//     $email->setMessage('Thank you for your purchase! Please find your invoice attached.');

	//     if ($email->send()) {
    //         echo 'sended';
	//     } else {
    //         echo 'fail';
    //         echo $email->printDebugger(['headers']);
	//     }
	// }



	
}