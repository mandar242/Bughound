<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
    <?php 
  		
  		$con = mysqli_connect("localhost","root");
		mysqli_select_db($con, "bughound_test1");		
        $query="SELECT * from attachment";
        $result=mysqli_query($con,$query);		
        // $roww=mysqli_fetch_array($result);
        // echo "= ".$roww[0]."- ".$roww[2];

  	?>
    <p id="dis"></p><br>
    <select name="select" id="select">
        <?php while($row=mysqli_fetch_array($result)) { ?>                        
        <?php echo "<option>".$row[2]."</option>"; ?>
        <?php } ?>
    </select>
    <button name="btn" id="btn" onclick="ff()">Open</button>
    

    
</body>
<script>
    function ff(){
        // document.getElementById("dis").innerHTML = document.getElementById("select").value;
        window.location.assign("/bughound5/open2.php?filename="+document.getElementById("select").value);
    }
</script>
</html>