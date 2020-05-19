<?php
   include('session.php');
	 $table_name = $_POST['table'];
   $table_type_name = $_POST['format'];
	
	if($table_type_name=='xml'){
		
$filename = "$table_name-".date("Y-m-d_H-i",time()).".xml";

$db = mysqli_connect("localhost","root","","bughound");
//Extract data
$sqlQuery = "SELECT * FROM `{$table_name}`" ;
if (!$result = $db->query($sqlQuery)) {
    throw new Exception(sprintf('Mysqli: (%d): %s', $mysql->errno, $mysql->error));
}

//New document 
$dom = new DOMDocument;
$dom->preserveWhiteSpace = FALSE;

//add table
$table = $dom->appendChild($dom->createElement('table'));

//add row
foreach($result as $row) {
    $data = $dom->createElement('row');
    $table->appendChild($data);

    //add column
    foreach($row as $name => $value) {

        $col = $dom->createElement('column', $value);
        $data->appendChild($col);
        $colattribute = $dom->createAttribute('name');
        $colattribute->value = $name;
        $col->appendChild($colattribute);           
    }
}



$dom->formatOutput = true;  
$test1 = $dom->saveXML();
$dom->save($filename); 
$dom->save('xml/'.$filename);

	}
	
	else if ($table_type_name=='ascii')
	{
	$con = mysqli_connect("localhost","root");
   mysqli_select_db($con, "bughound");
   $test = "SELECT * FROM `{$table_name}` INTO OUTFILE 'C:/xampp/htdocs/bughound544/{$table_name}.txt' CHARACTER SET utf8 FIELDS TERMINATED BY ','";
   $result = mysqli_query($con, $test);
   }
	echo "<SCRIPT type='text/javascript'>
      alert('Table Exported');
      document.location.href='/bughound544/exportMain.php';
      </SCRIPT>"; 


?>