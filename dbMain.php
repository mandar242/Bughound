<html>
	<head>
		<meta charset = "UTF-8">
		<title>Database Maintenance</title>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	</head>

	<body>
	<div class= "jumbotron">
		<div class= "container">

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
				<input type="button" onclick="window.location.href = 'dispEmployee.php';" class="btn btn-primary btn-lg" value="Employees", id="bug"/>		
				&nbsp
				<input type="button" onclick="window.location.href = 'programMain.php';" class="btn btn-primary btn-lg" value="Programs", id="bug"/>		
			</td></tr>
			<br>
			<tr><td>
			<br>
				<input type="button" onclick="window.location.href = 'areaMain.php';" class="btn btn-primary btn-lg" value="Areas", id="bug"/>
				&nbsp
				&nbsp
				&nbsp
				&nbsp
				&nbsp
				&nbsp
			</td></tr>

		</table>
		</div>
		</div>
	</body>
