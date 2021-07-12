<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/admin/adminbrand.php'; ?>
<?php include '../classes/admin/admincategory.php'; ?>
<?php include '../classes/admin/adminproduct.php'; ?>
<?php
	$class = new adminproduct();
    if(!isset($_GET['productid']) || $_GET['productid']==null){
        echo "<script>window.location = 'productlist.php'</script>";
    }else{
        $id=$_GET['productid'];
    }
	if($_SERVER['REQUEST_METHOD'] === 'POST'  && isset($_POST['submit'])){
		$updateProduct = $class->update_product($_POST, $_FILES, $id);
	}
?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Edit Product</h2>
        <div class="block">     
        <span>
            <?php
                if(isset($updateProduct)){
                    echo $updateProduct;
                }
            ?>
            <?php
                $get_product_name = $class->getproductbyId($id);
                if($get_product_name){
                    while($result_product = $get_product_name->fetch_assoc()){

            ?>
        </span>          
         <form action="" method="post" enctype="multipart/form-data">
            <table class="form">
               
                <tr>
                    <td>
                        <label>Name</label>
                    </td>
                    <td>
                        <input type="text" value="<?php echo $result_product['Name']; ?>" name="Name" placeholder="Enter Product Name..." class="medium" />
                    </td>
                </tr>
				
				
				 <tr>
                    <td style="vertical-align: top; padding-top: 9px;">
                        <label>Description</label>
                    </td>
                    <td>
                        <textarea name="product_desc" class="tinymce"><?php echo $result_product['product_desc']; ?></textarea>
                    </td>
                </tr>
				<tr>
                    <td>
                        <label>Price</label>
                    </td>
                    <td>
                        <input type="text" value="<?php echo $result_product['price']; ?>" name="price" class="medium" />
                    </td>
                </tr>
            
                <tr>
                    <td>
                        <label>Upload Image</label>
                    </td>
                    <td>
                        <img src="upload/<?php echo $result_product['image']; ?>" width="80" alt=""><br>
                        <input type="file" name="image"/>
                    </td>
                </tr>
				
				<tr>
                    <td>
                        <label>Product Type</label>
                    </td>
                    <td>
                        <select id="select" name="type">
                            <option>Select Type</option>
                            <?php
                                if($result_product['type']==0){
                            ?>
                                <option value="1">Featured</option>
                                <option selected value="0">Non-Featured</option>
                            <?php
                                }else{
                            ?>
                                <option selected value="1">Featured</option>
                                <option value="0">Non-Featured</option>
                            <?php
                                }
					        ?>
                            
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Category</label>
                    </td>
                    <td>
                        <select id="select" name="category">
                            <option>----Select Category----</option>
                            <?php
                                $cat = new admincategory();
                                $catlist = $cat->list_category();
                                if($catlist){
                                    while($result = $catlist->fetch_assoc()){
                            ?>
                            <option 
                            <?php
                            if($result['id'] == $result_product['catID']){ echo 'selected'; }
                            ?>
                            value="<?php echo $result['id'] ?>"><?php echo $result['Name'] ?></option>
                            <?php
                                    }
                                }
                            ?>
                        </select>
                    </td>
                </tr>
				<tr>
                    <td>
                        <label>Brand</label>
                    </td>
                    <td>
                        <select id="select" name="brand">
                            <option>----Select Brand----</option>
                            <?php
                                $brand = new adminbrand();
                                $brandlist = $brand->list_brand();
                                if($brandlist){
                                    while($result1 = $brandlist->fetch_assoc()){
                            ?>
                            <option
                            <?php
                            if($result1['id'] == $result_product['brandID']){ echo 'selected'; }
                            ?>
                            value="<?php echo $result1['id'] ?>"><?php echo $result1['Name'] ?></option>
                            <?php
                                    }
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


