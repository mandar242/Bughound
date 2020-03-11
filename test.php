<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test page</title>
</head>
<body>
    <?php
        include "config.php"; // Database connection using PDO

        //$sql="SELECT name,id FROM student"; 
        
        $sql="SELECT area_name FROM areas"; 
        
        /* You can add order by clause to the sql statement if the names are to be displayed in alphabetical order */
        
        echo "<select name=area value=''><option>Area Name</option>"; // list box select command
        
        foreach ($dbo->query($sql) as $row){//Array or records stored in $row

        echo $row['area_name'];
        
        //echo "<option value=$row[area_name] selected>$row[area_name]</option>";  
        
        /* Option values are added by looping through the array */ 
        
        }
        
         echo "</select>";// Closing of list box
    ?>
</body>
</html>