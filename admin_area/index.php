<?php
session_start();

if(!isset($_SESSION['user_email'])){

	echo "<script>window.open('login.php?not_admin=You are not an Admin!','_self')</script>";
}
else {

?>

<!DOCTYPE>

<html>
	<head>
		<title>This is Admin Panel</title>

	<link rel="stylesheet" href="styles/style.css" media="all" />
	</head>

<div class="header_wrapper">

<a href="index.php"><img id="logo" src="../images/logo.png" style="display: block;width:50%;margin:0 auto;"/> </a>
</div>
<body>

	<div class="main_wrapper">


		<div id="header"></div>

		<div id="right">
		<h2 style="text-align:center;">Manage Content</h2>

			<a href="index.php?insert_product">Insert New Product</a>
			<a href="index.php?view_products">View All Products</a>
			<a href="index.php?view_customers">View Customers</a>
			<a href="index.php?view_orders">View Orders</a>
			<a href="logout.php">Admin Logout</a>

		</div>

		<div id="left">
		<h2 style="color:red; text-align:center;"><?php echo @$_GET['logged_in']; ?></h2>
		<?php
		if(isset($_GET['insert_product'])){

		include("insert_product.php");

		}
		if(isset($_GET['view_products'])){

		include("view_products.php");

		}
		if(isset($_GET['edit_pro'])){

		include("edit_pro.php");

		}


		if(isset($_GET['view_cats'])){

		include("view_cats.php");

		}


		if(isset($_GET['view_customers'])){

		include("view_customers.php");

		}

    if(isset($_GET['view_orders'])){

		include("view_orders.php");

		}

		?>
		</div>






	</div>


</body>
</html>

<?php } ?>
