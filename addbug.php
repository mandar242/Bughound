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
            echo "<option value='" . $row['program_name'] ."'>" . $row['program_name'] ."</option>";  
        }
        echo "</select>";
     ?>

<!-- ======================================================= -->
<!--Report Type-->
Report Type: <select type="text" name="report_type" size=1 required>
		<option value=""></option>
        <option value="coding">Coding Error</option>
        <option value="suggestion">Suggestion</option>
        <option value="type2">Type 2 Erro</option>
        <option value="type3">Type 3 Error</option>
</select>

<!-- ======================================================= -->
<!--Severity-->
Severity: <select type="text" name="severity" size=1 required="">
		<option value=""></option>
        <option value="fatal">Fatal</option>
        <option value="serious">Serious</option>
        <option value="major">Major</option>
        <option value="minor">Minor</option>
</select>
<br><br>
<!-- ======================================================= -->
<!-- Problem Summary -->
    Problem Summary: <input type="textarea" name="problem_summary" class="form-control" id="problemsummary" required=""></input><br>
<!-- ======================================================= -->
<!-- Reproducible -->
Reproducible? : <select type="text" name="reproducible" size=1 required>
		<option value=""></option>
        <option value="yes">Yes</option>
        <option value="no">No</option>
</select><br><br>

<!-- ======================================================= -->
<!-- Problem -->
    Problem: <input type="textarea" name="problem" class="form-control" id="problem" required></input><br>

<!-- ======================================================= -->
<!--Reported by--><?php
        $con = mysqli_connect('localhost', 'root', '');
        $sel = mysqli_select_db($con,"bughound");

        $sql = "SELECT name from employees";  
        $result = mysqli_query($con, $sql);

        echo "Reported By: <select name = 'reported_by' required>";
        echo "<option value= ''" ."'>" . "</option>";  
        while($row = mysqli_fetch_array($result)){
            echo "<option value='" . $row['name'] ."'>" . $row['name'] ."</option>";  
        }
        echo "</select>"
     ?>

<!-- ======================================================= -->
<!-- Date -->
Date: <input type="date" name="report_date" id="report_date" required=""></input>

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
            echo "<option value='" . $row['area_name'] ."'>" . $row['area_name'] ."</option>";  
        }
        echo "</select>"
     ?>

<!-- ======================================================= -->
<!--Assigned To--><?php
        $con = mysqli_connect('localhost', 'root', '');
        $sel = mysqli_select_db($con,"bughound");

        $sql = "SELECT name from employees";  
        $result = mysqli_query($con, $sql);

        echo "Assigned To: <select name = 'assigned_to'>";
        echo "<option value= ''" ."'>" . "</option>";  
        while($row = mysqli_fetch_array($result)){
            echo "<option value='" . $row['name'] ."'>" . $row['name'] ."</option>";  
        }
        echo "</select>"
     ?>
<br><br>

<!-- ======================================================= -->
<!-- Comments -->
Comments: <input type="textarea" name="comments" class="form-control" id="comments" placeholder="Comments"></input><br>

<!-- ======================================================= -->
<!--Status-->
Status: <select type="text" name="bug_status" size=1 required>
            <option value=""></option>
            <option value="open">Open</option>
            <option value="closed">Closed</option>
</select>

<!-- ======================================================= -->
<!--Priority-->
Priority: <select type="text" name="priority" size=1>
					  <option value=""></option>
					  <option value="high">High</option>
					  <option value="medium">Medium</option>
					  <option value="low">Low</option>
</select>

<!-- ======================================================= -->
<!--Resolution-->
Resolution: <select type="text" name="resolution" size=1>
					  <option value=""></option>
					  <option value="resolved">Resolved</option>
					  <option value="pending">Pending</option>
</select>
<br><br>

<!-- ======================================================= -->
<!--Resolved By--><?php
        $con = mysqli_connect('localhost', 'root', '');
        $sel = mysqli_select_db($con,"bughound");

        $sql = "SELECT name from employees";  
        $result = mysqli_query($con, $sql);

        echo "Resolved By: <select name = 'resolved_by'>";
         echo "<option value= 'Select employee'" ."'>" . "</option>";  
        while($row = mysqli_fetch_array($result)){
            echo "<option value='" . $row['name'] ."'>" . $row['name'] ."</option>";  
        }
        echo "</select>"
     ?>

<!-- ======================================================= -->
<!--Resolved Date -->
Date: <input type="date" name="resolved_date" id="resolve_date"></input>

<!-- ======================================================= -->
<!--Tested By--><?php
        $con = mysqli_connect('localhost', 'root', '');
        $sel = mysqli_select_db($con,"bughound");

        $sql = "SELECT name from employees";  
        $result = mysqli_query($con, $sql);

        echo "Tested By: <select name = 'tested_by'>";
         echo "<option value= 'Select employee'" ."'>" . "</option>";  
        while($row = mysqli_fetch_array($result)){
            echo "<option value='" . $row['name'] ."'>" . $row['name'] ."</option>";  
        }
        echo "</select>"
     ?>


<!--Test Date -->
Date: <input type="date" name="tested_date" id="test_date"></input>

</div>     
</div>

    <input type="submit" name="Submit" class="btn btn-primary btn-lg" value="Submit">
    <input type="reset" name="Reset" class="btn btn-primary btn-lg" value="Reset">
    <INPUT type="button" value="Home" id=done class="btn btn-primary btn-lg" onclick="window.location.href = 'index.php'">  
    </div>  
  </div> <!-- /.form-group -->

</form>
</div>
</div>
</body>
</html>