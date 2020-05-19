<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
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
          <?php if(isset($_SESSION['username'])): ?>
            <ul class="nav justify-content-end">
            <li class="nav-item">
                <a class="nav-link" href="home.php">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="logout.php">Logout</a>
            </li>
            </ul>
        <?php else: ?>
            <ul class="nav justify-content-end">
                <li class="nav-item">
                    <a class="nav-link" href="index.php">Login</a>
                </li>
            </ul>
      <?php endif; ?>
  		<?php
        $con = mysqli_connect("localhost","root");
		mysqli_select_db($con, "bughound_test1");		
        $file_name=$_GET['filename'];
        $bug_id=$_GET['bug_id'];
        $query="SELECT * FROM attachment WHERE bug='".$bug_id."' AND file_name='".$file_name."';";
        $result = mysqli_query($con, $query);
        if(mysqli_num_rows($result)>0){
            $row=mysqli_fetch_array($result);
            header('Content-Description: File Transfer');
            header("Content-Type: ".mime_content_type("uploads/".$file_name));
            header("Content-Disposition: inline; filename=".$file_name);
            header('Expires: 0');
            header('Content-Transfer-Encoding: binary');
            header('Cache-Control: must-revalidate');
            header('Pragma: public'); 
            ob_clean();
            flush();           
            readfile("uploads/".$file_name);
            exit();                        
        }
        else{
            echo mysqli_error($con);
        }

        // $con = mysqli_connect("localhost","root");
		// mysqli_select_db($con, "bughound_test1");		
        // $file_name=$_GET['filename'];
        // $bug_id=1018;
        // $query="SELECT * FROM attachment WHERE bug='".$bug_id."' AND file_name='".$file_name."';";
        // $result = mysqli_query($con, $query);
        // if($result){
        //     $row=mysqli_fetch_array($result);
        //     header('Content-Description: File Transfer');
        //     header('Content-Type: application/pdf');
        //     header('Content-Disposition: inline; filename="abc.pdf"');
        //     header('Expires: 0');
        //     header('Cache-Control: must-revalidate');
        //     header('Pragma: public');
        //     readfile('uploads/abc.pdf');
        // }
        // else{
        //     echo mysqli_error($con);
        // }
  	?>
    
    

    
</body>
<script>
   
</script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

</html>