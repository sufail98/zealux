<?php 
namespace App\Models;
use CodeIgniter\Model;

class SalesModel extends Model
{
	function __construct() {
		$this->db=db_connect();
	}
	
	public function productDetails($id)
	{
		$builder = $this->db->table('tbl_product p');
		$builder->select('p.*,g.group_name');
		$builder->join('tbl_group g','g.id = p.group');
		$builder->where('p.pid', $id);
		$builder->groupBy('p.pid');
		$query = $builder->get();
		$productDetails = $query->getResult();

		$builder = $this->db->table('tbl_productcolor');
        $builder->select('*');
        $builder->where('pid', $id);
        $query = $builder->get();
        $images = $query->getResult();

        $result = [
	        'product_details' => $productDetails,  
	        'images' => $images         
	    ];

        return $result;
	}
	public function ColorWiseStock($pid, $color)
	{
	    $subQuery = $this->db->table('tbl_stock')
	        ->select('pid, color, SUM(inward_qty) AS total_in, SUM(outward_qty) AS total_out')
	        ->groupBy('pid, color'); 

	    $builder = $this->db->table('tbl_product p');
	    $builder->select('
	        p.*, 
	        g.group_name, 
	        IFNULL(stock.total_in - stock.total_out, 0) AS stock_count
	    ');
	    $builder->join('tbl_group g', 'g.id = p.group');
	    $builder->join('tbl_productcolor c', 'c.pid = p.pid', 'left');
	    $builder->join("({$subQuery->getCompiledSelect()}) AS stock", 'stock.pid = p.pid AND stock.color = "'.$color.'"', 'left');
	    $builder->where('p.pid', $pid);
	    $builder->groupBy('p.pid');
	    $query = $builder->get();
	    return $query->getResult();
	}
	public function stockReportMdl($name, $barcode, $group, $model, $store_id)
	{
		$subQuery = $this->db->table('tbl_stock')
		    ->select('pid, color,store_id, SUM(inward_qty) AS total_in, SUM(outward_qty) AS total_out')
		    ->where('store_id', $store_id)
		    ->groupBy(['pid', 'color']);

		$builder = $this->db->table('tbl_product p');
		$builder->select('
		    p.*, 
		    g.group_name, 
		    stock.color, 
		    IFNULL(stock.total_in, 0) AS total_in,
		    IFNULL(stock.total_out, 0) AS total_out,
		    IFNULL(stock.total_in - stock.total_out, 0) AS stock_count
		');
		$builder->join('tbl_group g', 'g.id = p.group', 'left');
		$builder->join('tbl_productcolor c', 'c.pid = p.pid', 'left');
		$builder->join("({$subQuery->getCompiledSelect()}) AS stock", 'stock.pid = p.pid AND stock.color = c.colorName', 'left');

		if(!empty($name)){
			$builder->where('p.productName', $name);
		}

		if(!empty($barcode)){
			$builder->where('p.barcode', $barcode);
		}

		if(!empty($group)){
			$builder->where('p.group', $group);
		}

		if(!empty($model)){
			$builder->where('p.model', $model);
		}

		$builder->orderBy('p.pid', 'DESC');
		$builder->orderBy('c.colorName', 'ASC');

		$query = $builder->get();
		return $query->getResult();

	}
	public function getImagesByProductIds($productIds)
    {
        $builder = $this->db->table('tbl_productcolor');
		$builder->select('pid, colorName, colorImage'); 
		$builder->whereIn('pid', $productIds);
		$query = $builder->get();
		$results = $query->getResult();

		$images = [];
		foreach ($results as $row) {
		    // Group images by product id and color
		    $images[$row->pid][$row->colorName][] = $row->colorImage;
		}

		return $images;

    }
	public function similarProducts($id)
	{
		$builder = $this->db->table('tbl_product p');
		$builder->select('p.pid, p.productName, c.colorImage');
		$builder->join('tbl_productcolor c', 'c.pid = p.pid', 'left'); 
		$builder->where('p.group', $id);
		$builder->groupBy('p.pid');
		$builder->orderBy('p.pid', 'DESC'); 
		$builder->limit(3); 
		$builder->offset(1);
		$query = $builder->get();
		$productDetails = $query->getResult();

		$result = [];

		foreach ($productDetails as $product) {
		    $result[] = [
		        'pid' => $product->pid,
		        'productName' => $product->productName,
		        'colorImage' => $product->colorImage
		    ];
		}

        return $result;

	}
	public function Allusers()
	{
		$builder = $this->db->table('tbl_eye_test');
		$builder->select('*');
		$query = $builder->get();
		return $query->getResult();
	}
	public function EyetestDetails($id)
	{
	    return $this->db->table('tbl_eye_test') 
	                    ->select('*')
	                    ->where('EyeTestId', $id)
	                    ->get()
	                    ->getRow();  
	}
	public function getCouponcode($couponCode)
	{
	    return $this->db->table('tbl_coupen') 
	                    ->select('*')
	                    ->where('coupen_code', $couponCode)
	                    ->get()
	                    ->getRow();  
	}
	public function getLensListById($id) {
	    return $this->db->table('tbl_lens_creation')
	                    ->where('lens', $id)
	                    ->get()
	                    ->getResult();
	}
	public function getDelivery_days($id)
	{
	    return $this->db->table('tbl_lens_creation') 
	                    ->select('*')
	                    ->where('lensId', $id)
	                    ->get()
	                    ->getRow();  
	}
	public function Salesmanlist()
	{
		$builder = $this->db->table('tbl_salesman');
		$builder->select('*');
		$query = $builder->get();
		return $query->getResult();
	}
	public function PrevilageUsers($query)
	{
		$builder = $this->db->table('tbl_previlage_card');
		$builder->select('*');
		$builder->like('name', $query);
		$builder->orLike('phone', $query);
		$query = $builder->get();
		return $query->getResult();
	}
	public function PrevilageUserById($id) {
        return $this->db->table('tbl_previlage_card') 
        ->select('*')
        ->where('id', $id)
        ->get()
        ->getRow();
	}
	public function insertSalesMaster($data)
	{
		$builder = $this->db->table('tbl_salesmaster');
		$query = $builder->insert($data);
		$insertid = $this->db->insertID();
		if($query){
			return $insertid;
		}else{
			return false;
		}

	}
	public function Add_InvoiceReceipt($data)
	{
		$builder = $this->db->table('tbl_invoicereceipt');
		$query = $builder->insert($data);
		$insertid = $this->db->insertID();
		if($query){
			return $insertid;
		}else{
			return false;
		}

	}
	public function insertSalesMasterHistory($data)
	{
		$builder = $this->db->table('tbl_salesmaster_history');
		$query = $builder->insert($data);
		$insertid = $this->db->insertID();
		if($query){
			return $insertid;
		}else{
			return false;
		}

	}
	public function insertSalesDetailHistory($data)
	{
	    $builder = $this->db->table('tbl_sales_details_history');
	    $query = $builder->insertBatch($data);
	    return $query ? true : false;
	}
	public function insertSalesInvoiceHistory($data)
	{
	    $builder = $this->db->table('tbl_invoicereceipt_history');
	    $query = $builder->insertBatch($data);
	    return $query ? true : false;
	}
	public function insertSalesDetail($data)
	{
	    $builder = $this->db->table('tbl_sales_details');
	    $query = $builder->insertBatch($data);
	    return $query ? true : false;
	}
	public function MaxInvoiceno()
	{
		$query = $this->db->query("SELECT IFNULL(MAX(invoice_no) + 1, 1) AS maxid FROM tbl_salesmaster");
	    $result = $query->getRow();
	    return $result->maxid;
	}
	public function MaxHistoryId()
	{
		$query = $this->db->query("SELECT IFNULL(MAX(history_id) + 1, 1) AS maxid FROM tbl_salesmaster_history");
	    $result = $query->getRow();
	    return $result->maxid;
	}
	public function updateFrameMeasurement($eyeTestId, $frameMeasurement, $Prescription) {
		$builder = $this->db->table('tbl_eye_test');
		$builder->where('EyeTestId', $eyeTestId);
		return $builder->update(['frame_measurement' => $frameMeasurement, 'Prescription' => $Prescription]);
	}
	public function SalesReportData($id)
	{
		$builder = $this->db->table('tbl_salesmaster');
		$builder->select('*');
		$builder->where('master_id', $id);
        $query = $builder->get();
		return $query->getResult();
	}
	public function SalesReportDetailsData($id)
	{
		$builder = $this->db->table('tbl_sales_details');
		$builder->select('*');
		$builder->where('id', $id);
        $query = $builder->get();
		return $query->getResult();
	}
	public function SalesDetailsReportData($id)
	{
		$builder = $this->db->table('tbl_sales_details d');
		$builder->select('d.*,p.productName,l.lensName,c.coating_name,c.description,e.Prescription,e.frame_measurement');
		$builder->join('tbl_product p','p.pid = d.pid','left');
		$builder->join('tbl_lens_creation l','l.lensId = d.lensid','left');
		$builder->join('tbl_lens_coating c','c.id = d.coating_id','left');
		$builder->join('tbl_eye_test e','e.EyeTestId = d.eyetest_id','left');
		$builder->where('d.sales_masterId', $id);
		$builder->where('d.return_status', 0);
        $query = $builder->get();
		return $query->getResult();
	}
	public function SalesInvoiceData($id)
	{
		$builder = $this->db->table('tbl_invoicereceipt');
		$builder->select('*');
		$builder->where('sales_masterId', $id);
        $query = $builder->get();
		return $query->getResult();
	}
	public function SumofPaidAmt($id)
	{
		$builder = $this->db->table('tbl_invoicereceipt');
		$builder->select('SUM(PaidAmount) as totalPaid');
		$builder->where('InvoiceNo', $id);
        $query = $builder->get();
		$result = $query->getResult();
		$totalPaid = $result[0]->totalPaid ?? 0;
		return $totalPaid;
	}
	// public function getSalesReport($fromDate, $toDate, $status, $allreport, $mobile, $cname, $user)
	// {
	//     $builder = $this->db->table('tbl_salesmaster s');
	// 	$builder->select('s.*, SUM(i.PaidAmount) as totalPaid');
	// 	$builder->join('tbl_invoicereceipt i', 'i.InvoiceNo = s.invoice_no', 'left');
	// 	if($user != 1){
	// 		$builder->where('s.CreatedUser', $user);
	// 	}

	// 	if ($allreport != 1) {
	// 		if($status == 1 || $status == 0){
	// 			$builder->where('s.delivered', $status);
	// 		}

	// 		if ($fromDate && $toDate) {
	// 		    $builder->where('s.invoice_date >=', $fromDate);
	// 		    $builder->where('s.invoice_date <=', $toDate);
	// 		}
	// 	}else{
	// 		if (!empty($mobile)) { 
	//             $builder->like('s.phone', $mobile);
	//         }
	//         if (!empty($cname)) {
	//             $builder->like('s.customer_name', $cname);
	//         }
	// 	}

	// 	$builder->groupBy('s.invoice_no'); 
	// 	return $builder->get()->getResult();

	// }
	public function getSalesReport($fromDate, $toDate, $status, $allreport, $mobile, $cname, $user, $store_id, $start, $length)
	{
	    $builder = $this->db->table('tbl_salesmaster s');
	    $builder->select('s.*, SUM(i.PaidAmount) as totalPaid');
	    $builder->join('tbl_invoicereceipt i', 'i.InvoiceNo = s.invoice_no', 'left');
	    $builder->where('s.store_id', $store_id);

	    // if ($_SESSION['user_type'] != 'admin' && $_SESSION['user_type'] != 'super admin') {
	    //     $builder->where('s.CreatedUser', $user);
	    // }

	    if ($allreport != 1) {
	        if ($status == 1 || $status == 0) {
	            $builder->where('s.delivered', $status);
	        }

	        if ($fromDate && $toDate) {
	            $builder->where('s.invoice_date >=', $fromDate);
	            $builder->where('s.invoice_date <=', $toDate);
	        }
	    } else {
	        if (!empty($mobile)) {
	            $builder->like('s.phone', $mobile);
	        }
	        if (!empty($cname)) {
	            $builder->like('s.customer_name', $cname);
	        }
	    }

	    $builder->groupBy('s.invoice_no');
	    $builder->orderBy('master_id', 'DESC');
	    $builder->limit($length, $start); // Apply pagination
	    return $builder->get()->getResult();
	}

	public function countReviewTotalRecords($fromDate, $toDate, $allreport, $user)
	{
	    $builder = $this->db->table('tbl_salesmaster');
	    $builder->select('COUNT(*) as total');
	    $builder->where('delivered', 1);
	   // if ($_SESSION['user_type'] != 'admin' && $_SESSION['user_type'] != 'super admin') {
	   //      $builder->where('CreatedUser', $user);
	   //  }

	    if ($allreport != 1) {
	      $builder->where('invoice_date >=', $fromDate);
	      $builder->where('invoice_date <=', $toDate);
	    } 
	    return $builder->get()->getRow()->total;
	}
	public function getCustomerReviewReport($fromDate, $toDate, $allreport, $user, $start, $length)
	{
	    $builder = $this->db->table('tbl_salesmaster');
	    $builder->select('*');
	    $builder->where('delivered', 1);

	    // if ($_SESSION['user_type'] != 'admin' && $_SESSION['user_type'] != 'super admin') {
	    //     $builder->where('CreatedUser', $user);
	    // }

	    if ($allreport != 1) {
	      $builder->where('invoice_date >=', $fromDate);
	      $builder->where('invoice_date <=', $toDate);
	    }

	    $builder->groupBy('invoice_no');
	    $builder->orderBy('master_id', 'DESC');
	    $builder->limit($length, $start); // Apply pagination
	    return $builder->get()->getResult();
	}

	public function countTotalRecords($fromDate, $toDate, $status, $allreport, $mobile, $cname, $user, $store_id)
	{
	    $builder = $this->db->table('tbl_salesmaster');
	    $builder->select('COUNT(*) as total');
	    $builder->where('store_id', $store_id);

	    // if ($_SESSION['user_type'] != 'admin' && $_SESSION['user_type'] != 'super admin') {
	    //     $builder->where('CreatedUser', $user);
	    // }

	    if ($allreport != 1) {
	        if ($status == 1 || $status == 0) {
	            $builder->where('delivered', $status);
	        }

	        if ($fromDate && $toDate) {
	            $builder->where('invoice_date >=', $fromDate);
	            $builder->where('invoice_date <=', $toDate);
	        }
	    } else {
	        if (!empty($mobile)) {
	            $builder->like('phone', $mobile);
	        }
	        if (!empty($cname)) {
	            $builder->like('customer_name', $cname);
	        }
	    }
	    return $builder->get()->getRow()->total;
	}

	public function getDeletedSalesReports($fromDate, $toDate, $user, $store_id)
	{
	    $builder = $this->db->table('tbl_salesmaster_history s');
		$builder->select('s.*, SUM(i.PaidAmount) as totalPaid');
		$builder->join('tbl_invoicereceipt_history i', 'i.SalesMaster_historyId = s.history_id', 'left');
		$builder->where('s.store_id', $store_id);

		if($user != 1){
			$builder->where('s.deleted_user', $user);
		}

		if ($fromDate && $toDate) {
		    $builder->where('s.deleted_date >=', $fromDate);
		    $builder->where('s.deleted_date <=', $toDate);
		}

		$builder->groupBy('s.invoice_no'); 
		return $builder->get()->getResult();

	}

	public function getDailyReport($fromDate, $toDate, $pay_mode, $invoice_no, $cutomer, $mobile, $user)
	{
	    $builder = $this->db->table('tbl_invoicereceipt i');
		$builder->select('i.*,s.customer_name,s.phone,s.email');
		$builder->join('tbl_salesmaster s', 's.master_id = i.sales_masterId');
		if($user != 1){
			$builder->where('s.CreatedUser', $user);
		}

		if(!empty($pay_mode)){
			$builder->where('i.PaymentMode', $pay_mode);
		}

		if(!empty($cutomer)){
			$builder->where('s.customer_name', $cutomer);
		}

		if(!empty($mobile)){
			$builder->where('s.phone', $mobile);
		}

		if(!empty($invoice_no)){
			$builder->where('i.InvoiceNo', $invoice_no);
		}

		if ($fromDate && $toDate) {
		    $builder->where('i.master_invoice_date >=', $fromDate);
		    $builder->where('i.master_invoice_date <=', $toDate);
		}

		return $builder->get()->getResult();

	}
	public function SalesmanName($id)
	{
		$salesman = $this->db->table('tbl_salesman')
                    ->where('id', $id)
                    ->get()
                    ->getRow();
		$salesmanName = $salesman ? $salesman->name : '';
	    return $salesmanName;
	}
	public function getHeaderImage($store_id)
	{
		$store = $this->db->table('tbl_store')
                    ->where('storeId', $store_id)
                    ->get()
                    ->getRow();
		$storeImage = $store ? $store->header_image : '';
	    return $storeImage;
	}
	public function updateDeliveredStatus($id) {
		$builder = $this->db->table('tbl_salesmaster');
		$builder->where('master_id', $id);
		return $builder->update(['delivered' => 1]);
	}
	public function InvoiceDeleteMdl($id)
	{
		$builder = $this->db->table('tbl_salesmaster');
		$builder->where('master_id', $id);
		$query=$builder->delete();
		if($query){

			$builder = $this->db->table('tbl_invoicereceipt');
			$builder->where('sales_masterId',$id);
			$deleteReceipt = $builder->delete();

			$builder = $this->db->table('tbl_stock');
			$builder->where('voucher_no',$id);
			$stock = $builder->delete();
			
			$builder = $this->db->table('tbl_sales_details');
			$builder->where('sales_masterId',$id);
			$deleteResult = $builder->delete();
			return true;
		}
		else{
			return false;
		}
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
	public function getBillWiseProfitReport($fromDate, $toDate)
	{
		$builder = $this->db->table('tbl_salesmaster s');
		$builder->select("
		    s.customer_name,
		    s.invoice_no,
		    s.invoice_date,
		    s.master_id,
		    SUM(COALESCE(d.product_rate - d.product_discount, 0) + COALESCE(d.lens_rate - d.lens_discount, 0) + COALESCE(d.coating_rate - d.coating_discount, 0)) AS total_bill_amount,
		    SUM(COALESCE(p.purchase_rate, 0) + COALESCE(l.purchaseRate, 0) + COALESCE(c.purchase_rate, 0)) AS total_purchase_cost,
		    SUM(
		        COALESCE((d.product_rate - d.product_discount) - p.purchase_rate, 0) +
		        COALESCE((d.lens_rate - d.lens_discount) - l.purchaseRate, 0) +
		        COALESCE((d.coating_rate - d.coating_discount) - c.purchase_rate, 0)
		    ) AS total_profit
		");
		$builder->join('tbl_sales_details d', 's.master_id = d.sales_masterId');
		$builder->join('tbl_product p', 'p.pid = d.pid', 'left');
		$builder->join('tbl_lens_creation l', 'l.lensId = d.lensid', 'left');
		$builder->join('tbl_lens_coating c', 'c.id = d.coating_id', 'left');
		$builder->where('s.invoice_date >=',  $fromDate);
		$builder->where('s.invoice_date <=', $toDate);
		$builder->groupBy(['s.master_id', 's.customer_name', 's.invoice_no']);
		$builder->orderBy('s.master_id', 'ASC');

		$query = $builder->get();
		$result = $query->getResult();
		 // echo $builder->getLastQuery();
		return $result;
	}
	public function getAccountSummaryReport($fromDate, $toDate)
	{
		$builder = $this->db->table('tbl_invoicereceipt');
		$builder->select("
		    master_invoice_date,
		    SUM(CASE WHEN PaymentMode = 'cash' THEN PaidAmount ELSE 0 END) AS cash_amount,
		    SUM(CASE WHEN PaymentMode = 'card' THEN PaidAmount ELSE 0 END) AS card_amount,
		    SUM(CASE WHEN PaymentMode = 'gpay' THEN PaidAmount ELSE 0 END) AS gpay_amount,
		    SUM(CASE WHEN PaymentMode = 'credit' THEN PaidAmount ELSE 0 END) AS credit_amount,
		    SUM(PaidAmount) AS total_paid_amount
		");

		$builder->where('master_invoice_date >=',  $fromDate);
		$builder->where('master_invoice_date <=', $toDate);
		$builder->groupBy('master_invoice_date');
		$builder->orderBy('master_invoice_date', 'ASC');
		$query = $builder->get();
		$result = $query->getResult();
		return $result;
	}
	public function privilegeDetails($id)
	{
	    return $this->db->table('tbl_previlage_card') 
	                    ->select('*')
	                    ->where('id', $id)
	                    ->get()
	                    ->getRow();  
	}
	public function coupenDetails($id)
	{
	    return $this->db->table('tbl_coupen') 
	                    ->select('*')
	                    ->where('id', $id)
	                    ->get()
	                    ->getRow();  
	}
	public function TotalPurchaseCount($id)
	{
		$purchase_count = $this->db->table('tbl_salesmaster')
                        ->where('previlage_id', $id)
                        ->countAllResults();
    	return $purchase_count;
	}
	public function getSalesReturn($fromDate, $toDate, $invoice_no, $cutomer, $mobile, $user)
	{
	    $builder = $this->db->table('tbl_salesmaster');
		$builder->select('*');
		// if($user != 1){
		// 	$builder->where('CreatedUser', $user);
		// }
		if(!empty($cutomer)){
			$builder->where('customer_name', $cutomer);
		}

		if(!empty($mobile)){
			$builder->where('phone', $mobile);
		}

		if(!empty($invoice_no)){
			$builder->where('invoice_no', $invoice_no);
		}
		if ($fromDate && $toDate) {
		    $builder->where('invoice_date >=', $fromDate);
		    $builder->where('invoice_date <=', $toDate);
		}

		$builder->groupBy('invoice_no'); 
		return $builder->get()->getResult();

	}

	public function MaxReturnNo()
	{
		$query = $this->db->query("SELECT IFNULL(MAX(ReturnNo) + 1, 1) AS maxid FROM tbl_return_master");
	    $result = $query->getRow();
	    return $result->maxid;
	}
	public function Add_return_master($data)
	{
		$builder = $this->db->table('tbl_return_master');
		$query = $builder->insert($data);
		$insertid = $this->db->insertID();
	    return $query ? $insertid : false;
	}
	public function Add_return_deatils($data)
	{
		$builder = $this->db->table('tbl_return_details');
		$query = $builder->insert($data);
		$insertid = $this->db->insertID();
	    return $query ? $insertid : false;
	}
	public function salesReturnList()
	{
		$query = $this->db->query("SELECT * FROM tbl_return_master m
                           JOIN tbl_return_details d ON m.SalesMasterId = d.Sales_MasterId
                           JOIN tbl_salesmaster s ON s.master_id = m.SalesMasterId
                           WHERE m.SalesMasterId NOT IN (
                               SELECT Return_MasterId FROM tbl_salesmaster
                           )");
		return $query->getResult();
	}
	public function getReturnamount($id)
	{
		$return = $this->db->table('tbl_return_master')
                    ->where('SalesMasterId', $id)
                    ->get()
                    ->getRow();
		$returnamount = $return ? $return->ReturnAmount : '';
	    return $returnamount;
	}
	public function getFrameWarrantyData($id)
	{
	    return $this->db->table('tbl_product') 
	                    ->select('*')
	                    ->where('pid', $id)
	                    ->get()
	                    ->getRow();  
	}
	public function getFramePurchaseDateData($id)
	{
	    return $this->db->table('tbl_salesmaster') 
	                    ->select('*')
	                    ->where('master_id', $id)
	                    ->get()
	                    ->getRow();  
	}
	public function getLensWarrantyData($id)
	{
	    return $this->db->table('tbl_lens_creation') 
	                    ->select('*')
	                    ->where('lensId', $id)
	                    ->get()
	                    ->getRow();  
	}
	public function updateReturnSalesmaster($masterId, $rmasterid, $returnBillAmount) {
		$builder = $this->db->table('tbl_salesmaster');
		$builder->where('master_id', $masterId);
		return $builder->update(['Return_MasterId' => $rmasterid, 'Return_Amount' => $returnBillAmount]);
	}
	public function updateSalesDetailsStatus($id) {
		$builder = $this->db->table('tbl_sales_details');
		$builder->where('id', $id);
		return $builder->update(['return_status' => 1]);
	}
	public function getBarcode($id)
	{
		$query = $this->db->table('tbl_product')
                    ->where('pid', $id)
                    ->get()
                    ->getRow();
		$barcode = $query ? $query->barcode : '';
	    return $barcode;
	}

	public function EyetestUsersMdl($query)
	{
		$builder = $this->db->table('tbl_eye_test');
		$builder->select('*');
		$builder->like('CustomerName', $query);
		$builder->orLike('MobileNo1', $query);
		$query = $builder->get();
		return $query->getResult();
	}

	public function ProductDataByBarcode($barcode)
	{
	    return $this->db->table('tbl_product p') 
	                    ->select('p.pid,p.barcode,p.productName,p.sales_rate,c.colorName,c.colorImage')
	    				->join('tbl_productcolor c', 'c.pid = p.pid')
	                    ->where('p.barcode', $barcode)
	                    ->get()
	                    ->getRow();  
	}
	public function GetCoating_Details($id)
	{
	    return $this->db->table('tbl_lens_creation') 
	                    ->select('lensName,lensCoatingId')
	                    ->where('lensId', $id)
	                    ->get()
	                    ->getRow();  
	}
	public function Coating_Data($ids) {
	    return $this->db->table('tbl_lens_coating')
	                    ->whereIn('id', $ids)
	                    ->get()
	                    ->getResult();
	}

}