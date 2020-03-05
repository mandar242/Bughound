<html>
	<head>
		<meta charset = "UTF-8">
		<title>Bughound main</title>
	</head>

	<body>
		<h1>Bughound</h1>
		<?php
			include 'auth/validateUser.php';
			checkLogin();
		?>

		<script language=Javascript>
			//if logged in user not same as new user =>
			function UserLogOut()
			{
				//delete all cookies
				document.cookie.split(";").forEach(function(f)
				{
					document.cookie = f.replace(/^ +/, "").replace(/=.*/, "=;expires=" + new Date.toUTCString() + ";path=/");
				});

				window.location.replace("login.php")
				//display login window after successful logout
			}
		</script>
	
		<table>
			<!--buttons to add emp prog and areas-->
		</table>
	</body>
