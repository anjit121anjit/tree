<?php require_once('connect/connect.php'); ?>
<?php
	if(isset($_GET['productid'])){
		$targetId = $_GET['productid'];
		$query = $dbc->query ("SELECT * FROM werahouse WHERE id=$targetId LIMIT 1");
		while($row = mysqli_fetch_array($query, MYSQLI_ASSOC)){
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
		}
	}
?>

<?php
if (isset($_POST['submit'])){
	$id = @$_POST['thisId'];
	$for_what = @$_POST['for_what'];
	$type = @$_POST['type'];
	$title = @$_POST['title'];
	$code = @$_POST['code'];
	$color = @$_POST['color'];
	$size = @$_POST['size'];
	$amount = @$_POST['amount'];
	$price = @$_POST['price'];
	$price = number_format($price, 2);
	$discount = @$_POST['discount'];
	$available = @$_POST['available'];
	$description = @$_POST['description'];
	$date = date('Y-m-d H:i:s');
	$result = $dbc->query("UPDATE werahouse SET  for_what='$for_what', type='$type', title='$title', code='$code', color='$color', size='$size', amount='$amount', price='$price', description='$description', available='$available', date='$date', discount='$discount' WHERE id='$id'")
	or die(mysqli_error($dbc));
	
	header("location: admin_edit.php");
	exit();
} 
?>

<?php include 'includes/header.php';  ?>

<!-- grow -->
	<div class="grow">
		<div class="container">
			<h2>Change</h2>
		</div>
	</div>
	<!-- content  ~ 500 line css-->
	<div class="container admin_change">
	<form action="admin_change.php" method="post" enctype="multipart/form-data">
		<table>
			<tr>
				<td><p class="warehouse_title">For what:</p></td>
				<td>
					<select class="warehouse_select" name="for_what">
						<option value="<?php echo $for_what; ?>"><?php echo $for_what; ?></option>
						<option value="Mens">Mens</option>
						<option value="Women">Women</option>
						<option value="Boys">Boys</option>
						<option value="Girls">Girls</option>
					</select>
				</td>
			</tr>
			<tr>
				<td><p class="warehouse_title">Type:</p></td>
				<td><input class="warehouse_input" type="text" name="type" value="<?php echo $type; ?>"></td>
			</tr>
			<tr>
				<td><p class="warehouse_title">Title:</p></td>
				<td><input class="warehouse_input" type="text" name="title" value="<?php echo $title; ?>"></td>
			</tr>
			<tr>
				<td><p class="warehouse_title">Code:</p></td>
				<td><input class="warehouse_input" type="text" name="code" value="<?php echo $code; ?>"></td>
			</tr>
			<tr>
				<td><p class="warehouse_title">Color:</p></td>
				<td><input class="warehouse_input" type="text" name="color" value="<?php echo $color; ?>"></td>
			</tr>
			<tr>
				<td><p class="warehouse_title">Size:</p></td>
				<td><input class="warehouse_input" type="text" name="size" value="<?php echo $size; ?>"></td>
			</tr>
			<tr>
				<td><p class="warehouse_title">Amount:</p></td>
				<td>
					 <select class="warehouse_select" name="amount">
						<option value="<?php echo $amount; ?>"><?php echo $amount; ?></option>
						<?php
							for ($i=0; $i<=30; $i++)
							{
								?>
									<option value="<?php echo $i;?>"><?php echo $i;?></option>
								<?php
							}
						?>
					</select>
				</td>
			</tr>
			<tr>
				<td><p class="warehouse_title">Price:</p></td>
				<td><input class="warehouse_input" type="text" name="price" value="<?php echo $price; ?>"></td>
			</tr>
			<tr>
				<td><p class="warehouse_title">Discount:</p></td>
				<td>
					<select class="warehouse_select" name="discount">
						<option value="<?php echo $discount; ?>"><?php echo $discount; ?>%</option>
						<?php
							for($i = 0; $i <= 80; $i++){ 
								if($i%5 == 0){ 
						?>
							<option value="<?php echo $i;?>"><?php echo $i;?>%</option>
						<?php
								} 
							} 
						?>
					</select>
				</td>
			</tr>
			<tr>
				<td><p class="warehouse_title">Available:</p></td>
				<td>
					
					<input class="add_checkbox" type="checkbox" name="available" value="1" <?php echo ($available==1 ? 'checked' : '');?>>
					<?php
					if(isset($_POST['available'])){
						$available = $_POST['available'];
					}
					else{
						$available = 0;
					}
					?>
				</td>
			</tr>
			<tr>
				<td><p class="warehouse_title">Description:</p></td>
				<td><textarea class="warehouse_txtarea" name="description" rows="5" cols="30"><?php echo $description; ?></textarea></td>
			</tr>
			<tr>
				<td><p class="warehouse_title">Image:</p></td>
				<td><input type="file" name="image" /></td>
			</tr>
			<tr>
				<td>&nbsp;</td>
				<td>
				<input name="thisId" type="hidden" value="<?php echo $targetId; ?>" />
				<input class="add_submit_buton" name="submit" type="submit" value="Change" />
				</td>
			</tr>
		</table>				
	</form>
</div>


<?php include 'includes/footer.php';  ?>