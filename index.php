<?php 
require_once'connect/connect.php';
include 'includes/header.php';
?>

	<div class="banner">
		<div class="container">
			  <script src="js/responsiveslides.min.js"></script>
  <script>
    $(function () {
      $("#slider").responsiveSlides({
      	auto: true,
      	nav: true,
      	speed: 500,
        namespace: "callbacks",
        pager: true,
      });
    });
  </script>
			<div  id="top" class="callbacks_container">
			<ul class="rslides" id="slider">
			    <li>
					
						<div class="banner-text">
							<h3>MEN   </h3>
						<p>We are seling clothes for all seasons.</p>
						
						</div>
				
				</li>
				<li>
					
						<div class="banner-text">
							<h3>WOMAN  </h3>
						<p>From dresses to Jeans to shoes. TREE will ensure you find just what you’re looking for.</p>
												

						</div>
					
				</li>
				<li>
						<div class="banner-text">
							<h3>BOYS</h3>
						<p>We are seling clothes for all seasons.</p>
								

						</div>
					
				</li>
				<li>
						<div class="banner-text">
							<h3>GIRLS</h3>
						<p>From dresses to Jeans to shoes. TREE will ensure you find just what you’re looking for.</p>
								

						</div>
					
				</li>
			</ul>
		</div>

	</div>
	</div>

<!--content-->
<div class="container">
	<div class="cont">
		<div class="content">
			<div class="content-top-bottom">
				<h2>SALES</h2>
				<div class="col-md-6 men">
					<a href="sales.php?type=mens" class="b-link-stripe b-animate-go  thickbox"><img class="img-responsive" src="images/mens.jpg" alt="">
						<div class="b-wrapper">
											<h3 class="b-animate b-from-top top-in   b-delay03 ">
												<span>MEN SALES</span>	
											</h3>
										</div>
					</a>
					
					
				</div>
				<div class="col-md-6">
					<div class="col-md1 ">
						<a href="sales.php?type=women" class="b-link-stripe b-animate-go  thickbox"><img class="img-responsive" src="images/womens1.jpg" alt="">
							<div class="b-wrapper">
											<h3 class="b-animate b-from-top top-in1   b-delay03 ">
												<span>WOMEN SALES</span>	
											</h3>
										</div>
						</a>
						
					</div>
					<div class="col-md2">
						<div class="col-md-6 men1">
							<a href="sales.php?type=boys" class="b-link-stripe b-animate-go  thickbox"><img class="img-responsive" src="images/boys.jpg" alt="">
									<div class="b-wrapper">
											<h3 class="b-animate b-from-top top-in2   b-delay03 ">
												<span>BOYS SALES</span>	
											</h3>
										</div>
							</a>
							
						</div>
						<div class="col-md-6 men2">
							<a href="sales.php?type=girls" class="b-link-stripe b-animate-go  thickbox"><img class="img-responsive" src="images/girls1.jpg" alt="">
									<div class="b-wrapper">
											<h3 class="b-animate b-from-top top-in2   b-delay03 ">
												<span>GIRLS SALES</span>	
											</h3>
										</div>
							</a>
							
						</div>
						<div class="clearfix"> </div>
					</div>
				</div>
				<div class="clearfix"> </div>
			</div>
			<div class="content-top">
				<h1>NEW PRODUCTS</h1>
				<div class="grid-in">
					<div class="col-md-3 grid-top simpleCart_shelfItem">
						<a href="new.php?type=mens" class="b-link-stripe b-animate-go  thickbox"><img class="img-responsive" src="images/man2.jpg" alt="">
							<div class="b-wrapper">
								<h3 class="b-animate b-from-left    b-delay03 ">
									<span>MEN</span>
									
								</h3>
							</div>
						</a>
					</div>
					<div class="col-md-3 grid-top simpleCart_shelfItem">
						<a href="new.php?type=women" class="b-link-stripe b-animate-go  thickbox"><img class="img-responsive" src="images/ladi2.jpg" alt="">
							<div class="b-wrapper">
											<h3 class="b-animate b-from-left    b-delay03 ">
												<span>WOMEN</span>	
											</h3>
										</div>
						</a>
					</div>
					<div class="col-md-3 grid-top simpleCart_shelfItem">
						<a href="new.php?type=boys" class="b-link-stripe b-animate-go  thickbox"><img class="img-responsive" src="images/boy2.jpg" alt="">
							<div class="b-wrapper">
											<h3 class="b-animate b-from-left    b-delay03 ">
												<span>BOYS</span>	
											</h3>
										</div>
						</a>
					</div>
					<div class="col-md-3 grid-top">
						<a href="new.php?type=girls" class="b-link-stripe b-animate-go  thickbox"><img class="img-responsive" src="images/ladi2.jpeg"alt="">
							<div class="b-wrapper">
											<h3 class="b-animate b-from-left    b-delay03 ">
												<span>GIRLS</span>	
											</h3>
										</div>
						</a>
					</div>
							<div class="clearfix"> </div>
				</div>
			</div>
		</div>
	<!----->
	</div>
	<!---->
</div>
<?php include 'includes/footer.php';  ?>
			