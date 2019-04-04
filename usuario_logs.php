<?php
	include("require/config.php");
	$sql="SELECT COUNT(*) AS id FROM login_logs WHERE log_username='".$_SESSION['username']."' ";
	//$counter = mysql_query($sql);
	//$num = mysql_fetch_array($counter);
	$num = mysql_fetch_array(mysql_query($sql));

	$sql = "SELECT * FROM login_logs WHERE log_username='".$_SESSION['username']."' ORDER BY log_datetime DESC LIMIT 15"; 
	$result = mysql_query($sql);
	if (mysql_num_rows($result) == 0) { 
		echo "<center>No hay registros aun...</center>"; 
	} else {
?>
<?php include("require/iconodeimprimir.php");?>
<h4>Mostrando los 15 ultimos registros de acceso. Total <?php echo $num["id"];?></h4>
<table border="0" class="striped">
<tr>
	<td width="" align="center" style="background-color:#eeeDDD;" class="tertiary-text"><B>FECHA</B></td>
	<td width="" align="center" style="background-color:#eeeDDD;" class="tertiary-text"><B>HORA</B></td>
	<td width="" align="center" style="background-color:#eeeDDD;" class="tertiary-text"><B>USUARIO</B></td>
	<td width="" align="center" style="background-color:#eeeDDD;" class="tertiary-text"><B></B></td>	
</tr>

<?php
while($row = mysql_fetch_assoc($result)) {
		?>
		<tr>
		<td width="10" align="center" valign="top" class="tertiary-text">
			<?php echo substr($row['log_datetime'],8,2)."/".substr($row['log_datetime'],5,2)."/".substr($row['log_datetime'],0,4); ?>
		</td>
		<td width="10" align="center" valign="top" class="tertiary-text">
			<?php echo substr($row['log_datetime'],11,8);?>
		</td>		
		<td width="" valign="top" class="tertiary-text">
			<?php echo $row['log_username'];?>
		</td>
		<td width="100%" valign="top" class="tertiary-text">

		</td>		
		</tr>
		<?php
}	
?>
</table>
<?php } ?>
