<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Area Page</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    </head>
    <body>
    <div class="jumbotron">
    <div class = "container">
        <h1> Bugs Information</h1>
        <?php
            include 'validateUser.php';     
            checkLogin();
            
            $con = mysqli_connect("localhost","root");
            mysqli_select_db($con, "Bughound");
                $query = $_POST['query'];
                $bug_id = $_POST['bug_id'];
                $program_name = $_POST['program_name']; 
                $reported_by = $_POST['reported_by'];
                $report_type = $_POST['report_type'];
                $area_name = $_POST['area_name'];
                $assigned_to = $_POST['assigned_to'];
                $severity = $_POST['severity'];
                $resolution = $_POST['resolution'];
                if(isset($_POST['bug_status'])) {
                $bug_status = $_POST['bug_status'];
                }
                else{
                    echo "no status selected";
                }
                
                if(isset($_POST['priority'])) {
                $priority = $_POST['priority'];
                }
                else{
                    echo "no priority selected";
                } 
    
            $result = mysqli_query($con, $query);
             
            if (mysqli_num_rows($result) == 0){
                echo "<h1> No Bugs found with program</h1>";
            }
            
            else 
            {
                echo "<table border=3 id = 'table'><th>Bug ID</th><th>Program</th><th>Report Type</th><th>Severity</th><th>Problem Summary</th><th>Reproducible</th><th>Problem</th><th>Reported By</th><th>Reported Date</th><th>Functional Area</th><th>Assigned To</th><th>Comments</th><th>Bug Status</th><th>Priority</th><th>Resolution</th><th>Resolved By</th><th>Resolved Date</th><th>Tested By</th><th>Tested Date</th><th>Click to Update</th>\n";
                while($row=mysqli_fetch_array($result)) {
                    printf("<tr>
                            <td>%d</td>
                            <td>%s</td>
                            <td>%s</td>
                            <td>%s</td>
                            <td>%s</td>
                            <td>%s</td>
                            <td>%s</td>
                            <td>%s</td>
                            <td>%s</td>
                            <td>%s</td>
                            <td>%s</td>
                            <td>%s</td>
                            <td>%s</td>
                            <td>%s</td>
                            <td>%s</td>
                            <td>%s</td>
                            <td>%s</td>
                            <td>%s</td>
                            <td>%s</td>
                            <td>
                                    <form method=\"post\" action=\"addbug.php\">
                                    <input name = \"bug_id\" type=\"hidden\" value=\"{$row[0]}\"/>
                                    <button type = \"submit\" class=\"linkline\"> Update </button>
                                    </form>
                                </td>
                            </tr>\n",
                            $row['bug_id'],
                            $row['program_name'],
                            $row['report_type'],
                            $row['severity'],
                            $row['problem_summary'],
                            $row['reproducible'],
                            $row['problem'],
                            $row['reported_by'],
                            $row['report_date'],
                            $row['area_name'],
                            $row['assigned_to'],
                            $row['comments'],
                            $row['bug_status'],
                            $row['priority'],
                            $row['resolution'],
                            $row['resolved_by'],
                            $row['resolved_date'],
                            $row['tested_by'],
                            $row['tested_date']
                    );
                }
            }
        
        ?>
        </table>
        <br>
        
        <INPUT type="button" value="Search Another Bug" id=done class="btn btn-primary btn-lg" onclick="window.location.href = 'searchbugs2.php'">

        <INPUT type="button" value="Home" id=done class="btn btn-primary btn-lg" onclick="window.location.href = 'index.php'">
        
    </div>
    </div>

    </body>
</html>