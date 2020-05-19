 <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DB maintenance</title>
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
        <h2 class="text-center my-4">Database Maintenance</h2>
        <div id="addempForm">
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                 <label for="name" style="font-size: 35px;">Add Areas</label>
                 <button class="btn btn-info w-60" style="margin-left: 20px" type="button" onclick="go_addarea()">Click me!</button>
              </div>
            </div> 
          </div>

          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                 <label for="name" style="font-size: 35px;">Manage Areas</label>
                 <button class="btn btn-info w-60" style="margin-left: 20px" type="button" onclick="go_editarea()">Click me!</button>
              </div>
            </div> 
          </div>

           

           <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                 <label for="name" style="font-size: 35px; margin-right: 27px;">Add Programs</label>
                 <button class="btn btn-info w-60" style="margin-left: 20px" type="button" onclick="go_addprogram()">Click me!</button>
              </div>
            </div> 
          </div>

           <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                 <label for="name" style="font-size: 35px; margin-right: 28px;">Manage Programs</label>
                 <button class="btn btn-info w-60" style="margin-left: 20px" type="button" onclick="go_editprogram()">Click me!</button>
              </div>
            </div> 
          </div>

           <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                 <label for="name" style="font-size: 35px;margin-right: 5px;">Add Employees</label>
                 <button class="btn btn-info w-60" style="margin-left: 20px;" type="button" onclick="go_addemp()">Click me!</button>
              </div>
            </div> 
          </div>

          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                 <label for="name" style="font-size: 35px;">Manage Employees</label>
                 <button class="btn btn-info w-60" style="margin-left: 20px" type="button" onclick="go_editemp()">Click me!</button>
              </div>
            </div> 
          </div>

           <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                 <label for="name" style="font-size: 35px;margin-right: 28px;">Export Areas</label>
                 <button class="btn btn-info w-80" style="margin-left: 20px" type="button" onclick="go_exportarea()" >Click me!</button>
              </div>
            </div> 
          </div>

          <div class="row">
            <div class="form-group">
                <button class="btn btn-info w-100" style="margin-left: 20px" type="button" onclick="go_back()">Back</button>
            </div>
              
          </div>
      </div>
      
      <script type="text/javascript">
        function go_addprogram(){
          window.location.assign("addprogram.php");
        }
        function go_editprogram(){
          window.location.assign("editprogram.php");
        }   
        function go_addarea(){
          window.location.assign("addarea.php");
        }
        function go_editarea(){
          window.location.assign("programtable.php");
        }
        function go_addemp(){
          window.location.assign("addemp.php");
        }       
        function go_editemp(){
         window.location.assign("go_editemp.php"); 
        }
        function go_editemp(){
         window.location.assign("showemp.php"); 
        }
        function go_exportarea(){
         window.location.assign("exportarea.php"); 
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
    </script>
</body>
</html>