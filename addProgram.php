<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Add New Program information</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    </head>
    <body>
    <div class= "jumbotron">
		<div class= "container">
		<?php
			include 'validateUser.php';		
			checkLogin();
		?>
		
        <h1>Add New Program Information</h1>
        <form action="addUtil.php" method="post" onsubmit="return validate(this)">

            <table>
                <tr><td><input type="Text" name="program_name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Program Name"</td></tr>
            </table>
            <table>
                <tr><td><input type="Number" name="release" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Release Number"</td></tr>
            </table>
            <br>
            <input type="submit" name="submit" class="btn btn-primary btn-lg" value="Submit">
			<input type="button" value="Cancel" class="btn btn-primary btn-lg" onclick="window.location.href = 'programMain.php'">

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
    </div>
    <div>
    </body>

</html>