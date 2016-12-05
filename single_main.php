<?php
	if(isset($_GET['id'])){
		$id = preg_replace('#[^0-9]#i', '', $_GET['id']);
		
		$sql = $dbc->query("SELECT * FROM werahouse WHERE id='$id LIMIT 1'");
		$product_count = mysqli_num_rows($sql);
			if($product_count > 0){
				while($row = mysqli_fetch_array($sql, MYSQLI_ASSOC)){
					$for_what = $row['for_what'];
					$type = $row['type'];
					$title = $row["title"];
					$code = $row['code'];
					$color = $row['color'];
					$amount = $row['amount'];
					$price = $row["price"];
					$price = number_format($price, 2);
					$description = $row['description'];
					putenv("LANG=$language");  
					setlocale(LC_ALL, $language); 
					$date = strftime("%d %b %Y", strtotime($row['date']));
					$available = $row['available'];
					$discount = $row['discount'];
					$image = $row['image'];
					
					$price = number_format($price, 2);
					if($discount == 0) {
						$display = "none";
						$through = "none";
						$font_size = "40";
					}
					else {
						$display = "inline";
						$through = "line-through";
						$font_size = "25";
					}
					$dis = $price - ($price * ($discount / 100));
					$dis = number_format($dis, 2);
				}
				
			}else{
				echo"No Product";
				exit();
			}
	}else{
		echo "No product with this Id";
		exit();
	}
	//header('Location: single.php?id='.$id.'');
	//exit();
?>