<?php 
namespace App\Controllers;

use App\Models\CheckListModel;

class CheckList extends BaseController
{
	
    function __construct()
	{
		$this->checklistModel = new CheckListModel();
	}

	public function index()
	{
		$session = session();
		if(!empty($_SESSION['user'])){
			$data['checklists'] = $this->checklistModel->AllChecklist();
			return view('checklists',$data);
		} else {
			return redirect()->to('admin');
		}
	}

	public function CheckListAdd()
	{
		$session = session();
		if(!empty($_SESSION['user'])){
			$data['types'] = $this->checklistModel->AllTypes();
			return view('checklist_creation',$data);
		} else {
			return redirect()->to('admin');
		}
	}
	public function SaveCheckList()
	{
		$session = session();
		if(!empty($_SESSION['user'])){

			$data = [
	        	'question' => $this->request->getPost('question'),
	        	'type' => $this->request->getPost('type'),
	        	'from_time' => $this->request->getPost('from'),
	        	'to_time' => $this->request->getPost('to'),
	            'order_to_display' => $this->request->getPost('order'),
	            'status' => $this->request->getPost('status')
	        ];

			$insertid = $this->checklistModel->InsertCheckList($data);

			if($insertid){
				$session->setFlashdata('alert', 'success|Success...|Added Successfully');
            	return redirect()->to('checklists');
			}else{
				$session->setFlashdata('alert', 'error|Oops...|Try Again');
            	return redirect()->to('checklists');
			}
			
		} else {
			return redirect()->to('admin');
		}	
	}
	public function EditCheckList($id)
	{
		$session = session();
		if(!empty($_SESSION['user'])){
			$data['types'] = $this->checklistModel->AllTypes();
			$data['editdata'] = $this->checklistModel->EditCheckListMdl($id);
			return view('edit_checklist',$data);
		} else {
			return redirect()->to('admin');
		}
	}
	public function UpdateCheckList()
	{
		$session = session();
		if(!empty($_SESSION['user'])){

			$data = [
	        	'id' => $this->request->getPost('cid'),
	        	'question' => $this->request->getPost('question'),
	        	'type' => $this->request->getPost('type'),
	        	'from_time' => $this->request->getPost('from'),
	        	'to_time' => $this->request->getPost('to'),
	            'order_to_display' => $this->request->getPost('order'),
	            'status' => $this->request->getPost('status')
	        ];

			$update = $this->checklistModel->updatechecklistMdl($data);

			if($update){
				$session->setFlashdata('alert', 'success|Success...|Updated Successfully');
            	return redirect()->to('checklists');
			} else {
				$session->setFlashdata('alert', 'error|Oops...|Try Again');
            	return redirect()->to('checklists');
			}
			
		} else {
			return redirect()->to('admin');
		}
	}

	public function DeleteCheckList($id)
	{
		$session = session();
		if(!empty($_SESSION['user'])){
			$query = $this->checklistModel->CheckListDeleteMdl($id);
			if($query){
				$session->setFlashdata('alert', 'success|Success...|Deleted Successfully');
            	return redirect()->to('checklists');
			}
		} else {
			return redirect()->to('admin');
		}
	}

	public function ChecklistForm()
	{
		$session = session();
		if(!empty($_SESSION['user'])){
			$data['types'] = $this->checklistModel->AllTypes();
			return view('checklist_add',$data);
		} else {
			return redirect()->to('admin');
		}
	}
	public function getChecklistQuestions()
	{
		$session = session();
		if(!empty($_SESSION['user'])){

		    $qtype = $this->request->getGet('qtype');
		    $questions = $this->checklistModel->ChecklistQuestionsMdl($qtype);
		    $existingReview = $this->checklistModel->checkUserTypeExist($_SESSION['user_id']);

		    if ($questions) {
		        return $this->response->setJSON([
		            'status' => 'success',
		            'data' => $questions,
		            'exist' => $existingReview
		        ]);
		    } else {
		        return $this->response->setJSON([
		            'status' => 'error',
		            'message' => 'questions not found'
		        ]);
		    }
	    } else {
			return redirect()->to('admin');
		}	
	}
	public function InsertCheckLists()
	{
		$session = session();
		if(!empty($_SESSION['user'])){

			$data = [
	        	'user_id' => $_SESSION['user_id'],
	        	'submit_date' => date('Y-m-d')
	        ];

	        // $existingReview = $this->checklistModel->checkUserExist($_SESSION['user_id']);
		    // if ($existingReview) {
		    //     $session->setFlashdata('alert', 'warning|Notice|You have already submitted.');
		    //     return redirect()->to("checklist-form");
		    // }

			$insertid = $this->checklistModel->InsertChecklistmaster($data);
			if($insertid){

				$details = [];
	            foreach ($this->request->getPost() as $key => $value) {
	                if (strpos($key, 'qyesno_') === 0) {
	                    $qid = str_replace('qyesno_', '', $key);
	                    $status = $value;
	                    $desc = $this->request->getPost('desc_' . $qid) ?? '';
	                    $qyesno = $this->request->getPost('qyesno_' . $qid) ?? '';

	                    // Handle file upload
	                    $file = $this->request->getFile('qfile_' . $qid);
	                    $filename = null;
	                    if ($file && $file->isValid() && !$file->hasMoved()) {
	                        $filename = $file->getRandomName();
	                        $file->move('./images/checklist', $filename);
	                    }

	                    $details[] = [
	                        'answer_masterId' => $insertid,
	                        'questionId' => $qid,
	                        'yes_or_no' => $qyesno,
	                        'details' => $desc,
	                        'qfile' => $filename
	                    ];
	                }
	            }

	            // Batch insert details if available
	            if (!empty($details)) {
	                $this->checklistModel->InsertChecklistDetails($details);
	            }

	            $session->setFlashdata('alert', 'success|Success|Checklist Submitted!');
	            return redirect()->to('checklist-form');

			}else{
				$session->setFlashdata('alert', 'error|Oops...|Try Again');
            	return redirect()->to('checklist-form');
			}
			
		} else {
			return redirect()->to('admin');
		}	
	}

	public function ChecklistReport()
	{
		$session = session();
		if(!empty($_SESSION['user'])){
			return view('checklist_report');
		} else {
			return redirect()->to('admin');
		}
	}
	public function ChecklistReportByDate()
	{
		$session = session();
	    if (!empty($_SESSION['user'])) {
	        $fromDate = $this->request->getPost('from_date');
	        $allreport = $this->request->getPost('allreport');

	        $start = $this->request->getPost('start');
	        $length = $this->request->getPost('length');
	        $draw = $this->request->getPost('draw');

	        // Get total count of records before filtering
	        $totalRecords = $this->checklistModel->countCheckListMasterTotalRecords($fromDate, $allreport);

	        // Get filtered data with pagination
	        $report = $this->checklistModel->getCheckListMasterReport($fromDate, $allreport, $start, $length);

	        return $this->response->setJSON([
	            'data' => $report,
	            "draw" => intval($this->request->getPost('draw')),
	            "recordsTotal" => $totalRecords,
	            "recordsFiltered" => $totalRecords
	        ]);
	    } else {
	        return redirect()->to('admin');
	    }
	}
	public function ViewCheckList($id)
	{
		$session = session();
		if(!empty($_SESSION['user'])){
			$data['editdata'] = $this->checklistModel->ViewCheckListMdl($id);
			return view('view_checklist',$data);
		} else {
			return redirect()->to('admin');
		}
	}

	public function checklistsDelete($id)
	{
		$session = session();
		if(!empty($_SESSION['user'])){
			$query = $this->checklistModel->checklistsDeleteMdl($id);
			if($query){
				$session->setFlashdata('alert', 'success|Success...|Deleted Successfully');
            	return redirect()->to('checklist-report');
			}
		} else {
			return redirect()->to('admin');
		}
	}

	
	
}