<?php
	include 'inc/header.php';
?>
<?php
	$login_check = Session::get("customer_login");
	if($login_check==false){
		header('Location:login.php');
	}
?>
<?php
    // if(!isset($_GET['proid']) || $_GET['proid']==null){
    //     echo "<script>window.location = '404.php'</script>";
    // }else{
    //     $id=$_GET['proid'];
    // }
	// if($_SERVER['REQUEST_METHOD'] === 'POST'  && isset($_POST['submit'])){
	// 	$quantity = $_POST['quantity'];
	// 	$addtocart = $ct->add_cart($id, $quantity);
	// }
?>
<style>
    h3.payment{
        text-align: center;
        font-size: 20px;
        font-weight: bold;
        text-decoration: underline;
        margin-bottom: 20px;
    }
    .wrapper_method{
        text-align: center;
        width: 550px;
        margin: 0 auto;
        border: 1px solid #666;
        padding: 20px;
        background: cornsilk;
    }
    .wrapper_method a{
        padding: 10px;
        background: red;
        color: #fff;
    }
</style>
 <div class="main">
    <div class="content">
        <div class="content_top">
    		<div class="heading">
    		<h3>Payment</h3>
    		</div>
            <div class="clear"></div>

            <div class="wrapper_method">
            <h3 class="payment">Choose your method payment</h3>
            <a class="payment_href" href="offlinepayment.php">Offline Payment</a>
            <a class="payment_href" href="onlinepayment.php">Online Payment</a>
            <a style="background:grey;    display: flex;
                    background: grey;
                    margin-top: 20px;
                    margin-left: 220px;
                    width: 100px;
                    justify-content: center;
                    text-align: center;" href="cart.php"> << Previous </a>
            </div>
            
    		
    	</div>
    	<div class="section group">
            
 		</div>
 	</div>
	 <?php
	include 'inc/footer.php';
?>