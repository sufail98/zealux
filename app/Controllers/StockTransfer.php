<?php 
namespace App\Controllers;

use App\Models\StockTransferModel;
use App\Models\FrontpageModel;

class StockTransfer extends BaseController
{
	
    function __construct()
	{
		$this->stocktransferModel = new StockTransferModel();
		$this->frontModel = new FrontpageModel();
	}

	public function index()
	{
		$session = session();
		if(!empty($_SESSION['user'])){
			$data['fstores'] = $this->frontModel->AllStores();
			$data['tstores'] = $this->frontModel->AllStores();
			$data['products'] = $this->stocktransferModel->Products();
			$data['products2'] = $this->stocktransferModel->Products();
			return view('stock_transfer',$data);
		} else {
			return redirect()->to('admin');
		}
	}
	public function GetColors()
	{
		$session = session();
		if(!empty($_SESSION['user'])){
		    $productId = $this->request->getPost('product_id');
		    $colors = $this->stocktransferModel->getColorsByProductId($productId);
		    return $this->response->setJSON($colors);
	    } else {
			return redirect()->to('admin');
		}
	}
	public function StockTransferList()
	{
		$session = session();
		if(!empty($_SESSION['user'])){
			$data['fstores'] = $this->frontModel->AllStores();
			$data['tstores'] = $this->frontModel->AllStores();
			return view('stock_transfer_list',$data);
		} else {
			return redirect()->to('admin');
		}
	}
	public function getTransferReportByDate()
	{
		$session = session();
	    if (!empty($_SESSION['user'])) {
	        $fromDate = $this->request->getPost('from_date');
	        $toDate = $this->request->getPost('to_date');
	        $allreport = $this->request->getPost('allreport');
	        $from_store = $this->request->getPost('from_store');
	        $to_store = $this->request->getPost('to_store');

	        $start = $this->request->getPost('start');
	        $length = $this->request->getPost('length');
	        $draw = $this->request->getPost('draw');
	        $searchValue = $this->request->getPost('search')['value'] ?? '';

	        // Get total count of records before filtering
	        $totalRecords = $this->stocktransferModel->countTotalRecords($fromDate, $toDate, $allreport, $from_store, $to_store);

	        // Get filtered data with pagination
	        $report = $this->stocktransferModel->getTransferReport($fromDate, $toDate, $allreport, $from_store, $to_store, $start, $length, $searchValue);

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
	public function SaveStockTransfer()
	{
		$session = session();
		if(!empty($_SESSION['user'])){

		    $data = [
	        	'from_store' => $this->request->getPost('from_store'),
	        	'to_store' => $this->request->getPost('to_store'),
	            'transfer_date' => $this->request->getPost('pdate'),
	            'description' => $this->request->getPost('remarks')
	        ];

	        $product = $this->request->getPost('product');
			$color = $this->request->getPost('color');
			$qty = $this->request->getPost('qty');
			$selected_color_name = $this->request->getPost('selected_color_name');

	        $insertid = $this->stocktransferModel->Add_StockTransfer($data);

			for($i=0; $i<count($product); $i++){
				$data1[]=[
					'stock_transferId' => $insertid,
					'product_id' => $product[$i],
					'color_id' => $color[$i],
					'color_name' => $selected_color_name[$i],
					'qty' => $qty[$i]
				];

		        $stockdata = [
		            [
		                'voucher_type' => 'stock transfer',
			        	'voucher_no' => $insertid,
			            'document_no' => $insertid,
			            'pid' => $product[$i],
			            'color' => $selected_color_name[$i],
			            'inward_qty' => 0,
			            'outward_qty' => 1,
			            'purchase_rate' => 0,
			            'sales_rate' => 0,
			            'stock_date' => $this->request->getPost('pdate'),
			           	'store_id' => $this->request->getPost('from_store'),
			           	'CreatedUser' => $_SESSION['user_id'],
						'CreatedDate' => date('Y-m-d H:i:s'),
		            ],
		            [
		                'voucher_type' => 'stock transfer',
			        	'voucher_no' => $insertid,
			            'document_no' => $insertid,
			            'pid' => $product[$i],
			            'color' => $selected_color_name[$i],
			            'inward_qty' => 1,
			            'outward_qty' => 0,
			            'purchase_rate' => 0,
			            'sales_rate' => 0,
			            'stock_date' => $this->request->getPost('pdate'),
			           	'store_id' => $this->request->getPost('to_store'),
			           	'CreatedUser' => $_SESSION['user_id'],
						'CreatedDate' => date('Y-m-d H:i:s'),
		            ]

		        ];
	        	$add_stock = $this->stocktransferModel->AddStock($stockdata);
	        	if (!$add_stock) {
		            $session->setFlashdata('alert', 'error|Oops...|Failed to insert stock. Try Again');
		        	return redirect()->to('stock-transfer');
		        }
			}

	        if($insertid){
	        	if (count($product) > 0) {
					$insertsplit = $this->stocktransferModel->InsertStockTransferplitMdl($data1);
					if($insertsplit){
						$session->setFlashdata('alert', 'success|Success...|Added Successfully');
            			return redirect()->to('stock-transfer-list');
					}else{
						$session->setFlashdata('alert', 'error|Oops...|Failed to insert details. Try Again');
		        		return redirect()->to('stock-transfer-list');
					}	
				}
				$session->setFlashdata('alert', 'success|Success...|Added Successfully');
            	return redirect()->to('stock-transfer-list');
					
			}else{
				$session->setFlashdata('alert', 'error|Oops...|Try Again');
		        return redirect()->to('stock-transfer-list');
			}

	    } else {
			return redirect()->to('admin');
		}
	}
	public function EditStockTransfer($id)
	{
		$session = session();
		if(!empty($_SESSION['user'])){
			$data['fstores'] = $this->frontModel->AllStores();
			$data['tstores'] = $this->frontModel->AllStores();
			$data['products'] = $this->stocktransferModel->Products();
			$data['products2'] = $this->stocktransferModel->Products();
			$data['editdata'] = $this->stocktransferModel->StockTransferEditMdl($id);
			$data['editsplitdata'] = $this->stocktransferModel->StockTransferSplitEditMdl($id);
			return view('edit_stock_transfer',$data);
		} else {
			return redirect()->to('admin');
		}
	}
	public function UpdateStockTransfer()
	{
		$session = session();
		if(!empty($_SESSION['user'])){

		    $data = [
	        	'tid' => $this->request->getPost('tid'),
	        	'from_store' => $this->request->getPost('from_store'),
	        	'to_store' => $this->request->getPost('to_store'),
	            'transfer_date' => $this->request->getPost('pdate'),
	            'description' => $this->request->getPost('remarks')
	        ];

	        $product = $this->request->getPost('product');
			$color = $this->request->getPost('color');
			$qty = $this->request->getPost('qty');
			$selected_color_name = $this->request->getPost('selected_color_name');

	        $update = $this->stocktransferModel->UpdateStockTransferMaster($data);
	        $delete_existing_stock = $this->stocktransferModel->Delete_stock($this->request->getPost('tid'));

			for($i=0; $i<count($product); $i++){
				$data1[]=[
					'stock_transferId' => $this->request->getPost('tid'),
					'product_id' => $product[$i],
					'color_id' => $color[$i],
					'color_name' => $selected_color_name[$i],
					'qty' => $qty[$i]
				];

				$stockdata = [
		            [
		                'voucher_type' => 'stock transfer',
			        	'voucher_no' => $this->request->getPost('tid'),
			            'document_no' => $this->request->getPost('tid'),
			            'pid' => $product[$i],
			            'color' => $selected_color_name[$i],
			            'inward_qty' => 0,
			            'outward_qty' => 1,
			            'purchase_rate' => 0,
			            'sales_rate' => 0,
			            'stock_date' => $this->request->getPost('pdate'),
			           	'store_id' => $this->request->getPost('from_store'),
			           	'CreatedUser' => $_SESSION['user_id'],
						'CreatedDate' => date('Y-m-d H:i:s'),
		            ],
		            [
		                'voucher_type' => 'stock transfer',
			        	'voucher_no' => $this->request->getPost('tid'),
			            'document_no' => $this->request->getPost('tid'),
			            'pid' => $product[$i],
			            'color' => $selected_color_name[$i],
			            'inward_qty' => 1,
			            'outward_qty' => 0,
			            'purchase_rate' => 0,
			            'sales_rate' => 0,
			            'stock_date' => $this->request->getPost('pdate'),
			           	'store_id' => $this->request->getPost('to_store'),
			           	'CreatedUser' => $_SESSION['user_id'],
						'CreatedDate' => date('Y-m-d H:i:s'),
		            ]

		        ];
	        	$add_stock = $this->stocktransferModel->AddStock($stockdata);
	        	if (!$add_stock) {
		            $session->setFlashdata('alert', 'error|Oops...|Failed to update stock. Try Again');
		        	return redirect()->to('stock-transfer');
		        }
			}

	        if($update){
	        	if (count($product) > 0) {
					$updatesplit = $this->stocktransferModel->UpdateStockTransfersplitMdl($data1);
					if($updatesplit){
						$session->setFlashdata('alert', 'success|Success...|Updated Successfully');
            			return redirect()->to('stock-transfer-list');
					}else{
						$session->setFlashdata('alert', 'error|Oops...|Failed to update details. Try Again');
		        		return redirect()->to('stock-transfer-list');
					}	
				}
				$session->setFlashdata('alert', 'success|Success...|Updated Successfully');
            	return redirect()->to('stock-transfer-list');
					
			}else{
				$session->setFlashdata('alert', 'error|Oops...|Try Again');
		        return redirect()->to('stock-transfer-list');
			}

	    } else {
			return redirect()->to('admin');
		}
	}
	public function DeleteStockTransfer($id)
	{
		$session = session();
		if(!empty($_SESSION['user'])){
			$query = $this->stocktransferModel->DeleteStockTransferMdl($id);
			if($query){
				$session->setFlashdata('alert', 'success|Success...|Deleted Successfully');
            	return redirect()->to('stock-transfer-list');
			}
		} else {
			return redirect()->to('admin');
		}
	}

	
}