<html>
	<head>
		<meta charset = "UTF-8">
		<title>Database Maintenance</title>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	</head>

	<body>
	<div class= "jumbotron">
		<div class= "container">

	<h1>Select Option to Proceed</h1><br><br>
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
				&nbsp
				&nbsp

				<input type="button" onclick="window.location.href = 'programMain.php';" class="btn btn-primary btn-lg" value="Programs", id="bug"/>		
				
				&nbsp
				&nbsp
				<input type="button" onclick="window.location.href = 'areaMain.php';" class="btn btn-primary btn-lg" value="Areas", id="bug"/>
				&nbsp
				&nbsp
				&nbsp
				<input type="button" onclick="window.location.href = 'exportMain.php';" class="btn btn-primary btn-lg" value="Export", id="bug"/>
				&nbsp
				&nbsp
				&nbsp
				&nbsp
				&nbsp
				&nbsp
				
			</td></tr>

		</table>
		<br>

	<input type="button" value="Home" id=button1 name=button1 class="btn btn-primary btn-lg" onclick="go_dbhome()">    
        </h2>
        <script language=Javascript>
            function go_dbhome(){
                window.location.replace("index.php");
            }
        </script>


		</div>
		</div>
	</body>
