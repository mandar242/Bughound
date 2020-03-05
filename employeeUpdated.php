<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Employee Updated</title>
    </head>
    <body>
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
            <input type="button" value="Return home" id=button1 name=button1 onclick="go_home()">    
        </h2>
        <script language=Javascript>
            function go_home(){
                window.location.replace("dispEmployee.php");
            }
        </script>
    </body>
</html>