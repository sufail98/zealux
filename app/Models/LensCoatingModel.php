<?php 
namespace App\Models;
use CodeIgniter\Model;

class LensCoatingModel extends Model
{
	function __construct() {
		$this->db=db_connect();
	}

	public function AllLensCoating()
	{
		$builder = $this->db->table('tbl_lens_coating');
		$builder->select('*');
		$query = $builder->get();
		return $query->getResult();
	}
	public function InsertCoatingMdl($data)
	{
		$builder = $this->db->table('tbl_lens_coating');
		$query = $builder->insert($data);
		$insertid = $this->db->insertID();
		if($query){
			return $insertid;
		}else{
			return false;
		}

	}
	public function CoatingEditMdl($id)
	{
	    $builder = $this->db->table('tbl_lens_coating');
		$builder->select('*');
		$builder->where('id', $id);
		return  $builder->get()->getResult(); 
	}
	public function updateCoating($data)
	{
		$builder = $this->db->table('tbl_lens_coating');
		$builder->where('id',$data['id']);
		$query = $builder->update($data);
		if($query){
			return true;
		}else{
			return false;
		}
		
	}
	public function CoatingDeleteMdl($id)
	{
		$builder = $this->db->table('tbl_lens_coating');
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