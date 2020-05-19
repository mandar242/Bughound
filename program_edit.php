<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Add Program</title>
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
  	<?php
      $con = mysqli_connect("localhost","root");
      mysqli_select_db($con, "bughound_test1");
      
      
      if(isset($_GET['prog_id'])){
        $p_id=mysqli_real_escape_string($con,$_GET['prog_id']);      
        $query="SELECT * FROM programs WHERE prog_id='".$p_id."';";       
        $result=mysqli_query($con,$query);
        $row=mysqli_fetch_row($result);
      }
  		?>
  	<div class="jumbotron">
    <div class="container" style="">
        <h2>Update Program Information</h2>    
        <form name="form_prog_add" action="../editprogram.php" method="GET">
        <div id="addempForm">
        <table>
                 <tr>
                 <td> Program Name:</td>
                 <td> <input type="text" class="form-control" id="problem-summary" name="prog_name" placeholder="" value="<?php echo $row[1] ?>" required></td>
                  </tr>
      


                 <tr>
                 <td>Program Release:</td><td> <input type="text" class="form-control" id="problem-summary" name="prog_release" placeholder="" value="<?php echo $row[2] ?>" required></td></tr>


                 <tr>
                 <td>Program Version:</td><td><input type="text" class="form-control" id="problem-summary" name="prog_version" placeholder="" value="<?php echo $row[3] ?>" required></td></tr>

          </table>

                <br>
            <button class="btn btn-primary btn-lg" type="submit">Submit</button>
            <button class="btn btn-primary btn-lg" onclick="go_back()">Cancel</button>

          </div>
          <input type="hidden" value="<?php echo "$p_id" ?>" name="p_id"/>

            </form>


        </div>
    </div>
    <script type="text/javascript">
      function go_back(){
        window.location.assign("../dbMain.php");
      }
    </script>  

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

</body>
</html>