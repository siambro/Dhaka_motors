<?php
if(isset($_POST['update'])){	
			$cID=$_POST['cID'];
			
			$name=$_POST['name'];
			$phone=$_POST['phone'];
			$email=$_POST['email'];
			$nid=$_POST['nid'];	
	
			
			$con=mysqli_connect("localhost", "root", "" , "dhaka_motors");
			$query1="update customer set name='$name', phone='$phone', email='$email', nid='$nid' where cID='$cID'";
			if(mysqli_query($con,$query1)){
				header('location:customer.php?updated');
			}else{
				
				echo 'mysqli_error($con)';
			}
		}else{
			mysqli_error($conn);
		}
		?>