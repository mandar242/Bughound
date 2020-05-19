<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Search bug</title>
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
            if(! $con ) {
                die('Could not connect: ' . mysqli_error());
            }
            mysqli_select_db($con, "bughound_test1");
            $query_prog="SELECT * FROM programs";
            $query_area = "SELECT * FROM areas";
            $query_emp="SELECT emp_id, name  FROM employees ";
            $query_join = "SELECT programs.program_version, programs.program, programs.program_release FROM programs INNER JOIN bug ON programs.prog_id = bug.program";

            $result_prog=mysqli_query($con, $query_prog);
            $result_emp=mysqli_query($con, $query_emp);
            $result_area=mysqli_query($con, $query_area);
            $result_join=mysqli_query($con, $query_join);


// trial section
         /*   while($row=mysqli_fetch_assoc($result_join)) {                        
                             echo "<option value=".$row['program'].">".$row['program_release']."" . $row['program_version']."". $row['program']." </option>";  ?>
<!-- <?php while($row = mysqli_fetch_assoc($result_join)) {  ?>
                        <option value="<?php echo $row["program"] ?>"><?php echo $row["program"] ?><h6>&nbsp-</h6> <?php echo $row["program_version"] ?><h6>&nbsp-</h6> <?php echo $row["program_release"] ?></option>        
                <?php }  ?> -->
*/

                            // <?php }


            $query_bug="SELECT * FROM bug";
            $result_bug=mysqli_query($con, $query_bug);
            $type = [];
            $program = [];
            $seve = [];
            $funArea =[];
            $assign =[];
            $reportedBy =[];
            $resolution =[];
            $status=[];
            $priority=[];
            $prog_info=[];
            $programList=[];
            $bugList=[];
            $emp_info=[];
            $resolved_by=[];
            $report_date=[];
            while($row = mysqli_fetch_assoc($result_bug))
            {
              array_push($program, $row['Program']);
              array_push($type, $row['Report_type']);
              array_push($seve, $row['Severity']);
              array_push($funArea, $row['Functional_Area']);
              array_push($assign, $row['Assigned_To']);
              array_push($reportedBy, $row['Reported_By']);
              array_push($resolution, $row['Resolution']);
              array_push($status, $row['Status_bug']);
              array_push($priority, $row['Priority']);
              array_push($bugList, $row['bug_id']);
              array_push($resolved_by, $row['Resolved_By']);
              array_push($report_date, $row['Report_Date']);

              // array_push($new, $row['rogram']);

            }

            // while($row=mysqli_fetch_assoc($result_join))
            // {
            //   array_push($new1, $row["program"].'-'.$row["program_version"].'-'.$row["program_release"]);
            //   array_push($programList, $row["program"]);

            // }
            while($row_prog=mysqli_fetch_assoc($result_prog))
            {
              array_push($prog_info,$row_prog["program"].'-'.$row_prog["program_version"].'-'.$row_prog["program_release"].'-'.$row_prog['prog_id']);
            //   array_push($programList, $row["program"]);

            }

            while($row=mysqli_fetch_assoc($result_emp))
            {
              array_push($emp_info, $row["emp_id"].'-'.$row["name"]);
            }
        ?>      
       
 
    <div class="container">
        <h2 class="text-center my-4">Search Bug Page</h2>
        <div id="newBugForm" class="container">
            <form action="searchbug2.php" method="POST">
                <div class="row">
                    <div class="col-12 col-md-4">
                        <div class="form-group">
                            <label for="program">Program</label>
                            <select  class="form-control" name="program_name">  
                            <option value="">Please select</option>                                                
                                    <?php foreach ($prog_info as $temp ) { 
                                  if($temp != '' || $temp != null)
                                  { $temp_ar=explode("-",$temp); 
                                    ?> <option value=<?php echo $temp_ar[3];?> ><?php echo $temp_ar[0]."-".$temp_ar[1]."-".$temp_ar[2]; ?></option> <?php } }?> 
                                
                           </select>
                          </div>
                    </div>
                    <div class="col-12 col-md-4">
                        <div class="form-group">
                            <label for="report-type">Report type</label>
                            <select class="form-control"  name="report-type">
                            <option value="">Please select</option>                    
                              <option value="Coding Error">Coding Error</option>
                              <option value="Design Issue">Design Issue</option>
                              <option value="Suggestion">Suggestion</option>
                              <option value="Documentation">Documentation</option>
                              <option value="Hardware">Hardware</option>
                              <option value="Query">Query</option>
                            </select>
                          </div>
                    </div>
                    <div class="col-12 col-md-4">
                        <div class="form-group">
                            <label for="report-type">Severity</label>
                            <select class="form-control"  name="severity">
                            <option value="">Please select</option>                    
                              <option value="Minor">Minor</option>
                              <option value="Serious">Serious</option>
                              <option value="Fatal">Fatal</option>
                            </select>
                          </div>
                    </div>
                </div>
              
                <div class="row">
                    <div class="col-12 col-md-6">
                        <div class="form-group">
                            <label for="functional-area">Functional Area</label>
                            <select class="form-control" name="functional-area">
                            <option value="">Please select</option>                    
                             
                              <?php while($row=mysqli_fetch_assoc($result_area))
                              {  ?>
                                <option value=<?php echo $row['area_id'];?> >
                                <?php echo $row['area'];?>
                                </option>
                                
                                <?php 

                              } ?>
                            </select>
                          </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="form-group">
                            <label for="assigned-to">Assigned to</label>
                            <select class="form-control" name="assigned-to">
                            <option value="">Please select</option>                    
                             <?php foreach ($emp_info as $temp ) { 
                                  if($temp != '' || $temp != null)
                                  { $temp_a=explode("-",$temp);?> <option value=<?php echo $temp_a[0];?>><?php echo $temp_a[1]; ?></option> <?php } }?>
                            </select>
                          </div>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-12 col-md-6">
                        <div class="form-group">
                            <label for="reported-by">Reported by</label>
                            <select class="form-control" name="reported-by">
                            <option value="">Please select</option>  
                            <?php foreach ($emp_info as $temp ) { 
                                  if($temp != '' || $temp != null)
                                  { $temp_a=explode("-",$temp);?> <option value=<?php echo $temp_a[0];?> ><?php echo $temp_a[1]; ?></option> <?php } }?>
                            </select>
                          </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="form-group">
                            <label for="resolution">Resolution</label>
                            <select class="form-control" name="resolution">
                              <option value="">Please select</option> 
                              <option value="Pending">Pending</option>                    
                              <option value="Fixed">Fixed</option>                    
                              <option value="Irreproducible">Irreproducible</option>                    
                              <option value="Deferred">Deferred</option>                    
                              <option value="As designed">As designed</option>                    
                              <option value="Withdrawn by reporter">Withdrawn by reporter</option>                    
                              <option value="Need more info">Need more info</option>                    
                              <option value="Disagree with suggestion">Disagree with suggestion</option>              
                              <option value="Duplicate">Duplicate</option>                    

                            
                            </select>
                        </div>
                    </div>
                </div>
    
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="status">Status</label>
                            <select class="form-control" name="status">
                              <option value="">Please select</option>                    
                              <option value="open">open</option>
                              <option value="closed">closed</option>
                              <option value="resolved">resolved</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="priority">Priority</label>
                            <select class="form-control" name="priority">
                            <option value="">Please select</option>                    
                              <option value="Fix immediately">Fix immediately</option>
                              <option value="Fix as soon as possible">Fix as soon as possible</option>
                              <option value="Fix before next milestone">Fix before next milestone</option>
                              <option value="Fix before release">Fix before release</option>
                              <option value="Fix if possible">Fix if possible</option>
                              <option value="Optional">Optional</option>
                            </select>
                        </div>
                        </div>
                </div>
                  
            
                <div class="row">
                      <div class="col">
                        <div class="form-group">
                          <label for="resolved-by">Resolved-By</label>
                              <select class="form-control" name="resolved-by">
                              <option value="">Please select</option>                    
                              <?php foreach ($emp_info as $temp ) { 
                                  if($temp != '' || $temp != null)
                                  { $temp_a=explode("-",$temp); ?> <option value=<?php echo $temp_a[0];?>><?php echo $temp_a[1]; ?></option> <?php } }?>
                              </select>
                        </div>
                      </div>
                      <div class="col">
                        <div class="form-group">
                          <label for="report-date">Report Date</label>
                          <input type="date" class="datepicker" placeholder="Date" name="reported-date" id="reported-date">
                        </div>
                      </div>
                </div>
    
                <div class="row mt-3">
                    <div class="col-12 mb-3">
                        <button class="btn btn-primary w-100"  value="search" name="search" type="submit">Search</button>
                    </div>
                    <div class="col-6">
                        <input class="btn btn-outline-primary w-100" type="reset"  onclick="reset()" value="Reset">
                    </div>
                    <div class="col-6">
                        <button class="btn btn-outline-primary w-100" type="button" onclick="go_home()">Back</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
    



    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script type="text/javascript">
      function reset() {
        // body...
        window.location.assign("searchbug.php");
      }
  function go_home(){window.location.assign("home.php");}

    </script>

</body>
</html>