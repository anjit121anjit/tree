<?php 
require_once('connect/connect.php'); 

$page_press = basename($_SERVER['PHP_SELF']);
$page_press = str_replace( array( '.php', '.htm', '.html' ), '', $page_press );
$page_press = str_replace( array('-', '_'), ' ', $page_press);
$page_press = ucwords( $page_press );


$result = $dbc->query("SELECT DISTINCT(type) AS type FROM werahouse WHERE for_what LIKE '%$page_press%' ORDER BY type DESC");

if (isset($_GET['product'])){
	$menuItem = $_GET['product'];
	$sql = "SELECT COUNT(id) FROM werahouse WHERE type LIKE '%$menuItem%' AND for_what LIKE '%$page_press%'";
	$query = mysqli_query($dbc, $sql);
	$row = mysqli_fetch_row($query);
}else{
	$sql = "SELECT COUNT(id) FROM werahouse WHERE for_what LIKE '%$page_press%'";
	$query = mysqli_query($dbc, $sql);
	$row = mysqli_fetch_row($query);
}

$rows = $row[0];
$page_rows = 4;
$last = ceil($rows/$page_rows);
if($last <1){
	$last = 1;
}

$pagenum = 1;

if(isset($_GET['page'])){
	$pagenum = preg_replace('#[^0-9]#', '', $_GET['page']);
}

if ($pagenum < 1) { 
    $pagenum = 1; 
} else if ($pagenum > $last) { 
    $pagenum = $last; 
}

$limit = 'LIMIT ' .($pagenum - 1) * $page_rows .',' .$page_rows;

$sql = "SELECT * FROM werahouse WHERE for_what LIKE '%$page_press%' ORDER BY id DESC $limit";
$query = mysqli_query($dbc, $sql);


$total_product = "Total: <b>$rows</b>";
$total_of_products = "Page <b>$pagenum</b> of <b>$last</b>";

$paginationCtrls = '';

if (isset($_GET['product'])){
if($last != 1){
	if ($pagenum > 1) {
        $previous = $pagenum - 1;
		$paginationCtrls .= '<a class="pagprev" href="'.$_SERVER['PHP_SELF'].'?product='.$menuItem.'&page='.$previous.'">Prev</a> &nbsp; &nbsp; ';
		for($i = $pagenum-4; $i < $pagenum; $i++){
			if($i > 0){ 
		        $paginationCtrls .= '<a class="pagnum" href="'.$_SERVER['PHP_SELF'].'?product='.$menuItem.'&page='.$i.'">'.$i.'</a> &nbsp; ';
			}
	    }
    }
	$paginationCtrls .= ''.$pagenum.' &nbsp; ';
	for($i = $pagenum+1; $i <= $last; $i++){
		$paginationCtrls .= '<a class="pagnum" href="'.$_SERVER['PHP_SELF'].'?product='.$menuItem.'&page='.$i.'">'.$i.'</a> &nbsp; ';
		if($i >= $pagenum+4){
			break;
		}
	}
    if ($pagenum != $last) {
        $next = $pagenum + 1;
        $paginationCtrls .= ' &nbsp; &nbsp; <a class="pagnext" href="'.$_SERVER['PHP_SELF'].'?product='.$menuItem.'&page='.$next.'">Next</a> ';
    }
}	
}else{
	if($last != 1){
		if ($pagenum > 1) {
	        $previous = $pagenum - 1;
			$paginationCtrls .= '<a class="pagprev" href="'.$_SERVER['PHP_SELF'].'?page='.$previous.'">Prev</a> &nbsp; &nbsp; ';
			for($i = $pagenum-4; $i < $pagenum; $i++){
				if($i > 0){ 
			        $paginationCtrls .= '<a class="pagnum" href="'.$_SERVER['PHP_SELF'].'?page='.$i.'">'.$i.'</a> &nbsp; ';
				}
		    }
	    }
		$paginationCtrls .= ''.$pagenum.' &nbsp; ';
		for($i = $pagenum+1; $i <= $last; $i++){
			$paginationCtrls .= '<a class="pagnum" href="'.$_SERVER['PHP_SELF'].'?page='.$i.'">'.$i.'</a> &nbsp; ';
			if($i >= $pagenum+4){
				break;
			}
		}
	    if ($pagenum != $last) {
	        $next = $pagenum + 1;
	        $paginationCtrls .= ' &nbsp; &nbsp; <a class="pagnext" href="'.$_SERVER['PHP_SELF'].'?page='.$next.'">Next</a> ';
	    }
	}
}

$list = '';
if (isset($_GET['product'])){
	$menuItem = $_GET['product'];
	$res_pro = $dbc->query("SELECT * FROM werahouse WHERE type LIKE '%$menuItem%' AND for_what LIKE '%$page_press%' ORDER BY id DESC $limit");
	while($row = mysqli_fetch_array($res_pro, MYSQLI_ASSOC)){
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
		
		if($discount == 0) {
			$display = "none";
			$through = "none";
		}
		else {
			$display = "block";
			$through = "line-through";
		}
		
		if(strtotime($date) < strtotime('-10 days')) {
			$newD = "none";
		}else{
			$newD = "block";
		}
		
	$list .= '
				<div class=" bottom-product">
					<div class="col-md-3 bottom-cd simpleCart_shelfItem">
						<a class="each_product" href="single.php?id=' .$id. ' ">
						<div class="product-at ">
							<div class="product_discount" style="display:' .$display. ';"><p>' .$discount. '%</p></div>
							<div class="product_new" style="display:' .$newD. '"><p>New</p></div>
							<img class="image_p" src="data:image/jpeg;base64,'.base64_encode( $row['image'] ).'"/>
						</div>
						<div class="product_title">'. $title .'</div>
						<div class="product_price" style="text-decoration:' .$through. ';">€ '. $price .'</div>						
						<div class="price_dic" style="display:' .$display. ';">€ '. $dis .'</div>
						<div class="clearfix"></div>					
					</div>
				</div>
				</a>';
	}
}else{
	while($row = mysqli_fetch_array($query, MYSQLI_ASSOC)){
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
		
		if($discount == 0) {
			$display = "none";
			$through = "none";
		}
		else {
			$display = "block";
			$through = "line-through";
		}
		
		if(strtotime($date) < strtotime('-10 days')) {
			$newD = "none";
		}else{
			$newD = "block";
		}
		
	$list .= '
	
	<div class=" bottom-product">
		<div class="col-md-3 bottom-cd simpleCart_shelfItem">
			<a class="each_product" href="single.php?id=' .$id. ' ">
			<div class="product-at ">
				<div class="product_discount" style="display:' .$display. ';"><p>' .$discount. '%</p></div>
				<div class="product_new" style="display:' .$newD. '"><p>New</p></div>
				<img class="image_p" src="data:image/jpeg;base64,'.base64_encode( $row['image'] ).'"/>
				</div>
				<div class="product_title">'. $title .'</div>
				<div class="product_price" style="text-decoration:' .$through. ';">€ '. $price .'</div>						
				<div class="price_dic" style="display:' .$display. ';">€ '. $dis .'</div>
				<div class="clearfix"></div>					
		</div>
	</div>
			</a>';
	}
}
?>