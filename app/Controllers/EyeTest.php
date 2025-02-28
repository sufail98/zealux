<?php 
namespace App\Controllers;

use App\Models\EyeTestModel;
use App\Models\LensModel;

class EyeTest extends BaseController
{
	
    function __construct()
	{
		$this->eyeTestModel = new EyeTestModel();
		$this->lensModel = new LensModel();
	}

	public function index()
	{
		$session = session();
		if(!empty($_SESSION['user'])){
			$user = $_SESSION['user_id'];
			$data['eyetest'] = $this->eyeTestModel->AllEyeTest($user);
			return view('eyetest_list',$data);
		} else {
			return view('login');
		}
	}

	public function eyeTests($id)
	{
		$session = session();
		if(!empty($_SESSION['user'])){
			$data['lens'] = $this->lensModel->AllLenses();
			$data['maxtestno'] = $this->eyeTestModel->MaxTestno();
			$data['eyetestId'] = $id;

			return view('eyetest',$data);
		} else {
			return view('login');
		}
	}

	public function SaveEyeTest()
	{
		$session = session();
		if(!empty($_SESSION['user'])){

			$data['EyeTestId'] = $this->request->getPost('eid');
	
			$data['CustomerHistory'] = $this->request->getPost('c_history');
			$data['Occupation'] = $this->request->getPost('occupation');

			$unaided_dist_vision_right = $this->request->getPost('unaided_dist_vision_right');
			$unaided_dist_vision_left = $this->request->getPost('unaided_dist_vision_left');
			$unaided_near_vision_right = $this->request->getPost('unaided_near_vision_right');
			$unaided_near_vision_left = $this->request->getPost('unaided_near_vision_left');

			$unaidedVision = json_encode([
			    'right' => ['Distance Vision' => $unaided_dist_vision_right, 'Near Vision' => $unaided_near_vision_right],
			    'left' => ['Distance Vision' => $unaided_dist_vision_left, 'Near Vision' => $unaided_near_vision_left]
			]);

			$data['unaidedVision'] = $unaidedVision;

			$pinhole_dist_vision_right = $this->request->getPost('pinhole_dist_vision_right');
			$pinhole_dist_vision_left = $this->request->getPost('pinhole_dist_vision_left');
			$pinhole_near_vision_right = $this->request->getPost('pinhole_near_vision_right');
			$pinhole_near_vision_left = $this->request->getPost('pinhole_near_vision_left');

			$pinholeVision = json_encode([
			    'right' => ['Distance Vision' => $pinhole_dist_vision_right, 'Near Vision' => $pinhole_near_vision_right],
			    'left' => ['Distance Vision' => $pinhole_dist_vision_left, 'Near Vision' => $pinhole_near_vision_left]
			]);

			$data['pinholeVision'] = $pinholeVision;

			$pgp_dist_vision_right = $this->request->getPost('pgp_dist_vision_right');
			$pgp_dist_vision_left = $this->request->getPost('pgp_dist_vision_left');
			$pgp_near_vision_right = $this->request->getPost('pgp_near_vision_right');
			$pgp_near_vision_left = $this->request->getPost('pgp_near_vision_left');

			$pgpVision = json_encode([
			    'right' => ['Distance Vision' => $pgp_dist_vision_right, 'Near Vision' => $pgp_near_vision_right],
			    'left' => ['Distance Vision' => $pgp_dist_vision_left, 'Near Vision' => $pgp_near_vision_left]
			]);

			$data['pgpVision'] = $pgpVision;

			$pd_right = $this->request->getPost('pd_right');
			$pd_left = $this->request->getPost('pd_left');
			$pd_both = $this->request->getPost('pd_both');

			$PDMeasurement = json_encode(['pd_right' => $pd_right , 'pd_left' => $pd_left, 'pd_both' => $pd_both]);

			$data['PDMeasurement'] = $PDMeasurement;

			$duochrome_red_right = $this->request->getPost('duochrome_red_right');
			$duochrome_red_left = $this->request->getPost('duochrome_red_left');
			$duochrome_green_right = $this->request->getPost('duochrome_green_right');
			$duochrome_green_left = $this->request->getPost('duochrome_green_left');
			$duochrome_both_right = $this->request->getPost('duochrome_both_right');
			$duochrome_both_left = $this->request->getPost('duochrome_both_left');

			$Duochrome = json_encode([
			    'right' => ['red' => $duochrome_red_right, 'green' => $duochrome_green_right, 'both' => $duochrome_both_right],
			    'left' => ['red' => $duochrome_red_left, 'green' => $duochrome_green_left, 'both' => $duochrome_both_left]

			]);

			$data['Duochrome'] = $Duochrome;

			$prescription_sph_right = $this->request->getPost('prescription_sph_right');
			$prescription_sph_left = $this->request->getPost('prescription_sph_left');
			$prescription_cyl_right = $this->request->getPost('prescription_cyl_right');
			$prescription_cyl_left = $this->request->getPost('prescription_cyl_left');
			$prescription_axis_right = $this->request->getPost('prescription_axis_right');
			$prescription_axis_left = $this->request->getPost('prescription_axis_left');
			$prescription_add_right = $this->request->getPost('prescription_add_right');
			$prescription_add_left = $this->request->getPost('prescription_add_left');
			$prescription_pd_right = $this->request->getPost('prescription_pd_right');
			$prescription_pd_left = $this->request->getPost('prescription_pd_left');

			$Prescription = json_encode([
			    'right' => ['sph' => $prescription_sph_right, 'cyl' => $prescription_cyl_right, 'axis' => $prescription_axis_right, 'add' => $prescription_add_right, 'pd' => $prescription_pd_right],
			    'left' => ['sph' => $prescription_sph_left, 'cyl' => $prescription_cyl_left, 'axis' => $prescription_axis_left, 'add' => $prescription_add_left, 'pd' => $prescription_pd_left]
			]);

			$data['Prescription'] = $Prescription;
			$data['adviceUsage'] = $this->request->getPost('adviceusage');
			$lensdesign = $this->request->getPost('lensdesign');
			$data['advice_lensDesign'] = is_array($lensdesign) ? implode(',', $lensdesign) : NULL; 
			$data['digital_usage'] = $this->request->getPost('digitalusage');

			$sph_right = $this->request->getPost('sph_right');
			$sph_left = $this->request->getPost('sph_left');
			$cyl_right = $this->request->getPost('cyl_right');
			$cyl_left = $this->request->getPost('cyl_left');
			$add_right = $this->request->getPost('add_right');
			$add_left = $this->request->getPost('add_left');

			$ARPower = json_encode([
			    'right' => ['sph' => $sph_right, 'cyl' => $cyl_right, 'add' => $add_right],
			    'left' => ['sph' => $sph_left, 'cyl' => $cyl_left, 'add' => $add_left]

			]);

			$data['ARPower'] = $ARPower;

			if(!empty($_FILES['capturephoto']['name']))
			{
				$file=$this->request->getFile('capturephoto');
				$name = $file->getRandomName();
				$data['ARPower_photo'] = $name;
				$file->move('./images/eyetest', $name);
			}

			$data['FlashTourch'] = $this->request->getPost('flashtourch');
			$data['FlashTourchDiscription'] = $this->request->getPost('flashdesc');
			$data['CoverUnCoverTest'] = $this->request->getPost('coveruncovertest');
			$data['CoverUnCoverTestDescription'] = $this->request->getPost('coveruncovertestdesc');
			$data['ConverganceTest'] = $this->request->getPost('convergencetest');
			$data['ConverganceTestDescription'] = $this->request->getPost('convergencetestdesc');
			$data['JCC'] = $this->request->getPost('jcc');
			$data['GPOutside'] = $this->request->getPost('gpoutside');
	        $data['CreatedUser'] = $_SESSION['user_id'];
			$data['CreatedDate'] = date('Y-m-d H:i:s');

			$insertid = $this->eyeTestModel->UpdateEyeTestMdl($data);

			if($insertid){
				$session->setFlashdata('alert', 'success|Success...|Added Successfully');
            	return redirect()->to('eye-test');
					
			}else{
				$session->setFlashdata('alert', 'error|Oops...|Try Again');
		        return redirect()->to('eye-test');
			}
			
		} else {
			return view('login');
		}	
	}
	public function EyeTestEdit($id)
	{
		$session = session();
		if(!empty($_SESSION['user'])){
			$data['lens'] = $this->lensModel->AllLenses();
			$data['editdata'] = $this->eyeTestModel->EyeTestEditMdl($id);
			return view('eyetest_edit',$data);
		} else {
			return view('login');
		}
	}
	public function UpdateEyeTest()
	{
		$session = session();
		if(!empty($_SESSION['user']))
		{
			$data['EyeTestId'] = $this->request->getPost('eid');
			$data['CustomerHistory'] = $this->request->getPost('c_history');
			$data['Occupation'] = $this->request->getPost('occupation');

			$unaided_dist_vision_right = $this->request->getPost('unaided_dist_vision_right');
			$unaided_dist_vision_left = $this->request->getPost('unaided_dist_vision_left');
			$unaided_near_vision_right = $this->request->getPost('unaided_near_vision_right');
			$unaided_near_vision_left = $this->request->getPost('unaided_near_vision_left');

			$unaidedVision = json_encode([
			    'right' => ['Distance Vision' => $unaided_dist_vision_right, 'Near Vision' => $unaided_near_vision_right],
			    'left' => ['Distance Vision' => $unaided_dist_vision_left, 'Near Vision' => $unaided_near_vision_left]
			]);

			$data['unaidedVision'] = $unaidedVision;

			$pinhole_dist_vision_right = $this->request->getPost('pinhole_dist_vision_right');
			$pinhole_dist_vision_left = $this->request->getPost('pinhole_dist_vision_left');
			$pinhole_near_vision_right = $this->request->getPost('pinhole_near_vision_right');
			$pinhole_near_vision_left = $this->request->getPost('pinhole_near_vision_left');

			$pinholeVision = json_encode([
			    'right' => ['Distance Vision' => $pinhole_dist_vision_right, 'Near Vision' => $pinhole_near_vision_right],
			    'left' => ['Distance Vision' => $pinhole_dist_vision_left, 'Near Vision' => $pinhole_near_vision_left]
			]);

			$data['pinholeVision'] = $pinholeVision;

			$pgp_dist_vision_right = $this->request->getPost('pgp_dist_vision_right');
			$pgp_dist_vision_left = $this->request->getPost('pgp_dist_vision_left');
			$pgp_near_vision_right = $this->request->getPost('pgp_near_vision_right');
			$pgp_near_vision_left = $this->request->getPost('pgp_near_vision_left');

			$pgpVision = json_encode([
			    'right' => ['Distance Vision' => $pgp_dist_vision_right, 'Near Vision' => $pgp_near_vision_right],
			    'left' => ['Distance Vision' => $pgp_dist_vision_left, 'Near Vision' => $pgp_near_vision_left]
			]);

			$data['pgpVision'] = $pgpVision;

			$pd_right = $this->request->getPost('pd_right');
			$pd_left = $this->request->getPost('pd_left');
			$pd_both = $this->request->getPost('pd_both');

			$PDMeasurement = json_encode(['pd_right' => $pd_right , 'pd_left' => $pd_left, 'pd_both' => $pd_both]);

			$data['PDMeasurement'] = $PDMeasurement;

			$duochrome_red_right = $this->request->getPost('duochrome_red_right');
			$duochrome_red_left = $this->request->getPost('duochrome_red_left');
			$duochrome_green_right = $this->request->getPost('duochrome_green_right');
			$duochrome_green_left = $this->request->getPost('duochrome_green_left');
			$duochrome_both_right = $this->request->getPost('duochrome_both_right');
			$duochrome_both_left = $this->request->getPost('duochrome_both_left');

			$Duochrome = json_encode([
			    'right' => ['red' => $duochrome_red_right, 'green' => $duochrome_green_right, 'both' => $duochrome_both_right],
			    'left' => ['red' => $duochrome_red_left, 'green' => $duochrome_green_left, 'both' => $duochrome_both_left]

			]);

			$data['Duochrome'] = $Duochrome;

			$prescription_sph_right = $this->request->getPost('prescription_sph_right');
			$prescription_sph_left = $this->request->getPost('prescription_sph_left');
			$prescription_cyl_right = $this->request->getPost('prescription_cyl_right');
			$prescription_cyl_left = $this->request->getPost('prescription_cyl_left');
			$prescription_axis_right = $this->request->getPost('prescription_axis_right');
			$prescription_axis_left = $this->request->getPost('prescription_axis_left');
			$prescription_add_right = $this->request->getPost('prescription_add_right');
			$prescription_add_left = $this->request->getPost('prescription_add_left');
			$prescription_pd_right = $this->request->getPost('prescription_pd_right');
			$prescription_pd_left = $this->request->getPost('prescription_pd_left');

			$Prescription = json_encode([
			    'right' => ['sph' => $prescription_sph_right, 'cyl' => $prescription_cyl_right, 'axis' => $prescription_axis_right, 'add' => $prescription_add_right, 'pd' => $prescription_pd_right],
			    'left' => ['sph' => $prescription_sph_left, 'cyl' => $prescription_cyl_left, 'axis' => $prescription_axis_left, 'add' => $prescription_add_left, 'pd' => $prescription_pd_left]
			]);

			$data['Prescription'] = $Prescription;
			$data['adviceUsage'] = $this->request->getPost('adviceusage');
			$lensdesign = $this->request->getPost('lensdesign');
			$data['advice_lensDesign'] = is_array($lensdesign) ? implode(',', $lensdesign) : NULL; 
			$data['digital_usage'] = $this->request->getPost('digitalusage');

			$sph_right = $this->request->getPost('sph_right');
			$sph_left = $this->request->getPost('sph_left');
			$cyl_right = $this->request->getPost('cyl_right');
			$cyl_left = $this->request->getPost('cyl_left');
			$add_right = $this->request->getPost('add_right');
			$add_left = $this->request->getPost('add_left');

			$ARPower = json_encode([
			    'right' => ['sph' => $sph_right, 'cyl' => $cyl_right, 'add' => $add_right],
			    'left' => ['sph' => $sph_left, 'cyl' => $cyl_left, 'add' => $add_left]

			]);

			$data['ARPower'] = $ARPower;

			if(!empty($_FILES['capturephoto']['name']))
			{
				$file=$this->request->getFile('capturephoto');
				$name = $file->getRandomName();
				$data['ARPower_photo'] = $name;
				$file->move('./images/eyetest', $name);
			}

			$data['FlashTourch'] = $this->request->getPost('flashtourch');
			$data['FlashTourchDiscription'] = $this->request->getPost('flashdesc');
			$data['CoverUnCoverTest'] = $this->request->getPost('coveruncovertest');
			$data['CoverUnCoverTestDescription'] = $this->request->getPost('coveruncovertestdesc');
			$data['ConverganceTest'] = $this->request->getPost('convergencetest');
			$data['ConverganceTestDescription'] = $this->request->getPost('convergencetestdesc');
			$data['JCC'] = $this->request->getPost('jcc');
			$data['GPOutside'] = $this->request->getPost('gpoutside');
			$data['CreatedDate'] = date('Y-m-d H:i:s');
			$data['CreatedUser'] = $_SESSION['user_id'];

			$update = $this->eyeTestModel->UpdateEyeTestMdl($data);

			if($update){
				$session->setFlashdata('alert', 'success|Success...|Updated Successfully');
            	return redirect()->to('edit-eye-test/' . $this->request->getPost('eid'));

			} else {
				$session->setFlashdata('alert', 'error|Oops...|Try Again');
		        return redirect()->to('edit-eye-test');
			}
			
		} else {
			return view('login');
		}
	}

	public function EyeTestDelete($id)
	{
		$session = session();
		if(!empty($_SESSION['user'])){
			$query = $this->eyeTestModel->EyeTestDeleteMdl($id);
			if($query){
				$session->setFlashdata('alert', 'success|Success...|Deleted Successfully');
            	return redirect()->to('eye-test');
			}
		} else {
			return view('login');
		}
	}

	public function CustomerReg()
	{
		$session = session();
		if(!empty($_SESSION['user'])){
			$data['lens'] = $this->lensModel->AllLenses();
			$data['maxtestno'] = $this->eyeTestModel->MaxTestno();
			return view('customer_reg',$data);
		} else {
			return view('login');
		}
	}

	public function SaveCustomer()
	{
		$session = session();
		if(!empty($_SESSION['user'])){

			$data['CustomerName'] = $this->request->getPost('cutomer');
			$data['CustomerAge'] = $this->request->getPost('age');
			$data['Testno'] = $this->request->getPost('testno');
			$data['Test_date'] = $this->request->getPost('testdate');
			$data['Gender'] = $this->request->getPost('gender');
			$data['MobileNo1'] = $this->request->getPost('mob1');
			$data['MobileNo2'] = $this->request->getPost('mob2');
			$data['Email'] = $this->request->getPost('email');

			$prescription_sph_right = $this->request->getPost('prescription_sph_right');
			$prescription_sph_left = $this->request->getPost('prescription_sph_left');
			$prescription_cyl_right = $this->request->getPost('prescription_cyl_right');
			$prescription_cyl_left = $this->request->getPost('prescription_cyl_left');
			$prescription_axis_right = $this->request->getPost('prescription_axis_right');
			$prescription_axis_left = $this->request->getPost('prescription_axis_left');
			$prescription_add_right = $this->request->getPost('prescription_add_right');
			$prescription_add_left = $this->request->getPost('prescription_add_left');
			$prescription_pd_right = $this->request->getPost('prescription_pd_right');
			$prescription_pd_left = $this->request->getPost('prescription_pd_left');

			$Prescription = json_encode([
			    'right' => ['sph' => $prescription_sph_right, 'cyl' => $prescription_cyl_right, 'axis' => $prescription_axis_right, 'add' => $prescription_add_right, 'pd' => $prescription_pd_right],
			    'left' => ['sph' => $prescription_sph_left, 'cyl' => $prescription_cyl_left, 'axis' => $prescription_axis_left, 'add' => $prescription_add_left, 'pd' => $prescription_pd_left]
			]);

			$data['Prescription'] = $Prescription;
			$data['adviceUsage'] = $this->request->getPost('adviceusage');
			$lensdesign = $this->request->getPost('lensdesign');
			$data['advice_lensDesign'] = is_array($lensdesign) ? implode(',', $lensdesign) : NULL; 

			$data['GPOutside'] = $this->request->getPost('gpoutside');
			$data['CreatedDate'] = date('Y-m-d H:i:s');
			$data['CreatedUser'] = $_SESSION['user_id'];

			$insertid = $this->eyeTestModel->InsertEyeTest($data);

			if($insertid){
				$session->setFlashdata('alert', 'success|Success...|Added Successfully');
            	return redirect()->to('customer-registration');
					
			}else{
				$session->setFlashdata('alert', 'error|Oops...|Try Again');
		        return redirect()->to('customer-registration');
			}
			
		} else {
			return view('login');
		}	
	}

	public function Customers()
	{
		$session = session();
		if(!empty($_SESSION['user'])){
			$data['customers'] = $this->eyeTestModel->Allcustomers();
			return view('customers',$data);
		} else {
			return view('login');
		}
	}
	public function CustomersList()
	{
		$session = session();
		if(!empty($_SESSION['user'])){
			$user = $_SESSION['user_id'];
			$data['customers'] = $this->eyeTestModel->Allcustomers($user);
			return view('customer_list',$data);
		} else {
			return view('login');
		}
	}

	public function CustomerEdit($id)
	{
		$session = session();
		if(!empty($_SESSION['user'])){
			$data['lens'] = $this->lensModel->AllLenses();
			$data['editdata'] = $this->eyeTestModel->EyeTestEditMdl($id);
			return view('edit_customer_reg',$data);
		} else {
			return view('login');
		}
	}

	public function UpdateCustomer()
	{
		$session = session();
		if(!empty($_SESSION['user'])){

			$data['EyeTestId'] = $this->request->getPost('eid');
			$data['CustomerName'] = $this->request->getPost('cutomer');
			$data['CustomerAge'] = $this->request->getPost('age');
			$data['Testno'] = $this->request->getPost('testno');
			$data['Test_date'] = $this->request->getPost('testdate');
			$data['Gender'] = $this->request->getPost('gender');
			$data['MobileNo1'] = $this->request->getPost('mob1');
			$data['MobileNo2'] = $this->request->getPost('mob2');
			$data['Email'] = $this->request->getPost('email');

			$prescription_sph_right = $this->request->getPost('prescription_sph_right');
			$prescription_sph_left = $this->request->getPost('prescription_sph_left');
			$prescription_cyl_right = $this->request->getPost('prescription_cyl_right');
			$prescription_cyl_left = $this->request->getPost('prescription_cyl_left');
			$prescription_axis_right = $this->request->getPost('prescription_axis_right');
			$prescription_axis_left = $this->request->getPost('prescription_axis_left');
			$prescription_add_right = $this->request->getPost('prescription_add_right');
			$prescription_add_left = $this->request->getPost('prescription_add_left');
			$prescription_pd_right = $this->request->getPost('prescription_pd_right');
			$prescription_pd_left = $this->request->getPost('prescription_pd_left');

			$Prescription = json_encode([
			    'right' => ['sph' => $prescription_sph_right, 'cyl' => $prescription_cyl_right, 'axis' => $prescription_axis_right, 'add' => $prescription_add_right, 'pd' => $prescription_pd_right],
			    'left' => ['sph' => $prescription_sph_left, 'cyl' => $prescription_cyl_left, 'axis' => $prescription_axis_left, 'add' => $prescription_add_left, 'pd' => $prescription_pd_left]
			]);

			$data['Prescription'] = $Prescription;
			$data['adviceUsage'] = $this->request->getPost('adviceusage');
			$lensdesign = $this->request->getPost('lensdesign');
			$data['advice_lensDesign'] = is_array($lensdesign) ? implode(',', $lensdesign) : NULL; 

			$data['GPOutside'] = $this->request->getPost('gpoutside');
			$data['CreatedDate'] = date('Y-m-d H:i:s');
			$data['CreatedUser'] = $_SESSION['user_id'];

			$insertid = $this->eyeTestModel->UpdateEyeTestMdl($data);

			if($insertid){
				$session->setFlashdata('alert', 'success|Success...|Updated Successfully');
            	return redirect()->to('customers-list');
					
			}else{
				$session->setFlashdata('alert', 'error|Oops...|Try Again');
		        return redirect()->to('customers-list');
			}
			
		} else {
			return view('login');
		}	
	}

	public function CustomerDelete($id)
	{
		$session = session();
		if(!empty($_SESSION['user'])){
			$query = $this->eyeTestModel->EyeTestDeleteMdl($id);
			if($query){
				$session->setFlashdata('alert', 'success|Success...|Deleted Successfully');
            	return redirect()->to('customers-list');
			}
		} else {
			return view('login');
		}
	}

	
}