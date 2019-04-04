<?php
	//$idq = trim($_GET['id']);
	//include("require/config.php");
	$sql = "SELECT * FROM historias WHERE veteid='$id' ORDER BY fecha DESC"; 
	$result = mysql_query($sql);
	if (mysql_num_rows($result) == 0) { 
		echo "<center>No hay registros aun...</center>"; 
	} else {	
?>
<table border="0" class="striped">
<tr>
	<td width="10" align="center" style="background-color:#eeeDDD;" class="tertiary-text"><B>FECHA/HORA</B></td>
	<td width="" align="center" style="background-color:#eeeDDD;" class="tertiary-text"><B>MOTIVO DE LA CONSULTA</B></td>
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
			<td width="" valign="top" class="tertiary-text"><?php echo $row['texto'];?><br><br></td>	
		</tr>
		<?php
}	
?>
</table>
<?php } ?>
