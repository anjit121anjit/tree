<?php require_once('connect/connect.php'); ?>
<?php  

$username = $_POST["username"];  
$password = md5($_POST["password"]);  

$q1 = "SELECT * FROM users where username='$username' && password='$password'";
$result = $dbc->query($q1);

if(!mysqli_fetch_row($result)){
 echo 0;
}
else{

echo 1;
}


 ?>  