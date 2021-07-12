
	<div class="header_bottom">
		<div class="header_bottom_left">
			<div class="section group">
			<?php
				$getLatestDell = $product->getLatestDell();
				if($getLatestDell){
					while($result_dell=$getLatestDell->fetch_assoc()){		
				
			?>
				<div class="listview_1_of_2 images_1_of_2">
					<div class="listimg listimg_2_of_1">
						 <a href="details.php?proid=<?php echo $result_dell['id']; ?>"><img src="admin/upload/<?php echo $result_dell['image']; ?>"></a>
					</div>
				    <div class="text list_2_of_1">
						<h2>DELL</h2>
						<p><?php echo $result_dell['product_desc']; ?></p>
						<div class="button"><span><a href="details.php?proid=<?php echo $result_dell['id']; ?>">Add to cart</a></span></div>
				   </div>
			   </div>
			   <?php
					}
			   }
			   ?>	
			   <?php
				$getLatestOppo = $product->getLatestOppo();
				if($getLatestOppo){
					while($result_oppo=$getLatestOppo->fetch_assoc()){		
				
			?>		
				<div class="listview_1_of_2 images_1_of_2">
					<div class="listimg listimg_2_of_1">
						<a href="details.php?proid=<?php echo $result_oppo['id']; ?>"><img src="admin/upload/<?php echo $result_oppo['image']; ?>"></a>
					</div>
					<div class="text list_2_of_1">
						  <h2>Oppo</h2>
						  <p><?php echo $result_oppo['product_desc']; ?></p>
						  <div class="button"><span><a href="details.php?proid=<?php echo $result_oppo['id']; ?>">Add to cart</a></span></div>
					</div>
				</div>
				<?php
					}
			   }
			   ?>	
			</div>
			<div class="section group">
			<?php
				$getLatestSamsung = $product->getLatestSamsung();
				if($getLatestSamsung){
					while($result_ss=$getLatestSamsung->fetch_assoc()){		
				
			?>	
				<div class="listview_1_of_2 images_1_of_2">
					<div class="listimg listimg_2_of_1">
						<a href="details.php?proid=<?php echo $result_ss['id']; ?>"><img src="admin/upload/<?php echo $result_ss['image']; ?>"></a>
					</div>
				    <div class="text list_2_of_1">
						<h2>SAMSUNG</h2>
						<p><?php echo $result_ss['product_desc']; ?></p>
						<div class="button"><span><a href="details.php?proid=<?php echo $result_ss['id']; ?>">Add to cart</a></span></div>
				   </div>
			   </div>	
			   <?php
					}
			   }
			   ?>	
			   <?php
				$getLatestApple = $product->getLatestApple();
				if($getLatestApple){
					while($result_apple=$getLatestApple->fetch_assoc()){		
				
			?>		
				<div class="listview_1_of_2 images_1_of_2">
					<div class="listimg listimg_2_of_1">
					<a href="details.php?proid=<?php echo $result_apple['id']; ?>"><img src="admin/upload/<?php echo $result_apple['image']; ?>"></a>
					</div>
					<div class="text list_2_of_1">
						  <h2>APPLE</h2>
						  <p><?php echo $result_apple['product_desc']; ?></p>
						  <div class="button"><span><a href="details.php?proid=<?php echo $result_apple['id']; ?>">Add to cart</a></span></div>
					</div>
				</div>
				<?php
					}
			   }
			   ?>	
			</div>
		  <div class="clear"></div>
		</div>
			 <div class="header_bottom_right_images">
		   <!-- FlexSlider -->
             
			<section class="slider">
				  <div class="flexslider">
					<ul class="slides">
					<?php
						$show_slider = $product->list_slider();
						if($show_slider){
							$i=0;
							while($result =$show_slider->fetch_assoc()){
								$i++;
						
					?>
						<li><img src="admin/upload/<?php echo $result['sliderImage']; ?>" alt="<?php echo $result['sliderName']; ?>"></li>
						<?php
                        }
                    }
                ?>	
				    </ul>
				  </div>
	      </section>
<!-- FlexSlider -->
	    </div>
	  <div class="clear"></div>
  </div>