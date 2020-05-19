<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>New bug</title>
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
        header("Location: home.php");
    }?>
    <?php if(isset($_SESSION['username'])): ?>
        <ul class="nav justify-content-end">
          <li class="nav-item">
            <a class="nav-link" href="home.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="logout.php">Logout</a>
          </li>
        </ul>
      <?php endif; ?>

    <div class="container">
        <h2 class="text-center my-4">Show All Program</h2>
       <table class="table">
          <thead>
            <tr>
              <th scope="col">Program ID</th>
              <th scope="col">Program</th>
              <th scope="col">Release</th>
              <th scope="col">Version</th>
            </tr>
          </thead>
          <tbody>



             <?php
                    
                    $con = mysqli_connect("localhost","root");
                    mysqli_select_db($con, "bughound_test1");
                     $query = "SELECT * FROM programs";
                     mysqli_query($con, $query);
                    if(! $con ) {
                      die('Could not connect: ' . mysqli_error());
                    }
                    $result = mysqli_query($con, $query);
                    if (mysqli_num_rows($result) > 0) {
                      while($row = mysqli_fetch_assoc($result)) {
                         ?>
                         <tr>
                         <td><a href="editarea.php/?prog_id=<?php echo $row["prog_id"]?>"><?php echo $row["prog_id"] ?> </a></td>
                         <td><span><?php echo $row["program"] ?> </span></td>
                         <td><span><?php echo $row["program_release"] ?> </span></td>
                         <td><span><?php echo $row["program_version"] ?> </span></td>
                       </tr>
              <?php
            }
         } else {
            echo "0 results";
         }
            ?>
          </tbody>
        </table>
        <button type="submit" class="btn btn-primary" style="float: right;" onclick="go_back()">Back</button>
        
    </div>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
     <script type="text/javascript">
     function go_back(){
        window.location.assign("maintaindb.php");
      }
    </script>

</body>
</html>