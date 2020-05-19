<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Edit Employee</title>
    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet">

    <!-- Jquery UI (Datepicker) -->
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <!-- <link rel="stylesheet" href="/resources/demos/style.css"> -->
    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/style.css">
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
        if(isset($_SESSION['username'])){
             'Username - '.$_SESSION['username']." ";
             'User Level - '.$_SESSION['userlevel'];
        }
        else{
          header("Location: index.php");
        }
    ?>
<body>
  <?php if($_SESSION['userlevel']!=3){
        header("Location: ../home.php");
    }?>
    <?php 
    $con = mysqli_connect("localhost","root");
      if(! $con ) {
        die('Could not connect: ' . mysqli_error());
      }
      $emp_id=mysqli_real_escape_string($con,$_POST['e_id']);
      $name=mysqli_real_escape_string($con,$_POST['name']);
      $username=mysqli_real_escape_string($con,$_POST['username']);
      $password=mysqli_real_escape_string($con,$_POST['password']);
      $userlevel=mysqli_real_escape_string($con,$_POST['userlevel']);
      
      mysqli_select_db($con, "bughound_test1");
      $query1="UPDATE employees SET name='$name' , username='$username' , password='$password' , userlevel='$userlevel' WHERE emp_id='$emp_id';";
      $query2="SELECT * FROM employees WHERE username='$username' AND emp_id<>$emp_id;";
      $result2=mysqli_query($con, $query2);
      if(mysqli_num_rows($result2)>0){
        ?>
      <h1>Same Username already exists, please choose another username</h1>
      <?php }else{ mysqli_query($con, $query1);
      		if($_SESSION['username']==$username){
      			if($userlevel!=3){
      				$_SESSION['userlevel']=$userlevel;
      				header("Location:home.php");
      			}
      		}
       ?> 
      <h1> Employee updated sucessfully!!!</h1>
      <?php  } ?>
    <button class="btn btn-primary w-80"  style="float: right; margin-left: 15px;" type="button" onclick="go_home()">Return Home</button>
    <button class="btn btn-primary w-80"  style="float: right; margin-left: 15px;" type="button" onclick="go_back()">Add more</button>
<script language=Javascript>
  function go_home(){window.location.replace("home.php");}
  function go_back(){window.location.replace("showemp.php");}
</script>
    
    

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    

</body>
</html>