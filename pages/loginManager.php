<?php
	session_start();

	$connection = mysqli_connect("localhost", "root", "", "dhaka_motors");
	
	if(isset($_POST['login'])){
		
		$userName = mysqli_real_escape_string($connection, $_POST['userName']);
		$password = mysqli_real_escape_string($connection, $_POST['password']);
		// $level = mysqli_real_escape_string($connection, $_POST['level']);
		
		$query2= "select * from staff_info where userName = '".$userName."' and password = '" .$password. "'";
		$query1= "select * from customer where phone = '".$userName."' and password = '" .$password. "'";
		
		$result2 = mysqli_query($connection, $query2);
		$result1 = mysqli_query($connection, $query1);

		if(mysqli_num_rows($result2)>0){
			$row=mysqli_fetch_array($result2,MYSQLI_ASSOC);
			$_SESSION['login'] = true;
			$_SESSION['userName'] = $userName;
			$_SESSION['password'] = $password;
			// $_SESSION['level'] = $level;
			$level = $row['level'];
// echo $level;
// exit;
			if($level == "manager"){
				$_SESSION['level'] = $level;
				header('location: Manager/index.php');
			}
			else if($level == "admin"){
				$_SESSION['level'] = $level;
				header('location: Administrator/index.php');
			}else{
				header('location: login.php');
			}

		}else if(mysqli_fetch_array($result1)){
			$_SESSION['login'] = true;
			$_SESSION['userName'] = $userName;
			$_SESSION['phone'] = $phone;
			$_SESSION['password'] = $password;
			header('location: Customer/index.php');

		}else{
			header('location: login.php?error1');
		}
		
	}
	
?>