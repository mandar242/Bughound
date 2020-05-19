<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Add Program</title>
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
      <?php 
        $con = mysqli_connect("localhost","root");
        mysqli_select_db($con, "bughound_test1");
        if(isset($_GET['p_id'])){          
          $p_id=$_GET['p_id'];
          $p_name=$_GET['prog_name']; 
          $p_release=$_GET['prog_release'];
          $p_version=$_GET['prog_version']; 
          $query1="UPDATE programs SET program='$p_name', program_release='$p_release', program_version='$p_version' WHERE prog_id=$p_id;";
          $query2="SELECT * FROM programs WHERE program='$p_name' AND prog_id<>$p_id;"; 
          $result2=mysqli_query($con, $query2);
      ?>        
        <?php if(isset($result2) && mysqli_num_rows($result2)>0):?>
            <h1>Same Program already exists</h1>

          <?php else: $result1=mysqli_query($con, $query1);?>   
            <h1> Sucessfully added </h1>  
          <?php endif; }?>
     
    <div class="container" style="">
        <h2 class="text-center my-4">Programs</h2>    
        <table class="table">
           <thead>
           <tr>
              <th scope="col">Program</th>
              <th scope="col">Version</th>
              <th scope="col">Release</th>
              <th scope="col">Delete</th>  
            </tr>
            </thead>  
          <?php 
            
            $query="SELECT * FROM programs";
            $result=mysqli_query($con,$query);
            // echo "<table border=1 ><th>Program</th><th>Version</th><th>Release</Th>\n";
            if(mysqli_num_rows($result)>0){
              while($row=mysqli_fetch_row($result)){
                ?>
                <tr>
                  <td><a href="program_edit.php/?id=<?php echo $row[0]; ?>"><?php echo $row[1]; ?></a></td>
                  <td><?php echo $row[2]; ?></td>
                  <td><?php echo $row[3]; ?></td>
                  <td style="padding-left: 0px;"> <button type="submit" name="delete_program"  onclick="dance2(<?php echo $row[0]?>);" class="btn btn-danger" style="float: ;">Delete</button></td>
                </tr>
                <?php  
              }
            }
            ?>
        </table>
         <button type="submit" class="btn btn-primary" style="float: right;" onclick="go_back()">Back</button>
        </div>
    </div>
  

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script type="text/javascript">
       function go_back(){
        window.location.replace("maintaindb.php");
      }
      function dance2(prog_id) {
        window.location.replace("deleteproghidden.php/?prog_id="+prog_id);  
        // body...
      }
    </script>

</body>
</html>