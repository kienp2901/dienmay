<?php
	include 'inc/header.php';
	include 'inc/slider.php';
?>
<style>
.grid_1_of_4:first-child {
	margin-left: 7px;
}
.grid_1_of_4 {
	margin: 10px 7px;
}
.grid_1_of_4 img {
	width: 80px;
	height: 100px;
}

</style>
 <div class="main">
    <div class="content">
    	<div class="content_top">
    		<div class="heading">
    		<h3>Feature Products</h3>
    		</div>
    		<div class="clear"></div>
    	</div>
	      <div class="section group">
		  <?php
		  $getPro = $product->listPro_feathered();
		  if($getPro){
			while($result =$getPro->fetch_assoc()){
		  ?>
				<div class="grid_1_of_4 images_1_of_4">
					 <a href="details.php"><img src="admin/upload/<?php echo $result['image']; ?>" width="80" alt=""></a>
					 <h2><?php echo $result['Name']; ?></h2>
					 <p><?php echo $fm->textShorten($result['product_desc'], 80);  ?></p>
					 <p><span class="price"><?php echo number_format($result['price'])." "."VND"; ?></span></p>
				     <div class="button"><span><a href="details.php?proid=<?php echo $result['id']; ?>" class="details">Details</a></span></div>
				</div>
				<?php
						}
					}
					?>
			</div>
			<div class="content_bottom">
    		<div class="heading">
    		<h3>New Products</h3>
    		</div>
    		<div class="clear"></div>
    	</div>
			<div class="section group">
			<?php
		  $getProNew = $product->listPro_New();
		  if($getProNew){
			while($result_new =$getProNew->fetch_assoc()){
		  ?>
				<div class="grid_1_of_4 images_1_of_4">
					 <a href="details.php"><img src="admin/upload/<?php echo $result_new['image']; ?>" width="80" alt=""></a>
					 <h2><?php echo $result_new['Name']; ?></h2>
					 <p><span class="price"><?php echo number_format($result_new['price'])." "."VND"; ?></span></p>
				     <div class="button"><span><a href="details.php?proid=<?php echo $result_new['id']; ?>" class="details">Details</a></span></div>
				</div>
				<?php
						}
					}
					?>
			</div>
			<style type="text/css">
				a.phantrang {
				    border: 1px solid #ddd;
				    padding: 10px;
				    background: #414045;
				    color: #fff;
				    cursor: pointer;
				   
				}
				a.phantrang:hover {
				    background: blue;
				}
			</style>	
			<div class="">
				<?php
				if(isset($_GET['trang'])){
					$trang = $_GET['trang'];
				}else{
					$trang = 1;
				}
					$product_all = $product->list_page_product();
					$product_count = mysqli_num_rows($product_all);
					$product_button = $product_count/4;
					$i=1;

					for($i=1; $i<=$product_button;$i++){
				?>
					<a class="phantrang" 
						<?php 
						if($i==$trang){ 
							echo 'style="background:orange"';
						} 
						?> style="margin:0 10px;" href="index.php?trang=<?php echo $i ?>"><?php echo $i ?></a>					
				<?php
					}
				?>
			</div>
    </div>
 </div>
 <?php
	include 'inc/footer.php';
?>