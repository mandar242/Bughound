<html>
	<head>
		<meta charset = "UTF-8">
		<title>Bughound main</title>
	</head>

	<body>
		<h1>Bughound</h1>
		<?php
			include 'validateUser.php';
			checkLogin();
		?>

		<script language=Javascript>
			//if logged in user not same as new user =>
			function UserLogOut()
			{
				//delete all cookies
				document.cookie.split(";").forEach(function(c) { 
					document.cookie = c.replace(/^ +/, "").replace(/=.*/, 
						"=;expires=" + new Date().toUTCString() + ";path=/"); 
				});
				window.location.replace("login.php")
				//display login window after successful logout
			}
		</script>
	
		<table>
			<tr><td>
				<input type="button" onclick="window.location.href = 'dispEmployee.php';" value="Edit Employees", id="bug"/>		
			</td></tr>
			
			<tr><td>
				<input type="button" onclick="window.location.href = 'programMain.php';" value="Edit Programs", id="bug"/>		
			</td></tr>
			
			<tr><td>
				<input type="button" onclick="window.location.href = './area/area.php';" value="Edit Areas", id="bug"/>		
			</td></tr>

			<tr><td>
				<input type="button" onclick="UserLogOut()" value="Logout" id=logout/>
			</td></tr>

		</table>
	</body>
