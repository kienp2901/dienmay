<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/admin/admincategory.php'; ?>
<?php
    $class = new admincategory();
    if(!isset($_GET['id']) || $_GET['id']==null){
        echo "<script>window.location = 'catlist.php'</script>";
    }else{
        $id=$_GET['id'];
    }
    if($_SERVER['REQUEST_METHOD'] === 'POST'){
		$admin_Category = $_POST['catName'];

		$updatetCat = $class->update_category($admin_Category, $id);
	}
	
?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Sửa Danh Mục</h2>
                <div class="block copyblock"> 
                    <span>
                        <?php
                            if(isset($updatetCat)){
                                echo $updatetCat;
                            }
                        ?>
                        <?php
                            $get_cate_name = $class->getcatbyId($id);
                            if($get_cate_name){
                                while($result = $get_cate_name->fetch_assoc()){

                        ?>
                    </span>
                    <form action="" method="post">
                        <table class="form">					
                            <tr>
                                <td>
                                    <input type="text" Value="<?php echo $result['Name']; ?>" name="catName" placeholder="Enter Category Name..." class="medium" />
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