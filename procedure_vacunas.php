<?php
	include("require/config.php");
	//$idq = trim($_GET['id']);
	$sql = "SELECT * FROM vacunas WHERE veteid='$id' ORDER BY fecha DESC";	
	$result = mysql_query($sql);
	if (mysql_num_rows($result) == 0) { 
		echo "<center>No hay registros aun...</center>"; 
	} else {
		
		
?> 

<table border="0" class="striped">
	<tr>
		<td width="10" align="center" style="background-color:#eeeDDD;" class="tertiary-text"><B>FECHA/HORA</B></td>
		<td width=""   align="center" style="background-color:#eeeDDD;" class="tertiary-text"><B>DIFF DIAS</B></td>
		<td width=""   align="center" style="background-color:#eeeDDD;" class="tertiary-text"><B>VACUNA</B></td>		
		<td width=""   align="center" style="background-color:#eeeDDD;" class="tertiary-text"><B>DESCRIPCION</B></td>
	</tr>
	<?php
	while($row = mysql_fetch_assoc($result)) {
			?>
			<tr>
				<td width="" align="center" valign="top" class="tertiary-text">
					<?php 
					echo substr($row['fecha'],8,2)."/".substr($row['fecha'],5,2)."/".substr($row['fecha'],0,4);
					echo "<br>";
					echo substr($row['fecha'],11,8);
					?>
					<br>
					<i>Por: <b><?php echo strtolower($row['medico']);?></b></i>
					<br><br>
				</td>
				<td width="" valign="top" class="tertiary-text">
					<?php 
						$day1=substr($row['fecha'],0,4)."-".substr($row['fecha'],5,2)."-".substr($row['fecha'],8,2);
						$day2=date("Y-m-d");
						echo dateDiff($day1, $day2);
					?>
				</td>
				
				<td width="" valign="top" class="tertiary-text"><?php echo $row['vacuna'];?></td>
				<td width="" valign="top" class="tertiary-text"><?php echo $row['texto'];?><br><br></td>
			</tr>
			<?php
	}	
	?>
</table>
<?php } ?>
