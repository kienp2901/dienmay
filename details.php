<?php
	include 'inc/header.php';
?>
<?php
    if(!isset($_GET['proid']) || $_GET['proid']==null){
        echo "<script>window.location = '404.php'</script>";
    }else{
        $id=$_GET['proid'];
    }
	if($_SERVER['REQUEST_METHOD'] === 'POST'  && isset($_POST['submit'])){
		$quantity = $_POST['quantity'];
		$addtocart = $ct->add_cart($id, $quantity);
	}
	$customer_id=Session::get('customer_id');
	if($_SERVER['REQUEST_METHOD'] === 'POST'  && isset($_POST['compare'])){
		$productID = $_POST['productID'];
		$insert_compare = $product->insert_compare($productID, $customer_id);
	}
	if($_SERVER['REQUEST_METHOD'] === 'POST'  && isset($_POST['wishlist'])){
		$productID = $_POST['productID'];
		$insert_wishlist = $product->insert_wishlist($productID, $customer_id);
	}
?>
 <div class="main">
    <div class="content">
    	<div class="section group">
		<?php
		  $get_pro_detail = $product->get_details($id);
		  if($get_pro_detail){
			while($result =$get_pro_detail->fetch_assoc()){
		  ?>
				<div class="cont-desc span_1_of_2">				
					<div class="grid images_3_of_2">
						<img src="admin/upload/<?php echo $result['image']; ?>" width="80" alt="">
					</div>
				<div class="desc span_3_of_2">
					<h2><?php echo $result['Name']; ?></h2>
					<p><?php echo $result['product_desc']; ?></p>					
					<div class="price">
						<p>Price: <span><?php echo number_format($result['price'])." "."VND"; ?></span></p>
						<p>Category: <span><?php echo $result['catName']; ?></span></p>
						<p>Brand:<span><?php echo $result['brandName']; ?></span></p>
					</div>
				<div class="add-cart">
					<form action="" method="post">
						<input type="number" class="buyfield" name="quantity" value="1" min="1"/>
						<input type="submit" class="buysubmit" name="submit" value="Buy Now"/>
						
					</form>	
					<?php
							if(isset($addtocart)){
								echo '<span style="color:red;font-size=18px;">Product already added</span>';
							}
						?>			
				</div>


				<div class="add-cart">
					<form action="" method="POST">
					<!-- <a href="?compare=<?php echo $result['id'];  ?>" class="buysubmit">Compare product</a>	 -->
					<input type="hidden" name="productID" value="<?php echo $result['id'];  ?>"/>
					<?php
						$login_check = Session::get("customer_login");
						if($login_check==false){
							echo '';
	  					}else{
							echo '<input type="submit" class="buysubmit" name="compare" value="Compare product"/>'.' ';
							echo '<input type="submit" class="buysubmit" name="wishlist" value="Save to Wishlist"/>';
	   					}
	  				?>	
					<?php
						if(isset($insert_compare)){
							echo $insert_compare; 
						}
						if(isset($insert_wishlist)){
							echo $insert_wishlist; 
						}
					?>
					</form>
					
				</div>
			</div>
			<div class="product-desc">
			<h2>Product Details</h2>
			<p><?php echo $result['product_desc']; ?></p>
	    </div>
				
	</div>
	<?php
						}
					}
					?>
				<div class="rightsidebar span_3_of_1">
					<h2>CATEGORIES</h2>
					<ul>
					<?php 
					$getall_category = $cat->list_category();
					if($getall_category){
						while($result = $getall_category->fetch_assoc()){

					?>
				      <li><a href="productbycat.php?catid=<?php echo $result['id']; ?>"><?php echo $result['Name']; ?></a></li>
				    <?php
						}
					}
					?>
    				</ul>
    	
 				</div>
 		</div>
 	</div>
	 <?php
	include 'inc/footer.php';
?>