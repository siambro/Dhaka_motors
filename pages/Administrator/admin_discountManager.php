<?php
session_start();
include '../functions.php';	
$connection=mysqli_connect("localhost","root","","dhaka_motors");
if(logged_in()==TRUE){
	if(isset($_POST['add'])){
		$dFrom=$_POST['dFrom'];
		$dTo=$_POST['dTo'];
		$percentage=$_POST['percentage'];
		$status='Active';
		
		
		
		$query0= "select * from staff_info where userName='".$_SESSION['userName']."'";
		$result0=mysqli_query($connection,$query0);
		if($result0){
			$row=mysqli_fetch_array($result0,MYSQLI_ASSOC);	
			$staffID=$row['staff_ID'];
		
			$query="insert into discount values('', '$dFrom', '$dTo', '$percentage','$status','$staffID')";
			
			
			//$new = 'LAST_INSERT_ID()';			
			$result=mysqli_query($connection,$query);
			//$result1=mysqli_query($connection,$query1);
			if( $result){
				header("location: discount.php?addded");
			}else{
				echo mysqli_error($connection);
			}
		}
	}

	if(isset($_POST['set'])){
		$ex = $_POST['exp'];
		$discount_id = $_POST['discount_id'];

		$query0= "update discount set d_to='$ex' where discount_id='".$_POST['discount_id']."'";
		$result0=mysqli_query($connection,$query0);
		if($result0){
			header("location: discount.php?updated");
		}

	}
	
	
}			
?>