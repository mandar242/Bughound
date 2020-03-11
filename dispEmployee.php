<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <title>Employees</title>
    </head>
    <body>
    <div class= "jumbotron">
		<div class= "container">
        <h1>Employee List</h1>
        <?php
            include 'validateUser.php';
            checkLogin();
			$con = mysqli_connect("localhost","root");
            mysqli_select_db($con, "Bughound");
			$query = "SELECT * FROM employees";
			$result = mysqli_query($con, $query);
            echo "<table border=4><th>ID</th><th>Name</th><th>Click to Update</th>\n";
            $none = 0;

            while($row=mysqli_fetch_row($result)) {
                $none=1;
                printf(
                    "<tr><td>%d</td><td>%s</td><td><A href='UpdateEmployee.php?employee_id={$row[0]}'>
                    <span class=\"linkline\">Update</span></a>
                    </td></tr>\n",$row[0],$row[1]);
                    
            }
        ?>
        </table>
        <?php
            if($none==1 or $none == 0)
		Echo "<h3>No matching employee found!</h3>\n";
        ?>
        <br>
        <p><INPUT type="button" value="New employee" id=button1 name=button1 class="btn btn-primary btn-lg" onclick="create()">

        <INPUT type="button" value="Home" id=button1 name=button1 class="btn btn-primary btn-lg" onclick="go_home()">
        <INPUT type="button" value="DB Home" id=button1 name=button1 class="btn btn-primary btn-lg" onclick="go_dbhome()">

        <script language=Javascript>
            function create() {
                window.location.replace("addEmployee.php");
            }
            function go_home() {
                window.location.replace("index.php");
            }
            function go_dbhome() {
                window.location.replace("dbMain.php");
            }
        </script>   
        </div>
        </div> 
    </body>
</html>

