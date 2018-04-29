<?php
	$con=mysqli_connect("localhost","root","","dhaka_motors");
	$discount_id=$_GET["discount_id"];
	$query="delete from discount where discount_id='$discount_id'";
	mysqli_query($con,$query);
	header('location: discount.php?deleted');
?>