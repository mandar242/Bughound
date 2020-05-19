
       
        
        
  
  <?php 
    $table_select=$_POST["table_select"];
    $type_select = $_POST["type_select"];
    $con = mysqli_connect("localhost","root");
    mysqli_select_db($con, "bughound_test1");
    if(! $con ) {
      die('Could not connect: ' . mysqli_error());
    }
if(isset($_POST["export"]) && $type_select=="ascii") 
{

    if($table_select =="employees" )
    {
        
        header('Content-Type: text/csv; charset=utf-8');  
        header('Content-Disposition: attachment; filename=employees.csv');  
        $output = fopen("php://output", "w");  
        fputcsv($output, array('emp_id', 'name', 'username', 'password', 'userlevel'));        
        $query = "SELECT * FROM employees";    
        $result = mysqli_query($con, $query);
        if(mysqli_num_rows($result) > 0) 
        {
            while($row = mysqli_fetch_assoc($result)) 
            {              
               fputcsv($output, $row);
            }
        }          
        fclose($output);
    }
    
    if($table_select =="areas" )
    {
        $con = mysqli_connect("localhost","root");
        header('Content-Type: text/csv; charset=utf-8');  
        header('Content-Disposition: attachment; filename=areas.csv');  
        $output = fopen("php://output", "w");  
        fputcsv($output, array('area_id', 'program_id', 'area'));
        mysqli_select_db($con, "bughound_test1");              
        $query = "SELECT * FROM areas";    
        $result = mysqli_query($con, $query);
        if(mysqli_num_rows($result) > 0) 
        {
            while($row = mysqli_fetch_assoc($result)) 
            {              
               fputcsv($output, $row);
            }
        }          
        fclose($output);
    }
   
    if($table_select =="programs" )
    {
        $con = mysqli_connect("localhost","root");
        header('Content-Type: text/csv; charset=utf-8');  
        header('Content-Disposition: attachment; filename=programs.csv');  
        $output = fopen("php://output", "w");  
        fputcsv($output, array('program_id', 'program', 'program_release', 'program_version'));
        mysqli_select_db($con, "bughound_test1");              
        $query = "SELECT * FROM programs";    
        $result = mysqli_query($con, $query);
        if(mysqli_num_rows($result) > 0) 
        {
            while($row = mysqli_fetch_assoc($result)) 
            {              
               fputcsv($output, $row);
            }
        }          
        fclose($output);
    }
    if($table_select =="bug" )
    {
        $con = mysqli_connect("localhost","root");
        header('Content-Type: text/csv; charset=utf-8');  
        header('Content-Disposition: attachment; filename=bug.csv');  
        $output = fopen("php://output", "w");  
        // fputcsv($output, array('', 'program', 'program_release', 'program_version'));
        mysqli_select_db($con, "bughound_test1");              
        $query = "SELECT * FROM bug";    
        $result = mysqli_query($con, $query);
        if(mysqli_num_rows($result) > 0) 
        {
            while($row = mysqli_fetch_assoc($result)) 
            {              
               fputcsv($output, $row);
            }
        }          
        fclose($output);
    }
    

}
else
    {
        $query1="SELECT * FROM $table_select";
        $ts=$table_select;
    $dom   = new DOMDocument( '1.0', 'utf-8' );
    $dom   ->formatOutput = True;
    $root  = $dom->createElement('export');
    $dom   ->appendChild( $root );
    $result=mysqli_query($con, $query1);
    while($row=mysqli_fetch_assoc($result)){
      $node = $dom->createElement( 'field' );
    foreach( $row as $key => $table_select )
    {
        $child = $dom->createElement( $key );
        $child ->appendChild( $dom->createCDATASection( $table_select) );
        $node  ->appendChild( $child );
    }
    $root->appendChild( $node );
    }    
    $dom->save( 'exported/'.$ts.'.xml' );
    header("Location: maintaindb.php");
    }

?>










