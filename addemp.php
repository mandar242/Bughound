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
        if(isset($_SESSION['last_action']))
        {
          if(time() - $_SESSION['last_action']>1800)
          {
            session_unset();
            session_destroy();  
          }
        }

    ?>
<body>
  <?php if($_SESSION['userlevel']!=3){
        header("Location: home.php");
    }?>
      <?php if(isset($_SESSION['username'])): ?>

      <?php endif; ?>

    
  <div class="jumbotron">
    <div class="container" style="">
        <h1>BugHound Add Employee</h1>
        <form name="theform"  action="emp_add.php" method= "POST" onsubmit="return validate()" >
        <div id="addempForm">
          <table>
            <tr>
                 <label for="name"></label>
                 <td>Name :</td><td><input type="text" class="form-control" id="problem-summary" name="name" placeholder="Enter Name" required maxlength="32"></td>
            </tr>

              <tr>
                <label for="name"></label>
                 <td>User Name:</td><td> <input type="text" class="form-control" id="problem-summary" name="username" placeholder="Enter UserName" required maxlength="32">
              </tr>


              <tr>
                 <label for="password"></label>
                 <td>Password: </td><td><input type="password" class="form-control" id="problem-summary" placeholder ="Enter Password" name="password">
              </tr>


              <tr>
                 <label for="name"></label>
                <td>User Level: </td><td><input type="number" class="form-control" id="userlevel" name="userlevel" placeholder="Enter UserLevel" required>
              </tr>
              </table>
              <br>
                <button class="btn btn-primary btn-lg" type="submit">Submit</button>
                <button class="btn btn-primary btn-lg" type="button" onclick="go_back()">Home</button>
                <button class="btn btn-primary btn-lg" type="button" onclick="go_backdbhome()">DB Home</button>

          </div>
          </div>
    <p><a href="empMain.php" style="margin-left: 30px"><h3>View Names</h3></a></p>
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
       function validate(){
          var x=document.getElementById("userlevel").value;
          if(x>3 || x<1){
            alert("User Level can be between 1, 2 or 3");
            return false;
          }
          else{
            return true;
          }
       }

       function go_back(){
        window.location.assign("home.php");
      }
      function go_backdbhome(){
        window.location.assign("dbMain.php");
      }

    </script>

</body>
</html>