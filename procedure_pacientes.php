<?php
	$sql_paciente="SELECT paciente,nom,ape FROM vete WHERE veteid='$idq'";
	$paciente = mysql_query($sql_paciente);
	while($row2 = mysql_fetch_assoc($paciente)) {				
		echo "<b><a href='show.php?id=".$row['veteid']."' target='central'>".strtoupper($row2['paciente'])	."</a></b><br>";
		echo "".$row2['ape'].", ".$row2['nom']."<br>";
	}
?>	