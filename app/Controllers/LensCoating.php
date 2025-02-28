<?php 
namespace App\Controllers;

use App\Models\LensCoatingModel;

class LensCoating extends BaseController
{
	
    function __construct()
	{
		$this->lensCoatingModel = new LensCoatingModel();
	}

	public function index()
	{
		$session = session();
		if(!empty($_SESSION['user'])){
			$data['lens'] = $this->lensCoatingModel->AllLensCoating();
			return view('lens_coating_list',$data);
		} else {
			return view('login');
		}
	}

	public function LensCoatings()
	{
		$session = session();
		if(!empty($_SESSION['user'])){
			return view('lens_coating');
		} else {
			return view('login');
		}
	}

	public function SaveCoating()
	{
		$session = session();
		if(!empty($_SESSION['user'])){

			$data['coating_name'] = $this->request->getPost('coatingname');
			$data['amount'] = $this->request->getPost('amount');
			$data['purchase_rate'] = $this->request->getPost('purchase');
			$data['description'] = $this->request->getPost('desc');
			$data['CreatedDate'] = date('Y-m-d H:i:s');

			if(empty($_FILES['coatimage']['name']))
			{
				$session->setFlashdata('alert', 'warning|Oops...|Please Select Image!');
            	return redirect()->to('add-lens-coating');
			}
			$file=$this->request->getFile('coatimage');
			$name = $file->getRandomName();
			$data['image'] = $name;

			$insertid = $this->lensCoatingModel->InsertCoatingMdl($data);

			if($insertid){
				$file->move('./images/lenscoating', $name);
				$session->setFlashdata('alert', 'success|Success...|Added Successfully');
            	return redirect()->to('lens-coating');
					
			}else{
				$session->setFlashdata('alert', 'error|Oops...|Try Again');
		        return redirect()->to('add-lens-coating');
			}
			
		} else {
			return view('login');
		}	
	}
	public function CoatingEdit($id)
	{
		$session = session();
		if(!empty($_SESSION['user'])){
			$data['editdata'] = $this->lensCoatingModel->CoatingEditMdl($id);
			return view('edit_lens_coating',$data);
		} else {
			return view('login');
		}
	}
	public function UpdateCoating()
	{
		$session = session();
		if(!empty($_SESSION['user'])){

			$data['coating_name'] = $this->request->getPost('coatingname');
			$data['amount'] = $this->request->getPost('amount');
			$data['purchase_rate'] = $this->request->getPost('purchase');
			$data['description'] = $this->request->getPost('desc');
			$data['CreatedDate'] = date('Y-m-d H:i:s');
			$data['id'] = $this->request->getPost('cid');

			if(empty($_FILES['coatimage']['name']))
			{
				$update = $this->lensCoatingModel->updateCoating($data);
			}else{
				$file=$this->request->getFile('coatimage');
				$name = $file->getRandomName();
				$data['image'] = $name;
				$update = $this->lensCoatingModel->updateCoating($data);
				$file->move('./images/lenscoating', $name);
			}

			if($update){
				$session->setFlashdata('alert', 'success|Success...|Updated Successfully');
            	return redirect()->to('lens-coating');

			} else {
				$session->setFlashdata('alert', 'error|Oops...|Try Again');
		        return redirect()->to('add-lens-coating');
			}
			
		} else {
			return view('login');
		}
	}

	public function CoatingDelete($id)
	{
		$session = session();
		if(!empty($_SESSION['user'])){
			$query = $this->lensCoatingModel->CoatingDeleteMdl($id);
			if($query){
				$session->setFlashdata('alert', 'success|Success...|Deleted Successfully');
            	return redirect()->to('lens-coating');
			}
		} else {
			return view('login');
		}
	}

	
}