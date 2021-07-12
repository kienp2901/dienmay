<?php
    include_once '../lib/database.php';
    include_once '../helpers/format.php';
?>
<?php
    
    class adminbrand
    {
        private $db;
        private $fm;

        public function __construct()
        {
            $this->db = new Database();
            $this->fm = new Format();
        }

        public function insert_brand($brandName)
        {
            $brandName1 = $this->fm->validation($brandName);

            $brandName1 = mysqli_real_escape_string($this->db->link, $brandName);

            if(empty($brandName1)){
                $alert = "Brand must be not empty";
                return $alert;
            }else{
                $query = "INSERT INTO tbl_brand(Name) VALUES('$brandName1')";
                $result = $this->db->insert($query);
                if($result){
                    $alert = "<span class='success'>Insert Brand Successfully</span>";
                    return $alert;
                }else{
                    $alert = "<span class='error'>Insert Brand Not Success</span>";
                    return $alert;
                }
            }

        }

        public function list_brand()
        {
            $query = "SELECT * FROM tbl_brand ORDER BY id desc";
            $result = $this->db->select($query);
            return $result;
        }

        public function getbrandbyId($id)
        {
            $query = "SELECT * FROM tbl_brand where id='$id'";
            $result = $this->db->select($query);
            return $result;
        }

        public function update_brand($brandName, $id)
        {
            $brandName1 = $this->fm->validation($brandName);

            $brandName1 = mysqli_real_escape_string($this->db->link, $brandName);
            $id = mysqli_real_escape_string($this->db->link, $id);

            if(empty($brandName1)){
                $alert = "Brand must be not empty";
                return $alert;
            }else{
                $query = "UPDATE tbl_brand SET Name='$brandName' WHERE id='$id'";
                $result = $this->db->update($query);
                if($result){
                    $alert = "<span class='success'>Update Brand Successfully</span>";
                    return $alert;
                }else{
                    $alert = "<span class='error'>Update Brand Not Success</span>";
                    return $alert;
                }
            }

        }

        public function delete_brand($id){
            $query = "DELETE FROM tbl_brand where id='$id'";
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