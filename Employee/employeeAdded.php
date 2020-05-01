<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Adding Employee</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    </head>
    <body>
    <div class= "jumbotron">
		<div class= "container">
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
                printf("<p>Employee added successfully : %s <p>",$name);
            ?>
            <input type="button" value="Return Home" id=button1 name=button1 class="btn btn-primary btn-lg" onclick="go_home()">    
        </h2>
        <script language=Javascript>
            function go_home(){
                window.location.replace("dispEmployee.php");
            }
        </script>
           </div>
           </div> 
    </body>
</html>
