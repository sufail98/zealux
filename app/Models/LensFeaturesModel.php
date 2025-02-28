<?php 
namespace App\Models;
use CodeIgniter\Model;

class LensFeaturesModel extends Model
{
	function __construct() {
		$this->db=db_connect();
	}

	public function InsertLensFeature($data)
	{
		$builder = $this->db->table('tbl_lens_feature');
		$query = $builder->insert($data);
		$insertid = $this->db->insertID();
		if($query){
			return $insertid;
		}else{
			return false;
		}

	}
	public function AllLensFeatures()
	{
		$builder = $this->db->table('tbl_lens_feature');
		$builder->select('*');
		$query = $builder->get();
		return $query->getResult();
	}
	public function getLensFeatureDetails($id)
	{
	    return $this->db->table('tbl_lens_feature') 
	                    ->select('*')
	                    ->where('id', $id)
	                    ->get()
	                    ->getRow();  
	}
	public function updateLensFeatures($data)
	{
		$builder = $this->db->table('tbl_lens_feature');
		$builder->where('id',$data['id']);
		$query = $builder->update($data);
		if($query){
			return true;
		}else{
			return false;
		}
		
	}
	public function LensFeatureDeleteMdl($id)
	{
		$builder = $this->db->table('tbl_lens_feature');
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