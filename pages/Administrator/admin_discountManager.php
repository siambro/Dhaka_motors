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
			
			$query5="SELECT MAX(discount_id) FROM discount";
			$result5=mysqli_query($connection,$query5);
				if($result5){
				$row=mysqli_fetch_array($result5,MYSQLI_ASSOC);
				$id=$row['MAX(discount_id)'];
			}

			$query1= "select d_to from discount where discount_id=$id";
			$result1=mysqli_query($connection,$query1);
			if($result1){
				$row=mysqli_fetch_array($result1,MYSQLI_ASSOC);	
				$d_to=$row['d_to'];
				
				$dFrom = date('Y-m-d', strtotime($dFrom));
				$d_to = date('Y-m-d', strtotime($d_to));
				
				if($dFrom > $d_to){
					$query="insert into discount values('', '$dFrom', '$dTo', '$percentage','$status','$staffID')";
					
					//$new = 'LAST_INSERT_ID()';
								
					$result=mysqli_query($connection,$query);
					//$result1=mysqli_query($connection,$query1);
					if( $result){
						header("location: discount.php?addded");
					}else{
						echo mysqli_error($connection);
					}
				}else{
					header("location: discount.php?error");
				}
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
		}else{
			header("location: discount.php?error");
		}

	}
	
	
}			
?>