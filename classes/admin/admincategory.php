<?php
    include_once '../lib/database.php';
    include_once '../helpers/format.php';
?>
<?php
    
    class admincategory
    {
        private $db;
        private $fm;

        public function __construct()
        {
            $this->db = new Database();
            $this->fm = new Format();
        }

        public function insert_category($catName)
        {
            $catName1 = $this->fm->validation($catName);

            $catName1 = mysqli_real_escape_string($this->db->link, $catName);

            if(empty($catName1)){
                $alert = "Category must be not empty";
                return $alert;
            }else{
                $query = "INSERT INTO tbl_category(Name) VALUES('$catName1')";
                $result = $this->db->insert($query);
                if($result){
                    $alert = "<span class='success'>Insert Category Successfully</span>";
                    return $alert;
                }else{
                    $alert = "<span class='error'>Insert Category Not Success</span>";
                    return $alert;
                }
            }

        }

        public function list_category()
        {
            $query = "SELECT * FROM tbl_category ORDER BY id desc";
            $result = $this->db->select($query);
            return $result;
        }

        public function getcatbyId($id)
        {
            $query = "SELECT * FROM tbl_category where id='$id'";
            $result = $this->db->select($query);
            return $result;
        }

        public function update_category($catName, $id)
        {
            $catName1 = $this->fm->validation($catName);

            $catName1 = mysqli_real_escape_string($this->db->link, $catName);
            $id = mysqli_real_escape_string($this->db->link, $id);

            if(empty($catName1)){
                $alert = "Category must be not empty";
                return $alert;
            }else{
                $query = "UPDATE tbl_category SET Name='$catName' WHERE id='$id'";
                $result = $this->db->update($query);
                if($result){
                    $alert = "<span class='success'>Update Category Successfully</span>";
                    return $alert;
                }else{
                    $alert = "<span class='error'>Update Category Not Success</span>";
                    return $alert;
                }
            }

        }

        public function delete_category($id){
            $query = "DELETE FROM tbl_category where id='$id'";
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