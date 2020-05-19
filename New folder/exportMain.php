<!DOCTYPE html>
<?php
   include 'validateUser.php';
   checkLogin();
   $isadmin= isAdmin();
   if($isadmin == false)
   {
   echo "<script language='javascript' type='text/javascript'>";
   echo "alert('Not an authorize user');";
   echo "</script>";

   $URL="index.php";
   echo "<script>location.href='$URL'</script>";
   }
 ?>
<html>
    <head>       
	<meta charset="UTF-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    </head>
    <body class = "centered-wrapper">
	<div class= "jumbotron">
		<div class= "container">
        <form action="exportUtil.php" method="post">
        <h3>   Select table to export: </h3> 
				<select name="table" id="table" required>
                <option value="" disabled selected>Select table</option>
                <option value="bugs"> Bugs </option>
                <option value="areas">  Areas </option>
                <option value="employees"> Employees </option>
                <option value="attachments"> Attachments </option>
                <option value="programs"> Programs</option>              
            </select>
			<br>            
<h3>Select a export file format:</h3> 
				<select name="format" id="format" required>
                <option value="" disabled selected>Select file type</option>
				 <option value="xml">  XML </option> 
                <option value="ascii"> ASCII </option>               
            </select>
            <br><br>
            <input type='submit' class="btn btn-primary btn-lg" value='Export'/>
            <input type="button" class="btn btn-primary btn-lg"  value="Home" id=homeButton name=homeButton onclick="go_home()">
<script language=Javascript>
            function go_home(){
                window.location.replace("index.php");
            }
        </script>
        </form>
    </div>
    </div>
    </body>
</html>