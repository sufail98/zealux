<?php 
namespace App\Models;
use CodeIgniter\Model;

class ProductModel extends Model
{
	function __construct() {
		$this->db=db_connect();
	}
	

	public function InsertProduct($data)
	{
		$builder = $this->db->table('tbl_product');
		$query = $builder->insert($data);
		$insertid = $this->db->insertID();
		if($query){
			return $insertid;
		}else{
			return false;
		}

	}

	public function InsertItemImagesMdl($data1)
	{
		$builder = $this->db->table('tbl_productcolor');
		$query = $builder->insertBatch($data1);
		if($query){
			return true;
		}else{
			return false;
		}
	}

	public function AddStock($data)
	{
		$builder = $this->db->table('tbl_stock');
		$query = $builder->insertBatch($data);
		if($query){
			return true;
		}else{
			return false;
		}
	}


	public function UpdateStock($data)
	{
	    $builder = $this->db->table('tbl_stock');
	    // Handle deletion: Check if $data is a single or multiple records
	    if (isset($data[0]) && is_array($data[0])) {
	        // If $data is multiple records
	        foreach ($data as $row) {
	            $builder->where('voucher_no', $row['voucher_no']);
	            $builder->where('document_no', $row['document_no']);
	            $builder->where('pid', $row['pid']);
	            $builder->where('voucher_type', 'opening stock');
	            $builder->delete();
	        }
	    } else {
	        // If $data is a single record
	        $builder->where('voucher_no', $data['voucher_no']);
	        $builder->where('document_no', $data['document_no']);
	        $builder->where('pid', $data['pid']);
	        $builder->where('voucher_type', 'opening stock');
	        $builder->delete();
	    }

	    // Insert new records
	    $builder = $this->db->table('tbl_stock');
	    $query = is_array($data[0]) ? $builder->insertBatch($data) : $builder->insert($data);

	    if ($query) {
	        return true;
	    } else {
	        return false;
	    }
	}

	public function AllProducts()
	{
		$subQuery = $this->db->table('tbl_stock')
		    ->select('pid, SUM(inward_qty) AS total_in, SUM(outward_qty) AS total_out')
		    ->groupBy('pid');

		$builder = $this->db->table('tbl_product p');
		$builder->select('
		    p.*, 
		    g.group_name, 
		    IFNULL(stock.total_in - stock.total_out, 0) AS stock_count
		');
		$builder->join('tbl_group g', 'g.id = p.group', 'left');
		$builder->join('tbl_productcolor c', 'c.pid = p.pid', 'left');
		$builder->join("({$subQuery->getCompiledSelect()}) AS stock", 'stock.pid = p.pid', 'left');
		$builder->groupBy('p.pid');
		$builder->orderBy('p.pid', 'DESC');

		$query = $builder->get();
		return $query->getResult();
	}

	public function getImagesByProductIds($productIds)
    {
        $builder = $this->db->table('tbl_productcolor');
        $builder->select('pid, colorImage');
        $builder->whereIn('pid', $productIds);
        $query = $builder->get();
        $results = $query->getResult();

        $images = [];
        foreach ($results as $row) {
            $images[$row->pid][] = $row->colorImage;
        }

        return $images;
    }

	public function ProductEditMdl($id)
	{
		$builder = $this->db->table('tbl_product');
		$builder->select('*');
		$builder->where('pid', $id);
		return $builder->get()->getResult();
	}
	public function ProductSplitEditMdl($id)
	{
		$builder = $this->db->table('tbl_productcolor');
		$builder->select('*');
		$builder->where('pid', $id);
		return  $builder->get()->getResult();
	}
	public function updateProduct($data)
	{
		$builder = $this->db->table('tbl_product');
		$builder->where('pid',$data['pid']);
		$query = $builder->update($data);
		if($query){
			return true;
		}else{
			return false;
		}
		
	}
	public function UpdateImagesplitMdl($data1,$id)
	{
		// Get existing images for the given PID
	    $existingImages = $this->getExistingImages($id);
			if(isset($existingImages)){
			    // Delete the existing files from the server
			    $this->deleteFiles($existingImages);
			}

		    // Delete existing records from the database
		    $builder = $this->db->table('tbl_productcolor');
		    $builder->where('pid', $id);
		    $deleteResult = $builder->delete();

		    if ($deleteResult) {
		        // Insert new records into the database
		        $builder = $this->db->table('tbl_productcolor');
		        $query = $builder->insertBatch($data1);

		        if ($query) {
		            return true;
		        } else {
		            return false;
		        }
		    }
		    return false;


	}
	public function getExistingImages($pid)
	{
	    $builder = $this->db->table('tbl_productcolor');
	    $builder->select('colorImage');
	    $builder->where('pid', $pid);
	    $query = $builder->get();

	    if ($query->getNumRows() > 0) {
	        return json_decode($query->getRow()->colorImage); // Decode JSON to get array of images
	    }

	    return [];
	}
	public function deleteFiles($images)
	{
	    foreach ($images as $image) {
	        $filePath = WRITEPATH . './images/product/' . $image; 

	        if (file_exists($filePath)) {
	            unlink($filePath);
	        }
	    }
	}

	public function ProductDeleteMdl($id)
	{
	    $builder = $this->db->table('tbl_product');

	    if ($builder->where('pid', $id)->delete()) {

	        $builder = $this->db->table('tbl_productcolor');
	        if ($builder->where('pid', $id)->delete()) {

	            $builder = $this->db->table('tbl_stock');
	            $builder->where('voucher_no', $id)
	                    ->where('document_no', $id)
	                    ->where('pid', $id)
	                    ->where('voucher_type', 'opening stock')
	                    ->delete();
	            return true; 
	        }
	    }

	    return false;
	}	

	public function getExistingColorImage($pid, $colorName)
	{
	    return $this->db->table('tbl_productcolor') 
	                    ->select('colorImage')
	                    ->where('pid', $pid)
	                    ->where('colorName', $colorName)
	                    ->get()
	                    ->getRow();  
	}
	public function searchProducts($query, $limit, $offset)
	{
		$subQuery = $this->db->table('tbl_stock')
		    ->select('pid, SUM(inward_qty) AS total_in, SUM(outward_qty) AS total_out')
		    ->groupBy('pid');

		$builder = $this->db->table('tbl_product p');
		$builder->select('
		    p.*, 
		    g.group_name, 
		    IFNULL(stock.total_in - stock.total_out, 0) AS stock_count
		');
		$builder->join('tbl_group g', 'g.id = p.group', 'left');
		$builder->join('tbl_productcolor c', 'c.pid = p.pid', 'left');
		$builder->join("({$subQuery->getCompiledSelect()}) AS stock", 'stock.pid = p.pid', 'left');
		$builder->like('p.barcode', $query)
		        ->orLike('p.brand', $query)
		        ->orLike('p.productName', $query);
		$builder->groupBy('p.pid');
		$builder->orderBy('p.pid', 'DESC');
		$builder->limit($limit, $offset);

		$query = $builder->get();
		return $query->getResult();
	}


	
	
}