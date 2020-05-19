<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>CECS 544 Lab 1 Page 2</title>
    </head>
    <body>
        <h2>
          

            <?php
                $name = $_POST['name'];
                $username = $_POST['username'];
                $password = $_POST['password'];
                $userlevel = $_POST['userlevel'];

                // printf("You entered %s %s %s %s as your name.<p>",$first,$last,$password,$userlevel);
                    $con = mysqli_connect("localhost","root");
                    mysqli_select_db($con, "bughound_test1");
                     $query = "INSERT INTO employees (name, username, password, userlevel) VALUES ('".$name."','".$username."','".$password."','".$userlevel."')";
                    // echo $query;
                    mysqli_query($con, $query);
            ?>

            
            You have successfully completed trial!
            <p>
            <input type="button" value="Return" id=button1 name=button1 onclick="go_home()">    
        </h2>
        <script language=Javascript>
            function go_home(){
                window.location.replace("home.php");
            }
        </script>
            
    </body>
</html>