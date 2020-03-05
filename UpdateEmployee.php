<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Update Employee</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    </head>
    <body>
    <div class= "jumbotron">
		<div class= "container">
        <h1>Update Employee Information</h1>
        <?php
            include 'validateUser.php';	
            checkLogin();
			$id = $_GET['employee_id'];
			$name;
			$username;
			$password;
			$level;
			$con = mysqli_connect("localhost","root");
            mysqli_select_db($con, "Bughound");
			$query = "SELECT user_name, 
                password, 
                user_level, 
                name 
                FROM employees WHERE employee_id = '$id' ";
            $none = 0;
			$result = mysqli_query($con, $query);
            while($row=mysqli_fetch_row($result)) {
                $none=1;
				$username = $row[0];
				$password = $row[1];
				$level = $row[2];
				$name = $row[3];
            }
		?>
		<form action="employeeUpdated.php" method="post" onsubmit="return validate(this)">
            <table>
				<input type="hidden" name="ID" value="<?php echo htmlspecialchars($id); ?>">
				<tr><td>Name:</td><td>
                    <input type="Text" name="name"  class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Name" value="<?php echo htmlspecialchars($name); ?>"</td></tr>
                <tr><td>Username:</td><td>
                    <input type="Text" name="username"  class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter UserName" value="<?php echo htmlspecialchars($username); ?>"</td></tr>
                <tr><td>Password:</td><td>
                    <input type="Password" name="password" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Password"  value="<?php echo htmlspecialchars($password); ?>"</td></tr>
				<tr><td>Userlevel:</td><td>
					<select type="number" name="userlevel" size=1 value="4">
					  <option value="1" <?php if($level == 1) { ?> selected="selected" <?php } ?> >user</option>
					  <option value="2" <?php if($level == 2) { ?> selected="selected" <?php } ?> >admin</option>
					</select></td>
				</tr>
            </table>
            <input type="submit" name="submit" class="btn btn-primary btn-lg" value="Next">
        </form>
        <form action="deleteUtil.php" method="post">
            <input type="hidden" name="employee_id" class="btn btn-primary btn-lg" value="<?php echo htmlspecialchars($id); ?>">
            <br> <input type="submit" name="Delete employee"class="btn btn-primary btn-lg"  value="Delete">
        </form>
        <script language=Javascript>
            function validate(theform) {
                if(theform.name.value === ""){
                    alert ("First name cannot be empty");
                    return false;
                }
                if(theform.username.value === ""){
                    alert ("Last name cannot be empty");
                    return false;
                }
				if(theform.password.value === ""){
                    alert ("Password cannot be empty");
                    return false;
                }
				if(theform.userlevel.value === ""){
                    alert ("Userlevel cannot be empty");
                    return false;
                }
				if(theform.name.value === ""){
                    alert ("Name cannot be empty");
                    return false;
                }
                return true;
            }
		</script>
        <br><INPUT type="button" value="Return Home" id=button1 name=button1 class="btn btn-primary btn-lg" onclick="go_home()">
        <script language=Javascript>
            function go_home() {
                window.location.replace("addEmployee.php");
            }
        </script>    
        </div>
        </div>
    </body>
</html>