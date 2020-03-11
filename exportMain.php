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
    </head>
    <body class = "centered-wrapper">
	
        <form action="exportUtil.php" method="post">
            Select table to export: 
				<select name="table" id="table" required>
                <option selected="selected" value=""></option>
                <option value="bugs"> Bugs </option>
                <option value="areas">  Areas </option>
                <option value="employees"> Employees </option>
                <option value="attachments"> Attachments </option>
                <option value="programs"> Programs</option>              
            </select>
			<br>            
Select a export file format: 
				<select name="format" id="format" required>
                <option selected="selected" value=""></option>
				 <option value="xml">  XML </option> 
                <option value="ascii"> ASCII </option>               
            </select>
            <br><br>
            <input type='submit' value='Export'/>
            <input type="button" value="Home" id=homeButton name=homeButton onclick="go_home()">
<script language=Javascript>
            function go_home(){
                window.location.replace("index.php");
            }
        </script>
        </form>
    </body>
</html>