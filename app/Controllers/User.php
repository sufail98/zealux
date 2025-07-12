<?php 
namespace App\Controllers;

use App\Models\UserModel;
use App\Models\FrontpageModel;

class User extends BaseController
{
	
    function __construct()
	{
		$this->userModel = new UserModel();
		$this->frontModel = new FrontpageModel();
		date_default_timezone_set('Asia/Kolkata');
		$this->db=db_connect();

	}
	public function Users()
	{
		$session = session();
		if(!empty($_SESSION['user'])){
			$data['users'] = $this->userModel->AllUsers();
			return view('users_list',$data);
		} else {
			return view('login');
		}
	}
	public function AddUser()
	{
		$session = session();
		if(!empty($_SESSION['user'])){
			$data['stores'] = $this->frontModel->AllStores();
			return view('add_user',$data);
		} else {
			return view('login');
		}
	}

	public function SaveUser()
	{
		$session = session();
		if(!empty($_SESSION['user'])){

			$data = [
	        	'username' => $this->request->getPost('username'),
	        	'password' => $this->request->getPost('password'),
	            'user_type' => $this->request->getPost('user_type'),
	            'status' => $this->request->getPost('status'),
	            'store_id' => $this->request->getPost('store'),
				'CreatedDate' => date('Y-m-d H:i:s')
	        ];

			$insertid = $this->userModel->InsertUser($data);

			if($insertid){
				$session->setFlashdata('alert', 'success|Success...|Added Successfully');
            	return redirect()->to('users');
			}else{
				$session->setFlashdata('alert', 'error|Oops...|Try Again');
		        return redirect()->to('users');
			}
			
		} else {
			return view('login');
		}
		
	}
	public function UserEdit($id)
	{ 
		$session = session();
		if(!empty($_SESSION['user'])){
			$data['stores'] = $this->frontModel->AllStores();
			$data['editdata'] = $this->userModel->UserEditMdl($id);
			return view('edit_user',$data);
		} else {
			return view('login');
		}
	}
	public function UpdateUser()
	{
		$session = session();
		if(!empty($_SESSION['user'])){

			$data = [
	        	'username' => $this->request->getPost('username'),
	        	'password' => $this->request->getPost('password'),
	            'user_type' => $this->request->getPost('user_type'),
	            'status' => $this->request->getPost('status'),
	            'store_id' => $this->request->getPost('store'),
				'id' => $this->request->getPost('uid'),
				'CreatedDate' => date('Y-m-d H:i:s')
	        ];

			$update = $this->userModel->updateUser($data);

			if($update){
				$session->setFlashdata('alert', 'success|Success...|Updated Successfully');
				return redirect()->to('users');
			}else{
				$session->setFlashdata('alert', 'error|Oops...|Try Again');
				return redirect()->to('users');
			}
			
		} else {
			return view('login');
		}
		
	}

	public function UserDelete($id)
	{
		$session = session();
		if(!empty($_SESSION['user'])){
			$query = $this->userModel->UserDeleteMdl($id);
			if($query){
				$session->setFlashdata('alert', 'success|Success...|Deleted Successfully');
            	return redirect()->to('users');
			}
		} else {
			return view('login');
		}
	}

	public function checkUsername()
	{ 
		$session = session();
		if(!empty($_SESSION['user'])){
			
			$username = $this->request->getPost('username');
			$user_id = $this->request->getPost('user_id');
		    $existingUser = $this->userModel->checkUser($username);

		    if ($existingUser) {
            // If editing, allow same username for same user
	            if (!empty($user_id) && $existingUser->id == $user_id) {
	                echo 'available';
	            } else {
	                echo 'taken';
	            }
	        } else {
	            echo 'available';
	        }

		} else {
			return view('login');
		}
	}



	public function insert_product() 
	{
	    $query = $this->db->table('tbl_test_product')
	                      ->select('DISTINCT(barcode)')
	                      ->get();
	    $barcodes = $query->getResult();

	    $purchase_master = [
	        'store_id'       => 2,
	        'purchase_date'  => date('Y-m-d'),
	        'description'    => '',
	    ];
	    $this->db->table('tbl_purchase_master')->insert($purchase_master);
	    $purchase_id = $this->db->insertID();

	    $purchase_details = [];

	    foreach ($barcodes as $row) {
	        $barcode = $row->barcode;

	        $product_data = $this->db->table('tbl_test_product')
	                                 ->where('barcode', $barcode)
	                                 ->limit(1)
	                                 ->get()
	                                 ->getRow();

	        $product_insert = [
	            'barcode'        => $product_data->barcode,
	            'productName'    => $product_data->product_name,
	            'supportedLense' => $product_data->supported_lens,
	            'feature'        => $product_data->feature,
	            'size'           => $product_data->size,
	            'brand'          => $product_data->brand,
	            'model'          => $product_data->model,
	            'group'          => $product_data->groups,
	            'mrp'            => $product_data->mrp,
	            'sales_rate'     => $product_data->sales_rate,
	            'purchase_rate'  => $product_data->purchase_rate,
	            'warranty_days'  => $product_data->warrenty,
	            'active_status'  => $product_data->visibility,
	            'store_id'       => 1,
	            'CreatedDate'    => date('Y-m-d H:i:s'),
	        ];

	        $this->db->table('tbl_product')->insert($product_insert);
	        $pid = $this->db->insertID();

	        $colors = $this->db->table('tbl_test_product')
	                           ->where('barcode', $barcode)
	                           ->get()
	                           ->getResult();

	        foreach ($colors as $color_row) {
	            $filename = $color_row->photo . '.jpg';

	            $color_insert = [
	                'pid'        => $pid,
	                'colorName'  => $color_row->color,
	                'colorCode'  => '#000000',
	                'colorImage' => json_encode([$filename]),
	                'stock'      => $color_row->stock
	            ];
	            $this->db->table('tbl_productcolor')->insert($color_insert);
	            $cid = $this->db->insertID();

	            $purchase_details[] = [
	                'purchaseId' => $purchase_id,
	                'product_id' => $pid,
	                'color_id'   => $cid,
	                'color_name' => $color_row->color,
	                'qty'        => $color_row->stock
	            ];

	            $stockdata = [
	                'voucher_type'  => 'purchase',
	                'voucher_no'    => $purchase_id,
	                'document_no'   => $purchase_id,
	                'pid'           => $pid,
	                'color'         => $color_row->color,
	                'inward_qty'    => $color_row->stock,
	                'outward_qty'   => 0,
	                'purchase_rate' => 0,
	                'sales_rate'    => 0,
	                'stock_date'    => date('Y-m-d'),
	                'store_id'      => 2,
	                'CreatedUser'   => 5,
	                'CreatedDate'   => date('Y-m-d H:i:s')
	            ];
	            $this->db->table('tbl_stock')->insert($stockdata);
	        }
	    }

	    if (!empty($purchase_details)) {
	        $this->db->table('tbl_purchase_details')->insertBatch($purchase_details);
	    }

	    echo "Migration completed.";
	}



	
}