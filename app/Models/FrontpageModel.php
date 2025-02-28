<?php 
namespace App\Models;
use CodeIgniter\Model;

class FrontpageModel extends Model
{
	function __construct() {
		$this->db=db_connect();
	}
	
	public function AdminLoginMdl($data)
	{
		$builder = $this->db->table('tbl_login');
		$builder->where('username',$data['username']);
		$builder->where('password',$data['password']);
		$query=$builder->get();
		if (count($query->getResultArray()) ==1 ){
			return $query->getRowArray();
		}else{
			return false;
		}
	}
	
	
}