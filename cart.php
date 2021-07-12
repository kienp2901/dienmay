<?php
	include 'inc/header.php';

?>
<?php
if(isset($_GET['id'])){
	$id=$_GET['id'];
	$delete_cart = $ct->delete_cart($id);
}
	if($_SERVER['REQUEST_METHOD'] === 'POST'  && isset($_POST['submit'])){
		$cartID = $_POST['id'];
		$quantity = $_POST['quantity'];
		$update_quantity_cart = $ct->update_quantity_cart($cartID, $quantity);
		if($quantity==0){
			$delete_cart = $ct->delete_cart($cartID);
		}
	}
	
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
			    	<h2>Your Cart</h2>
					<?php
						if(isset($update_quantity_cart)){
							echo $update_quantity_cart; 
						}
					?>
						<table class="tblone">
							<tr>
								<th width="20%">Product Name</th>
								<th width="10%">Image</th>
								<th width="15%">Price</th>
								<th width="25%">Quantity</th>
								<th width="20%">Total Price</th>
								<th width="10%">Action</th>
							</tr>
							<?php 
							$get_pro_cart=$ct->get_product_cart();
							if($get_pro_cart){
								$subtotal=0;
								$qty=0;
								while($result = $get_pro_cart->fetch_assoc()){
							?>

							<tr>
								<td><?php echo $result['productName']; ?></td>
								<td><img src="admin/upload/<?php echo $result['image']; ?>" width="80" alt=""></td>
								<td><?php echo number_format($result['price'])." "."VND"; ?></td>
								<td>
									<form action="" method="post">
										<input type="hidden" name="id" min="0" value="<?php echo $result['id']; ?>"/>
										<input type="number" name="quantity" min="0" value="<?php echo $result['quantity']; ?>"/>
										<input type="submit" name="submit" value="Update"/>
									</form>
								</td>
								<td><?php $total= $result['price']*$result['quantity']; echo $total." "."VND"; ?></td>
								<td><a onclick="return confirm('Are you want to delete?')" href="?id=<?php echo $result['id'] ?>">X</a></td>
							</tr>
							
							<?php 
							$subtotal += $total;
							$qty = $qty + $result['quantity'];
								}
							}
							?>
							
						</table>
						<?php
							if($get_pro_cart){
						?>
						<table style="float:right;text-align:left;" width="40%">
							<tr>
								<th>Sub Total : </th>
								<td><?php 
								
								echo $subtotal." "."VND"; 
								Session::set('sum', $subtotal);
								Session::set('qty', $qty);
								?></td>
							</tr>
							<tr>
								<th>VAT : </th>
								<td>10%</td>
							</tr>
							<tr>
								<th>Grand Total :</th>
								<td><?php 
								$vat = $subtotal*0.1;
								$glotal =  $subtotal+$vat;
								echo $glotal." "."VND";
								?> </td>
							</tr>
					   </table>
					   <?php
							}
					   ?>
					</div>
					<div class="shopping">
						<div class="shopleft">
							<a href="index.php"> <img src="images/shop.png" alt="" /></a>
						</div>
						<div class="shopright">
							<a href="payment.php"> <img src="images/check.png" alt="" /></a>
						</div>
					</div>
    	</div>  	
       <div class="clear"></div>
    </div>
 </div>
 <?php
	include 'inc/footer.php';
?>