<?php 
namespace App\Controllers;

use App\Models\SizeModel;

class Size extends BaseController
{
	
    function __construct()
	{
		$this->sizeModel = new SizeModel();
	}

	public function index()
	{
		$session = session();
		if(!empty($_SESSION['user'])){
			$data['size'] = $this->sizeModel->AllSizes();
			return view('size',$data);
		} else {
			return view('login');
		}
	}

	public function SaveSize()
	{
		$session = session();
		if(!empty($_SESSION['user'])){

			$data['size_name'] = $this->request->getPost('size');
			$data['CreatedDate'] = date('Y-m-d H:i:s');

			$insertid = $this->sizeModel->InsertSize($data);

			if($insertid){
				$session->setFlashdata('alert', 'success|Success...|Added Successfully');
            	return redirect()->to('size');
			}else{
				$session->setFlashdata('alert', 'error|Oops...|Try Again');
            	return redirect()->to('size');
			}
			
		} else {
			return view('login');
		}	
	}
	public function getSizeDetails()
	{
		$session = session();
		if(!empty($_SESSION['user'])){

		    $id = $this->request->getGet('id');
		    $size = $this->sizeModel->getsizeDetails($id);

		    if ($size) {
		        return $this->response->setJSON([
		            'status' => 'success',
		            'data' => $size
		        ]);
		    } else {
		        return $this->response->setJSON([
		            'status' => 'error',
		            'message' => 'size not found'
		        ]);
		    }
	    } else {
			return view('login');
		}	
	}
	public function UpdateSize()
	{
		$session = session();
		if(!empty($_SESSION['user'])){

			$data['size_name'] = $this->request->getPost('size');
			$data['id'] = $this->request->getPost('id');

			$update = $this->sizeModel->updateSize($data);

			if($update){
				$session->setFlashdata('alert', 'success|Success...|Updated Successfully');
            	return redirect()->to('size');
			} else {
				$session->setFlashdata('alert', 'error|Oops...|Try Again');
            	return redirect()->to('size');
			}
			
		} else {
			return view('login');
		}
	}

	public function SizeDelete($id)
	{
		$session = session();
		if(!empty($_SESSION['user'])){
			$query = $this->sizeModel->SizeDeleteMdl($id);
			if($query){
				$session->setFlashdata('alert', 'success|Success...|Deleted Successfully');
            	return redirect()->to('size');
			}
		} else {
			return view('login');
		}
	}

	
}