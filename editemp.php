<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Add Employee</title>
    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<?php   

        session_start();

    ?>
<body>
  <?php if($_SESSION['userlevel']!=3){
        header("Location: home.php");
    }?>

      <div class="jumbotron">
      <div class = "container">
          

      <h2>Upate Employee Information</h2>

         <?php
  
                    $emp_id = isset($_GET['emp_id']) ? $_GET['emp_id'] : '0';
                    $con = mysqli_connect("localhost","root");
                    if(! $con ) {
                    die('Could not connect: ' . mysqli_error());
                    }
                    mysqli_select_db($con, "bughound_test1");
                    $query = "SELECT * FROM employees where emp_id = '".$emp_id."';";                                        
                    $result = mysqli_query($con, $query);
                    $row = mysqli_fetch_assoc($result);
            ?>
            <table>
            
                <form name= "edit_form" method="POST" action="../editemp2.php">
                        <tr>
                        <input type="hidden" value="<?php echo $row["emp_id"] ?>" name="e_id"/>
                        </tr>
                        <tr> 
                             <td><label for="name">Name: </label></td>
                             <td><input type="text" id="name" class="form-control" name="name" value="<?php echo $row["name"]; ?>"></td>
                        </tr>
                      
                        <tr>
                            <td> <label for="name">Username: </label></td>
                             <td><input type="text" id="username" class="form-control" name="username" value="<?php echo $row["username"]; ?>"></td>
                        </tr>

                        <tr>
                            <td> <label for="name">Password</label></td>
                             <td><input type="text" id="password" class="form-control" name="password" value="<?php echo $row["password"]; ?>"></td>
                        </tr>
                      
                         <tr>
                            <td> <label for="name">Userlevel</label></td>
                            <td> <input type="text" id="userlevel" class="form-control" name="userlevel" value="<?php echo $row["userlevel"]; ?>"></td>
                         </tr>

                         <tr>
                           <td><button type="submit" name="update" class="btn btn-primary btn-lg">Update</button></td>
                          <td><button class="btn btn-primary btn-lg" onclick="go_back()">Back</button></td>
                         </tr>

                 </form>
                    
              </table>
              </div>
            </div>

       
    </div>
   
    

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script type="text/javascript">
      function go_back(){
        window.location.assign("../showemp.php");
      }
      function dance(emp_id,name) {
        
        var name = document.getElementById("name").value;
        var username = document.getElementById("username").value;
        var password = document.getElementById("password").value;
        var userlevel = document.getElementById("userlevel").value;
        window.open("../showemp.php/?name="+name+"&username="+username+"&password="+password+"&userlevel="+userlevel,"_self");
        alert(name);
        
        // window.open("../showemp.php/?emp_id="+emp_id+"&name='"+name+"'&username='"+username+"'&password=' "+password+"'userlevel='"+userlevel+"';");
        // body...
      }
    </script>

</body>
</html>