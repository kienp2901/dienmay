<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/admin/admincategory.php'; ?>
<?php
	$class = new admincategory();
	if($_SERVER['REQUEST_METHOD'] === 'POST'){
		$admin_Category = $_POST['catName'];

		$insertCat = $class->insert_category($admin_Category);
	}
?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Thêm Danh Mục</h2>
                    <span>
                        <?php
                            if(isset($insertCat)){
                                echo $insertCat;
                            }
                        ?>
                    </span>
                <div class="block copyblock"> 
                    <form action="catadd.php" method="post">
                        <table class="form">					
                            <tr>
                                <td>
                                    <input type="text" name="catName" placeholder="Enter Category Name..." class="medium" />
                                </td>
                            </tr>
                            <tr> 
                                <td>
                                    <input type="submit" name="submit" Value="Save" />
                                </td>
                            </tr>
                        </table>
                    </form>
                </div>
            </div>
        </div>
<?php include 'inc/footer.php';?>