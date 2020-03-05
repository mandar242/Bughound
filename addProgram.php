<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Add new Program</title>
    </head>
    <body>
		<?php
			include 'validateUser.php';		
			checkLogin();
		?>
		
        <h1>Add new Program</h1>
        <form action="addUtil.php" method="post" onsubmit="return validate(this)">

            <table>
                <tr><td>Name:</td><td><input type="Text" name="program_name"</td></tr>
            </table>
            <table>
                <tr><td>Release:</td><td><input type="Number" name="release"</td></tr>
            </table>
            <input type="submit" name="submit" value="Submit">
			<input type="button" value="Cancel" onclick="window.location.href = 'programMain.php'">

        </form>

        <script language=Javascript>

            function validate(theform) {
                if(theform.name.value === ""){
                    alert ("Name field cannot be empty");
                    return false;
                }
                if(theform.release.value === ""){
                    alert ("Release field cannot be empty");
                    return false;
                }
            }

        </script>

    </body>

</html>