<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../helpers/format.php';?>
<?php include '../classes/admin/admincustomer.php';?>
<?php include '../classes/admin/admincart.php';?>
<?php
    $cs = new admincustomer();
    if(!isset($_GET['customerid']) || $_GET['customerid']==null){
        echo "<script>window.location = 'inbox.php'</script>";
    }else{
        $id=$_GET['customerid'];
    }
    // if($_SERVER['REQUEST_METHOD'] === 'POST'){
	// 	$admin_Category = $_POST['catName'];

	// 	$updatetCat = $class->update_category($admin_Category, $id);
	// }
	
?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Sửa Danh Mục</h2>
                <div class="block copyblock"> 
                    <span>

                        <?php
                            $list_customer = $cs->list_customer($id);
                            if($list_customer){
                                while($result = $list_customer->fetch_assoc()){

                        ?>
                    </span>
                    <form action="" method="post">
                        <table class="form">					
                            <tr>
                            <td>Name</td>
                            <td>:</td>
                                <td>
                                    <input type="text" readonly="readonly" Value="<?php echo $result['name']; ?>" name="catName" placeholder="Enter Category Name..." class="medium" />
                                </td>
                            </tr>
                            
                            <tr>
                            <td>Address</td>
                            <td>:</td>
                                <td>
                                    <input type="text" readonly="readonly" Value="<?php echo $result['address']; ?>" name="catName" placeholder="Enter Category Name..." class="medium" />
                                </td>
                            </tr>
                            <tr>
                            <td>City</td>
                            <td>:</td>
                                <td>
                                    <input type="text" readonly="readonly" Value="<?php echo $result['city']; ?>" name="catName" placeholder="Enter Category Name..." class="medium" />
                                </td>
                            </tr>
                            <tr>
                            <td>Country</td>
                            <td>:</td>
                                <td>
                                    <input type="text" readonly="readonly" Value="<?php echo $result['country']; ?>" name="catName" placeholder="Enter Category Name..." class="medium" />
                                </td>
                            </tr>
                            <tr>
                            <td>Zipcode</td>
                            <td>:</td>
                                <td>
                                    <input type="text" readonly="readonly" Value="<?php echo $result['zipcode']; ?>" name="catName" placeholder="Enter Category Name..." class="medium" />
                                </td>
                            </tr>
                            <tr>
                            <td>Phone</td>
                            <td>:</td>
                                <td>
                                    <input type="text" readonly="readonly" Value="<?php echo $result['phone']; ?>" name="catName" placeholder="Enter Category Name..." class="medium" />
                                </td>
                            </tr>

                            <tr>
                            <td>Email</td>
                            <td>:</td>
                                <td>
                                    <input type="text" readonly="readonly" Value="<?php echo $result['email']; ?>" name="catName" placeholder="Enter Category Name..." class="medium" />
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