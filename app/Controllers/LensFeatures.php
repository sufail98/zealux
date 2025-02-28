<?php 
namespace App\Controllers;

use App\Models\LensFeaturesModel;

class LensFeatures extends BaseController
{
	
    function __construct()
	{
		$this->lensfeaturesModel = new LensFeaturesModel();
	}

	public function index()
	{
		$session = session();
		if(!empty($_SESSION['user'])){
			$data['features'] = $this->lensfeaturesModel->AllLensFeatures();
			return view('lens_features',$data);
		} else {
			return view('login');
		}
	}

	public function SaveLensFeature()
	{
		$session = session();
		if(!empty($_SESSION['user'])){

			$data['description'] = $this->request->getPost('desc');
			$data['CreatedDate'] = date('Y-m-d H:i:s');

			if(empty($_FILES['fimage']['name']))
			{
				$session->setFlashdata('alert', 'warning|Oops...|Please Select Image!');
            	return redirect()->to('lens-feature');
			}

			$file=$this->request->getFile('fimage');
			$name = $file->getRandomName();
			$data['image'] = $name;

			$insertid = $this->lensfeaturesModel->InsertLensFeature($data);

			if($insertid){
				$file->move('./images/lensfeatures', $name);
				$session->setFlashdata('alert', 'success|Success...|Added Successfully');
            	return redirect()->to('lens-feature');
					
			}else{
				$session->setFlashdata('alert', 'error|Oops...|Try Again');
            	return redirect()->to('lens-feature');
			}
			
		} else {
			return view('login');
		}	
	}
	public function LensfeatureEdit($id)
	{
		$session = session();
		if(!empty($_SESSION['user'])){
	
			$data['editdata'] = $this->lensfeaturesModel->getLensFeatureDetails($id);
			return view('lens_features_edit',$data);
		} else {
			return view('login');
		}
	}

	public function UpdateLensFeature()
	{
		$session = session();
		if(!empty($_SESSION['user']))
		{
			$data['description'] = $this->request->getPost('desc');
			$data['id'] = $this->request->getPost('id');
			if(empty($_FILES['fimage']['name']))
			{
				$update = $this->lensfeaturesModel->updateLensFeatures($data);
			}else{
				$file=$this->request->getFile('fimage');
				$name = $file->getRandomName();
				$data['image'] = $name;
				$update = $this->lensfeaturesModel->updateLensFeatures($data);
				$file->move('./images/lensfeatures', $name);
			}

			if($update){
				$session->setFlashdata('alert', 'success|Success...|Updated Successfully');
            	return redirect()->to('lens-feature');
			} else {
				$session->setFlashdata('alert', 'error|Oops...|Try Again');
            	return redirect()->to('lens-feature');
			}
			
		} else {
			return view('login');
		}
	}

	public function LensFeatureDelete($id)
	{
		$session = session();
		if(!empty($_SESSION['user'])){
			$query = $this->lensfeaturesModel->LensFeatureDeleteMdl($id);
			if($query){
				$session->setFlashdata('alert', 'success|Success...|Deleted Successfully');
            	return redirect()->to('lens-feature');
			}
		} else {
			return view('login');
		}
	}

	
}