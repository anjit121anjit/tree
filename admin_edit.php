<?php require_once('connect/connect.php'); ?>

<?php
	if(isset($_POST['submit'])){
		$search_code = $_POST['search_code'];
		$sql = $dbc->query("SELECT * FROM werahouse WHERE CONCAT(code) LIKE '%". $search_code ."%' ");
		$row = mysqli_fetch_row;
	}else{
		$sql = $dbc->query("SELECT * FROM werahouse ORDER BY code DESC LIMIT 0, 5");
		$row = mysqli_fetch_row;
	}
?>

<?php
	$product_list = '';
	while($row = mysqli_fetch_array($sql, MYSQLI_ASSOC)){
		$id = $row['id'];
		$for_what = $row['for_what'];
		$type = $row['type'];
		$title = $row["title"];
		$code = $row['code'];
		$color = $row['color'];
		$size = $row['size'];
		$amount = $row['amount'];
		$price = $row["price"];
		$price = number_format($price, 2);
		$description = $row['description'];
		$date = $row['date'];
		$available = $row['available'];
		$discount = $row['discount'];
		$image = $row['image'];
	$product_list .= '<div class="top_sing">
				<div class="col-md-7 simgle-top">
				<img class="thumb-image" src="data:image/jpeg;base64,'. base64_encode( $row['image'] ).'"/>
				</div>
				<div class="col-md-5 single-top-in simpleCart_shelfItem">
					<table>
						<tr>
							<td>For what:</td>
							<td>'. $for_what .'</td>
						</tr>
						<tr>
							<td>Type:</td>
							<td>'. $type .'</td>
						</tr>
						<tr>
							<td>Title:</td>
							<td>'. $title .'</td>
						</tr>
						<tr>
							<td>Code:</td>
							<td>'. $code .'</td>
						</tr>
						<tr>
							<td>Color:</td>
							<td>'. $color .'</td>
						</tr>
						<tr>
							<td>Size:</td>
							<td>'. $size .'</td>
						</tr>
						<tr>
							<td>Amount:</td>
							<td>'. $amount .'</td>
						</tr>
						<tr>
							<td>Price:</td>
							<td>'. $price .'</td>
						</tr>
						<tr>
							<td>Description:</td>
							<td>'. $description .'</td>
						</tr>
						<tr>
							<td>Date:</td>
							<td>'. $date .'</td>
						</tr>
						<tr>
							<td>Available:</td>
							<td>'. ($available === "1" ? "Yes" : "No") .'</td>
						</tr>
						<tr>
							<td>Discount:</td>
							<td>'. $discount .'%</td>
						</tr>
						<tr>
							<td></td>
							<td>
								<a class="edit_submit"  href="admin_change.php?productid='.$id.'">Edit</a>
								<a class="edit_submit" href="admin_edit.php?deleteid='.$id.'">Delete</a>
							</td>
						</tr>
					</table>
				</div>
			</div>';
	}
?>

<?php
	if(isset($_GET['deleteid'])){
		echo "Do you want delete product where ID = " .$_GET['deleteid']. "? <a href='admin_edit.php?yes_delete=" .$_GET['deleteid']. "'>Yes</a> | <a href='admin_edit.php'>No</a> ";
		exit();
	}
	
	if(isset($_GET['yes_delete'])){
		$id_to_delete = $_GET['yes_delete'];
		$sql = $dbc->query("DELETE FROM werahouse WHERE id=$id_to_delete LIMIT 1")or die(mysqli_error);
	header("location: admin_edit.php");
	exit();
	}
?>

<?php include 'includes/header.php';  ?>
<!-- grow -->
	<div class="grow">
		<div class="container">
			<h2>Edit</h2>
		</div>
	</div>
	<div class="container admin_edit">
		<form action="admin_edit.php" method="post">
			<div class="edit_search">
				<input class="search_code" type="text" name="search_code" placeholder="Enter Product Code">
				<input class="edit_search_submit" type="submit" name="submit" value="Search">
			</div>
					<?php echo $product_list; ?>
			<div class="clearfix"> </div>
		</form>
	</div>

<?php include 'includes/footer.php';  ?>