<?php 
namespace App\Controllers;

use App\Models\SettingsModel;

class Settings extends BaseController
{
	
    function __construct()
	{
		$this->settingsModel = new SettingsModel();
	}

	public function index()
	{
		$session = session();
		if(!empty($_SESSION['user'])){
			$data['upi'] = $this->settingsModel->getUpiDetails(1);
			return view('upi',$data);
		} else {
			return view('login');
		}
	}

	public function UpdateUpi()
	{
		$session = session();
		if(!empty($_SESSION['user'])){

			$data = [
	        	'upi' => $this->request->getPost('upi'),
	        	'name' => $this->request->getPost('name'),
				'id' => $this->request->getPost('id')
	        ];

			$update = $this->settingsModel->updateUPIdata($data);

			if($update){
				$session->setFlashdata('alert', 'success|Success...|Updated Successfully');
				return redirect()->to('upi-details');
			}else{
				$session->setFlashdata('alert', 'error|Oops...|Try Again');
				return redirect()->to('upi-details');
			}
			
		} else {
			return view('login');
		}
	}

	public function GetUpiDetailsData() {
		$session = session();
		if(!empty($_SESSION['user'])){

		    $id = $this->request->getGet('id');
		    $data = $this->settingsModel->getUpidata($id);
		    // var_dump($data);

		    if ($data) {
		        echo json_encode(['valid' => true, 'data' => $data]);
		    } else {
		        echo json_encode(['valid' => false]);
		    }
	    } else {
			return view('login');
		}
	}

}