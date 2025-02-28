<?php 
namespace App\Controllers;

use App\Models\CoupenCodeModel;

class CoupenCode extends BaseController
{
	
    function __construct()
	{
		$this->coupencodeModel = new CoupenCodeModel();
	}

	public function index()
	{
		$session = session();
		if(!empty($_SESSION['user'])){
			$data['coupencode'] = $this->coupencodeModel->AllCoupenCode();
			return view('coupencode',$data);
		} else {
			return view('login');
		}
	}

	public function SaveCoupenCode()
	{
		$session = session();
		if(!empty($_SESSION['user'])){

			$data = [
	            'coupen_code' => $this->request->getPost('code'),
				'discount_percentage' => $this->request->getPost('discount'),
				'date_from' => $this->request->getPost('date_from'),
				'date_to' => $this->request->getPost('date_to'),
				'description' => $this->request->getPost('description'),
			];

			$insertid = $this->coupencodeModel->InsertCoupenCode($data);

			if($insertid){
				$session->setFlashdata('alert', 'success|Success...|Added Successfully');
            	return redirect()->to('coupencode');
					
			}else{
				$session->setFlashdata('alert', 'error|Oops...|Try Again');
            	return redirect()->to('coupencode');
			}
			
		} else {
			return view('login');
		}	
	}
	public function getCoupenCodeDetails()
	{
		$session = session();
		if(!empty($_SESSION['user'])){

		    $id = $this->request->getGet('id');
		    $CoupenCode = $this->coupencodeModel->getCoupenCodeData($id);

		    if ($CoupenCode) {
		        return $this->response->setJSON([
		            'status' => 'success',
		            'data' => $CoupenCode
		        ]);
		    } else {
		        return $this->response->setJSON([
		            'status' => 'error',
		            'message' => 'CoupenCode not found'
		        ]);
		    }
	    } else {
			return view('login');
		}	
	}
	public function UpdateCoupenCode()
	{
		$session = session();
		if(!empty($_SESSION['user'])){

			$data = [
	            'coupen_code' => $this->request->getPost('code'),
				'discount_percentage' => $this->request->getPost('discount'),
				'date_from' => $this->request->getPost('date_from'),
				'date_to' => $this->request->getPost('date_to'),
				'description' => $this->request->getPost('description'),
				'id' => $this->request->getPost('id'),
	        ];

			$update = $this->coupencodeModel->updateCoupenCodes($data);

			if($update){
				$session->setFlashdata('alert', 'success|Success...|Updated Successfully');
            	return redirect()->to('coupencode');
			} else {
				$session->setFlashdata('alert', 'error|Oops...|Try Again');
            	return redirect()->to('coupencode');
			}
			
		} else {
			return view('login');
		}
	}

	public function CoupenCodeDelete($id)
	{
		$session = session();
		if(!empty($_SESSION['user'])){
			$query = $this->coupencodeModel->CoupenCodeDeleteMdl($id);
			if($query){
				$session->setFlashdata('alert', 'success|Success...|Deleted Successfully');
            	return redirect()->to('coupencode');
			}
		} else {
			return view('login');
		}
	}
	
}