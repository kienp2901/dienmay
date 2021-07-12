<?php
	include 'inc/header.php';

?>
<?php

    if(!isset($_GET['catid']) || $_GET['catid']==null){
        echo "<script>window.location = '404.php'</script>";
    }else{
        $id=$_GET['catid'];
    }
	
?>
 <div class="main">
    <div class="content">
    	<div class="content_top">
    		<div class="heading">
			<?php
			$get_name_by_cat = $cat->get_name_by_cat($id);
			if($get_name_by_cat){
				while($result = $get_name_by_cat->fetch_assoc()){

		  ?>
    		<h3>Category: <?php echo $result['Name']; ?></h3>
			<?php
						}
					}
					?>
    		</div>
    		<div class="clear"></div>
    	</div>
	      <div class="section group">
		  <?php
			$get_product_by_cat = $cat->get_product_by_cat($id);
			if($get_product_by_cat){
				while($result = $get_product_by_cat->fetch_assoc()){

		  ?>
				<div class="grid_1_of_4 images_1_of_4">
					 <a href="preview-3.html"><img src="admin/upload/<?php echo $result['image']; ?>"></a>
					 <h2><?php echo $result['Name']; ?></h2>
					 <p><?php echo $fm->textShorten($result['product_desc'], 50);  ?></p>
					 <p><span class="price"><?php echo $result['price']." "."VND"; ?></span></p>
				     <div class="button"><span><a href="preview.html" class="details">Details</a></span></div>
				</div>
				<?php
						}
					}
					?>
			</div>

	
	
    </div>
 </div>
 <?php
	include 'inc/footer.php';
?>