<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Add new Area</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    </head>
    <body>
    <div class= "jumbotron">
    <div class= "container">
		<?php
			include 'validateUser.php';
			checkLogin();
		?>
		
        <h1>Add New Area</h1>
        <form action="addUtil.php" method="post" onsubmit="return validate(this)">
            <table>
                <tr><td><input type="Text" name="area_name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Area Name"</td></tr>
            </table>
            <br>
            <input type="submit" name="submit"class="btn btn-primary btn-lg" value="Submit">
			<input type="button" value="Cancel" class="btn btn-primary btn-lg" onclick="window.location.href = 'areaMain.php'">

        </form>

        <script language=Javascript>

            function validate(theform) {
                if(theform.area_name.value === ""){
                    alert ("Name field cannot be empty");
                    return false;

        </script>
        </div>
        </div>
    </body>

</html>