<?php 
namespace App\Models;
use CodeIgniter\Model;

class FeaturesModel extends Model
{
	function __construct() {
		$this->db=db_connect();
	}

	public function InsertFeature($data)
	{
		$builder = $this->db->table('tbl_features');
		$query = $builder->insert($data);
		$insertid = $this->db->insertID();
		if($query){
			return $insertid;
		}else{
			return false;
		}

	}
	public function AllFeatures()
	{
		$builder = $this->db->table('tbl_features');
		$builder->select('*');
		$query = $builder->get();
		return $query->getResult();
	}
	public function getFeatureDetails($id)
	{
	    return $this->db->table('tbl_features') 
	                    ->select('*')
	                    ->where('id', $id)
	                    ->get()
	                    ->getRow();  
	}
	public function updateFeatures($data)
	{
		$builder = $this->db->table('tbl_features');
		$builder->where('id',$data['id']);
		$query = $builder->update($data);
		if($query){
			return true;
		}else{
			return false;
		}
		
	}
	public function FeatureDeleteMdl($id)
	{
		$builder = $this->db->table('tbl_features');
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