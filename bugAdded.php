<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Adding Bug</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    </head>
    <body>
    <div class= "jumbotron">
		<div class= "container">
        <h2>
            <?php
                $program_name = $_POST['program_name'];
                $report_type = $_POST['report_type'];
                if(isset($_POST['severity'])) {
                
                $severity = $_POST['severity'];
                }
                else{
                    echo "no severity selected";
                }
				
                $problem_summary = $_POST['problem_summary'];
                $reproducible = $_POST['reproducible'];
                $problem = $_POST['problem'];
                $reported_by = $_POST['reported_by'];
                $report_date = $_POST['report_date'];
                $area_name = $_POST['area_name'];
                $assigned_to = $_POST['assigned_to'];
                $comments = $_POST['comments'];
                
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
                $resolution = $_POST['resolution'];
                $resolved_by = $_POST['resolved_by'];
                $resolved_date = $_POST['resolved_date'];
                $tested_by = $_POST['tested_by'];
                $tested_date = $_POST['tested_date'];
                
				$con = mysqli_connect("localhost","root");
                mysqli_select_db($con, "Bughound");
                
                $query2 = "INSERT INTO `bug_entry` (`program_name`, `report_type`, `severity`,`problem_summary`, `reproducible`, `problem`, `reported_by`, `report_date`, `area_name`, `assigned_to`, `comments`, `bug_status`, `priority`, `resolution`,`resolved_by`, `resolved_date`, `tested_by`, `tested_date`) VALUES ('".$program_name."' ,'".$report_type."','".$severity."','".$problem_summary."','".$reproducible."','".$problem."','".$reported_by."','".$report_date."','".$area_name."','".$assigned_to."','".$comments."','".$bug_status."','".$priority."','".$resolution."','".$resolved_by."','".$resolved_date."','".$tested_by."','".$tested_date."')";



				mysqli_query($con, $query2);
                printf("<p>Bug Entry Added Successfully<p>");
            ?>
            <input type="button" value="Return Home" id=button1 name=button1 class="btn btn-primary btn-lg" onclick="go_home()">    
        </h2>
        <script language=Javascript>
            function go_home(){
                window.location.replace("index.php");
            }
        </script>
           </div>
           </div> 
    </body>
</html>
