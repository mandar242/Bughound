<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Program Updated</title>
    </head>
    <body>
        <h2>
            <?php
                include 'validate_user.php';	
                checkLogin();
				$id = $_POST['id'];
                $name = $_POST['program_name'];
                $release = $_POST['release'];

                $con = mysqli_connect("localhost","root");
                mysqli_select_db($con, "Bughound");
                $query = "UPDATE programs SET 
                    program_name = '$name', 
                    release_build = '$release'
                    WHERE program_id = '$id' ";

				mysqli_query($con, $query);
            ?>
            You have successfully updated program: <?php printf("<p> %s.<p>",$name); ?>
            <p>
            <input type="button" value="Home" id=button1 name=button1 onclick="go_home()">    
        </h2>
        <script language=Javascript>
            function go_home(){
                document.location.href='programMain.php';
            }
        </script>
    </body>
</html>