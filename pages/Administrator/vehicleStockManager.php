<?php
session_start();	
include '../functions.php';

if(logged_in()==TRUE){
	if(isset($_POST['add'])){
		$mType=$_POST['mType'];
		$mName=$_POST['mName'];
		$model=$_POST['model'];
		// $engineNo=$_POST['engineNo'];
		$engineNo=strtoupper($_POST['engineNo']);
		$chassisNo=strtoupper($_POST['chassisNo']);
		$cc=$_POST['cc'];
		$color=$_POST['color'];
		$price=$_POST['price'];
		$branch=1;
		
		$connection=mysqli_connect("localhost","root","","dhaka_motors");
		$query0= "select * from staff_info where userName='".$_SESSION['userName']."'";
		$result0=mysqli_query($connection,$query0);
		if($result0){
			$row=mysqli_fetch_array($result0,MYSQLI_ASSOC);	
			$staffID=$row['staff_ID'];
		
			$query="insert into stock_info values('', NOW(), NOW(), '$branch','$staffID')";
			
			$query1="insert into motorcycle_info values('','$mType','$mName','$model','$engineNo','$chassisNo','$cc','$color','$price', LAST_INSERT_ID(), '','','','')";
			
			//$new = 'LAST_INSERT_ID()';			
			$result=mysqli_query($connection,$query);
			$result1=mysqli_query($connection,$query1);
			if( $result && $result1){
				header("location: stock_vehicles.php?addded");
			}else{
				echo mysqli_error($connection);
			}
		}
	}
	
	
}			
?>