<?php require_once('connect/connect.php'); ?>
<?php include 'single_main.php';  ?>
<?php include 'includes/header.php';  ?>
	<!-- grow -->
	<div class="grow">
		<div class="container">
			<h2>Single</h2>
		</div>
	</div>
	<!-- grow -->
		<div class="product">
			<div class="container">
				
				<div class="product-price1">
				<div class="top-sing">
				<div class="col-md-6 single-top">	
				<img class="product_image" src="data:image/jpeg;base64,<?php echo base64_encode( $image ) ?>"/>
				</div>	
					<div class="col-md-5 single-top-in simpleCart_shelfItem">
						<div class="single-para ">
						<h4><?php echo $title; ?></h4>
							<div class="star-on">
								
								<div class="review">
									<a href="#"> 1 customer review do this latter</a>
									
								</div>
							<div class="clearfix"> </div>
							</div>
							
							<h5 class="item_price">
								<spam class="single_price" style="text-decoration:<?php echo $through; ?>;font-size:<?php echo $font_size; ?>px;margin-top:<?php echo $margin_top; ?>px;">€ <?php echo $price; ?></spam>
								<spam class="single_dis" style="font-size:40px;color:red;display:<?php echo $display; ?>"> € <?php echo $dis; ?></spam>
							</h5>
							<p><?php echo $description; ?></p>
							<div class="available">
								<ul>
									<li>Color
										<select>
											show from database
										<option>Silver</option>
										<option>Black</option>
										<option>Dark Black</option>
										<option>Red</option>
									</select></li>
								<li class="size-in">Size<select>
									<option>Large</option>
									<option>Medium</option>
									<option>small</option>
									<option>Large</option>
									<option>small</option>
								</select></li>
								<div class="clearfix"> </div>
							</ul>
						</div>
							
								<!-- <a href="#" class="add-cart item_add">ADD TO CART</a>  -->
						<div class="add_to_cart_place">
							<form id="add_to_cart" name="add_to_cart" method="post" action="checkout.php">
								<input type="hidden" name="product_id" id="product_id" value="<?php echo $id; ?>" />
								<input class="add_to_cart" type="submit" name="add" id="add" value="Add to Cart" />
							</form>
						</div>
							
						</div>
					</div>
				<div class="clearfix"> </div>
				</div>
			<!---->
</div>

		<div class="clearfix"> </div>
		</div>
		</div>
<!--//content-->
<?php include 'includes/footer.php';  ?>
			