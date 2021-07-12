<?php
	include 'inc/header.php';
?>
<?php  
$login_check = Session::get("customer_login");
if($login_check){
	header('Location:index.php');
}
?>
<?php
	if($_SERVER['REQUEST_METHOD'] === 'POST'  && isset($_POST['submit'])){
		$insertCustomer = $cs->insert_customer($_POST);
	}
?>

<?php
if($_SERVER['REQUEST_METHOD'] === 'POST'  && isset($_POST['login'])){
	$loginCustomer = $cs->login_customer($_POST);
}

?>
 <div class="main">
    <div class="content">
    	 <div class="login_panel">
        	<h3>Existing Customers</h3>
        	<p>Sign in with the form below.</p>
			<?php
				if(isset($loginCustomer)){
					echo $loginCustomer;
				}
			?>
        	<form action="" method="POST" id="member">
                	<input  type="text" name="email" class="field" placeholder="Enter E-mail...">
                    <input  type="password" name="password" class="field" placeholder="Enter Password...">
                 
                 <p class="note">If you forgot your passoword just enter your email and click <a href="#">here</a></p>
                    <div class="search"><div><input type="submit" name="login" class="grey" value="Sing In"></div></div>
					</form>
                    </div>
    	<div class="register_account">
    		<h3>Register New Account</h3>
			<?php
				if(isset($insertCustomer)){
					echo $insertCustomer;
				}
			?>
    		<form action="" method="POST">
		   			 <table>
		   				<tbody>
						<tr>
						<td>
							<div>
							<input type="text" name="name" placeholder="Enter Name..." >
							</div>
							
							<div>
							   <input type="text" name="city" placeholder="Enter City...">
							</div>
							
							<div>
								<input type="text" name="zipcode" placeholder="Enter Zipcode...">
							</div>
							<div>
								<input type="text" name="email" placeholder="Enter E-mail...">
							</div>
		    			 </td>
		    			<td>
						<div>
							<input type="text" name="address" placeholder="Enter Address...">
						</div>
		    		<div>
						<select id="country" name="country" onchange="change_country(this.value)" class="frm-field required">
							<option value="null">Select a Country</option>         
							<option value="hcm">Thành phố Hồ Chí Minh</option>
							<option value="na">Nghệ An</option>
							<option value="hn">Thành phố Hà Nội</option>
							<option value="dn">Đà Nẵng</option>
		         </select>
				 </div>		        
	
		           <div>
		          <input type="text" name="phone" placeholder="Enter Phone...">
		          </div>
				  
				  <div>
					<input type="text" name="password" placeholder="Enter Password...">
				</div>
		    	</td>
		    </tr> 
		    </tbody></table> 
			<style>
			.search .grey{
				padding: 10px 15px;
				font-size: 15px;
				font-weight: bold;
				color: #fff;	
				border-radius: 3px;
				cursor: pointer;
				box-shadow: 0 1px rgb(255 255 255 / 20%) inset, 0 2px 2px -1px rgb(0 0 0 / 30%);
				border: 1px solid #303030;
				background: #3f4040;
				background: -moz-linear-gradient(top, #3f4040 0%, #303131 100%);
				background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,#3f4040), color-stop(100%,#303131));
				background: -webkit-linear-gradient(top, #3f4040 0%,#303131 100%);
				background: -o-linear-gradient(top, #3f4040 0%,#303131 100%);
				background: -ms-linear-gradient(top, #3f4040 0%,#303131 100%);
				background: linear-gradient(top, #3f4040 0%,#303131 100%);
				filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#3f4040', endColorstr='#303131',GradientType=0 );
				text-shadow: 0 1px 0 rgb(0 0 0 / 40%);
			}
			</style>
		   <div class="search"><div><input type="submit" name="submit" class="grey" value="Create Account"></div></div>
		    <p class="terms">By clicking 'Create Account' you agree to the <a href="#">Terms &amp; Conditions</a>.</p>
		    <div class="clear"></div>
		    </form>
    	</div>  	
       <div class="clear"></div>
    </div>
 </div>
 <?php
	include 'inc/footer.php';
?>

