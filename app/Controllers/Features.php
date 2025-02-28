<?php 
namespace App\Controllers;

use App\Models\FeaturesModel;

class Features extends BaseController
{
	
    function __construct()
	{
		$this->featuresModel = new FeaturesModel();
	}

	public function index()
	{
		$session = session();
		if(!empty($_SESSION['user'])){
			$data['features'] = $this->featuresModel->AllFeatures();
			return view('features',$data);
		} else {
			return view('login');
		}
	}

	public function SaveFeature()
	{
		$session = session();
		if(!empty($_SESSION['user'])){

			$data['description'] = $this->request->getPost('desc');
			$data['CreatedDate'] = date('Y-m-d H:i:s');

			if(empty($_FILES['fimage']['name']))
			{
            	$session->setFlashdata('alert', 'warning|Oops...|Please Select Image!');
            	return redirect()->to('feature');
			}


			$file=$this->request->getFile('fimage');
			$name = $file->getRandomName();
			$data['image'] = $name;

			$insertid = $this->featuresModel->InsertFeature($data);

			if($insertid){
				$file->move('./images/features', $name);

				$session->setFlashdata('alert', 'success|Success...|Added Successfully');
            	return redirect()->to('feature');
					
			}else{
				$session->setFlashdata('alert', 'error|Oops...|Try Again');
            	return redirect()->to('feature');
			}
			
		} else {
			return view('login');
		}	
	}
	public function featureEdit($id)
	{
		$session = session();
		if(!empty($_SESSION['user'])){
	
			$data['editdata'] = $this->featuresModel->getFeatureDetails($id);
			return view('feature_edit',$data);
		} else {
			return view('login');
		}
	}

	public function UpdateFeature()
	{
		$session = session();
		if(!empty($_SESSION['user'])){

			$data['description'] = $this->request->getPost('desc');
			$data['id'] = $this->request->getPost('id');
			if(empty($_FILES['fimage']['name']))
			{
				$update = $this->featuresModel->updateFeatures($data);
			}else{
				$file=$this->request->getFile('fimage');
				$name = $file->getRandomName();
				$data['image'] = $name;
				$update = $this->featuresModel->updateFeatures($data);
				$file->move('./images/features', $name);
			}

			if($update){
				$session->setFlashdata('alert', 'success|Success...|Updated Successfully');
            	return redirect()->to('feature');

			} else {
				$session->setFlashdata('alert', 'error|Oops...|Try Again');
            	return redirect()->to('feature');
			}
			
		} else {
			return view('login');
		}
	}

	public function FeatureDelete($id)
	{
		$session = session();
		if(!empty($_SESSION['user'])){
			$query = $this->featuresModel->FeatureDeleteMdl($id);
			if($query){
				$session->setFlashdata('alert', 'success|Success...|Deleted Successfully');
            	return redirect()->to('feature');
			}
		} else {
			return view('login');
		}
	}

	
}