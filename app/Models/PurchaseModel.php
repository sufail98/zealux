<?php 
namespace App\Models;
use CodeIgniter\Model;

class PurchaseModel extends Model
{
	function __construct() {
		$this->db=db_connect();
	}

	public function Products()
	{
		$builder = $this->db->table('tbl_product');
		$builder->select('pid,barcode,productName');
		$builder->groupBy('pid');
		$builder->orderBy('productName', 'ASC');
		$query = $builder->get();
		return $query->getResult();
	}
	public function getColorsByProductId($productId)
	{
	    return $this->db->table('tbl_productcolor')
	        ->where('pid', $productId)
	        ->get()
	        ->getResult();
	}
	public function Add_purchase($data)
	{
		$builder = $this->db->table('tbl_purchase_master');
		$query = $builder->insert($data);
		$insertid = $this->db->insertID();
	    return $query ? $insertid : false;
	}
	public function InsertPurchasesplitMdl($data1)
	{
		$builder = $this->db->table('tbl_purchase_details');
		$query = $builder->insertBatch($data1);
		return $query ? true : false;
	}
	public function Add_Stock($data)
	{
		$builder = $this->db->table('tbl_stock');
		$query = $builder->insert($data);
		$insertid = $this->db->insertID();
		if($query){
			return $insertid;
		}else{
			return false;
		}
	}
	public function countTotalRecords($fromDate, $toDate, $allreport, $store_id)
	{
	    $builder = $this->db->table('tbl_purchase_master');
	    $builder->select('COUNT(*) as total');
	    if (!empty($store_id)) {
	    	$builder->where('store_id', $store_id);
		}

	    if ($allreport != 1) {
	       $builder->where('purchase_date >=', $fromDate);
	       $builder->where('purchase_date <=', $toDate);
	    } 
	    return $builder->get()->getRow()->total;
	}
	public function getPurchaseReport($fromDate, $toDate, $allreport, $store_id, $start, $length, $searchValue = '')
	{
	    $builder = $this->db->table('tbl_purchase_master m');
	    $builder->select('m.*, s.store_name');
	    $builder->join('tbl_store s', 's.storeId = m.store_id');
	    if (!empty($store_id)) {
	    	$builder->where('m.store_id', $store_id);
		}

	    if ($allreport != 1) {
	      $builder->where('m.purchase_date >=', $fromDate);
	      $builder->where('m.purchase_date <=', $toDate); 
	    } 

	    if (!empty($searchValue)) {
	        $builder->groupStart();
	        $builder->like('m.purchase_date', $searchValue);
	        $builder->orLike('s.store_name', $searchValue);
	        $builder->groupEnd();
	    }

	    $builder->groupBy('m.purchase_id');
	    $builder->orderBy('m.purchase_id', 'DESC');
	    $builder->limit($length, $start);
	    return $builder->get()->getResult();
	}
	public function PurchaseEditMdl($id)
	{
		$builder = $this->db->table('tbl_purchase_master');
		$builder->select('*');
		$builder->where('purchase_id', $id);
		return $builder->get()->getResult();
	}
	public function PurchaseSplitEditMdl($id)
	{
		$builder = $this->db->table('tbl_purchase_details d');
		$builder->select('*');
		$builder->join('tbl_purchase_master m','m.purchase_id = d.purchaseId');
		$builder->where('d.purchaseId', $id);
		return  $builder->get()->getResult();
	}
	public function UpdatePurchaseMaster($data)
	{
		$builder = $this->db->table('tbl_purchase_master');
		$builder->where('purchase_id',$data['purchase_id']);
		$query = $builder->update($data);
		return $query ? true : false;
	}
	public function UpdatePurchasesplitMdl($data1)
	{
		$builder = $this->db->table('tbl_purchase_details');
		$builder->where('purchaseId',$data1[0]['purchaseId']);
		$deleteResult = $builder->delete();

		if($deleteResult){
			$builder = $this->db->table('tbl_purchase_details');
			$query = $builder->insertBatch($data1);
			return $query ? true : false;
		}
	}
	public function Delete_stock($id)
	{
		$builder = $this->db->table('tbl_stock');
		$builder->where('voucher_no', $id);
		$builder->where('voucher_type', 'purchase');
		$query=$builder->delete();
		return $query ? true : false;
	}
	public function DeletePurchaseMdl($id)
	{
	    $builder = $this->db->table('tbl_purchase_master');

	    if ($builder->where('purchase_id', $id)->delete()) {

	        $builder = $this->db->table('tbl_purchase_details');
	        if ($builder->where('purchaseId', $id)->delete()) {

	            $builder = $this->db->table('tbl_stock');
	            $builder->where('voucher_no', $id)
	                    ->where('document_no', $id)
	                    ->where('voucher_type', 'purchase')
	                    ->delete();
	            return true; 
	        }
	    }

	    return false;
	}
	
}