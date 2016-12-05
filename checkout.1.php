<?php //include 'checkout_main.php';  ?>
<?php include 'includes/header.php';  ?>
	<!-- grow -->
	<div class="grow">
		<div class="container">
			<h2>My Shopping Bag</h2>
		</div>
	</div>
	<!-- grow -->
<div class="container">
	<div class="check">	 
		 <div class="col-md-9 cart-items">
		 	<?php echo $checkout; ?>
		 </div>
		  <div class="col-md-3 cart-total">
			 <a class="continue" href= "javascript:history.go(-2)">Continue to basket</a>
			 <div class="price-details">
				 <h3>Price Details</h3>
				 <span>Total</span>
				 <span class="total1">€ <?php echo $cart_full_total; ?></span>
				 <span>Discount</span>
				 <span class="total1">€ <?php echo $dis_sum; ?></span>
				 <span>Delivery Charges</span>
				 <span class="total1">Free</span>
				 <div class="clearfix"></div>				 
			 </div>	
			 <ul class="total_price">
			   <li class="last_price"> <h4>TOTAL</h4></li>	
			   <li class="last_price"><span>€ <?php echo $cart_total; ?></span></li>
			   <div class="clearfix"> </div>
			 </ul>
			 <div class="price-details">
			 <span>Coupone Discount <?php echo $coup_dis; ?>%</span>
			 <span class="total1">€ <?php echo $coup_dis_sum; ?></span>
			 <div class="clearfix"></div>
			 </div>
			 <ul class="total_price">
			   <li class="last_price"> <h4>TOTAL TO PAY</h4></li>	
			   <li class="last_price"><span>€ <?php echo $cart_total_sum; ?></span></li>
			   <div class="clearfix"> </div>
			 </ul>
			 
			 <div class="clearfix"></div>
			 <a class="order" href="#">Place Order</a>
			 <div class="total-item">
				 <h3>OPTIONS</h3>
				 <h4>COUPONS</h4>
				 <button id="cpns" class="apply_coupones">Apply Coupons</button>
			 </div>
			 <div id="coupons" class="coupons" style="display:none">
				 <form action="checkout.php" method="post" enctype="multipart/form-data">
				 	<div class="coupon_code">
					<input id="coupone_code" type="text" name="coupone_code" placeholder="Enter Code..."/>
					</div>
					<div class="coupone_submit">
					<input id="coupone_submit" type="submit" name="coupone_submit" value="Apply" />
					</div>
				 </form>
			</div>
			 <script>
				 $(document).ready(function(){
				    $("#cpns").click(function(){
				    	$("#coupons").slideDown(1000);
				    });
				});
			</script>
			 <div class="delivery">
    			<p>Delivery Charges : Free </p>
    			<p>Delivered in 2-3 business days</p>
    			<div class="clearfix"></div>    
    			</div>
			</div>
		
			<div class="clearfix"> </div>
	 </div>
	 </div>


<!--//content-->
<?php include 'includes/footer.php';  ?>