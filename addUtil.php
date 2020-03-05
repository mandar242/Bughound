<?php
	
	if(isset($_POST['name']) && isset($_POST['username']) && isset($_POST['password'])){
		$name = $_POST['name'];
		$username = $_POST['username'];
		$password = $_POST['password'];
		$level = $_POST['user_level'];

		$con = mysqli_connect("localhost","root");
		mysqli_select_db($con, "Bughound");

		$query = "INSERT INTO employees (name, password, user_name, user_level) VALUES ('".$name."','".$password."', '".$username."', '".$level."')";

		mysqli_query($con, $query);
		header("Location: dispEmployee.php");
		
		die();	
	}

	//If it is a post to program
	if(isset($_POST['program_name'])){
		$name = $_POST['program_name'];
		$release = $_POST['release'];

		$con = mysqli_connect("localhost","root");
		mysqli_select_db($con, "Bughound");

		$query_check = "SELECT * FROM programs WHERE program_name = '".$name."' AND release_build= '".$release."'";
		$result = mysqli_query($con, $query_check);
		if (mysqli_num_rows($result) != 0){
			echo "<SCRIPT type='text/javascript'>
				alert('Program Already In Database');
				window.location.replace('programMain.php');
				</SCRIPT>";	
		}	
		else {
			$query;
			$query = "INSERT INTO programs (program_name, release_build) VALUES ('".$name."','".$release."')";
			mysqli_query($con, $query);
			header("Location: programMain.php");	
		}		
		die();
	}	
	
	if(isset($_POST['area_name'])){
		$name = $_POST['area_name'];

		$con = mysqli_connect("localhost","root");
		mysqli_select_db($con, "Bughound");

		$query_check = "SELECT * FROM `areas` WHERE `area_name` = '".$name."'";
		$result = mysqli_query($con, $query_check);

		if (mysqli_num_rows($result) != 0){
			echo "<SCRIPT type='text/javascript'>
				alert('Area Already In Database');
				window.location.replace('areaMain.php');
				</SCRIPT>";	
		}	
		else {
			$query = "INSERT INTO `areas`(`area_name`) VALUES ('".$name."')";
			mysqli_query($con, $query);
			header("Location: areaMain.php");		
		}		
		die();	
	}
	
?>