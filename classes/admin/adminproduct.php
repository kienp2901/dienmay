<?php
    include_once '../lib/database.php';
    include_once '../helpers/format.php';
?>
<?php
    
    class adminproduct
    {
        private $db;
        private $fm;

        public function __construct()
        {
            $this->db = new Database();
            $this->fm = new Format();
        }

        public function insert_product($data,$files)
        {

            $Name = mysqli_real_escape_string($this->db->link, $data['Name']);
            $brand = mysqli_real_escape_string($this->db->link, $data['brand']);
            $category = mysqli_real_escape_string($this->db->link, $data['category']);
            $product_desc = mysqli_real_escape_string($this->db->link, $data['product_desc']);
            $price = mysqli_real_escape_string($this->db->link, $data['price']);
            $type = mysqli_real_escape_string($this->db->link, $data['type']);

            $permited = array('jpg', 'jpeg', 'png', 'gif');
            $file_name = $_FILES['image']['name'];
            $file_size = $_FILES['image']['size'];
            $file_temp = $_FILES['image']['tmp_name'];

            $div  = explode('.', $file_name);
            $file_ext = strtolower(end($div));
            $unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
            $uploaded_image = "upload/".$unique_image;

            if($Name == "" || $brand == "" || $category == "" || $product_desc == "" || $price == "" || $type == "" || $file_name == ""){
                $alert = "field must be not empty";
                return $alert;
            }else{
                move_uploaded_file($file_temp, $uploaded_image);
                $query = "INSERT INTO tbl_product(Name, catID, brandID, product_desc, type, price, image) VALUES('$Name','$category','$brand','$product_desc','$type','$price','$unique_image')";
                $result = $this->db->insert($query);
                if($result){
                    $alert = "<span class='success'>Insert Product Successfully</span>";
                    return $alert;
                }else{
                    $alert = "<span class='error'>Insert Product Not Success</span>";
                    return $alert;
                }
            }

        }

        public function list_product()
        {
            $query = "SELECT tbl_product.*, tbl_category.Name as catName, tbl_brand.Name as brandName
            
            FROM tbl_product INNER JOIN tbl_category ON tbl_product.catID=tbl_category.id  

            INNER JOIN tbl_brand ON tbl_product.brandID=tbl_brand.id
            
            ORDER BY tbl_product.id desc";

            $result = $this->db->select($query);
            return $result;
        }

        public function getproductbyId($id)
        {
            $query = "SELECT * FROM tbl_product where id='$id'";
            $result = $this->db->select($query);
            return $result;
        }

        public function update_product($data,$files, $id)
        {
            $Name = mysqli_real_escape_string($this->db->link, $data['Name']);
            $brand = mysqli_real_escape_string($this->db->link, $data['brand']);
            $category = mysqli_real_escape_string($this->db->link, $data['category']);
            $product_desc = mysqli_real_escape_string($this->db->link, $data['product_desc']);
            $price = mysqli_real_escape_string($this->db->link, $data['price']);
            $type = mysqli_real_escape_string($this->db->link, $data['type']);

            $permited = array('jpg', 'jpeg', 'png', 'gif');
            $file_name = $_FILES['image']['name'];
            $file_size = $_FILES['image']['size'];
            $file_temp = $_FILES['image']['tmp_name'];

            $div  = explode('.', $file_name);
            $file_ext = strtolower(end($div));
            $unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
            $uploaded_image = "upload/".$unique_image;

            if($Name == "" || $brand == "" || $category == "" || $product_desc == "" || $price == "" || $type == ""){
                $alert = "field must be not empty";
                return $alert;
            }else{
                if(!empty($file_name)){
                    if($file_size>20480){
                        $alert = "<span class='error'>Image size should be less than 2MB</span>";
                        return $alert;
                    }elseif(in_array($file_ext, $permited) ===false){
                        $alert = "<span class='error'>You can upload only:-".implode(',', $permited)."</span>";
                        return $alert;
                    }
                    move_uploaded_file($file_temp, $uploaded_image);
                    $query = "UPDATE tbl_product SET 
                    Name='$Name', 
                    catID='$category', 
                    brandID='$brand', 
                    product_desc='$product_desc', 
                    type='$type', 
                    price='$price',  
                    image='$unique_image' WHERE id='$id'";

                }
                else{
                    move_uploaded_file($file_temp, $uploaded_image);
                    $query = "UPDATE tbl_product SET 
                    Name='$Name', 
                    catID='$category', 
                    brandID='$brand', 
                    product_desc='$product_desc', 
                    price='$price', 
                    type='$type' WHERE id='$id'";

                }
                $result = $this->db->update($query);
                if($result){
                    $alert = "<span class='success'>Update Product Successfully</span>";
                    return $alert;
                }else{
                    $alert = "<span class='error'>Update Product Not Success</span>";
                    return $alert;
                }
            }
                
        }

        public function delete_product($id){
            $query = "DELETE FROM tbl_product where id='$id'";
            $result = $this->db->delete($query);
            if($result){
                $alert = "<span class='success'>Delete Category Successfully</span>";
                return $alert;
            }else{
                $alert = "<span class='success'>Delete Category Not Successfully</span>";
                return $alert;
            }
        }
    }
    

?>