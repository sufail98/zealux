<?php 
namespace App\Models;
use CodeIgniter\Model;

class BreakageWarrantyModel extends Model
{
	function __construct() {
		$this->db=db_connect();
	}

	public function AllWarranty()
	{
		$builder = $this->db->table('tbl_warrenty_card');
		$builder->select('*');
		$query = $builder->get();
		return $query->getResult();
	}
	public function InsertWarranty($data)
	{
		$builder = $this->db->table('tbl_warrenty_card');
		$query = $builder->insert($data);
		$insertid = $this->db->insertID();
	    return $query ? $insertid : false;
	}
	public function WarrantyEditMdl($id)
	{
		$builder = $this->db->table('tbl_warrenty_card');
		$builder->select('*');
		$builder->where('id', $id);
		return $builder->get()->getResult();
	}
	public function updateWarranty($data)
	{
		$builder = $this->db->table('tbl_warrenty_card');
		$builder->where('id',$data['id']);
		$query = $builder->update($data);
		if($query){
			return true;
		}else{
			return false;
		}
		
	}
	public function WarrantyDeleteMdl($id)
	{
		$builder = $this->db->table('tbl_warrenty_card');
		$builder->where('id', $id);
		$query=$builder->delete();
		if($query){
			return true;
		}
		else{
			return false;
		}
	}	
	public function getWarrantyRateMdl($grandTotal)
	{
	    $builder = $this->db->table('tbl_warrenty_card');
		$builder->select('*');
		$builder->where('price_from <=', $grandTotal);
		$builder->where('price_to >=', $grandTotal);
		return $builder->get()->getResult();
	}
	
}