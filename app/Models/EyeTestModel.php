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

	public function getFilteredEyeTests($fromDate, $toDate, $allreport, $mobile, $cname, $user, $store_id, $limit, $offset, $searchValue)
	{
	    $builder = $this->db->table('tbl_eye_test');
	    $builder->select('*');
	    $builder->where('adviceUsage !=', '');
	    $builder->where('GPOutside !=', '');
	    $builder->where('store_id', $store_id);

        // if ($user != 1) {
        //     $builder->where('CreatedUser', $user);
        // }
        
	    if ($allreport != 1) {
	        if ($fromDate && $toDate) {
	            $builder->where('Test_date >=', $fromDate);
	            $builder->where('Test_date <=', $toDate);
	        }
	    }else{
	    	if (!empty($mobile)) { 
	            $builder->like('MobileNo1', $mobile);
	        }
	        if (!empty($cname)) {
	            $builder->like('CustomerName', $cname);
	        }
	    }

	    // Apply search filter
	    if (!empty($searchValue)) {
	        $builder->groupStart()
	            ->like('Testno', $searchValue)
	            ->orLike('CustomerName', $searchValue)
	            ->orLike('MobileNo1', $searchValue)
	        ->groupEnd();
	    }

	    $builder->orderBy('EyeTestId', 'DESC');
	    $builder->limit($limit, $offset);

	    return $builder->get()->getResult();
	}

	public function countTotalEyeTests($fromDate, $toDate, $allreport, $mobile, $cname, $user, $store_id)
	{
	    $builder = $this->db->table('tbl_eye_test');
	    $builder->select('COUNT(*) as total');
	    $builder->where('adviceUsage !=', '');
	    $builder->where('GPOutside !=', '');
	    $builder->where('store_id', $store_id);

	    if ($allreport != 1) {
	        // if ($user != 1) {
	        //     $builder->where('CreatedUser', $user);
	        // }
	        if ($fromDate && $toDate) {
	            $builder->where('Test_date >=', $fromDate);
	            $builder->where('Test_date <=', $toDate);
	        }
	    }else{
	    	if (!empty($mobile)) { 
	            $builder->like('MobileNo1', $mobile);
	        }
	        if (!empty($cname)) {
	            $builder->like('CustomerName', $cname);
	        }
	    }

	    return $builder->get()->getRow()->total;
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
		// $builder->where('CreatedUser', $user);

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