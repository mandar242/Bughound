<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Program page</title>
	</head>
	<body>
		<h1> Program Page </h1>
		<?php
			include 'validateUser.php';		
			checkLogin();
			
			$con = mysqli_connect("localhost","root");
			mysqli_select_db($con, "Bughound");
			$query = "SELECT * FROM programs";
			$result = mysqli_query($con, $query);
			 
			if (mysqli_num_rows($result) == 0){
				echo "<h1> No Programs found!</h1>";
			}
			
			else 
			{
				echo "<table border=1 id = 'table'><th>Program ID</th><th>Name</th><th>Release</th>\n";
				while($row=mysqli_fetch_array($result)) {
					printf("<tr>
								<td>
									<A href='updateProgram.php?program_id={$row[0]}'>
									<span class=\"linkline\">%d</span></a>
								</td>
								<td>%s</td>
								<td>%s</td>
							</tr>\n",
							$row['program_id'],
							$row['program_name'],
							$row['release_build']
					);
				}
			}
		?>
		</table>
			
		<INPUT type="button" value="Add program" id=create onclick="window.location.href = 'addProgram.php'" >
		<INPUT type="button" value="Home" id=done onclick="window.location.href = 'index.php'">
		
	</body>
</html>