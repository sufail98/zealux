<?php 
namespace App\Models;
use CodeIgniter\Model;

class LensModel extends Model
{
	function __construct() {
		$this->db=db_connect();
	}

	public function AllLenses()
	{
		$builder = $this->db->table('tbl_lens');
		$builder->select('*');
		$query = $builder->get();
		return $query->getResult();
	}
	public function InsertLens($data)
	{
		$builder = $this->db->table('tbl_lens');
		$query = $builder->insert($data);
		$insertid = $this->db->insertID();
		if($query){
			return $insertid;
		}else{
			return false;
		}

	}
	public function getlensDetails($id)
	{
	    return $this->db->table('tbl_lens') 
	                    ->select('*')
	                    ->where('id', $id)
	                    ->get()
	                    ->getRow();  
	}
	public function updateLens($data)
	{
		$builder = $this->db->table('tbl_lens');
		$builder->where('id',$data['id']);
		$query = $builder->update($data);
		if($query){
			return true;
		}else{
			return false;
		}
		
	}
	public function LensDeleteMdl($id)
	{
		$builder = $this->db->table('tbl_lens');
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