<?php
session_start();

$connection=mysqli_connect("localhost", "root", "", "dhaka_motors");

if(isset($_POST['confirm'])){			
		$name=$_POST['name'];
		$phone=$_POST['phone'];
		
		$mType=$_POST['mType'];
		$mName=$_POST['mName'];
		$model=$_POST['model'];
		$engineNo=$_POST['engineNo'];
		$chassisNo=$_POST['chassisNo'];
		$cc=$_POST['cc'];
		$color=$_POST['color'];
		$reg=$_POST['reg'];
		// var_dump($selected);
		// exit;
	// $FinalTotal = 0;
		$query0= "select * from staff_info where userName='".$_SESSION['userName']."'";
		$result0=mysqli_query($connection,$query0);
		if($result0){
			$row=mysqli_fetch_array($result0,MYSQLI_ASSOC);	
			$staffID=$row['staff_ID'];

			$query = "SELECT * FROM customer WHERE phone = '".$phone."'";
			$result = mysqli_query($connection, $query);
			if(mysqli_num_rows($result)> 0){
				$row=mysqli_fetch_array($result,MYSQLI_ASSOC);
				$cid = $row['cID'];

			}else{
				$query4="INSERT into customer values('','$name','$phone','','','','')";
				$result4=mysqli_query($connection,$query4);
				$query5="SELECT * FROM customer where cID= LAST_INSERT_ID()";
				$result5=mysqli_query($connection,$query5);
					if($result5){
					$row=mysqli_fetch_array($result5,MYSQLI_ASSOC);
					$cid=$row['cID'];
				}
			}

			$query1="insert into motorcycle_info values('','$mType','$mName','$model','$engineNo','$chassisNo','$cc','$color','', '', '','$cid','','$reg')";
			
			$result1=mysqli_query($connection,$query1);
			if($result1){
				header('location:paid_service.php');
			}

			
		}else{
			mysqli_error($connection);
		}
												
	}else{
		echo mysqli_error($connection);
	}

	?>
              