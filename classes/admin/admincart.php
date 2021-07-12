<?php
    include_once '../lib/database.php';
    include_once '../helpers/format.php';
?>
<?php
    
    class admincart
    {
        private $db;
        private $fm;

        public function __construct()
        {
            $this->db = new Database();
            $this->fm = new Format();
        }

        public function add_cart($id, $quantity){
            $quantity = $this->fm->validation($quantity);
            $id = mysqli_real_escape_string($this->db->link, $id);
            $quantity = mysqli_real_escape_string($this->db->link, $quantity);
            $sId = session_id();

            $query = "SELECT * FROM tbl_product WHERE id='$id'";
            $result = $this->db->select($query)->fetch_assoc();

            // echo print_r($result);
            
            $image = $result["image"];
            $price = $result["price"];
            $productName = $result["Name"];
            
            $check_cart= "SELECT * FROM tbl_cart WHERE productID='$id' AND sID='$sId'";
            $result_check = $this->db->select($check_cart);
            if($result_check){
                $msg = "Product already added";
                return $msg;
            }else{
                $query_insert = "INSERT INTO tbl_cart(productID, sID, productName, price, quantity, image) VALUES('$id','$sId','$productName','$price','$quantity','$image')";
                $insert_cart = $this->db->insert($query_insert);
                if($insert_cart){
                    header('Location:cart.php');
                }else{
                    header('Location:404.php');
                }
            }
            
        }

        public function get_product_cart()
        {
            $sId = session_id();
            $query = "SELECT * FROM tbl_cart WHERE sID='$sId'";
            $result = $this->db->select($query);
            return $result;
        }

        public function update_quantity_cart($cartID, $quantity){
            $cartID = mysqli_real_escape_string($this->db->link, $cartID);
            $quantity = mysqli_real_escape_string($this->db->link, $quantity);
            $query = "UPDATE tbl_cart SET 
                    quantity='$quantity' 
                    WHERE id='$cartID'";

            $result = $this->db->update($query);
            if($result){
                header('Location:cart.php');
            }else{
                $msg = "Product quantity not update successfully";
                return $msg;
            }
        }
        public function delete_cart($id){
            $query = "DELETE FROM tbl_cart where id='$id'";
            $result = $this->db->delete($query);
            if($result){
                header('Location:cart.php');
            }else{
                $alert = "<span class='success'>Delete Product cart Not Successfully</span>";
                return $alert;
            }
        }

        public function dell_all_data_cart(){
            $sId = session_id();
            $query = "DELETE FROM tbl_cart WHERE sID='$sId'";
            $result = $this->db->select($query);
            return $result;
        }

        public function insert_order($customer_id){
            $sId = session_id();
            $query = "SELECT * FROM tbl_cart WHERE sID='$sId'";
            $get_product = $this->db->select($query);
            if($get_product){
                while($result = $get_product->fetch_assoc()){
                    $productID = $result['productID'];
                    $productName = $result['productName'];
                    $quantity = $result['quantity'];
                    $price = $result['price'] * $quantity;
                    $image = $result['image'];
                    $customer_id = $customer_id;
                    
                    $query_insert = "INSERT INTO tbl_order(productID, productName, customer_id, quantity, price, image) VALUES('$productID','$productName','$customer_id','$quantity','$price','$image')";
                    $insert_order = $this->db->insert($query_insert);
                    // if($insert_order){
                    //     header('Location:cart.php');
                    // }else{
                    //     header('Location:404.php');
                    // }
                }
            }
        }
        public function  getAmountPrice($customer_id){
            $query = "SELECT price FROM tbl_order WHERE customer_id='$customer_id'";
            $get_price = $this->db->select($query);
            return $get_price;
        }

        public function get_cart_order($customer_id){
            $query = "SELECT * FROM tbl_order WHERE customer_id='$customer_id'";
            $get_order = $this->db->select($query);
            return $get_order;
        }

        public function check_order($customer_id){
            $sId = session_id();
            $query = "SELECT * FROM tbl_order WHERE customer_id='$customer_id'";
            $get_order = $this->db->select($query);
            return $get_order;
        }


        public function  get_inbox_cart(){
            $query = "SELECT * FROM tbl_order ORDER BY date_order";
            $get_order = $this->db->select($query);
            return $get_order;
        }

        public function shifted($id,$time,$price){
            $id = mysqli_real_escape_string($this->db->link, $id);
            $time = mysqli_real_escape_string($this->db->link, $time);
            $price = mysqli_real_escape_string($this->db->link, $price);
            $query = "UPDATE tbl_order SET 
            status='1' 
            WHERE id='$id' AND date_order='$time' AND price='$price'  ";

            $result = $this->db->update($query);
            if($result){
                $msg = "Update order successfully";
                return $msg;
            }else{
                $msg = "Update order successfully";
                return $msg;
            }
        }

        public function del_shift($id,$time,$price){
            $id = mysqli_real_escape_string($this->db->link, $id);
            $time = mysqli_real_escape_string($this->db->link, $time);
            $price = mysqli_real_escape_string($this->db->link, $price);
            $query = "DELETE FROM tbl_order WHERE id='$id' AND date_order='$time' AND price='$price'  ";

            $result = $this->db->delete($query);
            if($result){
                $msg = "Delete order successfully";
                return $msg;
            }else{
                $msg = "Delete order successfully";
                return $msg;
            }
        }
    }
    

?>