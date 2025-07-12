<?php 
namespace App\Controllers;

use App\Models\ReviewQuestionsModel;

class ReviewQuestions extends BaseController
{
	
    function __construct()
	{
		$this->questionsModel = new ReviewQuestionsModel();
	}

	public function index()
	{
		$session = session();
		if(!empty($_SESSION['user'])){
			$data['questions'] = $this->questionsModel->AllQuestions();
			return view('review_questions_list',$data);
		} else {
			return redirect()->to('admin');
		}
	}

	public function QuestionsAdd()
	{
		$session = session();
		if(!empty($_SESSION['user'])){
			return view('review_questions');
		} else {
			return redirect()->to('admin');
		}
	}
	public function SaveQuestions()
	{
		$session = session();
		if(!empty($_SESSION['user'])){

			$data = [
	        	'question' => $this->request->getPost('question'),
	        	'rating_type' => $this->request->getPost('rating_type'),
	            'order_to_display' => $this->request->getPost('order'),
	            'status' => $this->request->getPost('status'),
	            'CreatedUser' => $_SESSION['user_id']
	        ];

			$insertid = $this->questionsModel->InsertQuestions($data);

			if($insertid){
				$session->setFlashdata('alert', 'success|Success...|Added Successfully');
            	return redirect()->to('questions');
			}else{
				$session->setFlashdata('alert', 'error|Oops...|Try Again');
            	return redirect()->to('questions');
			}
			
		} else {
			return redirect()->to('admin');
		}	
	}
	public function EditQuestions($id)
	{
		$session = session();
		if(!empty($_SESSION['user'])){
			$data['editdata'] = $this->questionsModel->EditQuestionsMdl($id);
			return view('edit_review_questions',$data);
		} else {
			return redirect()->to('admin');
		}
	}
	public function UpdateQuestions()
	{
		$session = session();
		if(!empty($_SESSION['user'])){

			$data = [
	        	'qid' => $this->request->getPost('qid'),
	        	'question' => $this->request->getPost('question'),
	        	'rating_type' => $this->request->getPost('rating_type'),
	            'order_to_display' => $this->request->getPost('order'),
	            'status' => $this->request->getPost('status'),
	            'CreatedUser' => $_SESSION['user_id']
	        ];

			$update = $this->questionsModel->updateQuestionsMdl($data);

			if($update){
				$session->setFlashdata('alert', 'success|Success...|Updated Successfully');
            	return redirect()->to('questions');
			} else {
				$session->setFlashdata('alert', 'error|Oops...|Try Again');
            	return redirect()->to('questions');
			}
			
		} else {
			return redirect()->to('admin');
		}
	}

	public function DeleteQuestions($id)
	{
		$session = session();
		if(!empty($_SESSION['user'])){
			$query = $this->questionsModel->QuestionsDeleteMdl($id);
			if($query){
				$session->setFlashdata('alert', 'success|Success...|Deleted Successfully');
            	return redirect()->to('questions');
			}
		} else {
			return redirect()->to('admin');
		}
	}

	public function SavedReviews()
	{
		$session = session();
		if(!empty($_SESSION['user'])){
			return view('reviews_list');
		} else {
			return redirect()->to('admin');
		}
	}
	public function SavedReviewsReportByDate()
	{
		$session = session();
	    if (!empty($_SESSION['user'])) {
	        $fromDate = $this->request->getPost('from_date');
	        $toDate = $this->request->getPost('to_date');
	        $allreport = $this->request->getPost('allreport');

	        $start = $this->request->getPost('start');
	        $length = $this->request->getPost('length');
	        $draw = $this->request->getPost('draw');

	        // Get total count of records before filtering
	        $totalRecords = $this->questionsModel->countReviewMasterTotalRecords($fromDate, $toDate, $allreport);

	        // Get filtered data with pagination
	        $report = $this->questionsModel->getReviewMasterReport($fromDate, $toDate, $allreport, $start, $length);

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
	public function ViewReview($id)
	{
		$session = session();
		if(!empty($_SESSION['user'])){
			$data['editdata'] = $this->questionsModel->ReviewViewMdl($id);
			return view('review_view',$data);
		} else {
			return redirect()->to('admin');
		}
	}
	public function DeleteReview($id)
	{
		$session = session();
		if(!empty($_SESSION['user'])){
			$query = $this->questionsModel->DeleteReviewMdl($id);
			if($query){
				$session->setFlashdata('alert', 'success|Success...|Deleted Successfully');
            	return redirect()->to('saved-reviews');
			}
		} else {
			return redirect()->to('admin');
		}
	}



	public function CustomerReview()
	{
		$bill_no = $this->request->getGet('bill_no');
		$data['salesdata'] = $this->questionsModel->getSalesData($bill_no);
		$data['questions'] = $this->questionsModel->AllQuestions();
		$data['checkexist'] = $this->questionsModel->checkBillExist($bill_no);
		return view('review_creation',$data);
	}
	public function SaveReviews()
	{
		$session = session();
		$billNo = $this->request->getPost('billno');
    	$salesMasterId = $this->request->getPost('salesmaster_id');

		$existingReview = $this->questionsModel->checkBillExist($billNo, $salesMasterId);
	    if ($existingReview) {
	        $session->setFlashdata('alert', 'warning|Notice|You have already submitted a review for this bill.');
	        return redirect()->to("customer-review/?bill_no=$billNo");
	    }
		$data = [
        	'bill_no' => $billNo,
        	'sales_master_id' => $salesMasterId,
        	'salesmanId' => $this->request->getPost('salesman_id'),
        	'review_date' => date('Y-m-d')
        ];

		$insertid = $this->questionsModel->InsertReview($data);

		if($insertid){

			$questionIds = $this->request->getPost('qid'); 
	        $starRatings = $this->request->getPost('rating');
	        $textRatings = $this->request->getPost('rating_desc');

	        $detailsData = [];

	        foreach ($questionIds as $qid) {
	            $detailsData[] = [
	                'reviewMaster_id' => $insertid,
	                'question_id'     => $qid,
	                'star_rating'     => isset($starRatings[$qid]) ? $starRatings[$qid] : NULL,
	                'text_rating'     => isset($textRatings[$qid]) ? $textRatings[$qid] : NULL,
	            ];
	        }

	        $this->questionsModel->InsertReviewDetailsBatch($detailsData);

			$session->setFlashdata('alert', 'success|Success...|Review Added Successfully');
        	return redirect()->to("customer-review/?bill_no=$billNo");

		}else{
			$session->setFlashdata('alert', 'error|Oops...|Try Again');
        	return redirect()->to("customer-review/?bill_no=$billNo");
		}	
	}

	public function SalesmanReviewReport()
	{
		$session = session();
		if(!empty($_SESSION['user'])){
			$data['salesmans'] = $this->questionsModel->Salesmanlist();
			return view('salesman_review_report',$data);
		} else {
			return redirect()->to('admin');
		}
	}
	public function SalesmanReviewReportByDate()
	{
		$session = session();
	    if (!empty($_SESSION['user'])) {
	        $fromDate = $this->request->getPost('from_date');
	        $toDate = $this->request->getPost('to_date');
	        $salesman = $this->request->getPost('salesman');

	        $start = $this->request->getPost('start');
	        $length = $this->request->getPost('length');
	        $draw = $this->request->getPost('draw');

	        // Get total count of records before filtering
	        $totalRecords = $this->questionsModel->countSalesmanReviewMasterTotalRecords($fromDate, $toDate, $salesman);

	        // Get filtered data with pagination
	        $report = $this->questionsModel->getSalesmanReviewReport($fromDate, $toDate, $salesman, $start, $length);

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
	
}