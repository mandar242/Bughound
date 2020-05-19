<?php
                    $area_id = $_POST['delete_area'];
                    $con = mysqli_connect("localhost","root");
                    mysqli_select_db($con, "bughound_test1");
                     $query = "delete from areas where area_id = '".$area_id."';";
                     mysqli_query($con, $query);
                     header('location: programtable.php');
                    if(! $con ) {
                      die('Could not connect: ' . mysqli_error());
                    }    
            
          else {
            echo "0 results";
         }
?>
