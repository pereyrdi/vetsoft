<?php
	//include("require/config.php");
	if ($print==1)	{	
			$sql = "SELECT * FROM ( 
	(SELECT peluqueria.veteid, peluqueria.fecha, peluqueria.texto, peluqueria.medico, peluqueria.trabajo, NULL AS vacuna, peluqueria.vetecol FROM peluqueria) 
	UNION ALL 
	(SELECT historias.veteid, historias.fecha, historias.texto, historias.medico, NULL AS trabajo, NULL AS vacuna, historias.vetecol FROM historias)  
	UNION ALL 
	(SELECT vacunas.veteid, vacunas.fecha, vacunas.texto, vacunas.medico, NULL AS trabajo, vacunas.vacuna, vacunas.vetecol FROM vacunas)
	) results WHERE veteid='$id'  ORDER BY fecha DESC";
	} else {	
		$sql = "SELECT * FROM ( 
	(SELECT peluqueria.veteid, peluqueria.fecha, peluqueria.texto, peluqueria.medico, peluqueria.trabajo, NULL AS vacuna, peluqueria.vetecol FROM peluqueria) 
	UNION ALL 
	(SELECT historias.veteid, historias.fecha, historias.texto, historias.medico, NULL AS trabajo, NULL AS vacuna, historias.vetecol FROM historias)  
	UNION ALL 
	(SELECT vacunas.veteid, vacunas.fecha, vacunas.texto, vacunas.medico, NULL AS trabajo, vacunas.vacuna, vacunas.vetecol FROM vacunas)
	) results WHERE veteid='$id'  ORDER BY fecha DESC LIMIT 10";
	}
 
	$result = mysql_query($sql);
	if (mysql_num_rows($result) == 0) { 
		echo "<center>No hay registros aun...</center>"; 
	} else {	
?>
<table border="0" class="striped">
	<?php
	while($row = mysql_fetch_assoc($result)) {
		$vetefecha1=substr($row['fecha'],8,2)."/".substr($row['fecha'],5,2)."/".substr($row['fecha'],0,4);
		switch ($row['vetecol']) {	
		case "1":				
		?>
			<tr><td class="tertiary-text">
			<b><?php echo $vetefecha1; ?></b>: <i>(<?php echo strtolower($row['medico']);?>)</i> - <?php echo $row['texto'];?><br>
			</td></tr>
		<?php
		break;
		case "2":
		?>
			<tr><td class="tertiary-text">
			<b><?php echo $vetefecha1; ?></b>: <i>(<?php echo strtolower($row['medico']);?>)</i> - <b><?php echo $row['trabajo'];?></b> - <i>"<?php echo $row['texto'];?>"</i><br>
			</td></tr>				
		<?php
		break; 
		case "3":
		?>
			<tr><td class="tertiary-text">
			<b><?php echo $vetefecha1; ?></b>: <i>(<?php echo strtolower($row['medico']);?>)</i> - <b style="background-color: #FFFF00;"><?php echo $row['vacuna'];?></b> - <i>"<?php echo $row['texto'];?>"</i><br>
			</td></tr>
		<?php
		break; 
		}
	}	
	?>
</table>
<?php } ?>
