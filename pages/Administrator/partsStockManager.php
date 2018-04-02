<?php
session_start();
include '../functions.php';	

if(logged_in()==TRUE){
	if(isset($_POST['add'])){
		$pType=$_POST['pType'];
		$pName=$_POST['pName'];
		$price=$_POST['price'];
		$quantity=$_POST['quantity'];
		
		$branch='Dhaka';
		
		$connection=mysqli_connect("localhost","root","","dhaka_motors");
		$query0= "select * from staff_info where userName='".$_SESSION['userName']."'";
		$result0=mysqli_query($connection,$query0);
		if($result0){
			$row=mysqli_fetch_array($result0,MYSQLI_ASSOC);	
			$staffID=$row['staff_ID'];
		
			$query="insert into stock_info values('', NOW(), NOW(), '$branch','$staffID')";
			
			$query1="insert into parts_info values('','$pType','$pName','$price','$quantity', LAST_INSERT_ID(), '$staffID')";
			
			//$new = 'LAST_INSERT_ID()';			
			$result=mysqli_query($connection,$query);
			$result1=mysqli_query($connection,$query1);
			if( $result && $result1){
				header("location: stock_parts.php");
			}else{
				echo mysqli_error($connection);
			}
		}
	}
	
	
}			
?>