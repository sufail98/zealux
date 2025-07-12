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
		$data['stores'] = $this->frontModel->AllStores();
		return view('login',$data);
	}
	public function SuperAdmin()
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
			$data['store_id'] = $this->request->getPost('store');

			$query = $this->frontModel->AdminLoginMdl($data);
			if($query)
			{
				$session->set('user',$data['username']);
				$session->set('user_type',$query['user_type']);		
				$session->set('user_id',$query['id']);	
				$session->set('store_id',$query['store_id']);		

				$session->setFlashdata('clear_localstorage', true);
				if($query['status'] == 0){
					$session->setFlashdata('alert', 'error|Oops...|Inactive User !');
		        	return redirect()->to('/');
				}

            	return redirect()->to('dashboard');
			}
			else{
				$session->setFlashdata('alert', 'error|Oops...|Invalid Details !');
		        return redirect()->to('/');
			}
		}else{
			return view('dashboard');
		}
	}
	public function Dashboard()
	{
		// $session = session();
		// if(isset($_SESSION['user']))
        // {
        // 	if($_SESSION['user_type'] == 'admin') {
	    // 		return view('dashboard');
	    // 	}else{
	    // 		// return view('user_dashboard');
        //     	return redirect()->to('sales');

	    // 	}
	    // }
	    // else{
		// 	return view('login');
	    // }

	    $session = session();
	    $request = \Config\Services::request();

	    // Check if session is already set
	    if ($session->has('user')) {
	        if ($session->get('user_type') == 'admin' || $session->get('user_type') == 'super admin') {
	            return view('dashboard');
	        } else {
	            return redirect()->to('sales');
	        }
	    }

	    // If session is not set, check for query parameters
	    $userType = $request->getGet('user_type');
	    $userId = $request->getGet('user_id');
	    $username = $request->getGet('username');
	    $store_id = $request->getGet('store_id');


	    if (!empty($userType) && !empty($userId)) {
	        // Set session with received URL parameters
	        $sessionData = [
	            'user'      => $username, 
	            'user_type' => $userType,
	            'store_id' => $store_id,
	            'user_id'   => $userId
	        ];
	        $session->set($sessionData);

	        // Redirect to dashboard again to load session-based view
	        return redirect()->to('dashboard');
	    }

	    // If neither session nor URL parameters exist, show login
	    return view('login');
	}
	public function AdminLogout() 
	{
		$session = session();
	    if($_SESSION['user_type'] == 'super admin'){
	    	$session->destroy();
	    	return redirect()->to('admin');
	    }else{
			$session->destroy();
		    return redirect()->to('/');
		}

	}

	public function login()
	{
	    $session = session();
	    $jsonData = $this->request->getJSON();

	    $data['username'] = $jsonData->username;
		$data['password'] = $jsonData->password;
		$data['store_id'] = $jsonData->store_id;

	    $query = $this->frontModel->AdminLoginMdl($data);
	    // print_r($query);

	    if ($query) {

            // Set session data on successful login

            $sessionData = [
                'user'   => $query['username'],
                'user_type'  => $query['user_type'],
	            'store_id' => $query['store_id'],
                'user_id' => $query['id']
            ];
            $url = 'https://zealuxeyeboutique.com/dashboard/?user_type=' . urlencode($query['user_type']) 
				     . '&username=' . urlencode($query['username']) 
				     . '&store_id=' . urlencode($query['store_id']) 
				     . '&user_id=' . urlencode($query['id']);

            $session->set($sessionData);

            return $this->response->setJSON([
            	'status' => 'success',
            	 'message' => 'Login successful',
            	 'redirect_url' => $url,
            	 'session'=> $session->get('user_type') ,
            	 'user_details' => $query
            	]);

	    } else {
	        return $this->response->setJSON(['status' => 'error', 'message' => 'User not found']);
	    }
	}
	public function Stores()
	{
		$stores = $this->frontModel->AllStores();

		if($stores){
			$response = [
				'status' => 200,
				'error' => false,
				'message' => 'Stores',
				'stores' => $stores,	
			];
		}else{
			$response = [
				'status' => 500,
				'error' => true,
				'message' => 'No Data Found!',
				'stores' => []
			];
		}
		return $this->response->setJSON($response);
	}

	
	
	
}