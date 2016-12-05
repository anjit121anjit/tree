<?php require_once('connect/connect.php'); ?>
<?php include 'products_main.php';  ?>
<?php include 'includes/header.php';  ?>
	<!-- grow -->
	<div class="grow">
		<div class="container">
			<h2>Boys</h2>
			Show page mapping
		</div>
	</div>
	<!-- grow -->
	<div class="pro-du">
		<div class="container">
			
				<div class="col-md-12">
					<div class="col-md-3 product_type">
						<ul>
                		<?php foreach($result as $product => $item){?>
                			<li><a href="boys.php?product=<?php echo $item['type']; ?>"><?php echo $item['type']; ?></a></li>
                		<?php } ?>
                			<hr />
                			<li><a href="">Sales</a></li>
                			<li><a href="">New Products</a></li>
                		</ul>
					</div>
					<div class="col-md-9 product1">
						<div class="total_products"><?php echo $total_product; ?></div>
			<div class="total_of_products"><?php echo $total_of_products; ?></div>
						<div><?php echo $list; ?></div>
					</div>
			</div>
		</div>
		<div class="pag">
			<div class="pag_num"><?php echo $paginationCtrls; ?></div>
		</div>
	</div>
<!-- products -->
<?php include 'includes/footer.php';  ?>