<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Add new Area</title>
    </head>
    <body bgcolor = "gray">
		<?php
			include 'validateUser.php';
			checkLogin();
		?>
		
        <h1>Add an Area</h1>
        <form action="addUtil.php" method="post" onsubmit="return validate(this)">
            <table>
                <tr><td>Name:</td><td><input type="Text" name="area_name"</td></tr>
            </table>

            <input type="submit" name="submit" value="Submit">
			<input type="button" value="Cancel" onclick="window.location.href = 'areaMain.php'">

        </form>

        <script language=Javascript>

            function validate(theform) {
                if(theform.area_name.value === ""){
                    alert ("Name field cannot be empty");
                    return false;

        </script>

    </body>

</html>