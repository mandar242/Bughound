<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Update Program</title>
    </head>
    <body>
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
                <tr><td>Name:</td><td><input type="Text" name="program_name" value="<?php echo htmlspecialchars($program_name); ?>"</td></tr>
            </table>
            <table>
                <tr><td>Release:</td><td><input type="Number" name="release" value="<?php echo htmlspecialchars($release); ?>"</td></tr>
            </table>
            <input type="submit" name="submit" value="Submit">
        </form>
        <p><form action="deleteUtil.php" method="post">
            <input type="hidden" name="program_id" value="<?php echo htmlspecialchars($id); ?>">
            <input type="submit" name="delete" value="Delete">
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

        <p><INPUT type="button" value="Home" id=button1 name=button1 onclick="go_home()">
        <script language=Javascript>
            function go_home() {
                document.location.href='programMain.php';
            }

</script>    
    </body>
</html>

