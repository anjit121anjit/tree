<?php require_once('connect/connect.php'); ?>
<?php include 'new_main.php'; ?>

<?php include 'includes/header.php';  ?>
	<!-- grow -->
	<div class="grow">
		<div class="container">
			<h2>New Product </h2>
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
                			<li><a href="new.php?product=<?php echo $item['type']; ?>"><?php echo $item['type']; ?></a></li>
                		
                		<?php } ?>
                		<hr/>
           
                		<li><a href="new.php?type=women">Women</a></li>
                		</ul>
					</div>
					<div class="col-md-9 product1">
						<div><?php echo $show; ?></div>
					</div>
			</div>
		</div>
	</div>
	
	
<!-- products -->
<?php include 'includes/footer.php';  ?>