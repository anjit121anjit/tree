<?php require_once('connect/connect.php'); ?>
<?php
$sql = $dbc->query("SELECT * FROM purchases WHERE purch_id='1'");
$row = mysqli_fetch_row;

	$purchase_list = '';
	while($row = mysqli_fetch_array($sql, MYSQLI_ASSOC)){
		$purch_id = $row['purch_id'];
		$cust_id = $row['cust_id'];
		$prod_id = $row['prod_id'];
		$date = $row['date'];
		
		
		$product_list .= '<tr id="purchase_details" style="display:none">';
		$product_list .= '<td colspan="4" scope="colgroup">';
		$product_list .= '<p>'.$purch_id.'</p>';
		$product_list .= '<p>'.$cust_id.'</p>';
		$product_list .= '<p>'.$prod_id.'</p>';
		$product_list .= '<p>'.$date.'</p>';
		$product_list .= '<input id="hide_details" type="submit" name="hide_details" value="Hide"/>';
		$product_list .= '<td>';
		$product_list .= '</tr>';
		
	}
	
	
?>
<?php include 'includes/header.php';  ?>
<!-- grow -->
	<div class="grow">
		<div class="container">
			<h2>Purchases</h2>
		</div>
	</div>
	<div class="container">
	    <div class="col-md-12">
			<div class="col-md-3 product_type">
				<ul>
                    <li><a href="purchases.php?full_l ist">Full List</a></li>
                    <li><a href="purchases.php?last_week">Last Week</a></li>
                    <li><a href="purchases.php?today">Today</a></li>
                    <hr />
                </ul>
			</div>
			<div class="col-md-9 product1 purchases">
				<table>
				    <tr>
                        <th>User Name</th>
                        <th>Address</th>
                        <th>Product Id</th>
                        <th>Product Name</th>
                        <th>Details</th>
				    </tr>
				    <tr>
                        <td>Deividas</td>
                        <td>20 Main Road</td>
                        <td>Jacket</td>
                        <td>15/ 09/ 2016</td>
                        <td><input id="show_details" type="submit" name="show_details" value="Show"/></td>
				    </tr>
				        <?php echo $product_list; ?>
				</table>
				<script>
    				 $(document).ready(function(){
    				    $("#show_details").click(function(){
    				    	$("#purchase_details").slideDown(1000);
    				    });
    				    $("#hide_details").click(function(){
    				    	$("#purchase_details").slideUp(1000);
    				    
    				    });
    				        
    				});
    			</script>
			</div>
		</div>
    </div>

<?php include 'includes/footer.php';  ?>