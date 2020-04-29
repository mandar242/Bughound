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
        
<form action="searchbugresult.php" method="post" onsubmit="return validate(this)">
  <!--  General -->
  <div class="form-group">
    <div class="controls">
      
    <!-- <input type="text" id="name" name ="bug_name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Bug Name">
 -->
    
<br>

<!-- ======================================================= -->
<!--Program--><?php
        $con = mysqli_connect('localhost', 'root', '');
        $sel = mysqli_select_db($con,"bughound");

        $sql = "SELECT program_name from programs";  
        $result = mysqli_query($con, $sql);

        echo  "Program: <select name='program_name'>";
        echo "<option value='' disabled" ."'>" . "</option>";
        echo "<option value='all'" ."'>" .'ALL'. "</option>";  
        while($row = mysqli_fetch_array($result)){
            echo "<option value='" . $row['program_name'] ."'>" . $row['program_name'] ."</option>";  
        }
        echo "</select>";
     ?>
<br><br>
<!-- ======================================================= -->
<!--Report Type-->
Report Type: <select type="text" name="report_type" size=1>
        <option value="" disabled=""><option>
        <option value="all">ALL</option>
        <option value="coding">Coding Error</option>
        <option value="suggestion">Suggestion</option>
        <option value="type2">Type 2 Erro</option>
        <option value="type3">Type 3 Error</option>
</select>
<br><br>
<!-- ======================================================= -->
<!-- Severity -->
Severity: <select type="text" name="severity" size=1>
        <option value="" disabled=""><option>
        <option value="all">ALL</option>
        <option value="fatal">Fatal</option>
        <option value="serious">Serious</option>
        <option value="major">Major</option>
        <option value="minor">Minor</option>
</select>
<br><br>
<!-- ======================================================= -->
<!--Functional Area--><?php
        $con = mysqli_connect('localhost', 'root', '');
        $sel = mysqli_select_db($con,"bughound");

        $sql = "SELECT area_name from areas";  
        $result = mysqli_query($con, $sql);

        echo "Functional Area: <select name = 'area_name'>";
        echo "<option value='' disabled" ."'>" . "</option>";
        echo "<option value= 'all'" ."'>" .'ALL'. "</option>";  
        while($row = mysqli_fetch_array($result)){
            echo "<option value='" . $row['area_name'] ."'>" . $row['area_name'] ."</option>";  
        }
        echo "</select>"
     ?>
<br><br>
<!-- ======================================================= -->
<!--Assigned To--><?php
        $con = mysqli_connect('localhost', 'root', '');
        $sel = mysqli_select_db($con,"bughound");

        $sql = "SELECT name from employees";  
        $result = mysqli_query($con, $sql);

        echo "Assigned To: <select name = 'assigned_to'>";
        echo "<option value='' disabled" ."'>" . "</option>";
        echo "<option value= 'all'" ."'>" .'ALL'. "</option>";  
        while($row = mysqli_fetch_array($result)){
            echo "<option value='" . $row['name'] ."'>" . $row['name'] ."</option>";  
        }
        echo "</select>"
     ?>
<br><br>
<!-- ======================================================= -->
<!--Reported by--><?php
        $con = mysqli_connect('localhost', 'root', '');
        $sel = mysqli_select_db($con,"bughound");

        $sql = "SELECT name from employees";  
        $result = mysqli_query($con, $sql);

        echo "Reported By: <select name = 'reported_by' >";
        echo "<option value='' disabled" ."'>" . "</option>";
        echo "<option value= 'all'" ."'>" .'ALL'. "</option>";  
        while($row = mysqli_fetch_array($result)){
            echo "<option value='" . $row['name'] ."'>" . $row['name'] ."</option>";  
        }
        echo "</select>"
     ?>
<br><br>
<!-- ======================================================= -->
<!--Status-->
Status: <select type="text" name="bug_status" size=1 >
            <option value="" disabled=""><option>
            <option value="all">ALL</option>
            <option value="open">Open</option>
            <option value="closed">Closed</option>
</select>
<br><br>
<!-- ======================================================= -->
<!--Priority-->
Priority: <select type="text" name="priority" size=1>
                      <option value="" disabled=""><option>
                      <option value="all">ALL</option>
                      <option value="high">High</option>
                      <option value="medium">Medium</option>
                      <option value="low">Low</option>
</select>
<br><br>
<!-- ======================================================= -->
<!--Resolution-->
Resolution: <select type="text" name="resolution" size=1>
                      <option value="" disabled=""><option>
                      <option value="all">ALL</option>
                      <option value="resolved">Resolved</option>
                      <option value="pending">Pending</option>
</select>
<br><br>

<!-- ======================================================= -->

</div>     
</div>

    <input type="submit" name="Submit" class="btn btn-primary btn-lg" value="Submit">
    <input type="reset" name="Reset" class="btn btn-primary btn-lg" value="Reset">
     <INPUT type="button" value="List All Bugs" id=done class="btn btn-primary btn-lg" onclick="window.location.href = 'listbugs.php'">  
    <INPUT type="button" value="Home" id=done class="btn btn-primary btn-lg" onclick="window.location.href = 'index.php'">  
    </div>  
  </div> <!-- /.form-group -->

</form>
</div>
</div>
</body>
</html>