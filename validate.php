<?php require_once('connect/connect.php'); ?>

<?php

$username = &$_POST['usernames'];
$email = &$_POST['emails'];

if($username != ""){
	
	$sql = "SELECT username FROM users WHERE username = '".$username."'";
	$result = mysqli_query($dbc, $sql);
	
	if(mysqli_num_rows($result) != true){
		echo 1;
	}else{
		echo 0;
	}
}

if($email != ""){
	
	$sql_email = "SELECT email FROM users WHERE email = '".$email."'";
	$result_email = mysqli_query($dbc, $sql_email);
	
	if(mysqli_num_rows($result_email) != true){
		echo 1;
	}else{
		echo 0;
	}
}


?>