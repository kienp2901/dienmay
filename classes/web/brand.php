<?php
    include_once 'lib/database.php';
    include_once 'helpers/format.php';
?>
<?php
    
    class brand
    {
        private $db;
        private $fm;

        public function __construct()
        {
            $this->db = new Database();
            $this->fm = new Format();
        }

        public function show_brand_home(){
			$query = "SELECT * FROM tbl_brand order by id desc";
			$result = $this->db->select($query);
			return $result;
		}
        public function get_name_by_brand($id){
			$query = "SELECT tbl_product.*,tbl_brand.Name,tbl_brand.id FROM tbl_product,tbl_brand WHERE tbl_product.brandID=tbl_brand.id AND tbl_brand.id ='$id' LIMIT 1";
			$result = $this->db->select($query);
			return $result;
		}
        public function get_product_by_brand($id){
			$query = "SELECT * FROM tbl_product WHERE brandID='$id' order by brandID desc LIMIT 8";
			$result = $this->db->select($query);
			return $result;
		}

    }
    

?>