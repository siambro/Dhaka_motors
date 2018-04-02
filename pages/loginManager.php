<?php
	session_start();

	$connection = mysqli_connect("localhost", "root", "", "dhaka_motors");
	
	if(isset($_POST['login'])){
		
		$userName = mysqli_real_escape_string($connection, $_POST['userName']);
		$password = mysqli_real_escape_string($connection, $_POST['password']);
		$level = mysqli_real_escape_string($connection, $_POST['level']);
		
		$query2= "select * from staff_info where userName = '".$userName."' and password = '" .$password. "'";
		//$query2= "select * from signup where userName = '".$userName."' and password = '" .$password. "' and userLevel='" .$userLevel. "'";
		
		$result2 = mysqli_query($connection, $query2);
		
		if(mysqli_fetch_array($result2)){
			$_SESSION['login'] = true;
			$_SESSION['userName'] = $userName;
			$_SESSION['password'] = $password;
			$_SESSION['level'] = $level;
			
			header('location: Customer/index.php');
		}else{
			header('location: login.php?error1');
		}
		
	}
	
?>