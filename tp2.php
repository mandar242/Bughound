

 <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DB maintenance</title>
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
        if(isset($_SESSION['username'])){
            echo 'Username - '.$_SESSION['username']." ";
            echo 'User Level - '.$_SESSION['userlevel'];
        }
        else{
          header("Location: index.php");
        }
    ?>
<body>
    <?php if(isset($_SESSION['username'])): ?>
    <ul class="nav justify-content-end">
      <li class="nav-item">
        <a class="nav-link" href="logout.php">Logout</a>
      </li>
    </ul>
  <?php else: ?>
      <ul class="nav justify-content-end">
      <li class="nav-item">
        <a class="nav-link" href="index.php">Login</a>
      </li>
    </ul>
  <?php endif; ?>
  
  <?php 
    $table_select=$_POST["table_select"];
    $type_select = $_POST["type_select"];
    
    
 // if(isset($_POST["export"]))  
 // {  
 //      $con = mysqli_connect("localhost","root");  
 //      header('Content-Type: text/csv; charset=utf-8');  
 //      header('Content-Disposition: attachment; filename=data.csv');  
 //      $output = fopen("php://output", "w");  
 //      fputcsv($output, array('emp_id', 'name', 'username', 'password', 'userlevel'));  
 //      $query = "SELECT * from employees ORDER BY id DESC";  
 //      $result = mysqli_query($con, $query);  
 //      while($row = mysqli_fetch_assoc($result))  
 //      {  
 //           fputcsv($output, $row);  
 //      }  
 //      fclose($output);  
 // }  
if(isset($_POST["export"])) 
{
    if($table_select =="employees" && $type_select=="ascii")
    {
        $con = mysqli_connect("localhost","root");
        header('Content-Type: text/csv; charset=utf-8');  
        header('Content-Disposition: attachment; filename=employees.csv');  
        $output = fopen("php://output", "w");  
        fputcsv($output, array('emp_id', 'name', 'username', 'password', 'userlevel'));
        mysqli_select_db($con, "bughound_test1");              
        $query = "SELECT * FROM employees";    
        $result = mysqli_query($con, $query);
        if(mysqli_num_rows($result) > 0) 
        {
            while($row = mysqli_fetch_assoc($result)) 
            {              
               fputcsv($output, $row);
            }
        }          
        fclose($output);
    }
    else
    {
        echo "select valid input";
    }
    if($table_select =="areas" && $type_select=="ascii")
    {
        $con = mysqli_connect("localhost","root");
        header('Content-Type: text/csv; charset=utf-8');  
        header('Content-Disposition: attachment; filename=areas.csv');  
        $output = fopen("php://output", "w");  
        fputcsv($output, array('area_id', 'program_id', 'area'));
        mysqli_select_db($con, "bughound_test1");              
        $query = "SELECT * FROM areas";    
        $result = mysqli_query($con, $query);
        if(mysqli_num_rows($result) > 0) 
        {
            while($row = mysqli_fetch_assoc($result)) 
            {              
               fputcsv($output, $row);
            }
        }          
        fclose($output);
    }
    else
    {
        echo "select valid input";
    }
    if($table_select =="programs" && $type_select=="ascii")
    {
        $con = mysqli_connect("localhost","root");
        header('Content-Type: text/csv; charset=utf-8');  
        header('Content-Disposition: attachment; filename=programs.csv');  
        $output = fopen("php://output", "w");  
        fputcsv($output, array('program_id', 'program', 'program_release', 'program_version'));
        mysqli_select_db($con, "bughound_test1");              
        $query = "SELECT * FROM programs";    
        $result = mysqli_query($con, $query);
        if(mysqli_num_rows($result) > 0) 
        {
            while($row = mysqli_fetch_assoc($result)) 
            {              
               fputcsv($output, $row);
            }
        }          
        fclose($output);
    }
    else
    {
        echo "select valid input";
    }

}

   ?>


    
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
</body>
</html>