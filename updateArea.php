<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Update Area</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    </head>
    <body>
    <div class= "jumbotron">
    <div class= "container">
    <h1>Update Area Name</h1>
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
                <tr><td>Name: &nbsp</td><td><input type="Text" name="area_name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Name" value="<?php echo htmlspecialchars($area_name); ?>"</td></tr>
            </table>
            <br><input type="submit" name="submit" class="btn btn-primary btn-lg" value="Submit">
        </form>
        <p><form action="deleteUtil.php" method="post">
            <input type="hidden" name="area_id" class="btn btn-primary btn-lg" value="<?php echo htmlspecialchars($id); ?>">
            <input type="submit" name="delete"class="btn btn-primary btn-lg"  value="Delete">
        </form>
        <script language=Javascript>

            function validate(theform) {
                if(theform.name.value === ""){
                    alert ("Name field must not be empty");
                    return false;
                }
            }
        </script>

        <br><INPUT type="button" value="Cancel" id=button1 name=button1 class="btn btn-primary btn-lg" onclick="go_home()">
        <script language=Javascript>
            function go_home() {
                window.location.replace("areaMain.php");
            }
        </script>
        </div>
        </div>    
    </body>
</html>