<?php
session_start();
?>



<html>
	<head>
		<title>Order Successful!</title>
	</head>

<body>
  <h1>Order Successful!</h1>
  <table align="center" width="700" bgcolor="skyblue">

    <tr align="center">
      <th>Product</th>
      <th>Quantity</th>
      <th>Price</th>
    </tr>
<?php
		include("includes/db.php");
		include("functions/functions.php");

		//this is all for product details

		$total = 0;

		global $con;

		$ip = getIp();

		$sel_price = "SELECT * FROM cart WHERE ip_add='$ip'";

		$run_price = mysqli_query($con, $sel_price);

		while ($p_price=mysqli_fetch_array($run_price)) {

			$pro_id = $p_price['p_id'];

			$pro_price = "select * from products where product_id='$pro_id'";

			$run_pro_price = mysqli_query($con,$pro_price);

			$pp_price = mysqli_fetch_array($run_pro_price);

			$product_price = $pp_price['product_price'];

			$product_id = $pp_price['product_id'];

			$pro_name = $pp_price['product_title'];




			$total += $product;

			//getting Quantity of the product
			$get_qty = "SELECT * FROM cart WHERE p_id='$pro_id'";

			$run_qty = mysqli_query($con, $get_qty);

			$row_qty = mysqli_fetch_array($run_qty);

			$qty = $row_qty['qty'];


			// this is about the customer
			$user = $_SESSION['customer_email'];

			$get_c = "select * from customers where customer_email='$user'";

			$run_c = mysqli_query($con, $get_c);

			$row_c = mysqli_fetch_array($run_c);

			$c_id = $row_c['customer_id'];


				// inserting the order into table
				$insert_order = "INSERT INTO orders (p_id, c_id, qty, order_date) values ('$pro_id','$c_id','$qty', NOW())";
				$run_order = mysqli_query($con, $insert_order);


      ?>

      <tr align="center">
        <td><?php echo $pro_name; ?></td>
        <td><?php echo $p_price['qty'];?></td>
        <td><?php echo "$" . $product_price; ?></td>
      </tr>


    <?php  } ?>


<?php
			
				//removing the products from cart
				$empty_cart = "DELETE from cart";
				$run_cart = mysqli_query($con, $empty_cart);


		
?>
</table>
</body>
</html>
