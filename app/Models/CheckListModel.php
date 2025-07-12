<?php 
namespace App\Models;
use CodeIgniter\Model;

class CheckListModel extends Model
{
	function __construct() {
		$this->db=db_connect();
		date_default_timezone_set('Asia/Kolkata');
	}

	public function AllChecklist()
	{
		$builder = $this->db->table('tbl_checklist_questions');
		$builder->select('*');
		$builder->orderBy('order_to_display', 'ASC');
		$query = $builder->get();
		return $query->getResult();
	}
	public function InsertCheckList($data)
	{
		$builder = $this->db->table('tbl_checklist_questions');
		$query = $builder->insert($data);
		$insertid = $this->db->insertID();
		if($query){
			return $insertid;
		}else{
			return false;
		}
	}
	public function AllTypes()
	{
		$builder = $this->db->table('tbl_checklist_questions');
		$builder->select('type');
		$builder->distinct();
		$builder->orderBy('type', 'ASC');
		$query = $builder->get();
		return $query->getResult();
	}
	public function EditCheckListMdl($id)
	{
		$builder = $this->db->table('tbl_checklist_questions');
		$builder->select('*');
		$builder->where('id', $id);
		return $builder->get()->getResult();
	}
	public function updatechecklistMdl($data)
	{
		$builder = $this->db->table('tbl_checklist_questions');
		$builder->where('id',$data['id']);
		$query = $builder->update($data);
		return $query ? true : false;
	}
	public function CheckListDeleteMdl($id)
	{
		$builder = $this->db->table('tbl_checklist_questions');
		$builder->where('id', $id);
		$query=$builder->delete();
		if($query){
			$builder = $this->db->table('tbl_checklist_answer_details');
			$builder->where('questionId',$id);
			$deleteResult = $builder->delete();
			return true;
		}
		else{
			return false;
		}
	}	
	public function ChecklistQuestionsMdl($qtype)
	{
		$currentTime = date('H:i:s');

	    $builder = $this->db->table('tbl_checklist_questions');
		$builder->select('*');
		$builder->where('type', $qtype);
		$builder->where('from_time <=', $currentTime);
    	$builder->where('to_time >=', $currentTime);
		$builder->orderBy('order_to_display', 'ASC');
		return $builder->get()->getResult();
	}
	public function InsertChecklistmaster($data)
	{
		$builder = $this->db->table('tbl_checklist_answer_master');
		$query = $builder->insert($data);
		$insertid = $this->db->insertID();
		return $query ? $insertid : false;
	}
	public function InsertChecklistDetails($data)
	{
	    return $this->db->table('tbl_checklist_answer_details')->insertBatch($data);
	}
	public function checkUserExist($user)
	{
        $builder = $this->db->table('tbl_checklist_answer_master');
	    $builder->where('user_id', $user);
	    return $builder->get()->getRow();
    }

    public function checkUserTypeExist($user)
	{
		$builder = $this->db->table('tbl_checklist_answer_master m');
	    $builder->select('m.user_id,q.type');
	    $builder->join('tbl_checklist_answer_details d', 'd.answer_masterId = m.id');
	    $builder->join('tbl_checklist_questions q', 'q.id = d.questionId');
	    $builder->where('m.user_id', $user);
	    return $builder->get()->getRow();
    }
     public function countCheckListMasterTotalRecords($fromDate, $allreport)
	{
	    $builder = $this->db->table('tbl_checklist_answer_master');
	    $builder->select('COUNT(*) as total');

	    if ($allreport != 1) {
	      $builder->where('submit_date', $fromDate);
	    } 
	    return $builder->get()->getRow()->total;
	}
	public function getCheckListMasterReport($fromDate, $allreport, $start, $length)
	{
	    $builder = $this->db->table('tbl_checklist_answer_master m');
	    $builder->select('m.*, l.username');
	    $builder->join('tbl_login l', 'l.id = m.user_id');

	    if ($allreport != 1) {
	      $builder->where('m.submit_date >=', $fromDate);
	    }

	    $builder->orderBy('id', 'DESC');
	    $builder->limit($length, $start);
	    return $builder->get()->getResult();
	}
	public function ViewCheckListMdl($id)
	{
		$builder = $this->db->table('tbl_checklist_answer_details d');
		$builder->select('d.*,q.question');
	    $builder->join('tbl_checklist_questions q', 'q.id = d.questionId');
		$builder->where('d.answer_masterId', $id);
		$builder->orderBy('q.order_to_display', 'ASC');
		return $builder->get()->getResult();
	}
	public function checklistsDeleteMdl($id)
	{
		$builder = $this->db->table('tbl_checklist_answer_master');
		$builder->where('id', $id);
		$query=$builder->delete();
		if($query){
			$builder = $this->db->table('tbl_checklist_answer_details');
			$builder->where('answer_masterId',$id);
			$deleteResult = $builder->delete();
			return true;
		}
		else{
			return false;
		}

	}

	
}