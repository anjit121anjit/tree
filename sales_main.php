<?php 
require_once('connect/connect.php'); 

if (isset($_GET['type'])){
	$sale_item = $_GET['type'];
	$sql_sale =$dbc->query ("SELECT * FROM werahouse WHERE for_what LIKE '%$sale_item%' AND discount > 0 ORDER BY id DESC ");

	while($row = mysqli_fetch_array($sql_sale, MYSQLI_ASSOC)){
		$id = $row["id"];
		$title = $row["title"];
		$price = $row["price"];
		$discount = $row["discount"];
		$date = $row['date'];	
		$price = number_format($price, 2);
		$type = $row["type"];
		$for_what = $row["for_what"];
		$dis = $price - ($price * ($discount / 100));
		$dis = number_format($dis, 2);
		$through = "line-through";
		
			if(strtotime($date) < strtotime('-10 days')) {
				$newD = "none";
			}else{
				$newD = "block";
			}
			
				$show .= '
	<div class=" bottom-product">
	<div class="col-md-3 bottom-cd simpleCart_shelfItem">
	<a class="each_product" href="single.php?id=' .$id. ' ">
	<div class="product-at ">
		<div class="product_new" style="display:' .$newD. '"><p>New</p></div>
	<img class="image_p" src="data:image/jpeg;base64,'.base64_encode( $row['image'] ).'"/>
	</div>
	<div class="product_title">'. $title .'</div>
	<div class="product_price" style="text-decoration:' .$through. ';">€ '. $price .'</div>	
	<div class="price_dic" style="display:' .$display. ';">€ '. $dis .'</div>	
			</div>
			</div>
			</a>';
		}

	}
	

?>