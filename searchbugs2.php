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
        
<form action="searchbugresult2.php" method="post" onsubmit="return validate(this)">
  <!-- <form action="" method="post" onsubmit="buildQuery()"> -->
  <!--  General -->
  <div class="form-group">
    <div class="controls">
<br>

<!-- ======================================================= -->
<!--Program--><?php
        $con = mysqli_connect('localhost', 'root', '');
        $sel = mysqli_select_db($con,"bughound");

        $sql = "SELECT program_name from programs";  
        $result = mysqli_query($con, $sql);
        echo "<input type='checkbox' id='c_0'/>";
        echo  "Program: <select name='program_name' id ='program_name'>";
        echo "<option value='' disabled" ."'>" . "</option>";
        echo "<option value='all'" ."'>" .'ALL'. "</option>";  
        while($row = mysqli_fetch_array($result)){
            echo "<option value='" . $row['program_name'] ."'>" . $row['program_name'] ."</option>";  
        }
        echo "</select>";
     ?>
<br><br>
<!-- ======================================================= -->
<!--Report Type--><input type='checkbox' id='c_1'/> 
Report Type: <select type="text" name="report_type" size=1 id ='report_type'>
        <option value="" disabled=""><option>
        <option value="all">ALL</option>
        <option value="coding">Coding Error</option>
        <option value="suggestion">Suggestion</option>
        <option value="type2">Type 2 Erro</option>
        <option value="type3">Type 3 Error</option>
</select>
<br><br>
<!-- ======================================================= -->
<!-- Severity --><input type='checkbox' id='c_2'/>
Severity: <select type="text" name="severity" size=1 id ='severity'>
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
        echo "<input type='checkbox' id='c_3'/>";
        echo "Functional Area: <select name = 'area_name' id ='area_name'>";
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
        echo "<input type='checkbox' id='c_4'/>";
        echo "Assigned To: <select name = 'assigned_to' id ='assigned_to'>";
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
        echo "<input type='checkbox' id='c_5'/>";
        echo "Reported By: <select name = 'reported_by' id ='reported_by'>";
        echo "<option value='' disabled" ."'>" . "</option>";
        echo "<option value= 'all'" ."'>" .'ALL'. "</option>";  
        while($row = mysqli_fetch_array($result)){
            echo "<option value='" . $row['name'] ."'>" . $row['name'] ."</option>";  
        }
        echo "</select>"
     ?>
<br><br>
<!-- ======================================================= -->
<!--Status--><input type='checkbox' id='c_6'/>
Status: <select type="text" name="bug_status" size=1 id ='bug_status'>
            <option value="" disabled=""><option>
            <option value="all">ALL</option>
            <option value="open">Open</option>
            <option value="closed">Closed</option>
</select>
<br><br>
<!-- ======================================================= -->
<!--Priority--><input type='checkbox' id='c_7'/>
Priority: <select type="text" name="priority" size=1 id ='priority'>
                      <option value="" disabled=""><option>
                      <option value="all">ALL</option>
                      <option value="high">High</option>
                      <option value="medium">Medium</option>
                      <option value="low">Low</option>
</select>
<br><br>
<!-- ======================================================= -->
<!--Resolution--><input type='checkbox' id='c_8'/>
Resolution: <select type="text" name="resolution" size=1 id ='resolution'>
                      <option value="" disabled=""><option>
                      <option value="all">ALL</option>
                      <option value="resolved">Resolved</option>
                      <option value="pending">Pending</option>
</select>
<br><br>

<!-- ======================================================= -->

</div>     
</div>

    <input type="submit" name="Submit" class="btn btn-primary btn-lg" value="Submit" onclick="buildQuery()">
    <input type="reset" name="Reset" class="btn btn-primary btn-lg" value="Reset">
    <INPUT type="button" value="List All Bugs" id=done class="btn btn-primary btn-lg" onclick="window.location.href = 'listbugs.php'">  
    <INPUT type="button" value="Home" id=done class="btn btn-primary btn-lg" onclick="window.location.href = 'index.php'">  
    </div>  
  </div> <!-- /.form-group -->

</form>
</div>
</div>

<!-------------------------------------------- Query builder -->
<script type="text/javascript">
        
            function buildQuery()
            {
                var query = "Select * from bug_entry where ";
                var check ="c_";
                var numberOfSelected = -1;
                /* find out how many check boxes are checked
                 * because we need to know how many 'and' to apppend to query 
                 * note numberOfSelected = -1 becuase if only a single checkbox
                 * is selected, it's incremented to 0 and thats how many 'and's we need*/
                for (var i =0; i<9;i++)
                {
                    if(document.getElementById(check + i).checked)
                    {
                       numberOfSelected++;
                    }
                }
                
                for (var i =0; i<9;i++)
                {
                    if(document.getElementById(check + i).checked)
                    {
                        query += getField(i);
                        if(numberOfSelected)
                        {
                            query += " and ";
                            numberOfSelected--;
                        }
                    }
                }

                if(numberOfSelected == -1){
                  alert("Please Select Atleast one criteria to search bug");
                  window.document.location = './searchbugs2.php';
                }
                else{
                alert(query);
                }
                document.cookie =query;
                return query;
            }
        </script>
        <script type="text/javascript">
            function getField(str)
            {
                var response;
               
                if(str === 0)
                    response = "program_name='" + document.getElementById("program_name").value + "'";
                if(str === 1)
                    response = "report_type='" + document.getElementById("report_type").value + "'";
                else if(str === 2)
                    response = "severity='" + document.getElementById("severity").value + "'";
                else if(str === 3)
                    response = "area_name='" + document.getElementById("area_name").value + "'";
                else if(str === 4)
                    response = "assigned_to='" + document.getElementById("assigned_to").value + "'";
                else if(str === 5)
                    response = "reported_by='" + document.getElementById("reported_by").value + "'";
                else if(str === 6)
                    response = "bug_status='" + document.getElementById("bug_status").value + "'";
                else if(str === 7)
                    response = "priority='" + document.getElementById("priority").value + "'";
                else if(str === 8)
                    response = "resolution='" + document.getElementById("resolution").value + "'";
                
                return response;
            }

        </script>


</body>
</html>