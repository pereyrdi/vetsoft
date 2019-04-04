<?php
	include("require/config.php");
	
	$sql = "SELECT * FROM ( 
	(SELECT peluqueria.veteid, peluqueria.fecha, peluqueria.texto, peluqueria.medico, peluqueria.trabajo, NULL AS vacuna, peluqueria.vetecol FROM peluqueria) 
	UNION ALL 
	(SELECT historias.veteid, historias.fecha, historias.texto, historias.medico, NULL AS trabajo, NULL AS vacuna, historias.vetecol FROM historias)  
	UNION ALL 
	(SELECT vacunas.veteid, vacunas.fecha, vacunas.texto, vacunas.medico, NULL AS trabajo, vacunas.vacuna, vacunas.vetecol FROM vacunas)
	) results WHERE fecha < CURDATE( ) AND fecha > DATE_ADD( CURDATE( ) , INTERVAL -1 DAY )ORDER BY fecha ASC";  
	$result = mysql_query($sql);
	if (mysql_num_rows($result) == 0) { 
		echo "<div style='height:110px;'>Ayer no hubo registros...</i></div>"; 
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
				<td width="15%" align="center" valign="top" class="tertiary-text">
					<?php 
						$idq=$row['veteid'];
						include("procedure_pacientes.php");	
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
						include("procedure_pacientes.php");	
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
						include("procedure_pacientes.php");	
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
