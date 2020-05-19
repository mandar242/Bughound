<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Add Program</title>
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
<body>
  <?php session_start(); 
  if(isset($_SESSION['last_action']))
        {
          if(time() - $_SESSION['last_action']>1800)
          {
            session_unset();
            session_destroy();  
          }
        }
        $_SESSION['last_action'] = time();
  ?>

    <?php if(isset($_SESSION['username'])): ?>
    <ul class="nav justify-content-end">
      <li class="nav-item">
        <a class="nav-link" href="home.php">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="logout.php">Logout</a>
      </li>
    </ul>
    <?php endif; ?>
  
    <div class="container" style="">
        <h2 class="text-center my-4">Add Program</h2>    
        <form name="form_prog_add" action="program_add.php" method="POST">
        <div id="addempForm">
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                 <label for="name"> Program Name</label>
                 <input type="text" class="form-control" id="problem-summary" name="prog_name" placeholder="" required maxlength="32">
              </div>
            </div>          
          </div>

           <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                 <label for="name">Program Release</label>
                 <input type="text" class="form-control" id="problem-summary" name="prog_release" placeholder="" required maxlength="32">
              </div>
            </div> 
          </div>
           <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                 <label for="name">Program Version</label>
                 <input type="text" class="form-control" id="problem-summary" name="prog_version" placeholder="" required maxlength="32">
              </div>
            </div> 
          </div>

          <div class="row">
            <div class="col-md-3">
              <div class="form-group">
                <button class="btn btn-primary w-100" style="margin-top: 10px" type="submit">Submit</button>
              </div>
            </div> 
             
          </div>
          </div>
        </form>
          
           <div class="col-md-3">
              <div class="form-group">
                <button class="btn btn-primary w-100" style="margin-top: 10px" onclick="go_back()">Back</button>
              </div>
            </div> 
            </div>
        </div>
    </div>
    <script type="text/javascript">
      function go_back(){
        window.location.replace("maintaindb.php");
      }
      function validate(){
        var name=document.forms["form_prog_add"]["prog_name"].value;
        var release=document.forms["form_prog_add"]["prog_release"].value;
        var version=document.forms["form_prog_add"]["prog_version"].value;
      }      

    </script>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

</body>
</html>