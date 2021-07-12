<?php
	include 'inc/header.php';
?>
<?php
    if(isset($_GET['orderid']) && $_GET['orderid']=='order'){
        $customer_id=Session::get('customer_id');
        $insertOrder = $ct->insert_order($customer_id);
        $delCart = $ct->dell_all_data_cart();
        header('Location:success.php');
    }
	// if($_SERVER['REQUEST_METHOD'] === 'POST'  && isset($_POST['submit'])){
	// 	$quantity = $_POST['quantity'];
	// 	$addtocart = $ct->add_cart($id, $quantity);
	// }
?>
<style>
    .box_left{
        width: 50%;
        border: 1px solid #666;
        float: left;
        padding: 5px;
    }
    .box_right{
        width: 47%;
        border: 1px solid #666;
        float: right;
        padding: 5px;
    }
</style>
<form action="" method="POST">
<div class="main">
    <div class="content">
    	<div class="section group">
        <div class="heading">
    		<h3>Offline Payment</h3>
    		</div>
            <div class="clear"></div>
            <div class="box_left">
            <div class="cartpage">

					<?php
						if(isset($update_quantity_cart)){
							echo $update_quantity_cart; 
						}
					?>
						<table class="tblone">
							<tr>
                                <th width="5%">ID</th>
								<th width="15%">Product Name</th>
								<!-- <th width="10%">Image</th> -->
								<th width="15%">Price</th>
								<th width="25%">Quantity</th>
								<th width="20%">Total Price</th>
							</tr>
							<?php 
							$get_pro_cart=$ct->get_product_cart();
							if($get_pro_cart){
								$subtotal=0;
								$qty=0;
                                $i=0;
								while($result = $get_pro_cart->fetch_assoc()){
                                    $i++;
							?>

							<tr>
                                <td><?php echo $i; ?></td>
								<td><?php echo $result['productName']; ?></td>
								<!-- <td><img src="admin/upload/<?php echo $result['image']; ?>" width="80" alt=""></td> -->
								<td><?php echo number_format($result['price'])." "."VND"; ?></td>
								<td>
										<?php echo $result['quantity']; ?>
								</td>
								<td><?php $total= $result['price']*$result['quantity']; echo number_format($total)." "."VND"; ?></td>
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
								
								echo number_format($subtotal)." "."VND"; 
								Session::set('sum', $subtotal);
								Session::set('qty', $qty);
								?></td>
							</tr>
							<tr>
								<th>VAT : </th>
								<td>10% (<?php echo $vat = $subtotal*0.1 ?>)</td>
							</tr>
							<tr>
								<th>Grand Total :</th>
								<td><?php 
								$vat = $subtotal*0.1;
								$glotal =  $subtotal+$vat;
								echo number_format($glotal)." "."VND";
								?> </td>
							</tr>
					   </table>
					   <?php
							}
					   ?>
					</div>
            </div>
            <div class="box_right">
            <table class="tblone">
                <?php 
                    $id=Session::get('customer_id');
                    $get_customer = $cs->list_customer($id); 
                    if($get_customer){
                        while($result =$get_customer->fetch_assoc()){
                ?>
                <tr>
                    <td>Name</td>
                    <td>:</td>
                    <td><?php echo $result['name']; ?></td>
                </tr>
                <tr>
                    <td>Address</td>
                    <td>:</td>
                    <td><?php echo $result['address']; ?></td>
                </tr>
                <tr>
                    <td>City</td>
                    <td>:</td>
                    <td><?php echo $result['city']; ?></td>
                </tr>
                <!-- <tr>
                    <td>Country</td>
                    <td>:</td>
                    <td><?php echo $result['country']; ?></td>
                </tr> -->
                <tr>
                    <td>Zipcode</td>
                    <td>:</td>
                    <td><?php echo $result['zipcode']; ?></td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td>:</td>
                    <td><?php echo $result['email']; ?></td>
                </tr>
                <tr>
                    <td>Phone</td>
                    <td>:</td>
                    <td><?php echo $result['phone']; ?></td>
                </tr>
                <tr>
                    <td colspan="3"><a href="editprofile.php">Update Profile</a></td>
                </tr>
                <?php
						}
					}
				?>
            </table>
            </div>
            
        </div>
 	</div>
     <center>
     <a href="?orderid=order" style="padding: 10px 70px;
    border: none;
    color: #fff;
    background: red; margin: 10px; cursor:pointer;">Order Now</a>
    </center><br>
</div>
</form>


	 <?php
	include 'inc/footer.php';
?>