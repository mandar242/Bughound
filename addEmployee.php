<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Add Employee</title>
    </head>
    <body>
        <h1>BugHound Add Employee</h1>
        <form action="employeeAdded.php" method="post" onsubmit="return validate(this)">
            <table>
				<tr><td>Name:</td><td>
                    <input type="Text" name="name"</td></tr>
                <tr><td>Username:</td><td>
                    <input type="Text" name="username"</td></tr>
                <tr><td>Password:</td><td>
                    <input type="Password" name="password"</td></tr>
				<tr><td>Userlevel:</td><td>
					<select type="number" name="userlevel" size=1>
					  <option value="1">1</option>
					  <option value="2">2</option>
					  <option value="3">3</option>
					  <option value="4">4</option>
					</select></td>
				</tr>
            </table>
            <input type="submit" name="Submit" value="Next">
            <input type="button" value="Return home" id=button1 name=button1 onclick="go_home()">    
        </form>
		<p>
			<h3>
				<A href="dispEmployee.php"><span class=\"linkline\">View Names</span></a> 
			</h3>
		</p>

        <script language=Javascript>
            function validate(theform) {
                if(theform.name.value === ""){
                    alert ("First name field cannot be empty");
                    return false;
                }
                if(theform.username.value === ""){
                    alert ("Last name field cannot be empty");
                    return false;
                }
				if(theform.password.value === ""){
                    alert ("Password field cannot be empty");
                    return false;
                }
				if(theform.userlevel.value === ""){
                    alert ("Userlevel field cannot be empty");
                    return false;
                }
				if(theform.name.value === ""){
                    alert ("Name field cannot be empty");
                    return false;
                }
                return true;
            }
            function go_home(){
                window.location.replace("dispEmployee.php");
            }
		</script>
    </body>
</html>
