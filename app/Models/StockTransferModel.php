<?php 
namespace App\Models;
use CodeIgniter\Model;

class StockTransferModel extends Model
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
	public function Add_StockTransfer($data)
	{
		$builder = $this->db->table('tbl_stock_transfer_master');
		$query = $builder->insert($data);
		$insertid = $this->db->insertID();
	    return $query ? $insertid : false;
	}
	public function InsertStockTransferplitMdl($data1)
	{
		$builder = $this->db->table('tbl_stock_transfer_details');
		$query = $builder->insertBatch($data1);
		return $query ? true : false;
	}
	public function AddStock($data)
	{
		$builder = $this->db->table('tbl_stock');
		$query = $builder->insertBatch($data);
		return $query ? true : false;
	}
	public function countTotalRecords($fromDate, $toDate, $allreport, $from_store, $to_store)
	{
	    $builder = $this->db->table('tbl_stock_transfer_master');
	    $builder->select('COUNT(*) as total');
	    if (!empty($from_store)) {
	    	$builder->where('from_store', $from_store);
		}

		if (!empty($to_store)) {
	    	$builder->where('to_store', $to_store);
		}

	    if ($allreport != 1) {
	       $builder->where('transfer_date >=', $fromDate);
	       $builder->where('transfer_date <=', $toDate);
	    } 
	    return $builder->get()->getRow()->total;
	}
	public function getTransferReport($fromDate, $toDate, $allreport, $from_store, $to_store, $start, $length, $searchValue = '')
	{
	    $builder = $this->db->table('tbl_stock_transfer_master m');
	    $builder->select('m.*, s.store_name AS from_store_name, t.store_name AS to_store_name');
	    $builder->join('tbl_store s', 's.storeId = m.from_store');
	    $builder->join('tbl_store t', 't.storeId = m.to_store');

	    if (!empty($from_store)) {
	    	$builder->where('m.from_store', $from_store);
		}

		if (!empty($to_store)) {
	    	$builder->where('to_store', $to_store);
		}

	    if ($allreport != 1) {
	      $builder->where('m.transfer_date >=', $fromDate);
	      $builder->where('m.transfer_date <=', $toDate); 
	    } 

	    if (!empty($searchValue)) {
	        $builder->groupStart();
	        $builder->like('m.transfer_date', $searchValue);
	        $builder->orLike('s.store_name', $searchValue);
	        $builder->groupEnd();
	    }

	    $builder->groupBy('m.tid');
	    $builder->orderBy('m.tid', 'DESC');
	    $builder->limit($length, $start);
	    return $builder->get()->getResult();
	}
	public function StockTransferEditMdl($id)
	{
		$builder = $this->db->table('tbl_stock_transfer_master');
		$builder->select('*');
		$builder->where('tid', $id);
		return $builder->get()->getResult();
	}
	public function StockTransferSplitEditMdl($id)
	{
		$builder = $this->db->table('tbl_stock_transfer_details d');
		$builder->select('*');
		$builder->join('tbl_stock_transfer_master m','m.tid = d.stock_transferId');
		$builder->where('d.stock_transferId', $id);
		return  $builder->get()->getResult();
	}
	public function UpdateStockTransferMaster($data)
	{
		$builder = $this->db->table('tbl_stock_transfer_master');
		$builder->where('tid',$data['tid']);
		$query = $builder->update($data);
		return $query ? true : false;
	}
	public function UpdateStockTransfersplitMdl($data1)
	{
		$builder = $this->db->table('tbl_stock_transfer_details');
		$builder->where('stock_transferId',$data1[0]['stock_transferId']);
		$deleteResult = $builder->delete();

		if($deleteResult){
			$builder = $this->db->table('tbl_stock_transfer_details');
			$query = $builder->insertBatch($data1);
			return $query ? true : false;
		}
	}
	public function Delete_stock($id)
	{
		$builder = $this->db->table('tbl_stock');
		$builder->where('voucher_no', $id);
		$builder->where('voucher_type', 'stock transfer');
		$query=$builder->delete();
		return $query ? true : false;
	}
	public function DeleteStockTransferMdl($id)
	{
	    $builder = $this->db->table('tbl_stock_transfer_master');

	    if ($builder->where('tid', $id)->delete()) {

	        $builder = $this->db->table('tbl_stock_transfer_details');
	        if ($builder->where('stock_transferId', $id)->delete()) {

	            $builder = $this->db->table('tbl_stock');
	            $builder->where('voucher_no', $id)
	                    ->where('document_no', $id)
	                    ->where('voucher_type', 'stock transfer')
	                    ->delete();
	            return true; 
	        }
	    }

	    return false;
	}
	
}