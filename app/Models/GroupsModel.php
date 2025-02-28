<?php 
namespace App\Models;
use CodeIgniter\Model;

class GroupsModel extends Model
{
	function __construct() {
		$this->db=db_connect();
	}

	public function InsertGroup($data)
	{
		$builder = $this->db->table('tbl_group');
		$query = $builder->insert($data);
		$insertid = $this->db->insertID();
		if($query){
			return $insertid;
		}else{
			return false;
		}

	}
	public function AllGroups()
	{
		$builder = $this->db->table('tbl_group');
		$builder->select('*');
		$query = $builder->get();
		return $query->getResult();
	}
	public function getGroupDetails($id)
	{
	    return $this->db->table('tbl_group') 
	                    ->select('*')
	                    ->where('id', $id)
	                    ->get()
	                    ->getRow();  
	}
	public function updateGroups($data)
	{
		$builder = $this->db->table('tbl_group');
		$builder->where('id',$data['id']);
		$query = $builder->update($data);
		if($query){
			return true;
		}else{
			return false;
		}
		
	}
	public function GroupDeleteMdl($id)
	{
		$builder = $this->db->table('tbl_group');
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