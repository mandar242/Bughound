<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Update Program</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    </head>
    <body>
    <div class= "jumbotron">
    <div class= "container">
    <h1>Update Program Information</h1>
        <?php
            include 'validateUser.php';	
            checkLogin();
			$id = $_GET['program_id'];
			$program_name;
			$release;
			$con = mysqli_connect("localhost","root");
            mysqli_select_db($con, "Bughound");
			$query = "SELECT program_name,
                release_build
                FROM programs WHERE program_id = '$id' ";
            $none = 0;
			$result = mysqli_query($con, $query);
            while($row=mysqli_fetch_row($result)) {
                $none=1;
				$program_name = $row[0];
				$release = $row[1];
            }
		?>
        <form action="updateUtil.php" method="post" onsubmit="return validate(this)">
            <input type="hidden" name="id" value="<?php echo htmlspecialchars($id); ?>">
            <table>
                <tr><td>Name:  &nbsp&nbsp&nbsp&nbsp</td><td><input type="Text" name="program_name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Name" value="<?php echo htmlspecialchars($program_name); ?>"</td></tr>
            </table>
            <table>
                <tr><td>Release: &nbsp&nbsp</td><td><input type="Number" name="release" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Name" value="<?php echo htmlspecialchars($release); ?>"</td></tr>
            </table>
            <br>
            <input type="submit" name="submit" class="btn btn-primary btn-lg" value="Submit">
        </form>
        <form action="deleteUtil.php" method="post">
            <input type="hidden" name="program_id" class="btn btn-primary btn-lg" value="<?php echo htmlspecialchars($id); ?>">
            <br><input type="submit" name="delete" class="btn btn-primary btn-lg" value="Delete">
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

        <p><br>		<INPUT type="button" value="Home" id=done class="btn btn-primary btn-lg" onclick="window.location.href = 'index.php'">
            </div>
            </div>

</script>    
    </body>
</html>

