<?php
	include 'lib/session.php';
    Session::init();
?>
<?php
    include_once 'lib/database.php';
    include_once 'helpers/format.php';
	include_once 'classes/web/cart.php';
	include_once 'classes/web/user.php';
	include_once 'classes/web/product.php';
	include_once 'classes/web/category.php';
	include_once 'classes/web/customer.php';
	include_once 'classes/web/brand.php';
	$cs=new customer();
	$db=new Database();
	$fm=new Format();
	$ct=new cart();
	$us=new user();
	$br = new brand();
	$cat=new category();
	$product=new product();

?>
<?php
  header("Cache-Control: no-cache, must-revalidate");
  header("Pragma: no-cache"); 
  header("Expires: Sat, 26 Jul 1997 05:00:00 GMT"); 
  header("Cache-Control: max-age=2592000");
?>

<!DOCTYPE HTML>
<head>
<title>Store Website</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<link href="css/style.css" rel="stylesheet" type="text/css" media="all"/>
<link href="css/menu.css" rel="stylesheet" type="text/css" media="all"/>
<script src="js/jquerymain.js"></script>
<script src="js/script.js" type="text/javascript"></script>
<script type="text/javascript" src="js/jquery-1.7.2.min.js"></script> 
<script type="text/javascript" src="js/nav.js"></script>
<script type="text/javascript" src="js/move-top.js"></script>
<script type="text/javascript" src="js/easing.js"></script> 
<script type="text/javascript" src="js/nav-hover.js"></script>
<link href='http://fonts.googleapis.com/css?family=Monda' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Doppio+One' rel='stylesheet' type='text/css'>
<script type="text/javascript">
  $(document).ready(function($){
    $('#dc_mega-menu-orange').dcMegaMenu({rowItems:'4',speed:'fast',effect:'fade'});
  });
</script>
</head>
<body>
  <div class="wrap">
		<div class="header_top">
			<div class="logo">
				<a href="index.php"><img src="images/logo.png" alt="" /></a>
			</div>
			  <div class="header_top_right">
			  <div class="search_box">
				    <form action="search.php" method="post">
				    	<input type="text" placeholder="Tìm kiếm sản phẩm" name="tukhoa">
				    	<input type="submit" name="search_product" value="Tìm kiếm"> 
				    </form>
			    </div>
			    <div class="shopping_cart">
					<div class="cart">
						<a href="#" title="View my shopping cart" rel="nofollow">					
								<span class="no_product">
								<?php
								$check_cart = $ct->get_product_cart();
								if($check_cart){
									$qty = Session::get("qty");
									$sum = Session::get("sum");
									echo $sum.' '.'đ'.'/'.'Số lượng:'.$qty;
								}else{
									echo 'Empty';
								}
									
								?>
								</span>
							</a>
						</div>
			      </div>
				  <?php
					if(isset($_GET['customerid'])){
						// $delCart = $ct->dell_all_data_cart();
						Session::destroy();
					}
				  ?>
		   <div class="login">
			   <?php  
			   $login_check = Session::get("customer_login");
			   if($login_check==false){
					echo '<a href="login.php">Login</a>';
			   }else{
				echo '<a href="?customerid='.Session::get("customer_id").'">Logout</a>';
			   }
			   ?>
		
		</div>
		 <div class="clear"></div>
	 </div>
	 <div class="clear"></div>
 </div>
<div class="menu">
<nav class="navbar navbar-inverse">
<div class="container-fluid">
	<ul id="dc_mega-menu-orange" class="dc_mm-orange nav navbar-nav mr-auto">
	  	<li><a href="index.php">Home</a></li>
		<li class="dropdown">
	        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
	        	Thương Hiệu
	        <span class="caret"></span></a>
	        <ul class="dropdown-menu">
			<?php
	        	$brand = $br->show_brand_home();
	        	if($brand){
	      			while($result_new = $brand->fetch_assoc()){
	      	?>
	        <li>
			<a href="topbrands.php?brandid=<?php echo $result_new['id'] ?>"><?php echo $result_new['Name'] ?></a>
			</li>
	        <?php
	          		}
	          	} 
	        ?>
	        </ul>
	    </li>
	  <li><a href="cart.php">Cart</a></li>
	  <?php
	  $customer_id=Session::get('customer_id');
		$check_order = $ct->check_order($customer_id);
		if($check_order==true){
			echo '<li><a href="orderdetail.php">Ordered</a></li>';
		}else{
			echo '';
		}

	  ?>
	  <?php
	  $customer_id=Session::get('customer_id');
		$check_compare = $product->list_compare($customer_id);
		if($check_compare==true){
			echo '<li><a href="compare.php">Compare</a></li>';
		}else{
			echo '';
		}

	  ?>
	  <?php
	  $customer_id=Session::get('customer_id');
		$check_wishlist = $product->list_wishlist($customer_id);
		if($check_wishlist==true){
			echo '<li><a href="wishlist.php">Wishlist</a></li>';
		}else{
			echo '';
		}

	  ?>
	  <?php
		$login_check = Session::get("customer_login");
		if($login_check==false){
			echo '';
	   }else{
		echo '<li><a href="profile.php">Profile</a></li>';
	   }
	  ?>
	  <li><a href="contact.php">Contact</a> </li>
	  <div class="clear"></div>
	</ul>
</div>
</nav>
</div>