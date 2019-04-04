<?php
	//$sql_paciente="SELECT paciente,nom,ape FROM vete WHERE veteid='$idq'";
	$sql_paciente="SELECT veteid,paciente,nom,ape,dir,tel1,tel2,email FROM vete WHERE veteid='$idq'";
	$paciente = mysql_query($sql_paciente);
	while($row2 = mysql_fetch_assoc($paciente)) {				
?>
<td align="center" width="" valign="top" class="tertiary-text"><?php echo "<b><a href='show.php?id=".$row2['veteid']."' target='central'>".strtoupper($row2['paciente'])."</a></b><br>";?></td>
<td align="center" width="" valign="top" class="tertiary-text"><?php echo "".strtoupper($row2['ape']).", ".strtoupper($row2['nom'])."";?></td>		
<td align="center" width="" valign="top" class="tertiary-text"><?php if($row2['tel1'] == 0) { echo "-"; } else { echo $row2['tel1']; } ?><?php if($row2['tel2'] == 0) { echo ""; } else { echo "<br>".$row2['tel2']; } ?></td>
<td align="center" width="" valign="top" class="tertiary-text"><?php if(!($row2['email'] == NULL))  { echo $row2['email']; } else { echo "-"; }?></td>
<?php
	}
?>	