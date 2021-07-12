<?php
    include_once '../lib/database.php';
    include_once '../helpers/format.php';
?>
<?php
    
    class admincustomer
    {
        private $db;
        private $fm;

        public function __construct()
        {
            $this->db = new Database();
            $this->fm = new Format();
        }

        public function list_customer($id){
            $query = "SELECT * FROM tbl_customer WHERE id='$id'";
            $result = $this->db->select($query);
            return $result;
        }


    }
    

?>