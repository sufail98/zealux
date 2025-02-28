<?php 
namespace App\Controllers;

use App\Models\BreakageWarrantyModel;

class BreakageWarranty extends BaseController
{
	
    function __construct()
	{
		$this->warrantyModel = new BreakageWarrantyModel();
	}

	public function index()
	{
		$session = session();
		if(!empty($_SESSION['user'])){
			$data['warranty'] = $this->warrantyModel->AllWarranty();
			return view('breakage_warranty',$data);
		} else {
			return view('login');
		}
	}
	public function BreakageWarrantyForm()
	{
		$session = session();
		if(!empty($_SESSION['user'])){

			return view('add_breakage_warranty');
		} else {
			return view('login');
		}
	}

	public function SaveBreakageWarranty()
	{
		$session = session();
		if(!empty($_SESSION['user'])){

			$features = $this->request->getPost('features');
			$features_array = is_array($features) ? implode(' | ', $features) : NULL;

			$data = [
	        	'name' => $this->request->getPost('name'),
	        	'price_from' => $this->request->getPost('price_from'),
	            'price_to' => $this->request->getPost('price_to'),
	            'sales_rate' => $this->request->getPost('salesrate'),
	            'decsription' => $this->request->getPost('desc'),
	            'features' => $features_array,
	            'store_id' => 1,
				'CreatedDate' => date('Y-m-d H:i:s')
	        ];

			$insertid = $this->warrantyModel->InsertWarranty($data);

			if($insertid){
				$session->setFlashdata('alert', 'success|Success...|Added Successfully');
            	return redirect()->to('breakage-warranty');
			}else{
				$session->setFlashdata('alert', 'error|Oops...|Try Again');
		        return redirect()->to('breakage-warranty');
			}
			
		} else {
			return view('login');
		}
		
	}
	public function BreakageWarrantyEdit($id)
	{
		$session = session();
		if(!empty($_SESSION['user'])){

			$data['editdata'] = $this->warrantyModel->WarrantyEditMdl($id);
			return view('edit_breakage_warranty',$data);
		} else {
			return view('login');
		}
	}
	public function UpdateBreakageWarranty()
	{
		$session = session();
		if(!empty($_SESSION['user'])){

			$features = $this->request->getPost('features');
			$features_array = is_array($features) ? implode(' | ', $features) : NULL;

			$data = [
	        	'id' => $this->request->getPost('id'),
	        	'name' => $this->request->getPost('name'),
	        	'price_from' => $this->request->getPost('price_from'),
	            'price_to' => $this->request->getPost('price_to'),
	            'sales_rate' => $this->request->getPost('salesrate'),
	            'decsription' => $this->request->getPost('desc'),
	            'features' => $features_array,
	            'store_id' => 1
	        ];

			$update = $this->warrantyModel->updateWarranty($data);

			if($update){
				$session->setFlashdata('alert', 'success|Success...|Updated Successfully');
            	return redirect()->to('breakage-warranty');
				
			}else{
				$session->setFlashdata('alert', 'error|Oops...|Try Again');
		        return redirect()->to('breakage-warranty');
			}
			
		} else {
			return view('login');
		}
		
	}

	public function BreakageWarrantyDelete($id)
	{
		$session = session();
		if(!empty($_SESSION['user'])){
			$query = $this->warrantyModel->WarrantyDeleteMdl($id);
			if($query){
				$session->setFlashdata('alert', 'success|Success...|Deleted Successfully');
            	return redirect()->to('breakage-warranty');
			}
		} else {
			return view('login');
		}
	}

	public function getBreakageWarranty()
	{
		$session = session();
		if(!empty($_SESSION['user']))
		{
		    $warranty = $this->warrantyModel->AllWarranty();
		    return $this->response->setJSON($warranty);
	    } else {
			return view('login');
		}
	}

	
}