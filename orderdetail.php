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
$login_check = Session::get("customer_login");
$ct = new cart();
if($login_check==false){
	header('Location:login.php');
}
if(isset($_GET['confirmid'])){
	$id=$_GET['confirmid'];
	$time=$_GET['time'];
	$price=$_GET['price'];
	$change_shift = $ct->change_shift($id,$time,$price);
}
?>
 <div class="main">
    <div class="content">
    	<div class="cartoption">		
			<div class="cartpage">
			    	<h2 style="width: 500px;">Your Detail Order</h2>
						<table class="tblone">
							<tr>
                                <th width="10%">ID</th>
								<th width="20%">Product Name</th>
								<th width="10%">Image</th>
								<th width="15%">Price</th>
								<th width="15%">Quantity</th>
                                <th width="10%">Date</th>
                                <th width="10%">Status</th>
								<th width="10%">Action</th>
							</tr>
							<?php 
                            $customer_id=Session::get('customer_id');
							$get_cart_order=$ct->get_cart_order($customer_id);
                            $i=0;
							if($get_cart_order){

								while($result = $get_cart_order->fetch_assoc()){
                                    $i++;
							?>

							<tr>
                                <td><?php echo $i; ?></td>
								<td><?php echo $result['productName']; ?></td>
								<td><img src="admin/upload/<?php echo $result['image']; ?>" width="80" alt=""></td>
								<td><?php echo number_format($result['price'])." "."VND"; ?></td>
								<td>
                                <?php echo $result['quantity']; ?>
								</td>
                                <td>
                                <?php echo $fm->formatDate($result['date_order']); ?>
								</td>
                                <td>
                                    <?php 
                                    if($result['status'] == '0'){
                                        echo 'Đang xử lý';
                                    }elseif($result['status'] == '1'){
									?>
										<span>Đã vận chuyển</span>									
									<?php
									}else{
										echo 'Đã nhận hàng';
									}
                                    ?>
								</td>

                                <?php 
                                    if($result['status'] == '0'){
                                ?>
                                	<td><?php echo 'N/A'; ?></td>
                                <?php        
                                    }elseif($result['status'] == '1'){
                                ?>
									<td><a href="?confirmid=<?php echo $customer_id; ?>&price=<?php echo $result['price']; ?>&time=<?php echo $result['date_order']; ?>"> Nhận hàng</a></td>
                                <?php
                                    }else{
								?>
                                	<td><?php echo 'Đã nhận hàng'; ?></td>
								<?php	
									}
                                ?>
							</tr>
							
							<?php 
								}
							}
							?>
							
						</table>
						
					</div>

    	</div>  	
       <div class="clear"></div>
    </div>
 </div>
 <?php
	include 'inc/footer.php';
?>