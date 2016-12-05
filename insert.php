<?php require_once('connect/connect.php'); ?>

<?php
$username = &$_POST['username'];
$f_name = &$_POST['f_name'];
$l_name = &$_POST['l_name'];
$email = &$_POST['email'];
$password = &$_POST['password'];
$cpassword = &$_POST['re_password'];
$password = md5($password);
$date = date('Y-m-d H:i:s');

if($username && $f_name && $l_name && $email && $password && $cpassword){
		$result = $dbc->query("INSERT INTO users VALUES ('', '$username', '$f_name', '$l_name', '$email', '$password', '$date');") or die (mysqli_error($dbc));
	echo 1;
}else{
	echo "Registration not posible";
}
?>