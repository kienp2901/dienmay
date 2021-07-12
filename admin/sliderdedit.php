<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/admin/adminslider.php'; ?>
<?php
	$class = new adminslider();
	if(!isset($_GET['id']) || $_GET['id']==null){
        echo "<script>window.location = 'sliderlist.php'</script>";
    }else{
        $id=$_GET['id'];
    }
    if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])){
        $update_Slider = $class->update_Slider($_POST, $_FILES, $id);

	}
?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Add New Slider</h2>
    <div class="block"> 
    <?php
                if(isset($update_Slider)){
                    echo $update_Slider;
                }
            ?>       
    <?php
                $get_slider_name = $class->getslidertbyId($id);
                if($get_slider_name){
                    while($result = $get_slider_name->fetch_assoc()){

            ?>       
         <form action="" method="post" enctype="multipart/form-data">
            <table class="form">     
                <tr>
                    <td>
                        <label>Title</label>
                    </td>
                    <td>
                        <input type="text" name="slidername" value="<?php echo $result['sliderName']; ?>" placeholder="Enter Slider Title..." class="medium" />
                    </td>
                </tr>           
    
                <tr>
                    <td>
                        <label>Upload Image</label>
                    </td>
                    <td>
                        <img src="upload/<?php echo $result['sliderImage']; ?>" width="200" alt=""><br>
                        <input type="file" name="image"/>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Type</label>
                    </td>
                    <td>
                        <select name="type" id="">
                        <?php
                                if($result['type']==0){
                            ?>
                                <option value="1">On</option>
                                <option selected value="0">Off</option>
                            <?php
                                }else{
                            ?>
                                <option selected value="1">On</option>
                                <option value="0">Off</option>
                            <?php
                                }
					        ?>
                        </select>
                    </td>
                </tr>
				<tr>
                    <td></td>
                    <td>
                    <input type="submit" name="submit" Value="Update" />
                    </td>
                </tr>
            </table>
            </form>
            <?php
                    }
                }
            ?>
        </div>
    </div>
</div>
<!-- Load TinyMCE -->
<script src="js/tiny-mce/jquery.tinymce.js" type="text/javascript"></script>
<script type="text/javascript">
    $(document).ready(function () {
        setupTinyMCE();
        setDatePicker('date-picker');
        $('input[type="checkbox"]').fancybutton();
        $('input[type="radio"]').fancybutton();
    });
</script>
<!-- Load TinyMCE -->
<?php include 'inc/footer.php';?>