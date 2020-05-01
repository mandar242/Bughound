<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Add new bug entry</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        
    </head>
    <body>
    <div class= "jumbotron">
		<div class= "container">
        <h1>Add New Bug Entry Report</h1>

      <?php
			include 'validateUser.php';		
      checkLogin();
      if(isset($_POST['bug_id']))
      {
        $bug_id = $_POST['bug_id'];
        $con = mysqli_connect("localhost","root");
            mysqli_select_db($con, "Bughound");
            $query = "SELECT * FROM bug_entry WHERE bug_id = '$bug_id' ";
            $result = mysqli_query($con, $query);
            $rowDB=mysqli_fetch_assoc($result);
      }
		?>
        
<form action="bugAdded.php" method="post" onsubmit="return validate(this)">
  <!--  General -->
  <div class="form-group">
    <div class="controls">
      
    <!-- <input type="text" id="name" name ="bug_name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Bug Name">
 -->
    
<br>

<!-- ======================================================= -->
<!--Select Program--><?php
        $con = mysqli_connect('localhost', 'root', '');
        $sel = mysqli_select_db($con,"bughound");

        $sql = "SELECT program_name from programs";  
        $result = mysqli_query($con, $sql);

        echo  "Program: <select name='program_name' required>";
        echo "<option value=''" ."'>" . "</option>";  
        while($row = mysqli_fetch_array($result)){
            $selectedValue = $row['program_name'] === ($rowDB['program_name'] ?? '') ? 'selected=selected'  : '';
            echo "<option value='" . $row['program_name'] . "' ". $selectedValue ."> " . $row['program_name'] ." </option>";
            //echo "<option value='" . $row['program_name'] ."' '".$row['program_name']==($rowDB['program_name'] ?? '')?'selected ="selected"':''."'>" . $row['program_name'] ."</option>";  
        }
            echo "</select>";


        $sql = "SELECT DISTINCT report_type from bug_entry";  
        $result = mysqli_query($con, $sql);
        echo "Report Type: <select name='report_type' required>";
        echo "<option value=''" ."'>" . "</option>";
        echo "<option value='coding'>coding</option>";
        echo "<option value='suggestion'>Suggestion</option>";
        echo "<option value='type2'>type2</option>";
        echo "<option value='type3'>type3</option>";
        while($row = mysqli_fetch_array($result)){
            $selectedValue = $row['report_type'] === ($rowDB['report_type'] ?? '') ? 'selected=selected'  : '';
            echo "<option value='" . $row['report_type'] . "' ". $selectedValue ."> " . $row['report_type'] ." </option>";
        }
        echo "</select>";

        $sql = "SELECT DISTINCT severity from bug_entry";  
        $result = mysqli_query($con, $sql);
        echo "severity: <select name='severity' required>";
        echo "<option value=''" ."'>" . "</option>";
        echo "<option value='fatal'>fatal</option>";
        echo "<option value='serious'>serious</option>";
        echo "<option value='major'>major</option>";
        echo "<option value='minor'>minor</option>";
        while($row = mysqli_fetch_array($result)){
            $selectedValue = $row['severity'] === ($rowDB['severity'] ?? '') ? 'selected=selected'  : '';
            echo "<option value='" . $row['severity'] . "' ". $selectedValue ."> " . $row['severity'] ." </option>";
        }
        echo "</select>";


     ?>


<!-- ======================================================= -->
<!--Report Type-->

<!--
Report Type: <select type="text" name="report_type" size=1 required>
		<option value=""></option>
        <option value="coding" <?php 'coding' === ($rowDB['report_type'] ?? '') ? 'selected' : '' ?>>Coding Error</option>
        <option value="suggestion">Suggestion</option>
        <option value="type2" <?php 'type2' === ($rowDB['report_type'] ?? '') ? 'selected' : '' ?>>Type 2 Error</option>
        <option value="type3" <?php 'type3' === ($rowDB['report_type'] ?? '') ? 'selected' : '' ?>>Type 3 Error</option>
</select>
-->

<!-- ======================================================= -->
<!--Severity-->
<!--
Severity: <select type="text" name="severity" size=1 required="">
		<option value=""></option>
        <option value="fatal">Fatal</option>
        <option value="serious">Serious</option>
        <option value="major">Major</option>
        <option value="minor">Minor</option>
</select>
<br><br>
-->

<!-- ======================================================= -->
<!-- Problem Summary -->
   <br><br>
    Problem Summary: <input type="textarea" name="problem_summary" class="form-control" id="problemsummary" required value = "<?= $rowDB['problem_summary'] ?? '' ?>"></input><br>

<!-- ======================================================= -->
<!-- Problem -->
    Problem: <input type="textarea" name="problem" class="form-control" id="problem" required value = "<?= $rowDB['problem'] ?? '' ?>"></input><br>


<!-- ======================================================= -->
<!-- Reproducible 
Reproducible? : <select type="text" name="reproducible" size=1 required>
		<option value=""></option>
        <option value="yes">Yes</option>
        <option value="no">No</option>
</select><br><br>
-->

<!-- ======================================================= -->
<!--Reported by--><?php
        $con = mysqli_connect('localhost', 'root', '');
        $sel = mysqli_select_db($con,"bughound");

        
        $sql = "SELECT DISTINCT reproducible from bug_entry";  
        $result = mysqli_query($con, $sql);
        echo "reproducible: <select name='reproducible' required>";
        echo "<option value=''" ."'>" . "</option>";
        echo "<option value='yes'>yes</option>";
        echo "<option value='no'>no</option>";
        while($row = mysqli_fetch_array($result)){
            $selectedValue = $row['reproducible'] === ($rowDB['reproducible'] ?? '') ? 'selected=selected'  : '';
            echo "<option value='" . $row['reproducible'] . "' ". $selectedValue ."> " . $row['reproducible'] ." </option>";
        }
        echo "</select>";


        $sql = "SELECT name from employees";  
        $result = mysqli_query($con, $sql);

        echo "Reported By: <select name = 'reported_by' required>";
        echo "<option value= ''" ."'>" . "</option>";  
        while($row = mysqli_fetch_array($result)){
            $selectedValue = $row['name'] === ($rowDB['reported_by'] ?? '') ? 'selected=selected'  : '';
            echo "<option value='" . $row['name'] . "' ". $selectedValue ."> " . $row['name'] ." </option>";
        }
        echo "</select>"
     ?>

<!-- ======================================================= -->
<!-- Date -->
Date: <input type="date" name="report_date" id="report_date" required="" value = "<?= $rowDB['report_date'] ?? '' ?>"></input>

<hr height="12px" background="red">
<hr height="12px" background="red">
<!-- ======================================================= -->
<!--Functional Area--><?php
        $con = mysqli_connect('localhost', 'root', '');
        $sel = mysqli_select_db($con,"bughound");

        $sql = "SELECT area_name from areas";  
        $result = mysqli_query($con, $sql);

        echo "Functional Area: <select name = 'area_name'>";
        echo "<option value= ''" ."'>" . "</option>";  
        while($row = mysqli_fetch_array($result)){
            $selectedValue = $row['area_name'] === ($rowDB['area_name'] ?? '') ? 'selected=selected'  : '';
            echo "<option value='" . $row['area_name'] . "' ". $selectedValue ."> " . $row['area_name'] ." </option>";
        }
        echo "</select>";

//Assigned to->
        $sql = "SELECT name from employees";  
        $result = mysqli_query($con, $sql);

        echo "Assigned To: <select name = 'assigned_to'>";
        echo "<option value= ''" ."'>" . "</option>";  
        while($row = mysqli_fetch_array($result)){
            $selectedValue = $row['name'] === ($rowDB['assigned_to'] ?? '') ? 'selected=selected'  : '';
            echo "<option value='" . $row['name'] . "' ". $selectedValue ."> " . $row['name'] ." </option>";
        }
        echo "</select>"
     ?>
<br><br>

<!-- ======================================================= -->
<!-- Comments -->
Comments: <input type="textarea" name="comments" class="form-control" id="comments" value = "<?= $rowDB['comments'] ?? '' ?>" placeholder="Comments" ></input><br>

<!-- ======================================================= -->
<!--Status
Status: <select type="text" name="bug_status" size=1 required>
            <option value=""></option>
            <option value="open">Open</option>
            <option value="closed">Closed</option>
</select>
-->
<!-- ======================================================= -->
<!--Priority
Priority: <select type="text" name="priority" size=1>
					  <option value=""></option>
					  <option value="high">High</option>
					  <option value="medium">Medium</option>
					  <option value="low">Low</option>
</select>
-->
<!-- ======================================================= -->
<!--Resolution
Resolution: <select type="text" name="resolution" size=1>
					  <option value=""></option>
					  <option value="resolved">Resolved</option>
					  <option value="pending">Pending</option>
</select>
<br><br>
-->
<!-- ======================================================= -->
<!--Resolved By--><?php
        $con = mysqli_connect('localhost', 'root', '');
        $sel = mysqli_select_db($con,"bughound");

        $sql = "SELECT DISTINCT bug_status from bug_entry";  
        $result = mysqli_query($con, $sql);

        echo "Status: <select name = 'bug_status'>";
        echo "<option value= ''" ."'>" . "</option>";  
        echo "<option value='open'>open</option>";
        echo "<option value='closed'>closed</option>";
        
        while($row = mysqli_fetch_array($result)){
            $selectedValue = $row['bug_status'] === ($rowDB['bug_status'] ?? '') ? 'selected=selected'  : '';
            echo "<option value='" . $row['bug_status'] . "' ". $selectedValue ."> " . $row['bug_status'] ." </option>";
        }
        echo "</select>";


        $sql = "SELECT DISTINCT priority from bug_entry";  
        $result = mysqli_query($con, $sql);

        echo "Priority: <select name = 'priority'>";
        echo "<option value= ''" ."'>" . "</option>";  
        echo "<option value='high'>high</option>";
        echo "<option value='medium'>medium</option>";
        echo "<option value='low'>low</option>";

        while($row = mysqli_fetch_array($result)){
            $selectedValue = $row['priority'] === ($rowDB['priority'] ?? '') ? 'selected=selected'  : '';
            echo "<option value='" . $row['priority'] . "' ". $selectedValue ."> " . $row['priority'] ." </option>";
        }
        echo "</select>";


        $sql = "SELECT DISTINCT resolution from bug_entry";  
        $result = mysqli_query($con, $sql);

        echo "Resolution: <select name = 'resolution'>";
        echo "<option value= ''" ."'>" . "</option>";  
        echo "<option value='resolved'>resolved</option>";
        echo "<option value='pending'>pending</option>";
        while($row = mysqli_fetch_array($result)){
            $selectedValue = $row['resolution'] === ($rowDB['resolution'] ?? '') ? 'selected=selected'  : '';
            echo "<option value='" . $row['resolution'] . "' ". $selectedValue ."> " . $row['resolution'] ." </option>";
        }
        echo "</select>";




        $sql = "SELECT name from employees";  
        $result = mysqli_query($con, $sql);

        echo "Resolved By: <select name = 'resolved_by'>";
         echo "<option value= 'Select employee'" ."'>" . "</option>";  
        while($row = mysqli_fetch_array($result)){
            $selectedValue = $row['name'] === ($rowDB['resolved_by'] ?? '') ? 'selected=selected'  : '';
            echo "<option value='" . $row['name'] . "' ". $selectedValue ."> " . $row['name'] ." </option>";
        }
        echo "</select>"
     ?>

<!-- ======================================================= -->
<!--Resolved Date -->
Date: <input type="date" name="resolved_date" id="resolved_date" value = "<?= $rowDB['resolved_date'] ?? '' ?>"></input>

<!-- ======================================================= -->
<!--Tested By--><?php
        $con = mysqli_connect('localhost', 'root', '');
        $sel = mysqli_select_db($con,"bughound");

        $sql = "SELECT name from employees";  
        $result = mysqli_query($con, $sql);

        echo "Tested By: <select name = 'tested_by'>";
         echo "<option value= 'Select employee'" ."'>" . "</option>";  
        while($row = mysqli_fetch_array($result)){
            $selectedValue = $row['name'] === ($rowDB['tested_by'] ?? '') ? 'selected=selected'  : '';
            echo "<option value='" . $row['name'] . "' ". $selectedValue ."> " . $row['name'] ." </option>";
        }
        echo "</select>"

     ?>


<!--Test Date -->
Date: <input type="date" name="tested_date" id="test_date" value = "<?= $rowDB['tested_date'] ?? '' ?>"></input>


<input type="file" name="file"> <br>

<input type="hidden" name = "bug_id" id="bug_id" value= "<?= $bug_id?>"> </input>

</div>     
</div>

    <input type="submit" name="Submit" class="btn btn-primary btn-lg" value="Submit">
    
    <input type="submit" name="Update" class="btn btn-primary btn-lg" formaction="bugUpdated.php" value="UPDATE" method= "post">
    <input type="reset" name="Reset" class="btn btn-primary btn-lg" value="Reset">
    <INPUT type="button" value="Home" id=done class="btn btn-primary btn-lg" onclick="window.location.href = 'index.php'">  
    </div>  
  </div> <!-- /.form-group -->

</form>
</div>
</div>
            
</body>
</html>