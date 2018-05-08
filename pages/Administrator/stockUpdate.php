<?php
if(isset($_POST['update'])){	
			$mID=$_POST['mID'];
			$mType=$_POST['mType'];
			$mName=$_POST['mName'];
			$model=$_POST['model'];
			$engineNo=strtoupper($_POST['engineNo']);
			$chassisNo=strtoupper($_POST['chassisNo']);
			$cc=$_POST['cc'];	
			$color=$_POST['color'];	
			$price=$_POST['price'];	
			
			$con=mysqli_connect("localhost", "root", "" , "dhaka_motors");
			$query1="update motorcycle_info set mType='$mType', mName='$mName', model='$model', engineNo='$engineNo', chassisNo='$chassisNo',cc='$cc', color='$color', price='$price' where mID='$mID'";
			if(mysqli_query($con,$query1)){
				header('location:stock_vehicles.php?updated');
			}else{
				
				echo 'mysqli_error($con)';
			}
		}else{
			mysqli_error($conn);
		}
		?>