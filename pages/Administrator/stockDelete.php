<?php
	$con=mysqli_connect("localhost","root","","dhaka_motors");
	$mID=$_GET["mID"];
	$query="delete from motorcycle_info where mID='$mID'";
	mysqli_query($con,$query);
	header('location: stock_vehicles.php?deleted');
?>