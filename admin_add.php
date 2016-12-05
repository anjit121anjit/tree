<?php require_once('connect/connect.php'); ?>
<?php
function reArrayFiles(&$file_post) {

	$file_ary = array();
	$file_count = count($file_post['name']);
	$file_keys = array_keys($file_post);

	for ($i=0; $i<$file_count; $i++) {
		foreach ($file_keys as $key) {
			$file_ary[$i][$key] = $file_post[$key][$i];
		}
	}

	return $file_ary;
}

if (isset($_FILES["image"]) && !empty($_FILES["image"])){
	$file_ary = reArrayFiles($_FILES['image']);

	foreach ($file_ary as $file) {
		$image = addslashes(file_get_contents($file['tmp_name']));
		$imageName = addslashes($file['name']);
   
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
	    
	    $sql = $dbc->query ("INSERT INTO werahouse VALUES ('', '$for_what','$type','$title', '$code', '$color', '$size', '$amount', '$price', '$description', '$available', '$image', '$imageName', '$discount', '$date')") or die (mysqli_error($dbc));
	}    
    header("location: admin_add.php");
    exit();
}
?>
<?php include 'includes/header.php';  ?>
<!-- grow -->
	<div class="grow">
		<div class="container">
			<h2>Add New</h2>
		</div>
	</div>
	<!-- content  ~ 500 line css-->
	<div class="container admin_add">
	    <form action="admin_add.php" method="post" enctype="multipart/form-data">
            <table>
				<tr>
					<td><p class="warehouse_title">For:</p></td>
					<td>
						<select class="warehouse_select" name="for_what">
							<option value="" disabled selected>Select</option>
							<option value="Mens">Mens</option>
							<option value="Women">Women</option>
							<option value="Boys">Boys</option>
							<option value="Girls">Girls</option>
						</select>
					</td>
				</tr>
				<tr>
					<td><p class="warehouse_title">Type:</p></td>
					<td><input class="warehouse_input" type="text" name="type"></td>
				</tr>
				<tr>
					<td><p class="warehouse_title">Title:</p></td>
					<td><input class="warehouse_input" type="text" name="title"></td>
				</tr>
				<tr>
					<td><p class="warehouse_title">Code:</p></td>
					<td><input class="warehouse_input" type="text" name="code"></td>
				</tr>
				<tr>
					<td><p class="warehouse_title">Color:</p></td>
					<td><input class="warehouse_input" type="text" name="color"></td>
				</tr>
				<tr>
					<td><p class="warehouse_title">Size:</p></td>
					<td><input class="warehouse_input" type="text" name="size"></td>
				</tr>
				<tr>
					<td><p class="warehouse_title">Amount:</p></td>
					<td>
						 <select class="warehouse_select" name="amount">
							<option value="" disabled selected>Select</option>
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
					<td><input class="warehouse_input" type="text" name="price"></td>
				</tr>
				<tr>
					<td><p class="warehouse_title">Discount:</p></td>
					<td>
						<select class="warehouse_select" name="discount">
							<option value="" disabled selected>Discount</option>
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
						<input class="add_checkbox" type="checkbox" name="available" value="1">
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
					<td><textarea class="warehouse_txtarea" name="description" rows="5" cols="30"></textarea></td>
				</tr>
				<tr>
					<td><p class="warehouse_title">Image:</p></td>
					<td><input type="file" name="image[]" /></td>
				</tr>
				<tr>
					<td>&nbsp;</td>
					<td><input class="add_submit_buton" name="submit" type="submit" value="Add" /></td>
				</tr>
			</table>
        </form>
    </div>

<?php include 'includes/footer.php';  ?>