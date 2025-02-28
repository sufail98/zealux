<?php 
namespace App\Controllers;

use App\Models\GroupsModel;

class Groups extends BaseController
{
	
    function __construct()
	{
		$this->groupModel = new GroupsModel();
	}

	public function index()
	{
		$session = session();
		if(!empty($_SESSION['user'])){
			$data['groups'] = $this->groupModel->AllGroups();
			return view('group',$data);
		} else {
			return view('login');
		}
	}

	public function SaveGroup()
	{
		$session = session();
		if(!empty($_SESSION['user'])){

			$data['group_name'] = $this->request->getPost('group');
			$data['isPrivilegeApplied'] = !empty($this->request->getPost('isPrivilegeApplied')) ? 1 : 0;
			$data['CreatedDate'] = date('Y-m-d H:i:s');

			$insertid = $this->groupModel->InsertGroup($data);

			if($insertid){
				$session->setFlashdata('alert', 'success|Success...|Added Successfully');
            	return redirect()->to('groups');
					
			}else{
				$session->setFlashdata('alert', 'error|Oops...|Try Again');
            	return redirect()->to('groups');
			}
			
		} else {
			return view('login');
		}	
	}
	public function getGroupDetails()
	{
		$session = session();
		if(!empty($_SESSION['user'])){

		    $id = $this->request->getGet('id');
		    $group = $this->groupModel->getGroupDetails($id);

		    if ($group) {
		        return $this->response->setJSON([
		            'status' => 'success',
		            'data' => $group
		        ]);
		    } else {
		        return $this->response->setJSON([
		            'status' => 'error',
		            'message' => 'Group not found'
		        ]);
		    }
	    } else {
			return view('login');
		}	
	}
	public function UpdateGroup()
	{
		$session = session();
		if(!empty($_SESSION['user'])){

			$data['group_name'] = $this->request->getPost('group');
			$data['isPrivilegeApplied'] = !empty($this->request->getPost('isPrivilegeApplied')) ? 1 : 0;
			$data['id'] = $this->request->getPost('id');

			$update = $this->groupModel->updateGroups($data);

			if($update){
				$session->setFlashdata('alert', 'success|Success...|Updated Successfully');
            	return redirect()->to('groups');
			} else {
				$session->setFlashdata('alert', 'error|Oops...|Try Again');
            	return redirect()->to('groups');
			}
			
		} else {
			return view('login');
		}
	}

	public function GroupDelete($id)
	{
		$session = session();
		if(!empty($_SESSION['user'])){
			$query = $this->groupModel->GroupDeleteMdl($id);
			if($query){
				$session->setFlashdata('alert', 'success|Success...|Deleted Successfully');
            	return redirect()->to('groups');
			}
		} else {
			return view('login');
		}
	}

	
}