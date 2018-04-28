<?php
	session_start();

	$connection = mysqli_connect("localhost", "root", "", "dhaka_motors");
	
	if(isset($_POST['change'])){
		
		//echo $pass;

		$con=mysqli_connect("localhost","root","","dhaka_motors");
		$query="select * from customer where phone='".$_SESSION['userName']."'";
		$result=mysqli_query($con,$query);
		//echo $result;
		if(mysqli_num_rows($result)>0){
			while($row=mysqli_fetch_array($result, MYSQLI_ASSOC)){
				$pass = $row['password'];
				$o_pass=$_POST['o_password'];
				echo $pass;
				echo $o_pass;
				if($pass==$o_pass){
			
				$new_password=$_POST['n_password'];
				$confirm_new_Password=$_POST['cn_password'];
					if($new_password==$confirm_new_Password){
							$con=mysqli_connect("localhost","root","","dhaka_motors");
							$query="update customer set password='$new_password' where phone='".$_SESSION['userName']."'";
							$result=mysqli_query($con,$query);
							if($result){
								header("location:Customer/index.php?done");
								echo "<script>alert('Password Updated')</script>";
							}
						
					}
					else{
						echo "<script>alert('Password Must be same')</script>";
					}
				}else{
					// echo "<script>alert('Wrong Password')</script>";
					header('location: change_password.php?error1');
				}
				
			}
		
		}
		
		
	}
?>