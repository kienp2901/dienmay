<?php
	include 'inc/header.php';
?>
<?php
    // if(!isset($_GET['orderid']) && $_GET['orderid']==null){
    //     $customer_id=Session::get('customer_id');
    //     $insertOrder = $ct->insert_order($customer_id);
    //     $delCart = $ct->dell_all_data_cart();
    //     header('Location:success.php');
    // }
	// if($_SERVER['REQUEST_METHOD'] === 'POST'  && isset($_POST['submit'])){
	// 	$quantity = $_POST['quantity'];
	// 	$addtocart = $ct->add_cart($id, $quantity);
	// }
?>
<style>
    .section {
        text-align: center;
    }
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
        <h2>Success Order</h2>
        <?php
            $customer_id=Session::get('customer_id');
            $get_amount = $ct->getAmountPrice($customer_id);
            if($get_amount){
                $amount=0;
                while($result = $get_amount->fetch_assoc()){
                    $price=$result['price'];
                    $amount += $price;
                }
            }
        ?>
            <p>Total price you have bought from my website: <?php $vat = $amount * 0.1; $total = $vat + $amount; echo number_format($total); ?> VND</p>

            <p>We wil contact as soon as possiable. Please see your order detail here  <a href="orderdetail.php">Click here</a></p>
        </div>
 	</div>
    
</div>
</form>


	 <?php
	include 'inc/footer.php';
?>