<!DOCTYPE html>
<html>

    <head>
        <meta charset="UTF-8">
        <title>Login Page</title>
    </head>

    <body>    
        <h1>Login Page</h1>
        <form action="validateLogin.php" method="post" onsubmit="return validate(this)">
            <table>
                <tr><td>Username:</td><td><input type="Text" name="username"</td></tr> 
                <tr><td>Password:</td><td><input type="Text" name="password"</td></tr> 
            </table>

            <input type="submit" name="Submit" value="Submit">

			<input type="reset" name="Reset" value="Reset">

        </form>

        <script language=Javascript>

            function validate(theform) {

                if(theform.username.value === ""){

                    alert ("Empty username field");

                    return false;
                }

				if(theform.password.value === ""){

                    alert ("Empty password field");

                    return false;
                }

                return true;
            }

        </script>

    </body>

</html>