<?php
    include_once 'lib/database.php';
    include_once 'helpers/format.php';
?>
<?php
    
    class customer
    {
        private $db;
        private $fm;

        public function __construct()
        {
            $this->db = new Database();
            $this->fm = new Format();
        }

        public function insert_customer($data){

            $name = mysqli_real_escape_string($this->db->link, $data['name']);
            $address = mysqli_real_escape_string($this->db->link, $data['address']);
            $city = mysqli_real_escape_string($this->db->link, $data['city']);
            $country = mysqli_real_escape_string($this->db->link, $data['country']);
            $zipcode = mysqli_real_escape_string($this->db->link, $data['zipcode']);
            $phone = mysqli_real_escape_string($this->db->link, $data['phone']);
            $email = mysqli_real_escape_string($this->db->link, $data['email']);
            $password = mysqli_real_escape_string($this->db->link, md5($data['password']));

            if($name == "" || $address == "" || $city == "" || $country == "" || $zipcode == "" || $phone == "" || $email == "" || $password == ""){
                $alert = "field must be not empty";
                return $alert;
            }else{
                $check_email = "SELECT * FROM tbl_customer WHERE email='$email' LIMIT 1";
                $result_check =  $this->db->select($check_email);
                if($result_check){
                    $alert = "Email Đã Có";
                    return $alert;
                }else{
                    $query = "INSERT INTO tbl_customer(name, address, city, country, zipcode, phone, email, password) VALUES('$name', '$address', '$city', '$country', '$zipcode', '$phone', '$email', '$password')";
                    $result = $this->db->insert($query);
                    if($result){
                        $alert = "<span class='success'>Customer Create Successfully</span>";
                        return $alert;
                    }else{
                        $alert = "<span class='error'>Customer Create Not Success</span>";
                        return $alert;
                    }
                }
                
            }
        }

        public function login_customer($data){
            $email = mysqli_real_escape_string($this->db->link, $data['email']);
            $password = mysqli_real_escape_string($this->db->link, md5($data['password']));
            if($email == '' || $password == ''){
                $alert = "field must be not empty";
                return $alert;
            }else{
                $check_login = "SELECT * FROM tbl_customer WHERE email='$email' AND password='$password'";
                $result_check =  $this->db->select($check_login);
                if($result_check){
                    $value = $result_check->fetch_assoc();
                    Session::set('customer_login', true);
                    Session::set('customer_id',  $value['id']);
                    Session::set('customer_name', $value['name']);
                    header('Location:index.php');
                }else{
                    $alert = "Email và Pass không trùng khớp";
                    return $alert;
                }
                
            }
        }
        public function list_customer($id){
            $query = "SELECT * FROM tbl_customer WHERE id='$id'";
            $result = $this->db->select($query);
            return $result;
        }

        public function update_customer($data,$id){
            $name = mysqli_real_escape_string($this->db->link, $data['name']);
            $address = mysqli_real_escape_string($this->db->link, $data['address']);
            $zipcode = mysqli_real_escape_string($this->db->link, $data['zipcode']);
            $phone = mysqli_real_escape_string($this->db->link, $data['phone']);
            $email = mysqli_real_escape_string($this->db->link, $data['email']);

            if($name == "" || $address == "" || $zipcode == "" || $phone == "" || $email == ""){
                $alert = "field must be not empty";
                return $alert;
            }else{
                    $query = "UPDATE tbl_customer SET name='$name', address='$address', zipcode='$zipcode', phone='$phone', email='$email' WHERE id='$id'";
                    $result = $this->db->update($query);
                    if($result){
                        $alert = "<span class='success'>Customer Update Successfully</span>";
                        return $alert;
                    }else{
                        $alert = "<span class='error'>Customer Update Not Success</span>";
                        return $alert;
                    }
            }
        }
    }
    

?>