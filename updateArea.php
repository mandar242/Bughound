<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Update Area</title>
    </head>
    <body bgcolor = "gray">
        <?php
            include 'validateUser.php';	
            checkLogin();
			$id = $_GET['area_id'];
			$area_name;
			$con = mysqli_connect("localhost","root");
            mysqli_select_db($con, "Bughound");
			$query = "SELECT area_name
                FROM areas WHERE area_id = '$id' ";
            $none = 0;
			$result = mysqli_query($con, $query);
            while($row=mysqli_fetch_row($result)) {
                $none=1;
				$area_name = $row[0];
            }
		?>
        <p><form action="updateUtil.php" method="post" onsubmit="return validate(this)">
            <input type="hidden" name="id" value="<?php echo htmlspecialchars($id); ?>">
            <table>
                <tr><td>Name:</td><td><input type="Text" name="area_name" value="<?php echo htmlspecialchars($area_name); ?>"</td></tr>
            </table>
            <input type="submit" name="submit" value="Submit">
        </form>
        <p><form action="deleteUtil.php" method="post">
            <input type="hidden" name="area_id" value="<?php echo htmlspecialchars($id); ?>">
            <input type="submit" name="delete" value="Delete">
        </form>
        <script language=Javascript>

            function validate(theform) {
                if(theform.name.value === ""){
                    alert ("Name field must not be empty");
                    return false;
                }
            }
        </script>

        <p><INPUT type="button" value="Cancel" id=button1 name=button1 onclick="go_home()">
        <script language=Javascript>
            function go_home() {
                window.location.replace("areaMain.php");
            }
        </script>    
    </body>
</html>