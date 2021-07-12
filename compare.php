<?php
	include 'inc/header.php';

?>
<?php
// if(isset($_GET['id'])){
// 	$id=$_GET['id'];
// 	$delete_cart = $ct->delete_cart($id);
// }
// 	if($_SERVER['REQUEST_METHOD'] === 'POST'  && isset($_POST['submit'])){
// 		$cartID = $_POST['id'];
// 		$quantity = $_POST['quantity'];
// 		$update_quantity_cart = $ct->update_quantity_cart($cartID, $quantity);
// 		if($quantity==0){
// 			$delete_cart = $ct->delete_cart($cartID);
// 		}
// 	}
	
?>
<?php
// if(!isset($_GET['id'])){
// 	echo "<meta http-equiv='refresh' content='0;URL=?id=live'>";
// }

?>
 <div class="main">
    <div class="content">
    	<div class="cartoption">		
			<div class="cartpage">
			    	<h2 style="width:500px;">Compare Product</h2>
						<table class="tblone">
							<tr>
								<th width="20%">ID</th>
								<th width="20%">Product Name</th>
								<th width="10%">Image</th>
								<th width="15%">Price</th>
								<th width="10%">Action</th>
							</tr>
							<?php 
                            $customer_id=Session::get('customer_id');
							$list_compare=$product->list_compare($customer_id);
							if($list_compare){
								$i=0;
								$subtotal=0;
								$qty=0;
								while($result = $list_compare->fetch_assoc()){
									$i++;
							?>

							<tr>
								<td><?php echo $i; ?></td>
								<td><?php echo $result['productName']; ?></td>
								<td><img src="admin/upload/<?php echo $result['image']; ?>" width="80" alt=""></td>
								<td><?php echo number_format($result['price'])." "."VND"; ?></td>
								<td><a href="details.php?proid=<?php echo $result['productID']; ?>">View</a></td>
							</tr>
							
							<?php 
								}
							}
							?>
							
						</table>
						
					</div>
					<div class="shopping">
						<div class="shopleft">
							<a href="index.php"> <img src="images/shop.png" alt="" /></a>
						</div>
					</div>
    	</div>  	
       <div class="clear"></div>
    </div>
 </div>
 <?php
	include 'inc/footer.php';
?>