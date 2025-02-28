<?php 
namespace App\Models;
use CodeIgniter\Model;

class SettingsModel extends Model
{
	function __construct() {
		$this->db=db_connect();
	}

	public function getUpiDetails($id)
	{
		$builder = $this->db->table('tbl_upi');
		$builder->select('*');
		$builder->where('id', $id);
        $query = $builder->get();
		return $query->getResult();
	}
	public function updateUPIdata($data)
	{
		$builder = $this->db->table('tbl_upi');
		$builder->where('id',$data['id']);
		$query = $builder->update($data);
		if($query){
			return true;
		}else{
			return false;
		}
		
	}
	public function getUpidata($id)
	{
	    return $this->db->table('tbl_upi') 
	                    ->select('*')
	                    ->where('id', $id)
	                    ->get()
	                    ->getRow();  
	}
	
}