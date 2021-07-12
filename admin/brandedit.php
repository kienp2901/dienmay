<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/admin/adminbrand.php'; ?>
<?php
    $class = new adminbrand();
    if(!isset($_GET['id']) || $_GET['id']==null){
        echo "<script>window.location = 'brandlist.php'</script>";
    }else{
        $id=$_GET['id'];
    }
    if($_SERVER['REQUEST_METHOD'] === 'POST'){
		$admin_brand = $_POST['brandName'];

		$updatetBrand = $class->update_brand($admin_brand, $id);
	}
	
?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Sửa Danh Mục</h2>
                <div class="block copyblock"> 
                    <span>
                        <?php
                            if(isset($updatetBrand)){
                                echo $updatetBrand;
                            }
                        ?>
                        <?php
                            $get_brand_name = $class->getbrandbyId($id);
                            if($get_brand_name){
                                while($result = $get_brand_name->fetch_assoc()){

                        ?>
                    </span>
                    <form action="" method="post">
                        <table class="form">					
                            <tr>
                                <td>
                                    <input type="text" Value="<?php echo $result['Name']; ?>" name="brandName" placeholder="Enter Category Name..." class="medium" />
                                </td>
                            </tr>
                            <tr> 
                                <td>
                                    <input type="submit" name="submit" Value="Edit" />
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
<?php include 'inc/footer.php';?>