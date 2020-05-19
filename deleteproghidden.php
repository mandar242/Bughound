<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<h2>program deleted</h2>

<?php
                    $prog_id = isset($_GET['prog_id']) ? $_GET['prog_id'] : '0';
                    // echo $prog_id;
                    $con = mysqli_connect("localhost","root");
                    mysqli_select_db($con, "bughound");
                     $query = "delete from programs where prog_id = '".$prog_id."';";
                     mysqli_query($con, $query);
                     header('location: ../editprogram.php');
                    if(! $con ) {
                      die('Could not connect: ' . mysqli_error());
                    }    

            
          else {
            echo "0 results";
         }
?>
<h3>Done</h3>
<button type="submit" name="delete_emp" onclick="go_back()" class="btn btn-primary" style="float: ;">Back</button>
</body>

<script type="text/javascript">
	
	function go_back() {
		// body...
		window.open("home.php","_self");
	}
</script>
</html>