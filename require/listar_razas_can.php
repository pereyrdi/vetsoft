<?php
	$q=$_GET['q'];
	include("config.php");
	$mysqli=mysqli_connect($dbhostname,$dbusername,$dbpassword,$database_name) or die("Database Error");
	$my_data=mysql_real_escape_string($q);
	$sql="SELECT raza FROM razas_caninos WHERE raza LIKE '%$my_data%' ORDER BY raza";
	$result = mysqli_query($mysqli,$sql) or die(mysqli_error());

	if($result)
	{
		while($row=mysqli_fetch_array($result))
		{
			echo $row['raza']."\n";
		}
	}
?>

