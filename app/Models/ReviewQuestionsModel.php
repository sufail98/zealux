<?php 
namespace App\Models;
use CodeIgniter\Model;

class ReviewQuestionsModel extends Model
{
	function __construct() {
		$this->db=db_connect();
	}

	public function AllQuestions()
	{
		$builder = $this->db->table('tbl_review_questions');
		$builder->select('*');
		$builder->orderBy('order_to_display', 'ASC');
		$query = $builder->get();
		return $query->getResult();
	}
	public function InsertQuestions($data)
	{
		$builder = $this->db->table('tbl_review_questions');
		$query = $builder->insert($data);
		$insertid = $this->db->insertID();
		if($query){
			return $insertid;
		}else{
			return false;
		}

	}
	public function EditQuestionsMdl($id)
	{
		$builder = $this->db->table('tbl_review_questions');
		$builder->select('*');
		$builder->where('qid', $id);
		return $builder->get()->getResult();
	}
	public function updateQuestionsMdl($data)
	{
		$builder = $this->db->table('tbl_review_questions');
		$builder->where('qid',$data['qid']);
		$query = $builder->update($data);
		return $query ? true : false;
	}
	public function QuestionsDeleteMdl($id)
	{
		$builder = $this->db->table('tbl_review_questions');
		$builder->where('qid', $id);
		$query=$builder->delete();
		return $query ? true : false;
	}	

	public function getSalesData($id)
	{
		$builder = $this->db->table('tbl_salesmaster');
		$builder->select('*');
		$builder->where('invoice_no', $id);
        $query = $builder->get();
		return $query->getResult();
	}

	public function InsertReview($data)
	{
		$builder = $this->db->table('tbl_review_master');
		$query = $builder->insert($data);
		$insertid = $this->db->insertID();
		return $query ? $insertid : false;
	}
	public function InsertReviewDetailsBatch($data)
	{
	    return $this->db->table('tbl_review_details')->insertBatch($data);
	}
	public function checkBillExist($billNo,$salesMasterId = null)
	{
        $builder = $this->db->table('tbl_review_master');
	    $builder->where('bill_no', $billNo);

	    if ($salesMasterId !== null) {
	        $builder->where('sales_master_id', $salesMasterId);
	    }

	    return $builder->get()->getRow();
    }
    public function countReviewMasterTotalRecords($fromDate, $toDate, $allreport)
	{
	    $builder = $this->db->table('tbl_review_master');
	    $builder->select('COUNT(*) as total');

	    if ($allreport != 1) {
	      $builder->where('review_date >=', $fromDate);
	      $builder->where('review_date <=', $toDate);
	    } 
	    return $builder->get()->getRow()->total;
	}
	public function getReviewMasterReport($fromDate, $toDate, $allreport, $start, $length)
	{
	    $builder = $this->db->table('tbl_review_master r');
	    $builder->select('r.*, s.name as salesman_name');
	    $builder->join('tbl_salesman s', 's.id = r.salesmanId');

	    if ($allreport != 1) {
	      $builder->where('r.review_date >=', $fromDate);
	      $builder->where('r.review_date <=', $toDate);
	    }

	    $builder->orderBy('rid', 'DESC');
	    $builder->limit($length, $start); // Apply pagination
	    return $builder->get()->getResult();
	}
	public function ReviewViewMdl($id)
	{
		$builder = $this->db->table('tbl_review_details d');
		$builder->select('d.*, q.qid, q.question, q.rating_type, q.order_to_display');
	    $builder->join('tbl_review_questions q', 'q.qid = d.question_id');
		$builder->where('d.reviewMaster_id', $id);
	    $builder->orderBy('q.order_to_display', 'ASC');
		return $builder->get()->getResult();
	}
	public function DeleteReviewMdl($id)
	{
		$builder = $this->db->table('tbl_review_master');
		$builder->where('rid', $id);
		$query=$builder->delete();
		if($query){
			$builder = $this->db->table('tbl_review_details');
			$builder->where('reviewMaster_id',$id);
			$deleteResult = $builder->delete();
			return true;
		}
		else{
			return false;
		}
	}
	public function Salesmanlist()
	{
		$builder = $this->db->table('tbl_salesman');
		$builder->select('*');
		$query = $builder->get();
		return $query->getResult();
	}
	public function countSalesmanReviewMasterTotalRecords($fromDate, $toDate, $salesman)
	{
	    $builder = $this->db->table('tbl_review_master');
	    $builder->select('COUNT(*) as total');
	    $builder->where('salesmanId', $salesman);
	    $builder->where('review_date >=', $fromDate);
	    $builder->where('review_date <=', $toDate);
	    return $builder->get()->getRow()->total;
	}
	public function getSalesmanReviewReport($fromDate, $toDate, $salesman, $start, $length)
	{
		$builder = $this->db->table('tbl_review_master sm');
		$builder->select("
		    q.question AS Question,
		    -- Calculate percentage (average rating / 5 * 100)
		    ROUND(AVG(d.star_rating) / 5 * 100, 2) AS Percentage,
		    COUNT(d.star_rating) AS Review_Count,

		    SUM(CASE WHEN d.star_rating = 1 THEN 1 ELSE 0 END) AS `1_Rating_Count`,
		    SUM(CASE WHEN d.star_rating = 2 THEN 1 ELSE 0 END) AS `2_Rating_Count`,
		    SUM(CASE WHEN d.star_rating = 3 THEN 1 ELSE 0 END) AS `3_Rating_Count`,
		    SUM(CASE WHEN d.star_rating = 4 THEN 1 ELSE 0 END) AS `4_Rating_Count`,
		    SUM(CASE WHEN d.star_rating = 5 THEN 1 ELSE 0 END) AS `5_Rating_Count`");
		$builder->join('tbl_review_details d', 'sm.rid = d.reviewMaster_id');
		$builder->join('tbl_review_questions q', 'd.question_id = q.qid');
		$builder->where('sm.review_date >=',  $fromDate);
		$builder->where('sm.review_date <=', $toDate);
		$builder->where('sm.salesmanId', $salesman);
		$builder->groupBy(['sm.salesmanId', 'd.question_id']);
		$builder->orderBy('sm.salesmanId', 'ASC');
		$builder->orderBy('q.qid', 'ASC');
	    $builder->limit($length, $start); 
		$query = $builder->get();
		$result = $query->getResult();

		return $result;
	}
}