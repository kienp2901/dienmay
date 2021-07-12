<?php
    include_once '../lib/database.php';
    include_once '../helpers/format.php';
?>
<?php
    
    class adminslider
    {
        private $db;
        private $fm;

        public function __construct()
        {
            $this->db = new Database();
            $this->fm = new Format();
        }

        public function insert_slider($data,$files)
        {
            $sliderName = mysqli_real_escape_string($this->db->link, $data['slidername']);
            $type = mysqli_real_escape_string($this->db->link, $data['type']);

            $permited = array('jpg', 'jpeg', 'png', 'gif');
            $file_name = $_FILES['image']['name'];
            $file_size = $_FILES['image']['size'];
            $file_temp = $_FILES['image']['tmp_name'];

            $div  = explode('.', $file_name);
            $file_ext = strtolower(end($div));
            $unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
            $uploaded_image = "upload/".$unique_image;

            if($sliderName == "" || $type == "" || $file_name == ""){
                $alert = "field must be not empty";
                return $alert;
            }else{
                move_uploaded_file($file_temp, $uploaded_image);
                $query = "INSERT INTO tbl_slider(sliderName, sliderImage, type) VALUES('$sliderName','$unique_image','$type')";
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

        public function list_slider()
        {
            $query = "SELECT * FROM tbl_slider ORDER BY id desc";
            $result = $this->db->select($query);
            return $result;
        }

        public function update_Slider($data,$files, $id)
        {
            $sliderName = mysqli_real_escape_string($this->db->link, $data['slidername']);
            $type = mysqli_real_escape_string($this->db->link, $data['type']);

            $permited = array('jpg', 'jpeg', 'png', 'gif');
            $file_name = $_FILES['image']['name'];
            $file_size = $_FILES['image']['size'];
            $file_temp = $_FILES['image']['tmp_name'];

            $div  = explode('.', $file_name);
            $file_ext = strtolower(end($div));
            $unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
            $uploaded_image = "upload/".$unique_image;

            if($sliderName == "" || $type == ""){
                $alert = "field must be not empty";
                return $alert;
            }else{
                if(!empty($file_name)){
                    if(in_array($file_ext, $permited) ===false){
                        $alert = "<span class='error'>You can upload only:-".implode(',', $permited)."</span>";
                        return $alert;
                    }
                    move_uploaded_file($file_temp, $uploaded_image);
                    $query = "UPDATE tbl_slider SET 
                    sliderName='$sliderName',  
                    sliderImage='$unique_image', type='$type' WHERE id='$id'";
                }else{
                    move_uploaded_file($file_temp, $uploaded_image);
                    $query = "UPDATE tbl_slider SET 
                    sliderName='$sliderName',  
                    type='$type' WHERE id='$id'";
                }            
                $result = $this->db->update($query);
                if($result){
                    $alert = "<span class='success'>Update slider Successfully</span>";
                    return $alert;
                }else{
                    $alert = "<span class='error'>Update slider Not Success</span>";
                    return $alert;
                }
            }

        }
        public function getslidertbyId($id)
        {
            $query = "SELECT * FROM tbl_slider where id='$id'";
            $result = $this->db->select($query);
            return $result;
        }

        public function delete_slider($id){
            $query = "DELETE FROM tbl_slider where id='$id'";
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