<?php
// Include the database configuration file
   $dbHost     = "localhost";
$dbUsername = "root";
$dbName     = "bughound";
    $bug_id = $_POST['bug_id'];
// Create database connection
$db = new mysqli($dbHost, $dbUsername,'', $dbName);

// Check connection
if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}

// Get images from the database
$query = $db->query("SELECT * FROM upfiles where bug_id = $bug_id");

if($query->num_rows > 0){
    while($row = $query->fetch_assoc()){
        $imageURL = 'uploads/'.$row["file_name"];
?>
    <img src="<?php echo $imageURL; ?>" alt="" />
<?php }
}else{ ?>
    <p>No image(s) found...</p>
<?php } ?> 