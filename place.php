<?php include 'checkout_main.php'; ?>
<?php include 'includes/header.php'; ?>

<div class="grow">
    <div class="container">
        <h2>My Shopping Bag </h2>
    </div>
</div>

<div class="container">
    <div class = "check">
        <div class="col-md-12 cart-total">
        
        
        <div class="col-md-8 cart-total">
        <h2> Login to checkout process</h2>
         <div=account>
             <div class="account-pass">
		        <div class="col-md-8 account-top">
         	<form id="login_form" action="login.php" method="post" enctype="multipart/form-data">
				<div>
					<lable>Username:</lable>
					<input id="log_username" type="text" name="username">
					<span id="log_username_error_message"></span>
				</div>
				<div>
					<lable>Password:</lable>
					<input id="log_password" type="password" name="password">
					<span id="log_password_error_message"></span>
							
				</div>
				<input id="log_submit" type="submit" name="log_submit" value="Login">
				<div id="error_message"></div>
			</form>
			
			<br />
			<a href="" class="forgot">Forgot Password</a><br /><br />
			<a href="register.php" class="create">Create an account</a>
		</div>
		
		
         </div>
         
         </div>
         <div class="clearfix"> </div>
		</div>
	<div class="clearfix"> </div>
        </div>
        </div>
        
    </div>
    </div>
        
        
<?php include 'includes/footer.php';  ?>
