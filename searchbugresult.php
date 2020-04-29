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
                

         // NONE SELECTED

            if($program_name == "" AND $report_type == "" AND $reported_by == "" AND $area_name == "" AND $assigned_to == "" AND $severity == "" AND $resolution == "" AND $bug_status == "" AND $priority == ""){
            	echo "<h1>No Search Critieria Provided</h1>";
            	goto end;
            }

         // ALL SELECTED

            //  if($program_name != "" AND $report_type != "" AND $reported_by != "" AND $area_name != "" AND $assigned_to != "" AND $severity != "" AND $resolution != "" AND $bug_status != "" AND $priority != ""){
            // $query = "SELECT * FROM bug_entry WHERE program_name LIKE '%{$program_name}%' AND report_type LIKE '%{$report_type}%' AND assigned_to LIKE '%{$assigned_to}%'AND area_name LIKE '%{$area_name}%' AND assigned_to LIKE '%{$assigned_to}%' AND severity LIKE '%{$severity}%' AND resolution LIKE '%{$resolution}%' AND bug_status LIKE '%{$bug_status}%' AND priority LIKE '%{$priority}%'";
            // }

            if($program_name != "" or $report_type != "" or $reported_by != "" or $area_name != "" or $assigned_to != "" or $severity != "" or $resolution != "" or $bug_status != "" or $priority != ""){
            $query = "SELECT * FROM bug_entry WHERE program_name = '$program_name' OR report_type = '$report_type' OR assigned_to = '$assigned_to'OR area_name = '$area_name' OR severity = '$severity' OR resolution = '$resolution' OR bug_status = '$bug_status' OR priority = '$priority'";

            $data = mysqli_query($con,$query) or die('error');
            if(mysqli_num_rows($data) >0){
            	while($row = mysqli_fetch_assoc($data)){
            		$program_name = $row['program_name'];
            		$reported_by = $row['reported_by'];
            		$report_type = $row['report_type'];
            		$area_name = $row['area_name'];
            		$assigned_to = $row['assigned_to'];
            		$severity = $row['severity'];
            		$resolution = $row['resolution'];
            		$bug_status = $row['bug_status'];
            		$priority = $row['priority'];
            	?>
            	<tr>
            		<td><?php echo $program_name;?></td>
            		<td><?php echo $reported_by;?></td>
            		<td><?php echo $report_type;?></td>
            		<td><?php echo $area_name;?></td>
            		<td><?php echo $assigned_to;?></td>
            		<td><?php echo $severity;?></td>
            		<td><?php echo $resolution;?></td>
            		<td><?php echo  $bug_status;?></td>
            		<td><?php echo $priority;?></td>

            	</tr>
            	<?php
            	}

            }
            else{
            	?>
            	<tr>
            		<td>Records Not Found!</td>
            	</tr>
            	<?php
            	}
            }end:
            ?> 
            
   	
            <!-- $result = mysqli_query($con, $query);
             
            if (mysqli_num_rows($result) == 0){
                echo "<h1> No Bugs found with program</h1>";
            }
            
            else 
            {
                echo "<table border=3 id = 'table'><th>Program</th><th>Report Type</th><th>Severity</th><th>Problem Summary</th><th>Reproducible</th><th>Problem</th><th>Reported By</th><th>Reported Date</th><th>Functional Area</th><th>Assigned To</th><th>Comments</th><th>Bug Status</th><th>Priority</th><th>Resolution</th><th>Resolved By</th><th>Resolved Date</th><th>Tested By</th><th>Tested Date</th><th>Click to Update</th>\n";
                while($row=mysqli_fetch_array($result)) {
                    printf("<tr>
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
                                    <A href='updateBug.php?bug_name={$row[0]}'>
                                    <span class=\"linkline\">Update</span></a>
                                </td>
                            </tr>\n",
        
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
        </table> -->
        <br>
        
        <INPUT type="button" value="Search Another Bug" id=done class="btn btn-primary btn-lg" onclick="window.location.href = 'searchbugs.php'">

        <INPUT type="button" value="Home" id=done class="btn btn-primary btn-lg" onclick="window.location.href = 'index.php'">
        
    </div>
    </div>

    </body>
</html>