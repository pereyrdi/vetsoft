<?php
	include("require/config.php");
	
	$sql = "SELECT * FROM vete WHERE DATE(fechadealta) = CURDATE() ORDER BY fecha ASC"; 
	$result = mysql_query($sql);
	if (mysql_num_rows($result) == 0) { 
		echo "<i>Hoy no hay registros aun...</i>"; 
	} else {	
?>


	<table border="0" class="striped">	
	<?php
	while($row = mysql_fetch_assoc($result)) {
		$vetefecha1=substr($row['fecha'],11,5); //solo la hora
		switch ($row['vetecol']) {		
		case "1":				
		?>
			<tr>
				<td width="10"  align="center" valign="top" class="tertiary-text">
					<b><?php echo $vetefecha1; ?></b>
				</td>				
				<td width="10%" align="center" valign="top" class="tertiary-text">
					<?php 
						$idq=$row['veteid'];
						include("procedure_mascotas.php");	
					?>
				</td>
				<td class="tertiary-text" valign="top">
					<i>(<?php echo strtolower($row['medico'])?>)</i> - <?php echo $row['texto'];?><br>
				</td>
			</tr>
		<?php
		break;
		case "2":
		?>
			<tr>
				<td width="10"  align="center" valign="top" class="tertiary-text">
					<b><?php echo $vetefecha1; ?></b>
				</td>	
				<td width="10%" align="center" valign="top" class="tertiary-text">
					<?php 
						$idq=$row['veteid'];
						include("procedure_mascotas.php");	
					?>
				</td>
				<td class="tertiary-text" valign="top">
					<i>(<?php echo strtolower($row['medico']);?>)</i> - <b><?php echo $row['trabajo'];?></b> - <i>"<?php echo $row['texto'];?>"</i><br>
				</td>
			</tr>				
		<?php
		break; 
		case "3":
		?>
			<tr>
				<td width="10"  align="center" valign="top" class="tertiary-text">
					<b><?php echo $vetefecha1; ?></b>
				</td>					
				<td width="10%" align="center" valign="top" class="tertiary-text">
					<?php 
						$idq=$row['veteid'];
						include("procedure_mascotas.php");	
					?>
				</td>				
				<td class="tertiary-text" valign="top">
					<i>(<?php echo strtolower($row['medico']);?>) - <b style="background-color: #FFFF00;"><?php echo $row['vacuna'];?></b> - <i>"<?php echo $row['texto'];?>"</i><br>
				</td>
			</tr>
		<?php
		break; 
		}
	}	
	?>
</table>

<?php } ?>
