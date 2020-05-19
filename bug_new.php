<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bug Added</title>
    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet">

    <!-- Jquery UI (Datepicker) -->
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <!-- <link rel="stylesheet" href="/resources/demos/style.css"> -->
    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/style.css">
	
</head>
<?php
    session_start();
    if(isset($_SESSION['last_action']))
    {
        if(time() - $_SESSION['last_action']>1800)
        {
        session_unset();
        session_destroy();  
        }
    }
    $_SESSION['last_action'] = time();
    if(isset($_SESSION['username'])){
        'Username - '.$_SESSION['username']." ";
        'User Level - '.$_SESSION['userlevel'];
    }
    else{
        header("Location: index.php");
    }
    if(!isset($_SERVER['HTTP_REFERER'])){
        // redirect them to your desired location
        header('location:home.php');        
    }
    ?>
    <?php if(isset($_SESSION['username'])): ?>
        <ul class="nav justify-content-end">
        <li class="nav-item">
            <a class="nav-link" href="home.php">Home</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="logout.php">Logout</a>
        </li>
        </ul>
    <?php else: ?>
        <ul class="nav justify-content-end">
            <li class="nav-item">
                <a class="nav-link" href="index.php">Login</a>
            </li>
        </ul>
  <?php endif; ?>
<?php 
    // $con = mysqli_connect("localhost","root");
    // mysqli_select_db($con, "bughound_test1");
    $con = new mysqli("localhost", "root", "", "bughound_test1");
    if(! $con ) {
        die('Could not connect: ' . mysqli_error());
    }  
    // $program=$_POST['program'];
    // $r_type=$_POST['report-type'];
    // $severity=$_POST['severity'];
    // $summary=$_POST['summary'];
    // $reproduce=$_POST['reproduce'];
    // $problem=$_POST['problem'];
    // $r_by=$_POST['reported-by'];
    // $r_date=$_POST['reported-date'];
    $data=array();
    function array_push_assoc($array_a, $key_a, $value_a){
        $array_a[$key_a] = $value_a;
        return $array_a;
        }
    if($_POST['program'] != "") $data = array_push_assoc($data, 'Program', $_POST['program']);
    if($_POST['report-type'] != "") $data =array_push_assoc($data, 'Report_type', $_POST['report-type']);
    if($_POST['severity'] != "") $data =array_push_assoc($data, 'Severity', $_POST['severity']);
    if($_POST['summary'] != "")$data = array_push_assoc($data, 'Problem_Summary', $_POST['summary']);
    if($_POST['reproduce'] != "") $data =array_push_assoc($data, 'Reproducable', $_POST['reproduce']);
    if($_POST['problem'] != "") $data =array_push_assoc($data, 'Problem', $_POST['problem']);
    if($_POST['fix'] != "") $data =array_push_assoc($data, 'Suggested_Fix', $_POST['fix']);
    if($_POST['reported-by'] != "") $data =array_push_assoc($data, 'Reported_By', $_POST['reported-by']);
    if($_POST['reported-date'] != "") $data =array_push_assoc($data, 'Report_Date', $_POST['reported-date']);
    // other fields
    if($_POST['function-area'] != "") $data =array_push_assoc($data, 'Functional_Area', $_POST['function-area']);
    if($_POST['assigned-to'] != "") $data =array_push_assoc($data, 'Assigned_To', $_POST['assigned-to']);
    if($_POST['comments'] != "") $data =array_push_assoc($data, 'Comments', $_POST['comments']);
    if($_POST['status'] != "") $data =array_push_assoc($data, 'Status_bug', $_POST['status']);
    if($_POST['priority'] != "") $data =array_push_assoc($data, 'Priority', $_POST['priority']);
    if($_POST['resolution'] != "") $data =array_push_assoc($data, 'Resolution', $_POST['resolution']);
    if($_POST['resolution-v'] != "") $data =array_push_assoc($data, 'Resolution_Version', $_POST['resolution-v']);
    if($_POST['resolved-by'] != "") $data =array_push_assoc($data, 'Resolved_By', $_POST['resolved-by']);
    if($_POST['resolved-date'] != "") $data =array_push_assoc($data, 'Resolve_Date', $_POST['resolved-date']);
    if($_POST['tested-by'] != "") $data =array_push_assoc($data, 'Tested_By', $_POST['tested-by']);
    if($_POST['tested-date'] != "") $data =array_push_assoc($data, 'Test_Date', $_POST['tested-date']);
    if($_POST['treat-as'] != "") $data =array_push_assoc($data, 'Deferred', $_POST['treat-as']);

    $key_val= array_keys($data);
    $data_val = array_values($data);
    $size_arr=count($data);
    // $query= "INSERT INTO bug (" . implode(', ', $key_val) . ") VALUES ('".implode("', '", $data_val). "');";
    $query="INSERT into bug (";
    for($i=0;$i<$size_arr;$i++){
        $query.= $key_val[$i].",";        
    }
    $query=substr($query,0,-1);    
    $query.=") VALUES (";    
    for($i=0;$i<$size_arr;$i++){
        $query.="?,";    
    }    
    $query=substr($query,0,-1).")";
    $stm=mysqli_prepare($con,$query);
    $strr="";
    for($i=0;$i<$size_arr;$i++){
        if($key_val[$i]=="Program"|| $key_val[$i]=="Reported_By"|| $key_val[$i]=="Functional_Area"|| $key_val[$i]=="Assigned_To"||$key_val[$i]=="Resolved_By"||$key_val[$i]=="Tested_By"){
            $strr.="i";
        }
        else{
            $strr.="s";
        }                
    }
    // echo "<br>strr=".$strr;
    array_unshift($data_val,$stm,$strr);
    $bindReferences = array();
    foreach($data_val as $k => $v) {
        $bindReferences[$k] = &$data_val[$k];
    }
    call_user_func_array("mysqli_stmt_bind_param",$bindReferences);
    // $stm->bind_param($strr, $data_val);
    // echo "Quere=".$query."<br>";
    // echo $st;
        
    // $stm->bind_param($st,$data_val);
    $exec_stat= mysqli_stmt_execute($stm);
    // printf("%d Row inserted.\n", mysqli_stmt_affected_rows($stm));
    // echo "<br>".$query= "INSERT INTO bug (" . implode(', ', $key_val) . ") VALUES ('".implode("', '", $data_val). "');"; 
    // if($_SESSION['userlevel']!=1){
    //     $area=$_POST['function-area'];
    //     $assigned_to=$_POST['assigned-to'];
    //     $comments=$_POST['comments'];
    //     $status=$_POST['status'];
    //     $priority=$_POST['priority'];
    //     $resolution=$_POST['resolution'];
    //     $resolution_v=$_POST['resolution-v'];
    //     $_POST['resolved-by']==array_push_assoc($data, 'Resolved_By', $_POST['resolved-by']);
    //     // $resolved_by=$_POST['resolved-by'];
    //     $resolved_date=$_POST['resolved-date'];
    //     $tested_by=$_POST['tested-by'];
    //     $tested_date=$_POST['tested-date'];
    //     $treat=$_POST['treat-as'];
    //     $f_file=$_FILES['file1']['name'];
    //     $query="INSERT INTO bug(Program, Report_type, Severity, Problem_Summary, Reproducable, Problem, Reported_By, Report_Date,
    //         Functional_Area, Assigned_To, Comments, Status_bug, Priority, Resolution, Resolution_Version, Resolved_By, Resolve_Date,
    //         Tested_By, Test_Date, Deferred) 
    //         Values ('".$program."', '".$r_type."', '".$severity."', '".$summary."', '".$reproduce."', '".$problem."', '".$r_by."', '".$r_date."'
    //         ,'".$area."', '".$assigned_to."', '".$comments."', '".$status."', '".$priority."', '".$resolution."', '".$resolution_v."',
    //         '".$resolved_by."', '".$resolved_date."', '".$tested_by."', '".$tested_date."', '".$treat."');";
        

    // }
    // else{
    //     $query="INSERT INTO bug(Program, Report_type, Severity, Problem_Summary, Reproducable, Problem, Reported_By, Report_Date) 
    //         Values ('".$program."', '".$r_type."', '".$severity."', '".$summary."', '".$reproduce."', '".$problem."', '".$r_by."', '".$r_date."');";
    // }
    
    // echo "prog = ".$program;
    // echo "Date = ".$r_date;
    // echo "type = ".$r_type;
    // echo "sev = ".$severity;
    // echo "sum = ".$summary;
    // echo "prob = ".$problem;
    // echo "by = ".$r_by;
    // echo "assignedto - ".$assigned_to;
        
    
    // $result=mysqli_query($con,$query);
    // $result=$con->get_result();
    if($exec_stat){
        echo "Bug submitted";
    }
    else{    
        echo "Submission failed - Error - ";
    }
    if($_SESSION['userlevel']!=1){
        $bug_id=mysqli_stmt_insert_id($stm);
        $num_files=count($_FILES['file1']['tmp_name']);
        // echo "count= ".$num_files;
        if($_FILES['file1']['tmp_name'][0]!=""){
            $query_file="";
            for($i=0;$i<$num_files;$i++){
                $filename=$_FILES['file1']['name'][$i];
                move_uploaded_file($_FILES['file1']['tmp_name'][$i],'uploads/'.$filename);
                // $data=file_get_contents("uploads/".$_FILES['file1']['name'][$i]);            
                $query_file.="INSERT INTO attachment(bug, file_name) VALUES ('".$bug_id."', '".$filename."');";
            }
            if(mysqli_multi_query($con, $query_file)){
                // echo "Files inserted";
            }else{
                echo "Error".$query_file."<br>".mysqli_error($con);
            }
            mysqli_close($con);
        }        

    }

  	?>
<body>
    <br>
    <button class="btn btn-primary" onclick="go_back()">Back</button>
</body>
<script type="text/javascript">
    function go_back(){
        window.location.replace("bug.php");
    }            
</script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

</html>
</html>