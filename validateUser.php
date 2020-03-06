<?php
	session_start();
	function checkLogin(){
		if(!isset($_SESSION['login'])) {
			echo "<SCRIPT type='text/javascript'>
			alert('User not logged in!!!!');
			document.location.href='/bughound544/login.php';
			</SCRIPT>";	
		}	
	}

	function dispCurrentUser()
	{
		if(isset($_SESSION['login']) && isset($_SESSION["username"])) {
			printf("Logged in as: %s",$_SESSION["username"]); 			
		}
	}
	function isAdmin() {
		$user_level =  (int)$_SESSION["user_level"];
		if($user_level>2) {
			return true;
		}
		return false;
	}
	function checkLevel($min_level){
		$user_level =  (int)$_SESSION["user_level"];
		if($user_level < $min_level) {
			echo "<SCRIPT type='text/javascript'>
				alert('User level not sufficient!!!!');
			</SCRIPT>";	
			return false;
		}
		return true;
	}
?>