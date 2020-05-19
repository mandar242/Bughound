<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Export Area</title>
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
  <?php if($_SESSION['userlevel']!=3){
        header("Location: home.php");
    }?>
  <?php
      $con = mysqli_connect("localhost","root");
      if(! $con ) {
        die('Could not connect: ' . mysqli_error());
      }
      mysqli_select_db($con, "bughound_test1");
      $query = "SHOW TABLES FROM bughound_test1";
      mysqli_query($con, $query);    
      $result = mysqli_query($con, $query);
      if (mysqli_num_rows($result) > 0) {     
  ?>

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
    <h2 class="text-center my-4">Export Area</h2>
    <div id="newBugForm" class="container">
        <form action="export_to.php" method="post">
            <div class="row">
                <div class="col-12 col-md-4">
                   <div class="form-group">
                        <label for="program">Table</label>
                        <select name="table_select" class="form-control" >                      
                    <?php while($row = mysqli_fetch_assoc($result)) {  ?>
                         <option > <?php echo $row[0]; ?> </option> 
                        <option value="areas">areas</option>
                        <option value="employees">employees</option>
                        <option value="programs">programs</option>

                <?php }  ?>
            </select>

                <label for="name" style="margin-top: 15px;">Type</label>
                <select class="form-control" name="type_select">
                  <option value="ascii">ASCII</option>
                  <option value="xml">XML</option>
                </select>
              </div>
                <button class="btn btn-primary w-80" name="export" style="float: right margin-left: 15px;" type="submit">Submit</button>
                <button class="btn btn-primary w-80"  style="float: right; margin-left: 5px;" type="button" onclick="go_back()">Back</button>
              </div>            
              </div>
            </form>
          </div>              
        </div>
        
        <?php
        } else {
            echo "No Program Found: Please add program first!!";
        }
        ?>


    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

    <script type="text/javascript">
     function go_back(){
        window.location.replace("maintaindb.php");
      }
    </script>

</body>
</html>