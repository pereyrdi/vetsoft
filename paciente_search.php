<?php
	$searchq = mysql_real_escape_string($_GET['searchq']);
	$opq = mysql_real_escape_string($_GET['opq']);
	
	include("require/config.php");
	require("require/alasfun.php");
	
	if(empty($searchq)) {
    	echo "...";
    } else {
	   if ($opq == 1) { 
	   	$search_sql = "SELECT veteid, especie, paciente, ape, nom, sexo FROM vete WHERE paciente LIKE '%$searchq%' and fallecido=0 ";
		}
		if ($opq == 2) { 
	   	$search_sql = "SELECT veteid, especie, paciente, ape, nom, sexo FROM vete WHERE ape LIKE '%$searchq%' or nom LIKE '%$searchq%' and fallecido=0 ";
		}
	    $result = mysql_query($search_sql);
	    
	   if (!$result) { 	echo "Could not successfully run query ($search_sql) from DB: " . mysql_error();  exit;	}
		if (mysql_num_rows($result) == 0) {	echo "<small>...</small>";  exit; }
	?>
	
	<table border="0" cellpadding="0" cellspacing='0' align='left' style="display:block; position:relative; width:135px; 	height:290px; font-size:0.7em;	margin:0px;	padding:0px;	overflow:auto;">
	<?php
	   if ($opq == 1) { 
			while ($row = mysql_fetch_assoc($result)) {
					echo "<tr><td align='left' class=''>";
					//echo "<div >"; //this div is used to contain the results. Mostly used for styling.
					//echo" <a href='show.php?id=".$row['veteid']."&mode=0' target='central'>";
					//echo $opq;
					echo" <a href='show.php?id=".$row['veteid']."' target='central' title='".$row['ape'].", ".$row['nom']."'>";
					echo getespecie($row['especie']); echo getsex($row['sexo']);
					echo strtoupper($row['paciente']);
					 # echo "<br><span style='font-size:9px; color:#999999'>".$row['ape'].", ".$row['nom']."</span>";
					echo "</a>";        
					echo "</td></tr>";
			   }          	   
	   }	
		if ($opq == 2) { 
			while ($row = mysql_fetch_assoc($result)) {
					echo "<tr><td align='left' class=''>";
					//echo "<div >"; //this div is used to contain the results. Mostly used for styling.
					//echo" <a href='show.php?id=".$row['veteid']."&mode=0' target='central'>";
					//echo $opq;
					echo" <a href='show.php?id=".$row['veteid']."' target='central' title='".$row['paciente']."'>";
					echo getespecie($row['especie']); echo getsex($row['sexo']);
					echo strtolower($row['ape']).", ".strtolower($row['nom']);
					 # echo "<br><span style='font-size:9px; color:#999999'>".$row['ape'].", ".$row['nom']."</span>";
					echo "</a>";        
					echo "</td></tr>";
			   }          	   
	   }	
	
	mysql_free_result($result);
	echo "</table>";
	echo "<br><br>";
 
}
?>
