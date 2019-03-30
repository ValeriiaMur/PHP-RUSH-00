<!DOCTYPE>
<?php
session_start();
include("functions/functions.php");
include("includes/db.php");
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

			<a href="index.php"><img id="logo" src="images/logo.gif" /> </a>
			<img id="banner" src="images/ad_banner.gif" />
		</div>
		<!--Header ends here-->

		<!--Navigation Bar starts-->
		<div class="menubar">

			<ul id="menu">
				<li><a href="index.php">Home</a></li>

				<li><a href="customer/my_account.php">My Account</a></li>

				<li><a href="cart.php">Shopping Cart</a></li>


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

			<div id="content_area">

			<?php cart(); ?>

			<div id="shopping_cart">

					<span style="float:right; font-size:18px; padding:5px; line-height:40px;">

					Welcome Guest! <b style="color:red">Shopping Cart -</b> Total Items: <?php total_items();?> Total Price: <?php total_price(); ?> <a href="cart.php" style="color:red">Go to Cart</a>



					</span>
			</div>

				<form action="customer_register.php" method="post" enctype="multipart/form-data">

					<table align="center" width="750">

						<tr align="center">
							<td colspan="6"><h2>Create an Account</h2></td>
						</tr>

						<tr>
							<td align="right">Customer Name:</td>
							<td><input type="text" name="c_name" required/></td>
						</tr>

						<tr>
							<td align="right">Customer Email:</td>
							<td><input type="text" name="c_email" required/></td>
						</tr>

						<tr>
							<td align="right">Customer Password:</td>
							<td><input type="password" name="c_pass" required/></td>
						</tr>





						
						<tr>
							<td align="right">Customer Address</td>
							<td><input type="text" name="c_address" required/></td>
						</tr>


					<tr align="center">
						<td colspan="6"><input type="submit" name="register" value="Create Account" /></td>
					</tr>



					</table>

				</form>

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
<?php
	if(isset($_POST['register'])){


		$ip = getIp();
		$c_name = $_POST['c_name'];
		$c_email = $_POST['c_email'];
		$c_pass = $_POST['c_pass'];
		$c_address = $_POST['c_address'];



		$insert_c = "insert into customers (customer_name,customer_email,customer_pass,customer_address) values ('$c_name','$c_email','$c_pass','$c_address')";

		$run_c = mysqli_query($con, $insert_c);

		$sel_cart = "select * from cart where ip_add='$ip'";

		$run_cart = mysqli_query($con, $sel_cart);

		$check_cart = mysqli_num_rows($run_cart);

		if($check_cart==0){

		$_SESSION['customer_email']=$c_email;

		echo "<script>alert('Account has been created successfully, Thanks!')</script>";
		echo "<script>window.open('customer/my_account.php','_self')</script>";

		}
		else {

		$_SESSION['customer_email']=$c_email;

		echo "<script>alert('Account has been created successfully, Thanks!')</script>";

		echo "<script>window.open('index.php','_self')</script>";


		}
	}





?>
