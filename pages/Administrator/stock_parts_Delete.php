<?php
	$con=mysqli_connect("localhost","root","","dhaka_motors");
	$pID=$_GET["parts_id"];
	$query="delete from parts_info where parts_id='$pID'";
	mysqli_query($con,$query);
	header('location: stock_parts.php?deleted');
?>