<?php 
namespace App\Models;
use CodeIgniter\Model;

class PrevilageCardModel extends Model
{
	function __construct() {
		$this->db=db_connect();
	}

	public function InsertPrevilage($data)
	{
		$builder = $this->db->table('tbl_previlage_card');
		$query = $builder->insert($data);
		$insertid = $this->db->insertID();
		if($query){
			return $insertid;
		}else{
			return false;
		}

	}
	public function Allprevilages()
	{
		$builder = $this->db->table('tbl_previlage_card');
		$builder->select('*');
		$query = $builder->get();
		return $query->getResult();
	}
	public function getPrevilageData($id)
	{
	    return $this->db->table('tbl_previlage_card') 
	                    ->select('*')
	                    ->where('id', $id)
	                    ->get()
	                    ->getRow();  
	}
	public function updatePrevilages($data)
	{
		$builder = $this->db->table('tbl_previlage_card');
		$builder->where('id',$data['id']);
		$query = $builder->update($data);
		if($query){
			return true;
		}else{
			return false;
		}
		
	}
	public function PrevilageDeleteMdl($id)
	{
		$builder = $this->db->table('tbl_previlage_card');
		$builder->where('id', $id);
		$query=$builder->delete();
		if($query){
			return true;
		}
		else{
			return false;
		}
	}	

	



	public function AllprevilageTypes()
	{
		$builder = $this->db->table('tbl_privilege_card_type');
		$builder->select('*');
		$query = $builder->get();
		return $query->getResult();
	}
	public function InsertPrevilageTypes($data)
	{
		$builder = $this->db->table('tbl_privilege_card_type');
		$query = $builder->insert($data);
		$insertid = $this->db->insertID();
		if($query){
			return $insertid;
		}else{
			return false;
		}

	}
	public function getPrevilageTypeData($id)
	{
	    return $this->db->table('tbl_privilege_card_type') 
	                    ->select('*')
	                    ->where('id', $id)
	                    ->get()
	                    ->getRow();  
	}
	public function updatePrevilageTypes($data)
	{
		$builder = $this->db->table('tbl_privilege_card_type');
		$builder->where('id',$data['id']);
		$query = $builder->update($data);
		if($query){
			return true;
		}else{
			return false;
		}
	}
	public function PrevilageTypeDeleteMdl($id)
	{
		$builder = $this->db->table('tbl_privilege_card_type');
		$builder->where('id', $id);
		$query=$builder->delete();
		if($query){
			return true;
		}
		else{
			return false;
		}
	}	
	
}