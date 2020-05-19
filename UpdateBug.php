<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Update bug</title>
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
<?php if(isset($_SESSION['username'])): ?>
        <ul class="nav justify-content-end">
        <li class="nav-item">
            <a class="nav-link" href="../home.php">Home</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="../logout.php">Logout</a>
        </li>
        </ul>
    <?php else: ?>
        <ul class="nav justify-content-end">
            <li class="nav-item">
                <a class="nav-link" href="../index.php">Login</a>
            </li>
        </ul>
  <?php endif; ?>
    <?php if($_SESSION['userlevel']==1){ ?>
        <style type="text/css">
            #lvl{
                display:None;
            }            
        </style>

    <?php } ?>

  <?php
            $con = mysqli_connect("localhost","root");
            if(! $con ) {
                die('Could not connect: ' . mysqli_error());
            }
            mysqli_select_db($con, "bughound_test1");            
            $query_prog="SELECT * FROM programs";
            $query_emp="SELECT emp_id, name  FROM employees ";
            $query_area="SELECT area_id, area FROM areas ";
            $result_prog=mysqli_query($con, $query_prog);
            $result_emp=mysqli_query($con, $query_emp);            
            $bool=['Yes','No'];
            $resolution=['Pending','Fixed','Irreproducable','Deferred','As designed','Withdrawn by reporter','Need more info','Disagree with suggestion','Duplicate'];


            $result_area=mysqli_query($con, $query_area);
        ?>
  <?php
  
                    $bug_id = isset($_GET['bug_id']) ? $_GET['bug_id'] : '0';
                    $con = mysqli_connect("localhost","root");
                    if(! $con ) {
                    die('Could not connect: ' . mysqli_error());
                    }
                    
                    
                    mysqli_select_db($con, "bughound_test1");
                    
                    echo $bug_id;
                    $query = "SELECT * FROM bug where bug_id = '".$bug_id."';";                                        
                    // $query = "SELECT * FROM bug where bug_id = '".$bug_id."';";                                        
                    $result_bug = mysqli_query($con, $query);

                    $row = mysqli_fetch_assoc($result_bug);
                    // echo $row['Program'];

                    
            ?>
    
<div class="container">
        <h2 class="text-center my-4">Update Bug Page</h2>
        <div id="newBugForm" class="container">
            <form action="../Updatebug1.php" method="POST" enctype="multipart/form-data">                
                <div class="row">
                    <div class="col-12 col-md-4">
                        <div class="form-group">
                        <?php echo"<input type='hidden' class='form-control' id='bug_id' name='bug_id' value=".$bug_id.">"?> 
                            <label for="program">Program</label>                              
                            <label for="program">Program</label>   
                            <select class='form-control' id='program' name='program'>                                                        
                            <!-- <?php echo"<option selected=".$row['Program'].">".$row['Program']."</option>"?>  -->

                            <?php while($row_prog=mysqli_fetch_assoc($result_prog)) { 

                            if($row_prog['prog_id']==$row['Program'])
                            {
                               echo "<option selected='".$row_prog['program']."' value='".$row_prog['prog_id']."'>".$row_prog['program']."-".$row_prog['program_release']."-".$row_prog['program_version']." </option>";
                            }
                            else
                            {
                              echo "<option value='".$row_prog['prog_id']."'>".$row_prog['program']."-".$row_prog['program_release']."-".$row_prog['program_version']." </option>";
                            }}?>

                            
                            
                            </select>                            
                        </div>
                    </div>
                    <div class="col-12 col-md-4">
                        <div class="form-group">
                            <label for="report-type">Report type</label>
                            <select class="form-control" id="report-type" name="report-type">
                                
                                <?php $rep=['Coding Error','Design Issue','Suggestion','Documentation','Hardware','Query']; foreach($rep as $value){
                                if ($value==$row['Report_type']) {
                              
                              echo "<option value='".$value."' selected='".$value."'>".$value."</option>";
                            }else
                            {
                              echo "<option value=".$value.">". $value." </option>"; 
                            }}?>  
                                               
                            </select>
                        </div>
                    </div>
                    <div class="col-12 col-md-4" onload="func()">
                        <div class="form-group">
                            <label for="severity">Severity</label>
                            

                             <?php echo"<select class='form-control' id='severity' name='severity' >"?>
                             <?php $sev=['Minor','Serious','Fatal'];
                            foreach($sev as $value){
                                if ($value==$row['Severity']) {
                              
                              echo "<option value=".$value." selected='".$value."'>".$value."</option>";
                            }else
                            {
                              echo "<option value=".$value.">". $value." </option>"; 
                            }}?> 
                            
                            </select>
                        </div>
                    </div>
                </div>
                            
                <div class="row">
                    <div class="col-12 col-md-8">
                        <div class="form-group">
                            <?php $val=$row['Problem_Summary']; ?>
                            <label for="problem-summary">Problem summary</label>
                            <input type="text" class="form-control"  name="summary" value="<?php echo htmlentities($val);?>" id='problem-summary' />
                            <!-- <?php echo "<input type='text' class='form-control' id='problem-summary' name='summary' value='".$row['Problem_Summary']."' />";?>  -->
                        </div>
                    </div>
                    <div class="col-12 col-md-4">
                        <div class="form-group">
                            <label for="reporductible">Reproducible?</label>
                            <select class="form-control" id="reporductible" name="reproduce">
                            <?php foreach($bool as $value){
                                if ($value==$row['Reproducable']) {
                              
                              echo "<option value=".$value." selected='".$value."'>".$value."</option>";
                            }else
                            {
                              echo "<option value=".$value.">". $value." </option>"; 
                            }}?> > 
                           
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-md-12">
                        <div class="form-group">
                            <label for="problem">Problem</label>
                            <textarea class='form-control' id='problem' value="<?php echo htmlentities($row['Problem']);?>" rows='2' name='problem'><?php echo htmlentities($row['Problem']);?></textarea>
                            <!-- <?php echo"<textarea class='form-control' id='problem' value='".$row['Problem']."' rows='2' name='problem' placeholder='".$row['Problem']."' >".$row['Problem']."</textarea>"?>  -->
                            
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-md-12">
                        <div class="form-group">
                            <label for="fix">Suggested Fix</label>
                            <textarea class="form-control" id="fix" rows="2" name="fix" value="<?php echo htmlentities($row['Suggested_Fix']);?>"><?php echo htmlentities($row['Suggested_Fix']);?></textarea>
                        </div>
                    </div>
                </div>        
                            
             
                <div class="row">
                    <div class="col-12 col-md-6">
                        <div class="form-group">
                            <label for="reported-by">Reported by</label>
                            <select class="form-control" id="reported-by" name="reported-by">                              
                            <?php while($row_emp=mysqli_fetch_assoc($result_emp)) { ?>                        
                            <?php 
                            if ($row_emp['emp_id']==$row['Reported_By']) {
                              # code...
                              echo "<option value=".$row_emp['emp_id']." selected='".$row_emp['name']."'>". $row_emp['name']."</option>";
                            }else
                            {
                              echo "<option value=".$row_emp['emp_id'].">". $row_emp['name']." </option>"; 
                            }?>
                            <?php } mysqli_data_seek( $result_emp, 0 );?> 
                            </select>
                        </div>
                    </div>
                    <!-- <?php echo date($row['Report_Date']);?> -->
                    <div class="col-12 col-md-6">
                        <div class="form-group">
                            <label for="reported-date" class="d-block">Date</label>
                            <?php echo"<input type='date' class='datepicker'value='".date($row['Report_Date'])."' placeholder='".$row['Report_Date']."' name='reported-date' id='reported-date'>"?>
                        </div>
                    </div>
                </div>
                <div id="lvl">
                    <div class="row">
                        <div class="col-12 col-md-6">
                            <div class="form-group">
                                <label for="functional-area">Functional Area</label>
                                <select class="form-control" id="function-area" name="function-area">
                                <option value="">Please select</option>
                                <?php while($row_area=mysqli_fetch_assoc($result_area)){?>
                                <?php
                                    if($row_area['area_id']==$row['Functional_Area']){
                                        echo "<option value=".$row_area['area_id']." selected='".$row_area['area']."'>".$row_area['area']."</option>";
                                    }
                                    else{
                                        echo "<option value=".$row_area['area_id'].">".$row_area['area']."</option>";
                                    }
                                }    
                                ?>                                
                                </select>
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="form-group">
                                <label for="assigned-to">Assigned to </label>
                                <select class="form-control" id="assigned-to" name="assigned-to">
                                <option value="">Please select</option>                             
                                <?php while($row_emp=mysqli_fetch_assoc($result_emp)) { ?>  
                                 <?php 
                                    if ($row_emp['emp_id']==$row['Assigned_To']) {
                                    echo "<option value=".$row_emp['emp_id']." selected='".$row_emp['name']."'>".$row_emp['name']."</option>";
                                    }else
                                    {
                                    echo "<option value=".$row_emp['emp_id'].">".$row_emp['name']." </option>"; 
                                    }
                                ?>    
                                <?php } mysqli_data_seek( $result_emp, 0 );?> 
                                </select>
                            </div>
                        </div>
                    </div>
        
                    <div class="row">
                        <div class="col-12 col-md-12">
                            <div class="form-group">
                                <label for="comments">Comments</label>
                                <textarea class='form-control' id='comments' value="<?php echo htmlentities($row['Comments']);?>" rows='2' name='comments'><?php echo htmlentities($row['Problem']);?></textarea>
                                <!-- <?php echo "<textarea class='form-control id='comments' name='comments' value='".$row['Comments']."' rows='2' placeholder='".$row['Comments']."'>".$row['Comments']."</textarea>"?> -->
                            </div>
                        </div>
                    </div>
        
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="status">Status</label>
                                <select class="form-control" id="status" name="status">
                                <option value="">Please select</option>
                                <?php $status=['Closed','Open','Resolved'];
                                foreach($status as $val)
                                {
                                  if($val==$row['Status_bug'])
                                  {
                                 echo"<option selected='".$val."'>".$val."</option>";}
                                 else
                                  {
                                  echo"<option>".$val."</option>";}
                                  }?>
                                }                     
                                </select>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="priority">Priority</label>
                                <select class="form-control" id="priority" name="priority">
                                <option value="">Please select</option>
                                <?php $prio=['Fix immediately','Fix as soon as possible','Fix before next milestone','Fix before release','Fix if possible','Optional'];
                                 foreach($prio as $val)
                                 {
                                  if($val==$row['Priority'])
                                  {
                                 echo"<option selected='".$val."'>".$val."</option>";}
                                 else
                                 {
                                 echo"<option>".$val."</option>";}
                               }?>
                                
                                </select>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="resolution">Resolution</label>                                
                                <select class="form-control" id="resolution" name="resolution">
                                <option value="">Please select</option>
                                  <?php foreach($resolution as $value){
                                if ($value==$row['Resolution']) {
                              
                              echo "<option value=".$value." selected='".$value."'>".$value."</option>";
                            }else
                            {
                              echo "<option value=".$value.">". $value." </option>"; 
                            }}?>  
                               
                                </select>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="resolution-v">Resolution version</label>
                                <select class="form-control" id="resolution-v" name="resolution-v">
                                <option value="">Please select</option>
                                <?php echo"<option selected='".$row['Resolution_Version']."'>".$row['Resolution_Version']."</option>"?>                                
                                <option>1</option>
                                <option>2</option>
                                <option>3</option>
                                <option>4</option>
                                <option>5</option>
                                </select>
                            </div>
                        </div>
                    </div>
        
        
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="resolved-by">Resolved by</label>
                                <select class="form-control" id="resolved-by" name="resolved-by">
                                <option value="">Please select</option>
                                <?php while($row_emp=mysqli_fetch_assoc($result_emp)) { 
                                if ($row_emp['emp_id']==$row['Resolved_By']) {
                              
                              echo "<option value=".$row_emp['emp_id']." selected='".$row_emp['name']."'>".$row_emp['name']."</option>";
                            }else
                            {
                              echo "<option value=".$row_emp['emp_id'].">". $row_emp['name']." </option>"; 
                            }?>                                              
                               
                                <?php } mysqli_data_seek( $result_emp, 0 );?> 
                                </select>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="resolved-date" class="d-block">Date</label>
                                <?php echo"<input type='date' class='datepicker' value='".date($row['Resolve_Date'])."' placeholder='".$row['Resolve_Date']."' name='resolved-date' id='resolved-date'>"?>
                                <!-- <input type="date" class="datepicker" placeholder="Date" name="resolved-date" id="resolved-date"> -->
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="tested-by">Tested by</label>
                                <select class="form-control" id="tested-by" name="tested-by">
                                <option value="">Please select</option>
                                <?php while($row_emp=mysqli_fetch_assoc($result_emp)) {
                                if ($row_emp['emp_id']==$row['Tested_By']) {
                              
                              echo "<option value=".$row_emp['emp_id']." selected='".$row_emp['name']."'>".$row_emp['name']."</option>";
                            }else
                            {
                              echo "<option value=".$row_emp['emp_id'].">". $row_emp['name']." </option>"; 
                            }?>                                                                      
                                <!-- <?php echo "<option value=".$row_emp['emp_id'].">". $row_emp['name']." </option>"; ?> -->
                                <?php } mysqli_data_seek( $result_emp, 0 );?> 
                                </select>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="tested-date" class="d-block">Date</label>
                                <?php echo"<input type='date' class='datepicker' value='".date($row['Test_Date'])."' placeholder='".$row['Test_Date']."' name='tested-date' id='tested-date'>"?>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="treat-as">Treat as deferred?</label>
                                <select class="form-control" id="treat-as" name="treat-as">
                                <option value="">Please select</option>
                                  <?php foreach($bool as $value){
                                if ($value==$row['Deferred']) {
                              
                                echo "<option value=".$value." selected='".$value."'>".$value."</option>";
                                }else
                                {
                                echo "<option value=".$value.">". $value." </option>"; 
                                }}?>                                                              
                                </select>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label>Attachments</label>
                                <input class="form-control-file" type="file" name="file1[]" id="file1" multiple>                                
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="row mt-3">
                    <div class="col-12 mb-3">
                        <button class="btn btn-primary w-100" type="submit">Submit</button>
                </div>

                    <div class="col-6">
                        <input class="btn btn-outline-primary w-100" type="reset" value="Reset">
                    </div>
                    <div class="col-6">
                        <button class="btn btn-outline-primary w-100" type="button" onclick="go_back()">Cancel</button>                        
                    </div>
                </div>
            </form>
            <br>
            <div class="row">
                <div class="col">
                <div class="form-group">
                    <label>Attachments</label>
                    <?php
                        $query_file="SELECT * from attachment WHERE bug='".$row['bug_id']."';";
                        $result_file=mysqli_query($con, $query_file);                                    
                    ?>
                    <select name="open-file" id="open-file">
                        <?php while($row_file=mysqli_fetch_array($result_file)) {  if($row_file[2]!=NULL){?>                        
                        <?php echo "<option value=".$row_file[2].">". $row_file[2]." </option>"; ?>
                        <?php }} mysqli_data_seek( $result_file, 0 );?>                                 
                    </select>
                </div>
                </div>
                <div class="col">
                    <div class="form-group">
                    <button name="btn" id="btn" onclick="ff()">Open</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
                        
    <script>
        function ff(){
            // document.getElementById("dis").innerHTML = document.getElementById("select").value;
            if(document.getElementById("open-file").value!=""){
                window.location.assign("/bughound5/open2.php?bug_id="+<?php echo $row['bug_id']; ?>+"&filename="+document.getElementById("open-file").value);
            }
        }
        function go_back(){
            window.location.assign("../searchbug.php");
        }
    </script>                            
    


    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

</body>
</html>