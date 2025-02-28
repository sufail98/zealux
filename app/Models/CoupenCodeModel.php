<?php 
namespace App\Models;
use CodeIgniter\Model;

class CoupenCodeModel extends Model
{
	function __construct() {
		$this->db=db_connect();
	}

	public function AllCoupenCode()
	{
		$builder = $this->db->table('tbl_coupen');
		$builder->select('*');
		$query = $builder->get();
		return $query->getResult();
	}
	public function InsertCoupenCode($data)
	{
		$builder = $this->db->table('tbl_coupen');
		$query = $builder->insert($data);
		$insertid = $this->db->insertID();
		if($query){
			return $insertid;
		}else{
			return false;
		}
	}
	public function getCoupenCodeData($id)
	{
	    return $this->db->table('tbl_coupen') 
	                    ->select('*')
	                    ->where('id', $id)
	                    ->get()
	                    ->getRow();  
	}
	public function updateCoupenCodes($data)
	{
		$builder = $this->db->table('tbl_coupen');
		$builder->where('id',$data['id']);
		$query = $builder->update($data);
		if($query){
			return true;
		}else{
			return false;
		}
		
	}
	public function CoupenCodeDeleteMdl($id)
	{
		$builder = $this->db->table('tbl_coupen');
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