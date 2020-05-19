<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Employee Updated</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    </head>
    <body>
    <div class = "jumbotron">
    <div class = "container">
        <h2>
            <?php
                include 'validateUser.php';	
                checkLogin();
				$id = $_POST['ID'];
                $name = $_POST['name'];
                $username = $_POST['username'];
				$password = $_POST['password'];
				$userlevel = $_POST['userlevel'];
				$con = mysqli_connect("localhost","root");
                mysqli_select_db($con, "Bughound");
				$query = "UPDATE employees SET 
                    name = '$name', 
                    user_name = '$username', 
                    password = '$password', 
                    user_level = '$userlevel' 
                    WHERE employee_id = '$id' ";
                mysqli_query($con, $query);
                
                //Update the cookies
                $_SESSION["user_level"] = $userlevel;
                $_SESSION["username"] = $username;
            ?>
            Employee updated: <?php printf("<p> %s.<p>",$name); ?>
            <p>
            <input type="button" value="Employee Home" id=button1 name=button1 class="btn btn-primary btn-lg" onclick="go_home()">    
        </h2>
        <script language=Javascript>
            function go_home(){
                window.location.replace("dispEmployee.php");
            }
        </script>

	<input type="button" value="DB Home" id=button1 name=button1 class="btn btn-primary btn-lg" onclick="go_dbhome()">    
        </h2>
        <script language=Javascript>
            function go_dbhome(){
                window.location.replace("dbMain.php");
            }
        </script>
        </script>
        </div>
        </div>
        

    </body>
</html>