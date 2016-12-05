<?php 
require_once('connect/connect.php');
session_start();

	if(isset($_POST['product_id'])){
		$product_id = $_POST['product_id'];
		$was_found = false;
		$i = 0;
			if(!isset($_SESSION['cart']) || count($_SESSION['cart']) < 1){
				$_SESSION['cart'] = array(0 => array("id" => $product_id, "quantity" => 1));
			}else{
				foreach($_SESSION['cart'] as $each_item){
					$i++;
					while(list($key, $value) = each($each_item)){
						if($key == "id" && $value == $product_id){
							array_splice($_SESSION['cart'], $i-1, 1, array(array("id" => $product_id, "quantity" => $each_item['quantity'] +1)));
							$was_found = true;
						}
					}
				}
				if($was_found == false){
					array_push($_SESSION['cart'], array("id" => $product_id, "quantity" =>1));
				}
			}
			header("location: checkout.php");
			exit();
	}

	if(isset($_GET['cmd']) && $_GET['cmd'] == "emptycart"){
		unset($_SESSION['cart']);
	}

	if(isset($_POST['change']) && $_POST['change']!= ""){
		$change = $_POST['change'];
		$quantity = $_POST['quantity'];
		$quantity = preg_replace('#[^0-9]#i','',$quantity);
		if($quantity >=10){$quantity = 9;}
		if($quantity < 1){$quantity = 1;}
		$i = 0;
		foreach($_SESSION['cart'] as $each_item){
			$i++;
			while(list($key, $value) = each($each_item)){
				if($key == "id" && $value == $change){
					array_splice($_SESSION['cart'], $i-1, 1, array(array("id" => $change, "quantity" => $quantity)));
				}
			}
		}
	}

	if(isset($_POST['id_to_remove']) && $_POST['id_to_remove']!= ""){
		$key_to_remove = $_POST['id_to_remove'];
		if(count($_SESSION['cart'])<=1){
			unset($_SESSION['cart']);
		}else{
			unset($_SESSION['cart']["$key_to_remove"]);
			sort($_SESSION['cart']);
		}
	}
	
	$coupone_code = $_POST['coupone_code'];
	if($coupone_code != ""){
		$sql_coupone = "SELECT coupone_code FROM coupones WHERE coupone_code = '".$coupone_code."'";
		$result_coupone = mysqli_query($dbc, $sql_coupone);
		$coup_dis = "";
		if(mysqli_num_rows($result_coupone) != false){
			echo 1;
				$coupone_code = $_POST['coupone_code'];
			$sql_cou = $dbc->query("SELECT * FROM coupones WHERE coupone_code = '".$coupone_code."'");
	    			while($row = mysqli_fetch_array($sql_cou, MYSQLI_ASSOC)){
	    				$coup_dis = $row['c_discount'];
	    			}
		}else{
			echo 0;
		}
	}

    $checkout = "";
    $cart_total = "";
    $product_id_array = '';
    	if(!isset($_SESSION['cart']) || count($_SESSION['cart']) < 1){
    		$checkout = "<h2 align='center'>Shoping Bag is Empty</h2>";
    		$cart_total = 0;
    		$cart_total = number_format($cart_total, 2);
    		$dis_sum = 0;
    		$dis_sum = number_format($dis_sum, 2);
    		$coup_dis = 0;
    		$cart_total_sum = 0;
    		$cart_total_sum = number_format($cart_total_sum, 2);
    		$coup_dis_sum = 0;
    		$coup_dis_sum = number_format($coup_dis_sum, 2);
    		$cart_full_total = 0;
    		$cart_full_total = number_format($cart_full_total, 2);
    	}else{
    		
    		$i = 0;
    			
    		foreach($_SESSION['cart'] as $each_item){
    			$item_id = $each_item['id'];
    			$sql = $dbc->query("SELECT * FROM werahouse WHERE id='$item_id' LIMIT 1");
    			while($row = mysqli_fetch_array($sql, MYSQLI_ASSOC)){
    				$title = $row['title'];
    				$price = $row['price'];
    				$discount = $row['discount'];
    				$price = number_format($price, 2);
    				$description = $row['description'];
    				$image = $row['image'];
    				$color = $row['color'];
    				$size = $row['size'];
    				$code = $row['code'];
    			}
    			
    			if($discount == 0) {
    				$display = "none";
    				$through = "none";
    			}
    			else {
    				$display = "inline";
    				$through = "line-through";
    			}
    			
    			$dis = $price - ($price * ($discount / 100));
    			$price_total = $price * $each_item['quantity'];
    			$cart_full_total = $price_total + $cart_full_total;
    			$cart_full_total = number_format($cart_full_total, 2);
    			
    			$pricetotal = $dis * $each_item['quantity'];
    			$cart_total = $pricetotal + $cart_total;
    			$cart_total = number_format($cart_total, 2);
    			
    			$dis_sum = $cart_full_total - $cart_total;
    			$pricetotal = number_format($pricetotal, 2);
    			$dis = number_format($dis, 2);
    			$dis_sum = number_format($dis_sum, 2);
    			
    			$coup_dis_sum = $cart_total * ($coup_dis / 100);
    			$coup_dis_sum = number_format($coup_dis_sum, 2);
    			
    			$cart_total_sum = $cart_total - $coup_dis_sum;
    			$cart_total_sum = number_format($cart_total_sum, 2);
    			
    		
    			$product_id_array = "$item_id-" . $each_item['quantity'] . ",";
    			
    			$checkout .= '<div class="cart-header">';
    			$checkout .= '
    			<div>
    				<form action="checkout.php" method="post">
    					<input class="close1" type="submit" name="remove' .$item_id. '" value="" title="Delete"/>
    					<input type="hidden" name="id_to_remove" value="' .$i. '" />
    				</form> 
    			</div>';
    			$checkout .= '<div class="cart-sec simpleCart_shelfItem">';
    			$checkout .= '<div class="cart-item cyc">';
    			$checkout .= '<img class="img-responsive" alt="" src="data:image/jpeg;base64,' .base64_encode( $image ). '"/>';			
    			$checkout .= '</div>';
    			$checkout .= '<div class="cart-item-info">';
    			$checkout .= '<h3><a href="single.php?id=' .$item_id. '">' .$title. '</a><span>Model Code : '.$code.'</span></h3>';
    			$checkout .= '<ul class="qty">';			
    			$checkout .= '<li><p>Size : '. $size.'</p></li>';
    			$checkout .= '<li><p>Color : '. $color.'</p></li>';
    			$checkout .= '</ul>';
    			$checkout .= '
    			<div class="cart_price">
    			    <div class="cart_first_price">
    			        <spam class="cart_first_price_price" style="text-decoration:'.$through.';">€'.$price.'</spam>
						<spam class="cart_first_price_dis" style="color:red;display:'.$display.'"> €'.$dis.'</spam>
    			    </div>
    				<div class="cart_quantity">
    				<form action="checkout.php" method="post">
    					Qnt:
    					<input class="item_text_field" name="quantity" type"text" value="' .$each_item['quantity']. '" size="1" maxlength="1" />
    					<input class="item_quantity_submit" type="submit" name="change' .$item_id. '" value="Change" />
    					<input type="hidden" name="change" value="' .$item_id. '" />
    				</form>
    				</div>
    				<div class="cart_aftre_discount">
    				    <spam class="cart_price_total">€' .$pricetotal. '</spam>
    				</div>
    			</div><br />';				 
    			$checkout .= '<h3>Description:</h3>';
    			$checkout .= '<p>'.$description.'</p>';
    			$checkout .= '</div>';		   
    			$checkout .=	'<div class="clearfix"></div>';							
    			$checkout .= '</div>';
    			$checkout .= '</div>';
    			$checkout .= '<hr />';
    			$i++;
    			
    		}
    	}

?>