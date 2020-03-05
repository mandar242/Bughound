<!DOCTYPE html>

<html>
	<head>
		<meta charset="UTF-8">
		<title>Area Page</title>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	</head>
	<body>
	<div class="jumbotron">
	<div class = "container">
		<h1> Area Information </h1>
		<?php
			include 'validateUser.php';		
			checkLogin();
			
			$con = mysqli_connect("localhost","root");
			mysqli_select_db($con, "Bughound");
			$query = "SELECT * FROM areas";
			$result = mysqli_query($con, $query);
			 
			if (mysqli_num_rows($result) == 0){
				echo "<h1> No Areas found</h1>";
			}
			
			else 
			{
				echo "<table border=3 id = 'table'><th>Area ID</th><th>Area Name</th><th>Click to Update</th>\n";
				while($row=mysqli_fetch_array($result)) {
					printf("<tr>
							<td>%d</td>
							<td>%s</td>
							<td>
							<A href='updateArea.php?area_id={$row[0]}'>
							<span class=\"linkline\">Update</span></a>
							</td>
							</tr>\n",
							$row['area_id'],
							$row['area_name']
					);
				}
			}
		?>
		</table>
		<br>
		<INPUT type="button" value="Add new area" id=create class="btn btn-primary btn-lg" onclick="window.location.href = 'addArea.php'">
		<INPUT type="button" value="Return Home" id=done class="btn btn-primary btn-lg" onclick="window.location.href = 'index.php'">
		
	</div>
	</div>

	</body>
</html>