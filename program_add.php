<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Program added</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

		<!-- Fonts -->
		<link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet">

		<!-- Jquery UI (Datepicker) -->
		<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
		<!-- <link rel="stylesheet" href="/resources/demos/style.css"> -->
		<!-- Custom CSS -->
		<link rel="stylesheet" href="css/style.css">
</head>
<body>
	
<?php
$con = mysqli_connect("localhost","root");
	$prog_name=mysqli_real_escape_string($con,$_POST['prog_name']);
	$prog_version=mysqli_real_escape_string($con,$_POST['prog_version']);
	$prog_release=mysqli_real_escape_string($con,$_POST['prog_release']);
	
	mysqli_select_db($con, "bughound_test1");
	$query1="INSERT INTO programs (program, program_version, program_release) VALUES ('".$prog_name."','".$prog_version."','".$prog_release."')";
	$query2="SELECT * FROM programs WHERE program='$prog_name' AND program_release='$prog_release' AND program_version='$prog_version';";
	$result2=mysqli_query($con, $query2);	
	if(isset($result2) && mysqli_num_rows($result2)>0):?>
		<h1>Same Program already exists</h1>

	<?php else: $result1=mysqli_query($con, $query1);?>		
		<h1> Sucessfully added </h1>

	<?php endif; ?>
	


	
<button class="btn btn-primary w-80"  style="float: right; margin-left: 15px;" type="button" onclick="go_home()">Return Home</button>
<button class="btn btn-primary w-80"  style="float: right; margin-left: 15px;" type="button" onclick="go_back()">Add more</button>


<script language=Javascript>
	function go_home(){window.location.replace("home.php");}
	function go_back(){window.location.replace("addprogram.php");}
</script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

</body>
</html>


