<?php 
namespace App\Models;
use CodeIgniter\Model;

class LensCreationModel extends Model
{
	function __construct() {
		$this->db=db_connect();
	}

	public function AllLenses()
	{
		$builder = $this->db->table('tbl_lens_creation');
		$builder->select('*');
		$query = $builder->get();
		return $query->getResult();
	}
	public function InsertLensMdl($data)
	{
		$builder = $this->db->table('tbl_lens_creation');
		$query = $builder->insert($data);
		$insertid = $this->db->insertID();
		if($query){
			return $insertid;
		}else{
			return false;
		}

	}
	public function LensEditMdl($id)
	{
	    $builder = $this->db->table('tbl_lens_creation');
		$builder->select('*');
		$builder->where('lensId', $id);
		return  $builder->get()->getResult(); 
	}
	public function updateLens($data)
	{
		$builder = $this->db->table('tbl_lens_creation');
		$builder->where('lensId',$data['lensId']);
		$query = $builder->update($data);
		if($query){
			return true;
		}else{
			return false;
		}
		
	}
	public function LensDeleteMdl($id)
	{
		$builder = $this->db->table('tbl_lens_creation');
		$builder->where('lensId', $id);
		$query=$builder->delete();
		if($query){
			return true;
		}
		else{
			return false;
		}
	}	
	
}