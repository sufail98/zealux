<?php 
namespace App\Models;
use CodeIgniter\Model;

class UserModel extends Model
{
	function __construct() {
		$this->db=db_connect();
	}

	public function AllUsers()
	{
		$builder = $this->db->table('tbl_login');
		$builder->select('*');
		$query = $builder->get();
		return $query->getResult();
	}
	public function InsertUser($data)
	{
		$builder = $this->db->table('tbl_login');
		$query = $builder->insert($data);
		$insertid = $this->db->insertID();
		if($query){
			return $insertid;
		}else{
			return false;
		}

	}
	public function UserEditMdl($id)
	{
		$builder = $this->db->table('tbl_login');
		$builder->select('*');
		$builder->where('id', $id);
		return $builder->get()->getResult();
	}
	public function updateUser($data)
	{
		$builder = $this->db->table('tbl_login');
		$builder->where('id',$data['id']);
		$query = $builder->update($data);
		if($query){
			return true;
		}else{
			return false;
		}
		
	}

	public function UserDeleteMdl($id)
	{
		$builder = $this->db->table('tbl_login');
		$builder->where('id', $id);
		$query=$builder->delete();
		if($query){
			return true;
		}
		else{
			return false;
		}
	}	
	public function checkUser($username)
	{
		return $this->db->table('tbl_login')
        ->where('username', $username)
        ->get()
        ->getRow();
	}
	
	
}