<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Adding Employee</title>
    </head>
    <body>
        <h2>
            <?php
                $name = $_POST['name'];
                $username = $_POST['username'];
				$password = $_POST['password'];
				$userlevel = $_POST['userlevel'];
				$con = mysqli_connect("localhost","root");
                mysqli_select_db($con, "Bughound");
				$query = "INSERT INTO employees (
                    name, user_name, 
                    password, 
                    user_level)
                    VALUES ('".$name."',
                        '".$username."',
                        '".$password."',
                        '".$userlevel."')";
				mysqli_query($con, $query);
                printf("<p>Employee %s added successfully<p>",$name);
            ?>
            <input type="button" value="Return home" id=button1 name=button1 onclick="go_home()">    
        </h2>
        <script language=Javascript>
            function go_home(){
                window.location.replace("dispEmployee.php");
            }
        </script>
            
    </body>
</html>
