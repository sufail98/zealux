<?php 
namespace App\Controllers;

use App\Models\PrevilageCardModel;
use App\Models\SalesModel;

class PrevilageCard extends BaseController
{
	
    function __construct()
	{
		$this->previlageModel = new PrevilageCardModel();
		$this->saleModel = new SalesModel();
	}

	public function index()
	{
		$session = session();
		if(!empty($_SESSION['user'])){
			$data['previlage'] = $this->previlageModel->Allprevilages();
			$data['types'] = $this->previlageModel->AllprevilageTypes();
			$data['edittypes'] = $this->previlageModel->AllprevilageTypes();

			return view('previlage_card',$data);
		} else {
			return view('login');
		}
	}

	public function SavePrevilage()
	{
		$session = session();
		if(!empty($_SESSION['user'])){

			$data['name'] = $this->request->getPost('pname');
			$data['gender'] = $this->request->getPost('gender');
			$data['phone'] = $this->request->getPost('phone');
			$data['email'] = $this->request->getPost('email');
			$data['dob'] = $this->request->getPost('dob');
			$data['type'] = $this->request->getPost('type');
			$data['from_date'] = $this->request->getPost('from_date');
			$data['to_date'] = $this->request->getPost('to_date');
			$data['amount'] = $this->request->getPost('amount');
			$data['status'] = 1;
			$data['CreatedDate'] = date('Y-m-d H:i:s');

			$insertid = $this->previlageModel->InsertPrevilage($data);

			if($insertid){
				$session->setFlashdata('alert', 'success|Success...|Added Successfully');
            	return redirect()->to('previlage-cards');
					
			}else{
				$session->setFlashdata('alert', 'error|Oops...|Try Again');
            	return redirect()->to('previlage-cards');
			}
			
		} else {
			return view('login');
		}	
	}
	public function getPrevilageDetails()
	{
		$session = session();
		if(!empty($_SESSION['user'])){

		    $id = $this->request->getGet('id');
		    $previlage = $this->previlageModel->getPrevilageData($id);

		    if ($previlage) {
		        return $this->response->setJSON([
		            'status' => 'success',
		            'data' => $previlage
		        ]);
		    } else {
		        return $this->response->setJSON([
		            'status' => 'error',
		            'message' => 'previlage not found'
		        ]);
		    }
	    } else {
			return view('login');
		}	
	}
	public function UpdatePrevilage()
	{
		$session = session();
		if(!empty($_SESSION['user'])){

			$data['name'] = $this->request->getPost('pname');
			$data['gender'] = $this->request->getPost('gender');
			$data['phone'] = $this->request->getPost('phone');
			$data['email'] = $this->request->getPost('email');
			$data['dob'] = $this->request->getPost('dob');
			$data['type'] = $this->request->getPost('type');
			$data['from_date'] = $this->request->getPost('from_date');
			$data['to_date'] = $this->request->getPost('to_date');
			$data['amount'] = $this->request->getPost('amount');
			$data['id'] = $this->request->getPost('id');
			$data['status'] = 1;
			$data['CreatedDate'] = date('Y-m-d H:i:s');

			$update = $this->previlageModel->updatePrevilages($data);

			if($update){
				$session->setFlashdata('alert', 'success|Success...|Updated Successfully');
            	return redirect()->to('previlage-cards');
			} else {
				$session->setFlashdata('alert', 'error|Oops...|Try Again');
            	return redirect()->to('previlage-cards');
			}
			
		} else {
			return view('login');
		}
	}

	public function PrevilageDelete($id)
	{
		$session = session();
		if(!empty($_SESSION['user'])){
			$query = $this->previlageModel->PrevilageDeleteMdl($id);
			if($query){
				$session->setFlashdata('alert', 'success|Success...|Deleted Successfully');
            	return redirect()->to('previlage-cards');
			}
		} else {
			return view('login');
		}
	}
	public function SavePrevilageData()
	{
		$session = session();
		if(!empty($_SESSION['user']))
		{
			$data = [
	            'name' => $this->request->getPost('pname'),
	            'gender' => $this->request->getPost('gender'),
	            'phone' => $this->request->getPost('phone'),
	            'email' => $this->request->getPost('email'),
	            'dob' => $this->request->getPost('dob'),
	            'type' => $this->request->getPost('type'),
	            'from_date' => $this->request->getPost('from_date'),
				'to_date' => $this->request->getPost('to_date'),
				'amount' => $this->request->getPost('amount'),
	            'status' => 1,
				'CreatedDate' => date('Y-m-d H:i:s')

	        ];

			$insertid = $this->previlageModel->InsertPrevilage($data);

			if($insertid){
				 return $this->response->setJSON(['status' => 'success', 'message' => 'Added Successfully']);
			}else{
				return $this->response->setJSON(['status' => 'error', 'message' => 'Try Again']);
			}
			
		} else {
			return view('login');
		}	
	}
	public function getPrevilageUsers()
	{
		$session = session();
		if(!empty($_SESSION['user']))
		{

		    $query = $this->request->getPost('query');

		    if (!$query) {
		        return $this->response->setJSON([]); 
		    }

		    $data = $this->saleModel->PrevilageUsers($query);
		    return $this->response->setJSON($data);

	    } else {
			return view('login');
		}
	}

	public function PrevilageCardTypes()
	{
		$session = session();
		if(!empty($_SESSION['user'])){
			$data['previlage'] = $this->previlageModel->AllprevilageTypes();

			return view('privilege_card_types',$data);
		} else {
			return view('login');
		}
	}
	public function SavePrevilageType()
	{
		$session = session();
		if(!empty($_SESSION['user'])){

			$data['type'] = $this->request->getPost('type');
			$data['days'] = $this->request->getPost('days');
			$data['no_of_purchase'] = $this->request->getPost('purchase');
			$data['amount'] = $this->request->getPost('amount');
			$data['CreatedDate'] = date('Y-m-d H:i:s');

			$insertid = $this->previlageModel->InsertPrevilageTypes($data);

			if($insertid){
				$session->setFlashdata('alert', 'success|Success...|Added Successfully');
            	return redirect()->to('previlage-card-types');
					
			}else{
				$session->setFlashdata('alert', 'error|Oops...|Try Again');
            	return redirect()->to('previlage-card-types');
			}
			
		} else {
			return view('login');
		}	
	}
	public function getPrevilageTypeDetails()
	{
		$session = session();
		if(!empty($_SESSION['user'])){

		    $id = $this->request->getGet('id');
		    $previlage = $this->previlageModel->getPrevilageTypeData($id);

		    if ($previlage) {
		        return $this->response->setJSON([
		            'status' => 'success',
		            'data' => $previlage
		        ]);
		    } else {
		        return $this->response->setJSON([
		            'status' => 'error',
		            'message' => 'previlage not found'
		        ]);
		    }
	    } else {
			return view('login');
		}	
	}
	public function UpdatePrevilageType()
	{
		$session = session();
		if(!empty($_SESSION['user'])){

			$data['type'] = $this->request->getPost('type');
			$data['days'] = $this->request->getPost('days');
			$data['no_of_purchase'] = $this->request->getPost('purchase');
			$data['amount'] = $this->request->getPost('amount');
			$data['id'] = $this->request->getPost('id');

			$update = $this->previlageModel->updatePrevilageTypes($data);

			if($update){
				$session->setFlashdata('alert', 'success|Success...|Updated Successfully');
            	return redirect()->to('previlage-card-types');
			} else {
				$session->setFlashdata('alert', 'error|Oops...|Try Again');
            	return redirect()->to('previlage-card-types');
			}
			
		} else {
			return view('login');
		}
	}
	public function PrevilageTypeDelete($id)
	{
		$session = session();
		if(!empty($_SESSION['user'])){
			$query = $this->previlageModel->PrevilageTypeDeleteMdl($id);
			if($query){
				$session->setFlashdata('alert', 'success|Success...|Deleted Successfully');
            	return redirect()->to('previlage-card-types');
			}
		} else {
			return view('login');
		}
	}

	
}