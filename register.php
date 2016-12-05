<?php require_once('connect/connect.php'); ?>

<?php include 'includes/header.php';  ?>
	<!-- grow -->
	<div class="grow">
		<div class="container">
			<h2>Register</h2>
		</div>
	</div>
	<!-- grow -->
<!--content-->
<div class=" container">
<div class=" register">
	
		  	  <form class="registration_form" id="registration_form" action="register.php" method="post" enctype="multipart/form-data"> 
				 <div class="col-md-6 register-top-grid">
					<h3>Personal Infomation</h3>
					 <div>
						<lable>Username:</lable>
						<input id="reg_username" type="text" name="username">
						<span id="username_error_message"></span>
					 </div>
					 <div>
						<lable>First Name:</lable>
						<input id="reg_f_name" type="text" name="f_name">
						<span id="f_name_error_message"></span>
					 </div>
					 <div>
						<lable>Last Name:</lable>
						<input id="reg_l_name" type="text" name="l_name">
						<span id="l_name_error_message"></span>
					 </div>
					 <div>
						 <lable>Email Address:</lable>
						 <input id="reg_email" type="text" name="email">
						 <span id="email_error_message"></span>
					 </div>
					 <div>
						<lable>Password:</lable>
						<input id="reg_password" type="password" name="password">
						<span id="password_error_message"></span>
						
					</div>
					<div>
						<lable>Confirm Password:</lable>
						<input id="reg_re_password" type="password" name="re_password">
						<span id="re_password_error_message"></span>
					</div>
					<input id="reg_submit" type="submit" name="reg_submit" value="Register">
						<!--
					<a class="news-letter" href="#">
						<label class="checkbox"><input type="checkbox" checked=""><i> </i>Sign Up for Newsletter</label>
					</a>
						-->
					</div>
					 <div class="clearfix"> </div>
				</form>
			</div>
</div>
<!--//content-->
<?php include 'includes/footer.php';  ?>
			