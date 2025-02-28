<?php 
namespace App\Controllers;

use App\Models\SalesmanModel;

class Salesman extends BaseController
{
	
    function __construct()
	{
		$this->salesmanModel = new SalesmanModel();
	}

	public function index()
	{
		$session = session();
		if(!empty($_SESSION['user'])){
			$data['salesman'] = $this->salesmanModel->AllSalesman();
			return view('salesman',$data);
		} else {
			return view('login');
		}
	}

	public function SaveSalesman()
	{
		$session = session();
		if(!empty($_SESSION['user'])){

			$data = [
	            'name' => $this->request->getPost('pname'),
				'mobile' => $this->request->getPost('phone'),
	        ];

			$insertid = $this->salesmanModel->InsertSalesman($data);

			if($insertid){
				$session->setFlashdata('alert', 'success|Success...|Added Successfully');
            	return redirect()->to('salesman');
					
			}else{
				$session->setFlashdata('alert', 'error|Oops...|Try Again');
            	return redirect()->to('salesman');
			}
			
		} else {
			return view('login');
		}	
	}
	public function getSalesmanDetails()
	{
		$session = session();
		if(!empty($_SESSION['user'])){

		    $id = $this->request->getGet('id');
		    $Salesman = $this->salesmanModel->getSalesmanData($id);

		    if ($Salesman) {
		        return $this->response->setJSON([
		            'status' => 'success',
		            'data' => $Salesman
		        ]);
		    } else {
		        return $this->response->setJSON([
		            'status' => 'error',
		            'message' => 'Salesman not found'
		        ]);
		    }
	    } else {
			return view('login');
		}	
	}
	public function UpdateSalesman()
	{
		$session = session();
		if(!empty($_SESSION['user'])){

			$data = [
	            'name' => $this->request->getPost('pname'),
				'mobile' => $this->request->getPost('phone'),
				'id' => $this->request->getPost('id'),
	        ];

			$update = $this->salesmanModel->updateSalesmans($data);

			if($update){
				$session->setFlashdata('alert', 'success|Success...|Updated Successfully');
            	return redirect()->to('salesman');
			} else {
				$session->setFlashdata('alert', 'error|Oops...|Try Again');
            	return redirect()->to('salesman');
			}
			
		} else {
			return view('login');
		}
	}

	public function SalesmanDelete($id)
	{
		$session = session();
		if(!empty($_SESSION['user'])){
			$query = $this->salesmanModel->SalesmanDeleteMdl($id);
			if($query){
				$session->setFlashdata('alert', 'success|Success...|Deleted Successfully');
            	return redirect()->to('salesman');
			}
		} else {
			return view('login');
		}
	}
	
}