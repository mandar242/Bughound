<?php
	if(isset($_POST['program_name'])){
		$id = $_POST['id'];
		$name = $_POST['program_name'];
		$release = $_POST['release'];

        $con = mysqli_connect("localhost","root");
        mysqli_select_db($con, "Bughound");
        $query = "UPDATE programs SET 
            program_name = '$name', 
            release_build = '$release' 
            WHERE program_id = '$id' ";
        mysqli_query($con, $query);
        header("Location: programMain.php");
		die();
    }
    
    if(isset($_POST['area_name'])){
		$id = $_POST['id'];
        $name = $_POST['area_name'];

        $con = mysqli_connect("localhost","root");
        mysqli_select_db($con, "Bughound");
        $query = "UPDATE areas SET 
            area_name = '$name'
            WHERE area_id = '$id' ";
        mysqli_query($con, $query);
        header("Location: areaMain.php");
		die();
	}

?>