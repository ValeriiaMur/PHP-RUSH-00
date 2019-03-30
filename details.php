<!DOCTYPE>
<?php 

include("functions/functions.php");

?>
<html>
	<head>
		<title>My Online Shop</title>
		
		
	<link rel="stylesheet" href="styles/style.css" media="all" /> 
	</head>
	
<body>
	
	<!--Main Container starts here-->
	<div class="main_wrapper">
	
		<!--Header starts here-->
		<div class="header_wrapper">
		
			<img id="logo" src="images/logo.png" /> 
		</div>
		<!--Header ends here-->
		
		<!--Navigation Bar starts-->
		<div class="menubar">
			
			<ul id="menu">
				<li><a href="#">Home</a></li>
				<li><a href="#">All Products</a></li>
				<li><a href="#">My Account</a></li>
				
				<li><a href="#">Shopping Cart</a></li>
				
			
			</ul>
			
			
		</div>
		<!--Navigation Bar ends-->
	
		<!--Content wrapper starts-->
		<div class="content_wrapper">
		
			<div id="sidebar">
			
				<div id="sidebar_title">Categories</div>
				
				<ul id="cats">
				
				<?php getCats(); ?>
				
				<ul>
				
</div>
			
<div id="shopping_cart">

<span style="float:right; font-size:17px; padding:5px; line-height:40px;">

<?php
if(isset($_SESSION['customer_email'])){
echo "<b>Welcome:</b>" . $_SESSION['customer_email'] . "<b style='color:red;'>Your</b>" ;
}
else {
echo "<b>Welcome Guest:</b>";
}
?>

<a href="cart.php"><b><button>Shopping Cart -</b> Total Items: <?php total_items();?> Total Price: <?php total_price(); ?></button></a>
<?php
if(!isset($_SESSION['customer_email'])){
echo "<a href='customer_login.php'><button>Login</button></a>";
}
else {
echo "<a href='logout.php'><button>Logout</button></a>";
}
?>



</span>
</div>
			
				<div id="products_box">
	<?php 
	if(isset($_GET['pro_id'])){
	
	$product_id = $_GET['pro_id'];
	
	$get_pro = "select * from products where product_id='$product_id'";

	$run_pro = mysqli_query($con, $get_pro); 
	
	while($row_pro=mysqli_fetch_array($run_pro)){
	
		$pro_id = $row_pro['product_id'];
		$pro_title = $row_pro['product_title'];
		$pro_price = $row_pro['product_price'];
		$pro_image = $row_pro['product_image'];
		$pro_desc = $row_pro['product_desc'];
	
		echo "
				<div id='single_product'>
				
					<h3>$pro_title</h3>
					
					<img src='admin_area/product_images/$pro_image' width='400' height='300' />
					
					<p><b> $ $pro_price </b></p>
					
					<p>$pro_desc </p>
					
					<a href='index.php' style='float:left;'>Go Back</a>
					
					<a href='index.php?pro_id=$pro_id'><button style='float:right'>Add to Cart</button></a>
				
				</div>
		
		
		";
	
	}
	}
?>
				
				</div>
			
			</div>
		</div>
		<!--Content wrapper ends-->
		
		
		
		<div id="footer">
		
		<h2 style="text-align:center; padding-top:30px;">&copy; Name Name</h2>
		
		</div>
	
	
	
	
	
	
	</div> 
<!--Main Container ends here-->


</body>
</html>