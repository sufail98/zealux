<?php 
namespace App\Controllers;

use App\Models\UserModel;

class User extends BaseController
{
	
    function __construct()
	{
		$this->userModel = new UserModel();
	}
	public function Users()
	{
		$session = session();
		if(!empty($_SESSION['user'])){
			$data['users'] = $this->userModel->AllUsers();
			return view('users_list',$data);
		} else {
			return view('login');
		}
	}
	public function AddUser()
	{
		$session = session();
		if(!empty($_SESSION['user'])){
			return view('add_user');
		} else {
			return view('login');
		}
	}

	public function SaveUser()
	{
		$session = session();
		if(!empty($_SESSION['user'])){

			$data = [
	        	'username' => $this->request->getPost('username'),
	        	'password' => $this->request->getPost('password'),
	            'user_type' => $this->request->getPost('user_type'),
	            'status' => $this->request->getPost('status'),
				'CreatedDate' => date('Y-m-d H:i:s')
	        ];

			$insertid = $this->userModel->InsertUser($data);

			if($insertid){
				$session->setFlashdata('alert', 'success|Success...|Added Successfully');
            	return redirect()->to('users');
			}else{
				$session->setFlashdata('alert', 'error|Oops...|Try Again');
		        return redirect()->to('users');
			}
			
		} else {
			return view('login');
		}
		
	}
	public function UserEdit($id)
	{ 
		$session = session();
		if(!empty($_SESSION['user'])){

			$data['editdata'] = $this->userModel->UserEditMdl($id);
			return view('edit_user',$data);
		} else {
			return view('login');
		}
	}
	public function UpdateUser()
	{
		$session = session();
		if(!empty($_SESSION['user'])){

			$data = [
	        	'username' => $this->request->getPost('username'),
	        	'password' => $this->request->getPost('password'),
	            'user_type' => $this->request->getPost('user_type'),
	            'status' => $this->request->getPost('status'),
				'id' => $this->request->getPost('uid'),
				'CreatedDate' => date('Y-m-d H:i:s')
	        ];

			$update = $this->userModel->updateUser($data);

			if($update){
				$session->setFlashdata('alert', 'success|Success...|Updated Successfully');
				return redirect()->to('users');
			}else{
				$session->setFlashdata('alert', 'error|Oops...|Try Again');
				return redirect()->to('users');
			}
			
		} else {
			return view('login');
		}
		
	}

	public function UserDelete($id)
	{
		$session = session();
		if(!empty($_SESSION['user'])){
			$query = $this->userModel->UserDeleteMdl($id);
			if($query){
				$session->setFlashdata('alert', 'success|Success...|Deleted Successfully');
            	return redirect()->to('users');
			}
		} else {
			return view('login');
		}
	}
	
}