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
        <h1>Add Bug Details Below</h1>

      <?php
			include 'validateUser.php';		
      checkLogin();
		?>
        
<form action="">

  <!--  General -->
  <div class="form-group">

    <div class="controls">
      <input type="text" id="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Bug Name">

    </div>
<br>
        <?php
        $con = mysqli_connect('localhost', 'root', '');
        $sel = mysqli_select_db($con,"bughound");

        $sql = "SELECT area_name from areas";  
        $result = mysqli_query($con, $sql);

        echo "<select name = 'sub1'>";
        echo "<option value= 'Select Area'" ."'>Select Area" . "</option>";  
        while($row = mysqli_fetch_array($result)){
            echo "<option value='" . $row['area_name'] ."'>" . $row['area_name'] ."</option>";  
        }
        echo "</select>"
     ?>
     </div>     
    </div>
<br>

<?php
        $con = mysqli_connect('localhost', 'root', '');
        $sel = mysqli_select_db($con,"bughound");

        $sql = "SELECT program_name from programs";  
        $result = mysqli_query($con, $sql);

        echo "<select name = 'sub1'>";
        echo "<option value= 'Select Program'" ."'>Select Program" . "</option>";  
        while($row = mysqli_fetch_array($result)){
            echo "<option value='" . $row['program_name'] ."'>" . $row['program_name'] ."</option>";  
        }
        echo "</select>"
     ?>
     </div>     
    </div>
<br>

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