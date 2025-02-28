<?php 
namespace App\Controllers;

use App\Models\FrontpageModel;

class Frontpage extends BaseController
{
	
    function __construct()
	{
		$this->frontModel = new FrontpageModel();
	}
	public function index()
	{
		return view('login');
	}
	public function AdminLogin()
	{
		if(!isset($_SESSION['user']))
        {
			$session = session();
			$myModel=new FrontpageModel();
			$data['username'] = $this->request->getPost('uname');
			$data['password'] = $this->request->getPost('password');
			$query = $this->frontModel->AdminLoginMdl($data);
			if($query)
			{
				$session->set('user',$data['username']);
				$session->set('user_type',$query['user_type']);		
				$session->set('user_id',$query['id']);		
				$session->setFlashdata('clear_localstorage', true);
				if($query['status'] == 0){
					$session->setFlashdata('alert', 'error|Oops...|Inactive User !');
		        	return redirect()->to('/');
				}

            	return redirect()->to('dashboard');
			}
			else{
				$session->setFlashdata('alert', 'error|Oops...|Invalid Username or Password !');
		        return redirect()->to('/');
			}
		}else{
			return view('dashboard');
		}
	}
	public function Dashboard()
	{
		$session = session();
		if(isset($_SESSION['user']))
        {
        	if($_SESSION['user_type'] == 'admin') {
	    		return view('dashboard');
	    	}else{
	    		return view('user_dashboard');
	    	}
	    }
	    else{
			return view('login');
	    }
	}
	public function AdminLogout() 
	{
		$session = session();
		$session->destroy();
		return view('login');
	}
	
	
	
}