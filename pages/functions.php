<?php

	function logged_in(){
		return (isset($_SESSION['login'])) ? true : false;
	}
	
	function protect_page(){
		if (logged_in()===false ){
			header('location:../login.php?error2');
		}
	}
	
	function protect_page_redirect(){
		if (logged_in()===true ){
			header('location: Customer/index.php');
		}
	}
	
	
?>