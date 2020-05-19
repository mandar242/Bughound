 <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DB maintenance</title>
    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

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
    ?>
<body>   
    <?php if($_SESSION['userlevel']!=3){
        header("Location: home.php");
    }?>

    <div class="jumbotron">
    <div class="container">
    
              <h2>Employee List</h2>
       <table border ="3">
            <tr>
              <th>Employee ID</th>
              <th>Employee Name</th>
              <th>User Name</th>
              <th>Click To Update</th>
              <th>Click To Delete</th>
            </tr>

          <?php
                 
              $con = mysqli_connect("localhost","root");
              if(! $con ) {
                die('Could not connect: ' . mysqli_error());
              }
              mysqli_select_db($con, "bughound_test1");              
              $query = "SELECT * FROM employees";    
              mysqli_query($con, $query);
              $result = mysqli_query($con, $query);
            ?>
          
            <?php            
              if(mysqli_num_rows($result) > 0) {
              while($row = mysqli_fetch_assoc($result)) {            
               ?>
               <tr>
                <td><?php echo $row["emp_id"] ?> </td>
                   <td><?php echo $row["name"] ?> </td>
                   <td><?php echo $row["username"] ?> </td>
                  <td> 
                  <button type="submit" name="update" class="btn btn-primary btn-lg" onclick="dance('<?php echo $row["emp_id"]?>');">Update</button></td>
                  <td> 
                    <button type="submit" name="delete_emp" onclick="dance2('<?php echo $row["emp_id"]?>');" class="btn btn-primary btn-lg">Delete</button></td>
               </tr>
               <?php
            }
?>


        <?php } else {
            echo "0 results";
         }
            ?>
            
    
        </table>
        <br><hr>
        <div id="addempForm">
                <label for="name" style="font-size: 35px;margin-right: 5px;"></label>
                 <button class="btn btn-primary btn-lg" style="margin-left: 20px;" type="button" onclick="go_addemp()"> Add New Employee
                <button class="btn btn-primary btn-lg" style="margin-left: 20px" type="button" onclick="go_back()">Home</button>
                <button class="btn btn-primary btn-lg" style="margin-left: 20px" type="button" onclick="go_back_dbhome()">DB Home</button>

                <div class="jumbotron">
    <div class="container">
              
          </div>
      </div>
      
      <script type="text/javascript">
        function go_addemp(){
          window.location.assign("addemp.php");
        }       
        function go_editemp(){
         window.location.assign("go_editemp.php"); 
        }

      function go_backdbhome(){
        window.location.assign("dbMain.php");
      }
       function go_backhome(){
        window.location.assign("home.php");
      }
      function dance(emp_id) {
        window.open("editemp.php/?emp_id="+emp_id,"_self");
        // body...
      }
      function dance2(emp_id) {
        window.open("deleteemphidden.php/?emp_id="+emp_id,"_self");
        // body...
      }
      </script>
          
    
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
     <script type="text/javascript">
     function go_back(){
        window.location.replace("home.php");
      }
      function go_back_dbhome(){
        window.location.replace("dbMain.php");
      }
    </script>
</body>
</html>