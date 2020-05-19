<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Edit Area</title>
    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap.min.css">

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
        <a class="nav-link" href="../home.php">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="../logout.php">Logout</a>
      </li>
    </ul>
    <?php endif; ?>
    <div class="container">
        <h2 class="text-center my-4">Edit Area</h2>

       <table id ="dtBasicExample" class="table table-bordered table-sm dataTables_length">
          <thead>
            <tr>
              <th scope="col">Area ID</th>
              <th scope="col">Program ID</th>
              <th scope="col">Area</th>
              <th scope="col">Update</th>
              <th scope="col">Delete</th>
            </tr>
          </thead>
          <?php
          $con = mysqli_connect("localhost","root");
              if(! $con ) {
                die('Could not connect: ' . mysqli_error());
              }
              $area_id =mysqli_real_escape_string($con, isset($_GET['area_id']) ? $_GET['area_id'] : '0');
              $area = mysqli_real_escape_string($con,isset($_GET['area']) ? $_GET['area'] : '0');
              // $area = $_POST['area'];
              $prog_id =mysqli_real_escape_string($con, isset($_GET['prog_id']) ? $_GET['prog_id'] : '0');
              
              mysqli_select_db($con, "bughound_test1");
              
              
              if(isset($area) && isset($area_id)){
                $query1 = "UPDATE areas SET area ='".$area."' where area_id = '".$area_id."';";
                $query3 = "SELECT areas.area_id, areas.prog_id, areas.area, programs.program FROM areas INNER JOIN programs ON areas.prog_id=programs.prog_id WHERE areas.prog_id=$prog_id AND areas.area='$area' AND areas.area_id<>$area_id";
                $result3=mysqli_query($con, $query3);
                if(mysqli_num_rows($result3)>0):?>
                    <h1>Area name already exists!!</h1>
                <?php else:mysqli_query($con, $query1); ?>
                    <!-- <h1>Area added sucessfully!!</h1> -->
                <?php endif; ?>
                <?php  
              }              
              $query2 = "SELECT * FROM areas where prog_id ='".$prog_id."';";     
              $result = mysqli_query($con, $query2);

          ?>
          <tbody>
            <?php
              if (mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_assoc($result)) {
               ?>
               <tr>
                   <!-- <td><span><?php echo $row["area_id"] ?> </span></td> -->
                   <!-- <td><a href="../editablearea.php/?area_id=<?php echo $row["area_id"]?>"><?php echo $row["area_id"] ?> </a></td> -->
                   <td><span><?php echo $row["area_id"] ?> </span></td>
                   <td><span><?php echo $abc = $row["prog_id"] ?> </span></td>
                   <td><span><?php echo $row["area"] ?> </span></td>
                   <!-- <td><a href="../editablearea.php/?area_id=<?php echo $row["area_id"]?>"><?php echo $row["area_id"] ?> </a></td> -->
                  <!-- <td><form action="../editablearea.php/?area_id=<?php echo $row["area_id"]?>"> <button type="submit" name="area_id" class="btn btn-primary" style="float: right;">Update</button></form></td> 
                  -->
                  <td> <button type="submit" name="area_id" class="btn btn-primary" style="float:;" onclick="dance('<?php echo $row["area_id"]?>');">Update</button></td>
                  <form action="../deleteareahidden.php" method="post">
                  <td style="padding-left: 0px;"> <button type="submit" name="delete_area" value="<?php echo $row["area_id"] ?>" class="btn btn-danger" style="float: ;" >Delete</button></td></form>
               </tr>
               <?php
            }
?>
        <?php } else {
            echo "0 results";
         }
            ?>
          </tbody>
        </table>
         <button class="btn btn-primary w-80"  style="float: right; margin-left: 15px;" type="button" onclick="go_back()">Back</button>
        <!-- <button type="button" class="btn btn-primary" style="float: right;">Done</button> -->
    </div>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script type="text/javascript">

     function go_back(){
        window.location.assign("../programtable.php");
      }
      function dance(area_id)
      {
        window.open("../editablearea.php/?area_id="+area_id,"_self");
      }
    </script>
</body>
</html>