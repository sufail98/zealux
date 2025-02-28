<?php 
namespace App\Models;
use CodeIgniter\Model;

class SalesmanModel extends Model
{
	function __construct() {
		$this->db=db_connect();
	}

	public function AllSalesman()
	{
		$builder = $this->db->table('tbl_salesman');
		$builder->select('*');
		$query = $builder->get();
		return $query->getResult();
	}
	public function InsertSalesman($data)
	{
		$builder = $this->db->table('tbl_salesman');
		$query = $builder->insert($data);
		$insertid = $this->db->insertID();
		if($query){
			return $insertid;
		}else{
			return false;
		}
	}
	public function getSalesmanData($id)
	{
	    return $this->db->table('tbl_salesman') 
	                    ->select('*')
	                    ->where('id', $id)
	                    ->get()
	                    ->getRow();  
	}
	public function updateSalesmans($data)
	{
		$builder = $this->db->table('tbl_salesman');
		$builder->where('id',$data['id']);
		$query = $builder->update($data);
		if($query){
			return true;
		}else{
			return false;
		}
		
	}
	public function SalesmanDeleteMdl($id)
	{
		$builder = $this->db->table('tbl_salesman');
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