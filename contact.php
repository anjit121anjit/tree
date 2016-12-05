<?php require_once('connect/connect.php'); ?>

<?php
if(isset($_POST['send'])){
	$name = $_POST['name'];
	$email = $_POST['email'];
	$subject = $_POST['subject'];
	$message  =$_POST['message'];
	
	$sql = $dbc->query("INSERT INTO contact_us VALUES('', '$name', '$email', '$subject', '$message')");
	
	header("location: contact.php");
	exit();
}
?>

<?php
if( isset($_POST['name']) && isset($_POST['email']) && isset($_POST['subject']) && isset($_POST['message']) ){
	$name = $_POST['name'];
	$email = $_POST['email'];
	$subject = $_POST['subject'];
	$message = nl2br($_POST['message']);
	$to = "overleftshop@gmail.com";	
	$from = $email;
	$subject = 'Contact Form Message';
	$message = '<b>Name:</b> '.$name.' <br><b>Email:</b> '.$email.' <br><b>Subject:</b> '.$subject.' <p>'.$message.'</p>';
	$headers = "From: $from\n";
	$headers .= "MIME-Version: 1.0\n";
	$headers .= "Content-type: text/html; charset=iso-8859-1\n";
	if( mail($to, $subject, $message, $headers) ){
		//echo "success";
	} else {
		echo "The server failed to send the message. Please try again later.";
	}
}
?>
<?php include 'includes/header.php';  ?>
	<!-- grow -->
	<div class="grow">
		<div class="container">
			<h2>Contact</h2>
		</div>
	</div>
	<!-- grow -->
<!--content-->
<div class="contact">
			
			<div class="container">
			<div class="contact-form">
				
				<div class="col-md-8 contact-grid">
					<form id="contact_form" action="contact.php" method="post" enctype="multipart/form-data" onsubmit="submitForm(); return false;">
						<input type="text" name="name" value="Name" onfocus="this.value='';" onblur="if (this.value == '') {this.value ='Name';}" required>
					
						<input type="text" name="email" value="Email" onfocus="this.value='';" onblur="if (this.value == '') {this.value ='Email';}" required>
						<input type="text" name="subject" value="Subject" onfocus="this.value='';" onblur="if (this.value == '') {this.value ='Subject';}" required>
						
						<textarea name="message" cols="77" rows="6" value=" " onfocus="this.value='';" onblur="if (this.value == '') {this.value = 'Message';}" required>Message</textarea>
						<div class="send">
							<input id="contact_send" type="submit" name="send" value="Send"><span id="status"></span>
						</div>
					</form>
				</div>
				<div class="col-md-4 contact-in">

						<div class="address-more">
						<h4>Address</h4>
							<p><b>Nationnal College of Ireland,</b></p>
							<p>Mayor Street,</p>
							<p>IFSC,</p>
							<p>Dublin 1,</p>
						</div>
						<div class="address-more">
						<h4>Contact Information</h4>
							<p>Tel: (01) 449 8500</p>
							<p>Fax: (01) 497 2200</p>
							<p>Email:<a href="mailto:contact@example.com"> overleftshop@gmail.com</a></p>
						</div>
					
				</div>
				<div class="clearfix"> </div>
			</div>
			<div class="map">
				<div style="text-decoration:none; overflow:hidden; height:300px; width:1200px; max-width:100%;">
					<div id="gmap_display" style="height:100%; width:100%;max-width:100%;">
						<iframe style="height:100%;width:100%;border:0;" frameborder="0" src="https://www.google.com/maps/embed/v1/place?q=National+College+of+Ireland,+Ireland&key=AIzaSyAN0om9mFmy1QN6Wf54tXAowK4eT0ZUPrU"></iframe>
					</div>
				</div>
			</div>
		</div>
		
	</div>
<!--//content-->
<?php include 'includes/footer.php';  ?>