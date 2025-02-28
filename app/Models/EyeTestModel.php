<?php 
namespace App\Models;
use CodeIgniter\Model;

class EyeTestModel extends Model
{
	function __construct() {
		$this->db=db_connect();
	}
	public function MaxTestno()
	{
		$query = $this->db->query("SELECT IFNULL(MAX(Testno) + 1, 1) AS maxtestno FROM tbl_eye_test");
	    $result = $query->getRow();

	    return $result->maxtestno;
	}
	public function AllEyeTest($user)
	{
		$builder = $this->db->table('tbl_eye_test');
		$builder->select('*');
		$builder->where('CreatedUser', $user);
		$builder->where('adviceUsage !=', '');
		$builder->where('GPOutside !=', '');
		$query = $builder->get();
		return $query->getResult();
	}
	public function InsertEyeTest($data)
	{
		$builder = $this->db->table('tbl_eye_test');
		$query = $builder->insert($data);
		$insertid = $this->db->insertID();
		if($query){
			return $insertid;
		}else{
			return false;
		}

	}
	public function EyeTestEditMdl($id)
	{
	    $builder = $this->db->table('tbl_eye_test');
		$builder->select('*');
		$builder->where('EyeTestId', $id);
		return  $builder->get()->getResult(); 
	}
	public function UpdateEyeTestMdl($data)
	{
		$builder = $this->db->table('tbl_eye_test');
		$builder->where('EyeTestId',$data['EyeTestId']);
		$query = $builder->update($data);
		if($query){
			return true;
		}else{
			return false;
		}
		
	}
	public function EyeTestDeleteMdl($id)
	{
		$builder = $this->db->table('tbl_eye_test');
		$builder->where('EyeTestId', $id);
		$query=$builder->delete();
		if($query){
			return true;
		}
		else{
			return false;
		}
	}	
	public function Allcustomers($user = '')
	{
		$builder = $this->db->table('tbl_eye_test');
		$builder->select('*');
		$builder->where('CreatedUser', $user);

		$builder->groupStart()
			    ->groupStart()
			        ->where('adviceUsage', '')
			        ->orWhere('adviceUsage IS NULL')
			    ->groupEnd()
			    ->orGroupStart()
			        ->where('GPOutside', '')
			        ->orWhere('GPOutside IS NULL')
			    ->groupEnd()
			->groupEnd();
		$query = $builder->get();
		return $query->getResult();
	}
	
}