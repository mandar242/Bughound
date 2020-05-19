<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Add Employee</title>
    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<?php   
        session_start();
        if(isset($_SESSION['last_action']))
        {
          if(time() - $_SESSION['last_action']>1800)
          {
            session_unset();
            session_destroy();  
          }
        }
        $_SESSION['last_action'] = time();
    ?>
<body>
    <div class="jumbotron">
    <div class="container">
          <?php        
          $con = mysqli_connect("localhost","root");                       
                $name = mysqli_real_escape_string($con,$_POST['name']);
                $username = mysqli_real_escape_string($con,$_POST['username']);
                $password = mysqli_real_escape_string($con,$_POST['password']);
                $userlevel = mysqli_real_escape_string($con,$_POST['userlevel']);
                
                
                mysqli_select_db($con, "bughound_test1");
                $query1 = "INSERT INTO employees (name, username, password, userlevel) VALUES ('".$name."','".$username."','".$password."','".$userlevel."')";        
                $query2="SELECT * FROM employees WHERE username='$username'";
                $result2=mysqli_query($con, $query2);
                if(isset($result2) && mysqli_num_rows($result2)>0):?>
                  <h2>Duplicate Entry, Can not be added.</h2>
                <?php else:mysqli_query($con, $query1);?> 
                <h2>Employee Added Sucessfully!!</h2>
              <?php endif; ?>
                        
            <p>
            <button class="btn btn-primary btn-lg" type="button" onclick="go_home()">Return Home</button>
        
        <script language=Javascript>
            function go_home(){
                window.location.replace("empMain.php");
            }
        </script>
        </div> 
        </div>
 
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

</body>
</html>