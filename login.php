<?php require_once('connect/connect.php'); ?>

 <?php include 'includes/header.php';  ?>
	<!-- grow -->
	<div class="grow">
		<div class="container">
			<h2>Login</h2>
		</div>
	</div>
	<!-- grow -->
<!--content-->
<div class="container">
		<div class="account">
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
		<div class="col-md-4 left-account ">
			<a href="single.html"><img class="img-responsive " src="images/s1.jpg" alt=""></a>
			<div class="five">
			<h2>25% </h2><span>discount</span>
			</div>
<div class="clearfix"> </div>
		</div>
	<div class="clearfix"> </div>
	</div>
	</div>

</div>

<!--//content-->
<?php include 'includes/footer.php';  ?>
			