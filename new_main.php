<?php 
require_once('connect/connect.php'); 
	$new_item = $_GET['type'];
	$result = $dbc->query("SELECT DISTINCT(type) AS type FROM werahouse WHERE for_what LIKE '%$new_item%' ORDER BY type DESC");
	
if (isset($_GET['type'])){
	$new_item = $_GET['type'];
	$sql = $dbc->query("SELECT * FROM werahouse WHERE for_what LIKE '%$new_item%' AND date > DATE_SUB(CURDATE(), INTERVAL 10 DAY) ORDER BY id DESC ");

	while($row = mysqli_fetch_array($sql, MYSQLI_ASSOC)){
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

if (isset($_GET['product'])) {

	$new_type = $_GET['product'];
	$new_item = $_GET['type'];
	$result = $dbc->query("SELECT DISTINCT(type) AS type FROM werahouse WHERE for_what LIKE '%$new_item%' ORDER BY type DESC");
	$sql = $dbc->query("SELECT * FROM werahouse WHERE type LIKE '%$new_type%' AND for_what LIKE '%$new_item%' ORDER BY id DESC $limit");
	while($row = mysqli_fetch_array($sql, MYSQLI_ASSOC)){
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