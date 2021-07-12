<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/admin/adminbrand.php'; ?>
<?php
	$class = new adminbrand();
	if($_SERVER['REQUEST_METHOD'] === 'POST'){
		$admin_brand = $_POST['brandName'];

		$insertBrand = $class->insert_brand($admin_brand);
	}
?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Thêm Thương Hiệu</h2>
                    <span>
                        <?php
                            if(isset($insertBrand)){
                                echo $insertBrand;
                            }
                        ?>
                    </span>
                <div class="block copyblock"> 
                    <form action="brandadd.php" method="post">
                        <table class="form">					
                            <tr>
                                <td>
                                    <input type="text" name="brandName" placeholder="Nhập Tên Thương Hiệu Sản pHẩm..." class="medium" />
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