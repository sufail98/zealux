<?php 
namespace App\Controllers;

use App\Models\LensCreationModel;
use App\Models\LensFeaturesModel;
use App\Models\LensModel;


class LensCreation extends BaseController
{
	
    function __construct()
	{
		$this->lenscreationModel = new LensCreationModel();
		$this->lensfeaturesModel = new LensFeaturesModel();
		$this->lensModel = new LensModel();
	}

	public function index()
	{
		$session = session();
		if(!empty($_SESSION['user'])){
			$data['lens'] = $this->lenscreationModel->AllLenses();
			return view('lens_list',$data);
		} else {
			return view('login');
		}
	}

	public function LensCreations()
	{
		$session = session();
		if(!empty($_SESSION['user'])){
			$data['features'] = $this->lensfeaturesModel->AllLensFeatures();
			$data['lens'] = $this->lensModel->AllLenses();
			return view('lens_creation',$data);
		} else {
			return view('login');
		}
	}

	public function SaveLens()
	{
		$session = session();
		if(!empty($_SESSION['user'])){

			$data['lensName'] = $this->request->getPost('lensname');
			$data['purchaseRate'] = $this->request->getPost('purchaserate');
			$data['mrp'] = $this->request->getPost('mrp');
			$data['salesRate'] = $this->request->getPost('salesrate');
			$data['lens'] = $this->request->getPost('lens');
			$data['delivery_days'] = $this->request->getPost('delivery_days');
			$data['warranty_days'] = $this->request->getPost('warranty');
			$feature = $this->request->getPost('features');
			$data['lensFeaturesId'] = is_array($feature) ? implode(',', $feature) : NULL; 
			$data['CreatedDate'] = date('Y-m-d H:i:s');

			$insertid = $this->lenscreationModel->InsertLensMdl($data);

			if($insertid){
				$session->setFlashdata('alert', 'success|Success...|Added Successfully');
            	return redirect()->to('add-lens-creation');
					
			}else{
				$session->setFlashdata('alert', 'error|Oops...|Try Again');
		        return redirect()->to('add-lens-creation');
			}
			
		} else {
			return view('login');
		}	
	}
	public function LensEdit($id)
	{
		$session = session();
		if(!empty($_SESSION['user'])){
			$data['features'] = $this->lensfeaturesModel->AllLensFeatures();
			$data['editdata'] = $this->lenscreationModel->LensEditMdl($id);
			$data['lens'] = $this->lensModel->AllLenses();
			return view('lens_creation_edit',$data);
		} else {
			return view('login');
		}
	}
	public function UpdateLens()
	{
		$session = session();
		if(!empty($_SESSION['user'])){

			$data['lensName'] = $this->request->getPost('lensname');
			$data['purchaseRate'] = $this->request->getPost('purchaserate');
			$data['mrp'] = $this->request->getPost('mrp');
			$data['salesRate'] = $this->request->getPost('salesrate');
			$data['lens'] = $this->request->getPost('lens');
			$data['delivery_days'] = $this->request->getPost('delivery_days');
			$data['warranty_days'] = $this->request->getPost('warranty');
			$feature = $this->request->getPost('features');
			$data['lensFeaturesId'] = is_array($feature) ? implode(',', $feature) : NULL; 
			$data['CreatedDate'] = date('Y-m-d H:i:s');
			$data['lensId'] = $this->request->getPost('lid');

			$update = $this->lenscreationModel->updateLens($data);

			if($update){
				$session->setFlashdata('alert', 'success|Success...|Updated Successfully');
            	return redirect()->to('edit-lens-creation/' . $this->request->getPost('lid'));
			} else {
				$session->setFlashdata('alert', 'error|Oops...|Try Again');
		        return redirect()->to('edit-lens-creation');
			}
			
		} else {
			return view('login');
		}
	}

	public function LensDelete($id)
	{
		$session = session();
		if(!empty($_SESSION['user'])){
			$query = $this->lenscreationModel->LensDeleteMdl($id);
			if($query){
				$session->setFlashdata('alert', 'success|Success...|Deleted Successfully');
            	return redirect()->to('lens-creation');
			}
		} else {
			return view('login');
		}
	}

	
}