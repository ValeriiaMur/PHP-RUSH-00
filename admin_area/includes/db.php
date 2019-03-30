<?php
// After uploading to online server, change this connection accordingly

$con = mysqli_connect("localhost:1433","root","root","db_minishop");

if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
?>
