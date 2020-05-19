<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Add Employee</title>
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
        <a class="nav-link" href="../home.php">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="../logout.php">Logout</a>
      </li>
    </ul>
    <?php endif; ?>
 <h2 class="text-center my-4">Editable Area</h2>

         <?php
            $area_id = $_GET['area_id'];
            $con = mysqli_connect("localhost","root");
            if(! $con ) {
              die('Could not connect: ' . mysqli_error());
            }
            mysqli_select_db($con, "bughound_test1");
            $query1 = "SELECT * FROM areas where area_id ='".$area_id."';";          
            
            $result = mysqli_query($con, $query1);
          ?>
          
       <table>
          <tbody>
            <?php
              if (mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_assoc($result)) {
               ?>
               <tr>
                
                <div id="addempForm" class="container">
                  <div class="row ">
                        <div class="col-md-6">
                          <div class="form-group">
                             <label for="name">Area #</label>
                             <input type="text" class="form-control" name="area_id" value="<?php echo $row["area_id"]; ?>" disabled>
                          </div>
                        </div> 
                      </div>
                  <div class="row ">
                        <div class="col-md-6">
                          <div class="form-group">
                             <label for="name">Program #</label>
                             <input type="text" class="form-control" name="prog_id" value="<?php echo $row["prog_id"]; ?>" disabled>
                          </div>
                        </div> 
                      </div>
                
                  <div class="row ">
                        <div class="col-md-6">
                          <div class="form-group">
                             <label for="name">Area Name</label>
                             <input id= "update" type="text" class="form-control update" name="area" value="<?php echo $row["area"]; ?>" required maxlength="32"/>
                          </div>
                        </div> 
                      </div>
                  <div class="row ">
                        <div class="col-md-6">
                          <div class="form-group">
                             <label for="name"></label>
                             <button  type="submit" class="btn  btn-primary" style="float:" 
                             onclick="dance(<?php echo $row['prog_id']; ?>,<?php echo $row['area_id']; ?>);">Save</button>
                          </div>
                        </div> 
                      </div>

                </div>
                
              </tr>            
               <?php
                  }
                }else {
                  echo "0 results";
                }
               ?>
       
        </tbody>
      </table>
   
    

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    
    <script type="text/javascript">
      
      function dance(pid,aid)
      {
        // document.getElementById("update").required;
        var area = document.getElementById("update").value;
        if(area===""){
          alert("Field is required");
        }
        else{
          window.open("../editarea.php/?prog_id="+pid+"&area_id="+aid+"&area="+area,"_self");  
        }        
      }
    </script>
</body>
</html>