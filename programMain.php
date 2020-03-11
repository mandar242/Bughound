<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Program page</title>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	</head>
	<body>
	<div class= "jumbotron">
		<div class= "container">
		<h1> Programs </h1>
		<?php
			include 'validateUser.php';		
			checkLogin();
			
			$con = mysqli_connect("localhost","root");
			mysqli_select_db($con, "Bughound");
			$query = "select * from programs";
			
			$result = mysqli_query($con, $query);
			 
			if (mysqli_num_rows($result) == 0){
				echo "<h1> No Programs found!</h1>";
			}
			
			else 
			{
				echo "<table border=1 id = 'table'><th>Program ID</th><th>Program Name</th><th>Release</th><th>Click to Update</th>\n";
				while($row=mysqli_fetch_array($result)) {
					printf("<tr>
								<td>%d</td>
								<td>%s</td>
								<td>%s</td>
								<td>
									<A href='updateProgram.php?program_id={$row[0]}'>
									<span class=\"linkline\">Update</span></a>
								</td>
							</tr>\n",
							$row['program_id'],
							$row['program_name'],
							$row['release_build']
					);
				}
			}
		?>
		</table>
		<br>	
		<INPUT type="button" value="Add program" id=create class="btn btn-primary btn-lg" onclick="window.location.href = 'addProgram.php'" >
		<INPUT type="button" value="DB Home" id=done class="btn btn-primary btn-lg" onclick="window.location.href = 'dbMain.php'">
		<INPUT type="button" value="Home" id=done class="btn btn-primary btn-lg" onclick="window.location.href = 'index.php'">
		</div>
		</div>
	</body>
</html>