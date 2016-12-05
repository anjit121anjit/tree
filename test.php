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
		$price = @$_POST['price'];
		$discount = @$_POST['discount'];
		$available = @$_POST['available'];
		$description = @$_POST['description'];
		$date = date('Y-m-d H:i:s');
		$q_id = 1;
	    //$q_id = check quantity tadle last id and add 1
	    
	    $sql = $dbc->query ("INSERT INTO werahouse VALUES ('', '$for_what','$type','$title', '$code', '$q_id', '$price', '$description', '$available', '$image', '$imageName', '$discount', '$date')") or die (mysqli_error($dbc));
	    
		$color_new = count($_POST["color"]);
		$size_new = count($_POST["size"]);
		$amount_new = count($_POST["amount"]);
		$last_id = mysqli_insert_id();
		
		if($color_new > 0){
			for($i=0; $i<$color_new; $i++){
				if(trim($_POST["color"][$i] !='')){
					$sql_new = $dbc->query("INSERT INTO test VALUES ('', '$last_id', '".mysqli_real_escape_string($dbc, $_POST["color"][$i])."', '".mysqli_real_escape_string($dbc, $_POST["size"][$i])."', '".mysqli_real_escape_string($dbc, $_POST["amount"][$i])."')");
		
				}
			}
		}


	
	}    
    header("location: test.php");
    exit();
}
?>

<?php
// color select
$sql_color = $dbc->query("SELECT * FROM color");
$row = mysqli_fetch_row;
						 
	$colors = '';
	while($row = mysqli_fetch_array($sql_color, MYSQLI_ASSOC)){
		$c_id = $row['c_id'];
		$select_color = $row['name'];
		$color_more .='<option value='.$c_id.'>'.$select_color.'</option>';
		$colors .='
			<option value="'.$c_id.'">'.$select_color.'</option>
		';
	}
?>

<?php
//size select
$sql_color = $dbc->query("SELECT * FROM clothes_size");
$row = mysqli_fetch_row;
						 
	$sizes = '';
	//$str = '';
	while($row = mysqli_fetch_array($sql_color, MYSQLI_ASSOC)){
		$clo_id = $row['clo_id'];
		$select_size = $row['size'];
		$size_more .='<option value='.$clo_id.'>'.$select_size.'</option>';
		$sizes .='<option value="'.$clo_id.'">'.$select_size.'</option>';
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
	    <form action="test.php" method="post" enctype="multipart/form-data">
            <table id="con">
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
					<td><p class="warehouse_title">C. S. A.:</p></td>
					<td>
						<select class="warehouse_se" type="text" name="color[]">
							<option value="" disabled selected>Color</option>
							<?php echo $colors;?>
						</select>
						
						<select class="warehouse_se" type="text" name="size[]">
							<option value="" disabled selected>Size</option>
							<?php echo $sizes;?>
						</select>
						
						 <select class="warehouse_se" name="amount[]">
							<option value="" disabled selected>Amount</option>
							<?php
								for ($i=0; $i<=30; $i++)
								{
									?>
										<option id="www" value="<?php echo $i;?>"><?php echo $i;?></option>
									<?php
									$amount_more .='<option>'.$i.'</option>';
								}
							?>
						</select>
						<input id="more" type="button" name="add_fields" value="+">
						<div id="conte"></div>
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
    			<script>
					 $(document).ready(function(){
				   		var color = "<?php echo $color_more; ?>";
				   		var size = "<?php echo $size_more; ?>";
				   		var lll = "<?php echo $amount_more; ?>";
						var i = 1;
						$('#more').click(function(){
							i++;
							$('#conte').append('<div id="more'+i+'"><br /><select id="color'+i+'" class="warehouse_se" type="text" name="color[]"><option value="" disabled selected>Color</option>' + color + '</select><select id="size'+i+'" class="warehouse_se" type="text" name="size[]"><option value="" disabled selected>Size</option>' + size + '</select><select id="amount'+i+'" class="warehouse_se" name="amount[]"><option value="" disabled selected>Amount</option>'+lll+'</select><button id="'+i+'" class="remove" name="remove">X</buuton></div>');
						
							$('#conte').slideDown(1000);
						});
						$(document).on('click', '.remove', function(){
							var more = $(this).attr("id");
							
							$("#more"+more+"").remove();
						});
					});
				</script>

<?php include 'includes/footer.php';  ?>