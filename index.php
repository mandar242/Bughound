<html>
	<head>
		<meta charset = "UTF-8">
		<title>Bughound</title>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	</head>

	<body>
	<div class= "jumbotron">
		<div class= "container">
		<h1>Welcome to Bughound</h1>
		<?php
			include 'validateUser.php';
			checkLogin();
			$isadmin= isAdmin();
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

			function dbMainAccess(element)
			{	
				isadmin = element.getAttribute("data-isadmin");
				if(isadmin==true)
				{
						window.location.href = 'dbMain.php';
				}
				else
				{
					alert('Sorry, only admin can access database maintenance!!!!');
					window.location.replace('index.php');
				}
				
			}

			function addBug()
			{	
				window.location.href = 'addbug.php';

				//window.location.href = 'index.php';
			}

			
			function searchbugs()
			{	
				window.location.href = 'searchbugs.php';

			}

		</script>
		<table>
			<tr><td>
				<input type="button" onclick="addBug()" class="btn btn-primary btn-lg" value="Add a new Bug Entry", id="bug"/>		
			</td></tr>
			<br>
			<br>
			<tr><td><br>
				<input type="button" onclick="searchbugs()" class="btn btn-primary btn-lg" value="Search Bugs", id="searchbugs"/>		
			</td></tr>
			<tr><td>
			<br>
				<input type="button" onclick="dbMainAccess(this)" data-isadmin = "<?php echo $isadmin?>" class="btn btn-primary btn-lg" value="Database Maintenance", id="dbMain"/>		
				&nbsp
				&nbsp
				&nbsp
				&nbsp
				&nbsp
				&nbsp
				<br>
				<tr><td>
					<?php
						dispCurrentUser();
						?><tr><td>
				<input type="button" onclick="UserLogOut()" class="btn btn-primary btn-lg" value="Logout"  id=logout/>
			</td></tr>

		</table>
		</div>
		</div>
	</body>
