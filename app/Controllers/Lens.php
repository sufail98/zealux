<?php 
namespace App\Controllers;

use App\Models\LensModel;

class Lens extends BaseController
{
	
    function __construct()
	{
		$this->lensModel = new LensModel();
	}

	public function index()
	{
		$session = session();
		if(!empty($_SESSION['user'])){
			$data['lens'] = $this->lensModel->AllLenses();
			return view('lens',$data);
		} else {
			return view('login');
		}
	}

	public function SaveLens()
	{
		$session = session();
		if(!empty($_SESSION['user'])){

			$data['lens_name'] = $this->request->getPost('lens');
			$data['CreatedDate'] = date('Y-m-d H:i:s');

			$insertid = $this->lensModel->InsertLens($data);

			if($insertid){
				$session->setFlashdata('alert', 'success|Success...|Added Successfully');
            	return redirect()->to('lens');					
			}else{
				$session->setFlashdata('alert', 'error|Oops...|Try Again');
            	return redirect()->to('lens');
			}
			
		} else {
			return view('login');
		}	
	}
	public function getLensDetails()
	{
		$session = session();
		if(!empty($_SESSION['user'])){

		    $id = $this->request->getGet('id');
		    $lens = $this->lensModel->getlensDetails($id);

		    if ($lens) {
		        return $this->response->setJSON([
		            'status' => 'success',
		            'data' => $lens
		        ]);
		    } else {
		        return $this->response->setJSON([
		            'status' => 'error',
		            'message' => 'lens not found'
		        ]);
		    }
	    } else {
			return view('login');
		}	
	}
	public function UpdateLens()
	{
		$session = session();
		if(!empty($_SESSION['user'])){

			$data['lens_name'] = $this->request->getPost('lens');
			$data['id'] = $this->request->getPost('id');

			$update = $this->lensModel->updateLens($data);

			if($update){
				$session->setFlashdata('alert', 'success|Success...|Updated Successfully');
            	return redirect()->to('lens');
			} else {
				$session->setFlashdata('alert', 'error|Oops...|Try Again');
            	return redirect()->to('lens');
			}
			
		} else {
			return view('login');
		}
	}

	public function LensDelete($id)
	{
		$session = session();
		if(!empty($_SESSION['user'])){
			$query = $this->lensModel->LensDeleteMdl($id);
			if($query){
				$session->setFlashdata('alert', 'success|Success...|Deleted Successfully');
            	return redirect()->to('lens');
			}
		} else {
			return view('login');
		}
	}

	
}