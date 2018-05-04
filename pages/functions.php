<?php

	function logged_in(){
		return (isset($_SESSION['login'])) ? true : false;
	}
	
	function logged_in_customer(){
		return (isset($_SESSION['userName'])) ? true : false;
	}
	
	function protect_page(){
		if (logged_in()===false ){
			header('location:../login.php?error2');
		}
	}
	
	function protect_page_redirect(){
		if (logged_in()===true ){
			header('location: index.php');
		}
	}

	function protect_page_admin(){
		if ($_SESSION['level'] !="admin"){
			session_destroy();
			header('location: ../login.php?error3');
		}
	}
	function protect_page_manager(){
		if ($_SESSION['level'] !="manager"){
			session_destroy();
			header('location: ../login.php?error3');
		}
	}

	function protect_page_customer(){
		if (logged_in_customer() === false){
			session_destroy();
			header('location: ../login.php?error3');
		}
	}
?>