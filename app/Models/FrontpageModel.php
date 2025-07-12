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
	    $builder->where('username', $data['username']);
		$builder->where('password',$data['password']);
		if(!empty($data['store_id'])){
			$builder->where('store_id',$data['store_id']);
		}

		if(empty($data['store_id'])){
			$builder->where('user_type','super admin');
		}

	    $query = $builder->get();

	    if ($query->getNumRows() == 1) {
	        return $query->getRowArray();
	    } else {
	        return false;
	    }
	}
	public function AllStores($id='')
	{
		$builder = $this->db->table('tbl_store');
		$builder->select('*');
		if($id){
			$builder->where('storeId', $id);
		}
		$query = $builder->get();
		return $query->getResult();
	}
	
	
}