<?php
	include '../lib/session.php';
    Session::checkLogin();
    include '../lib/database.php';
    include '../helpers/format.php';
?>
<?php
    
    class adminlogin
    {
        private $db;
        private $fm;

        public function __construct()
        {
            $this->db = new Database();
            $this->fm = new Format();
        }

        public function login_admin($admin_User, $admin_Pass)
        {
            $admin_User1 = $this->fm->validation($admin_User);
            $admin_Pass1 = $this->fm->validation($admin_Pass);

            $admin_User1 = mysqli_real_escape_string($this->db->link, $admin_User);
            $admin_Pass1 = mysqli_real_escape_string($this->db->link, $admin_Pass);

            if(empty($admin_User1) || empty($admin_Pass1)){
                $alert = "User and Pass must be not empty";
                return $alert;
            }else{
                $query = "SELECT * FROM tbl_admin WHERE User = '$admin_User1' AND Pass = '$admin_Pass1' LIMIT 1";
                $result = $this->db->select($query);

                if($result != false){
                    $value = $result->fetch_assoc();
                    Session::set('adminlogin', true);
                    Session::set('id', $value['id']);
                    Session::set('User', $value['User']);
                    Session::set('Name', $value['Name']);
                    header('Location:index.php');
                }else{
                    $alert = "User and Pass not match";
                    return $alert;
                }
            }

        }
    }
    

?>