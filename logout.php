<!DOCTYPE html>
<html>
<head>
	<title>Logout</title>
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
			unset($_SESSION['username']);
			unset($_SESSION['userlevel']);
			header("Location: home.php");
		}
		else{
			header("Location: home.php");
		}
	 ?>
</body>
</html>