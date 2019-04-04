<?php 
$vacuid=$_GET["q"];
$status=$_GET["w"];
echo $q;
echo $w;

include("require/config.php");
if (!$link)
  {
  die('Could not connect: ' . mysql_error());
  }
  else {
  				mysql_select_db("alas", $con);
					$sql="UPDATE vacunas SET status='".$status."' WHERE vacuid='$vacuid'";
					if (!mysql_query($sql,$link))
					  { 
					  die('Error: ' . mysql_error());
					  }
					//echo $vacuid.": actualizado a: ".$status;
					mysql_close($link);
			?><img src="yes.gif" alt="" ><?php  	
  	}
?>

