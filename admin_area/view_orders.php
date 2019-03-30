<table width="795" align="center" bgcolor="pink">


	<tr align="center">
		<td colspan="6"><h2>View all orders here</h2></td>
	</tr>

	<tr align="center" bgcolor="skyblue">
		<th>Customer</th>
		<th>Product</th>
		<th>Quantity</th>
		<th>Order Date</th>
	</tr>
	<?php
	include("includes/db.php");

	$get_order = "select * from orders";

	$run_order = mysqli_query($con, $get_order);


	while ($row_order=mysqli_fetch_array($run_order)){

		$order_id = $row_order['order_id'];
		$qty = $row_order['qty'];
		$pro_id = $row_order['p_id'];
		$c_id = $row_order['c_id'];
		$order_date = $row_order['order_date'];

		$get_pro = "select * from products where product_id='$pro_id'";
		$run_pro = mysqli_query($con, $get_pro);

		$row_pro=mysqli_fetch_array($run_pro);

		$pro_title = $row_pro['product_title'];

		$get_c = "select * from customers where customer_id='$c_id'";
		$run_c = mysqli_query($con, $get_c);

		$row_c=mysqli_fetch_array($run_c);

		$c_email = $row_c['customer_email'];

	?>
	<tr align="center">
		<td><?php echo $c_email; ?></td>
		<td><?php echo $pro_title;?></td>
		<td><?php echo $qty;?></td>
		<td><?php echo $order_date;?></td>
	</tr>
	<?php } ?>
</table>
