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
    $con = mysqli_connect("localhost","root");
    mysqli_select_db($con, "bughound_test1");
    if(! $con ) {
        die('Could not connect: ' . mysqli_error());
    }  

    $program= $_POST['program_name'];
    $r_type=$_POST['report-type'];
    $severity=$_POST['severity'];
    $functional_area=$_POST['functional-area'];
    $assigned_to=$_POST['assigned-to'];
    $reported_by=$_POST['reported-by'];
    $resolution=$_POST['resolution'];
    $status=$_POST['status'];
    $priority=$_POST['priority'];
    $report_date=$_POST['reported-date'];
    $resolved_by=$_POST['resolved-by'];

    // echo $program;
    // echo "Severity = ".$severity; //edit
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
        
      ?>        

<body>
    

    <div class="container">
        <h2 class="text-center my-4">Bug List</h2>
       <table class="table">
          <thead>
            
            <?php echo $r_type; ?>
            <tr>
              <th scope="col">Bug Id </th>
              <th scope="col">Program Name</th>
              <th scope="col">Summary</th>
              <th scope="col">Update</th>
              
            </tr>
          </thead>

              <?php
 
              $con = mysqli_connect("localhost","root");
              if(! $con ) {
                die('Could not connect: ' . mysqli_error());
              }
              mysqli_select_db($con, "bughound_test1");              
              // $query = "SELECT * FROM bug where Report_type = '".$r_type."' AND Severity = '".$severity."' AND Functional_Area = '".$functional_area."' AND Assigned_To = '".$assigned_to."' AND Reported_By = '".$reported_by."' AND Resolution = '".$resolution."' AND Status = '".$status."' AND Priority = '".$priority."'  " ;  

             if($status==""){     
              //  echo "in status= ''";          
                  $sql = " SELECT * FROM bug WHERE Status_bug='Open'";
                    if ($program!="") {
                      $sql .= " AND Program=".$program."";
                  }
                    if ($r_type!="") {
                      $sql .= " AND Report_type='".$r_type."'";
                  }
                    if ($severity!="") {
                      $sql .= " AND Severity='".$severity."'";
                  }
                    if ($functional_area!="") {
                      $sql .= " AND Functional_Area='".$functional_area."'";
                  }
                    if ($assigned_to!="") {
                      $sql .= " AND Assigned_To='".$assigned_to."'";
                  }
                    if ($reported_by!="") {
                      $sql .= " AND Reported_By='".$reported_by."'";
                  }
                    if ($resolution!="") {
                      $sql .= " AND Resolution='".$resolution."'";
                  }                    
                    if ($priority!="") {
                      $sql .= " AND Priority='".$priority."'";
                  }
                  if ($resolved_by!="") {
                    $sql .= " AND Resolved_By='".$resolved_by."'";
                  }
                  if ($report_date!="") {
                    $sql .= " AND Report_Date='".$report_date."'";
                  }
                  $sql.=";";
                  // echo "<br> Query = ".$sql;
             }
             else{
              if(isset($_POST['search']))
              {           
                // echo "in else= ''";       
                  $sql = " SELECT * FROM bug WHERE 1=1";                 
                  if ($program!="") {
                      $sql .= " AND Program='".$program."'";
                  }
                   if ($r_type!="") {
                      $sql .= " AND Report_type='".$r_type."'";
                  }
                   if ($severity!="") {
                      $sql .= " AND Severity='".$severity."'";
                  }
                   if ($functional_area!="") {
                      $sql .= " AND Functional_Area='".$functional_area."'";
                  }
                   if ($assigned_to!="") {
                      $sql .= " AND Assigned_To='".$assigned_to."'";
                  }
                   if ($reported_by!="") {
                      $sql .= " AND Reported_By='".$reported_by."'";
                  }
                   if ($resolution!="") {
                      $sql .= " AND Resolution='".$resolution."'";
                  }
                   if ($status!="") {
                      $sql .= " AND Status_bug='".$status."'";
                  }
                   if ($priority!="") {
                      $sql .= " AND Priority='".$priority."'";
                  }
                  if ($resolved_by!="") {
                    $sql .= " AND Resolved_By='".$resolved_by."'";
                  }
                  if ($report_date!="") {
                    $sql .= " AND Report_Date='".$report_date."'";
                  }
                  
              }
             }
              
              
              $res = mysqli_query($con, $sql);

              $query_join = "SELECT programs.name FROM programs INNER JOIN bug ON programs.prog_id = bug.program";
              // $result_join = mysqli_query($con, $sql);
              $result_join = mysqli_query($con, $query_join); // edit
             
            ?>

          <tbody>
            <?php   
              while($row = mysqli_fetch_assoc($res)) {
                $q="SELECT * from programs WHERE prog_id=".$row['Program'];
                $res_q = mysqli_query($con, $q);            
                $row_q=mysqli_fetch_array($res_q);
               ?>
               <tr>
                <td><span><?php echo $row["bug_id"] ?> </span></td>
                   <td><span>
                   <?php echo $row_q[1]." ".$row_q[2].", ".$row_q[3] ?> 
                   </span></td>
                   <td><span><?php echo $row["Problem_Summary"] ?> </span></td>
                  
                  <td> <button type="submit" name="update" class="btn btn-primary"   onclick="dance('<?php echo $row['bug_id']?>');">Update</button></td>
                
               </tr>
               <?php
            }
?>

            
          </tbody>
        </table>
         <button type="button" class="btn btn-primary" style="float: right;" onclick="go_back()">Back</button>
    </div>
    



    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script type="text/javascript">
      function go_back(){
        window.location.assign("searchbug.php");
      }
      function dance(bug_id) {
        window.open("updatebug.php/?bug_id="+bug_id,"_self");
        // body...
      }
      function dance2(emp_id) {
        window.open("deleteemphidden.php/?emp_id="+emp_id,"_self");
        // body...
      }
    </script>

</body>
</html>