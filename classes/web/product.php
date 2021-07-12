<?php
    include_once 'lib/database.php';
    include_once 'helpers/format.php';
?>
<?php
    
    class product
    {
        private $db;
        private $fm;

        public function __construct()
        {
            $this->db = new Database();
            $this->fm = new Format();
        }

        public function listPro_feathered()
        {
            $query = "SELECT * FROM tbl_product where type='1'";
            $result = $this->db->select($query);
            return $result;
        }
        public function listPro_New()
        {
            $sp_tung_trang = 4;
            if(!isset($_GET['trang'])){
                $trang = 1;
            }else{
                $trang = $_GET['trang'];
            }
            $tung_trang = ($trang-1)*$sp_tung_trang;
            $query = "SELECT * FROM tbl_product ORDER BY id desc LIMIT  $tung_trang,$sp_tung_trang";
            $result = $this->db->select($query);
            return $result;
        }

        public function list_page_product()
        {
            $query = "SELECT * FROM tbl_product";
            $result = $this->db->select($query);
            return $result;
        }

        public function get_details($id)
        {
            $query = "SELECT tbl_product.*, tbl_category.Name as catName, tbl_brand.Name as brandName
            
            FROM tbl_product INNER JOIN tbl_category ON tbl_product.catID=tbl_category.id  

            INNER JOIN tbl_brand ON tbl_product.brandID=tbl_brand.id WHERE tbl_product.id='$id'";

            $result = $this->db->select($query);
            return $result;
        }

        public function getLatestDell(){
            $query = "SELECT * FROM tbl_product WHERE brandID = '4' ORDER BY id desc LIMIT 1";
            $result = $this->db->select($query);
            return $result;
        }
        public function getLatestOppo(){
            $query = "SELECT * FROM tbl_product WHERE brandID = '1' ORDER BY id desc LIMIT 1";
            $result = $this->db->select($query);
            return $result;
        }
        public function getLatestSamsung(){
            $query = "SELECT * FROM tbl_product WHERE brandID = '2' ORDER BY id desc LIMIT 1";
            $result = $this->db->select($query);
            return $result;
        }
        public function getLatestApple(){
            $query = "SELECT * FROM tbl_product WHERE brandID = '3' ORDER BY id desc LIMIT 1";
            $result = $this->db->select($query);
            return $result;
        }
        public function getLatestHuawei(){
            $query = "SELECT * FROM tbl_product WHERE brandID = '5' ORDER BY id desc LIMIT 1";
            $result = $this->db->select($query);
            return $result;
        }

        public function insert_compare($productID, $customer_id){
            $customer_id = mysqli_real_escape_string($this->db->link, $customer_id);
            $productID = mysqli_real_escape_string($this->db->link, $productID);
            

            $query = "SELECT * FROM tbl_product WHERE id='$productID'";
            $result = $this->db->select($query)->fetch_assoc();

            // echo print_r($result);
            
            $image = $result["image"];
            $price = $result["price"];
            $productName = $result["Name"];
            $check_compare= "SELECT * FROM tbl_compare WHERE productID='$productID' AND customer_id='$customer_id'";
            $result_check = $this->db->select($check_compare);
            if($result_check){
                $msg = "Product already added to compare";
                return $msg;
            }else{
            $query_insert = "INSERT INTO tbl_compare(customer_id, productID, productName, price, image) VALUES('$customer_id','$productID','$productName','$price','$image')";
            $insert_compare = $this->db->insert($query_insert);
            if($insert_compare){
                header('Location:compare.php');
            }else{
                    header('Location:404.php');
            }
        }
            
        }
        public function insert_wishlist($productID, $customer_id){
            $customer_id = mysqli_real_escape_string($this->db->link, $customer_id);
            $productID = mysqli_real_escape_string($this->db->link, $productID);
            

            $query = "SELECT * FROM tbl_product WHERE id='$productID'";
            $result = $this->db->select($query)->fetch_assoc();

            // echo print_r($result);
            
            $image = $result["image"];
            $price = $result["price"];
            $productName = $result["Name"];
            $check_compare= "SELECT * FROM tbl_wishlist WHERE productID='$productID' AND customer_id='$customer_id'";
            $result_check = $this->db->select($check_compare);
            if($result_check){
                $msg = "Product already added to wishlist";
                return $msg;
            }else{
            $query_insert = "INSERT INTO tbl_wishlist(productID, productName, price, image, customer_id) VALUES('$productID','$productName','$price','$image','$customer_id')";
            $insert_compare = $this->db->insert($query_insert);
            if($insert_compare){
                header('Location:wishlist.php');
            }else{
                    header('Location:404.php');
            }
        }
            
        }

        public function list_compare($customer_id){
            $query = "SELECT * FROM tbl_compare WHERE customer_id = '$customer_id'";
            $result = $this->db->select($query);
            return $result;
        }

        public function list_wishlist($customer_id){
            $query = "SELECT * FROM tbl_wishlist WHERE customer_id = '$customer_id'";
            $result = $this->db->select($query);
            return $result;
        }

        public function delete_wishlist($id,$customer_id){
            $query = "DELETE FROM tbl_wishlist WHERE customer_id = '$customer_id' AND productID = '$id'";
            $result = $this->db->delete($query);
            return $result;
        }

        public function list_slider()
        {
            $query = "SELECT * FROM tbl_slider where type='1' ORDER BY id desc";
            $result = $this->db->select($query);
            return $result;
        }

        public function search_product($tukhoa){
			$tukhoa = $this->fm->validation($tukhoa);
			$query = "SELECT * FROM tbl_product WHERE Name LIKE '%$tukhoa%'";
			$result = $this->db->select($query);
			return $result;

		}
    }
    

?>