<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Update Bug</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    </head>
    <body>
    <div class= "jumbotron">
    <div class= "container">
    <h1>Update Program Information</h1>
        <?php
            include 'validateUser.php'; 
            checkLogin();
            $bug_id = $_POST['bug_id'];

            $program_name;
            $report_type;
            $severity;
                $problem_summary;
                $reproducible;
                $problem;
                $reported_by;
                $report_date;
                $area_name;
                $assigned_to;
                $comments;
                $bug_status;
                $priority;
                $resolution;
                $resolved_by;
                $resolved_date;
                $tested_by;
                $tested_date;

            $con = mysqli_connect("localhost","root");
            mysqli_select_db($con, "Bughound");
            $query = "SELECT * FROM bug_entry WHERE bug_id = '$bug_id' ";
            $none = 0;
            $result = mysqli_query($con, $query);
            while($row=mysqli_fetch_row($result)) {
                $none=1;

                $bug_id = $row[0];
                $program_name = $row[1];
                $report_type = $row[2];
                $severity = $row[3];
                $problem_summary = $row[4];
                $reproducible = $row[5];
                $problem = $row[6];
                $reported_by = $row[7];
                $report_date = $row[8];
                $area_name = $row[9];
                $assigned_to = $row[10];
                $comments = $row[11];
                $bug_status = $row[12];
                $priority = $row[13];
                $resolution = $row[14];
                $resolved_by = $row[15];
                $resolved_date = $row[16];
                $tested_by = $row[17];
                $tested_date = $row[18];
            }
        ?>
        <form action="updateUtil.php" method="post" onsubmit="return validate(this)">
            <!--Select Program-->
    <?php
        $con = mysqli_connect('localhost', 'root', '');
        $sel = mysqli_select_db($con,"bughound");

        $sql = "SELECT program_name from programs";  
        $result = mysqli_query($con, $sql);

        echo  "Program: <select name='program_name' required>";
        echo "<option value=''" ."'>".'<?php echo $program_name; ?>'. "</option>";  

        while($row = mysqli_fetch_array($result)){
            echo "<option value='" . $row['program_name'] ."'>" . $row['program_name'] ."</option>";  
        }
        echo "</select>";
     ?>

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

        <p><br>     <INPUT type="button" value="Home" id=done class="btn btn-primary btn-lg" onclick="window.location.href = 'index.php'">
            </div>
            </div>

</script>    
    </body>
</html>