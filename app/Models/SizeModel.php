<?php 
namespace App\Models;
use CodeIgniter\Model;

class SizeModel extends Model
{
	function __construct() {
		$this->db=db_connect();
	}

	public function AllSizes()
	{
		$builder = $this->db->table('tbl_size');
		$builder->select('*');
		$query = $builder->get();
		return $query->getResult();
	}
	public function InsertSize($data)
	{
		$builder = $this->db->table('tbl_size');
		$query = $builder->insert($data);
		$insertid = $this->db->insertID();
		if($query){
			return $insertid;
		}else{
			return false;
		}

	}
	public function getsizeDetails($id)
	{
	    return $this->db->table('tbl_size') 
	                    ->select('*')
	                    ->where('id', $id)
	                    ->get()
	                    ->getRow();  
	}
	public function updateSize($data)
	{
		$builder = $this->db->table('tbl_size');
		$builder->where('id',$data['id']);
		$query = $builder->update($data);
		if($query){
			return true;
		}else{
			return false;
		}
		
	}
	public function SizeDeleteMdl($id)
	{
		$builder = $this->db->table('tbl_size');
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