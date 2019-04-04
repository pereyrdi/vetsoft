<?php
	include("require/config.php");					
	$sql = "SELECT * FROM config WHERE config_id=1 LIMIT 1";
	$result = mysql_query($sql);
	while($row = mysql_fetch_assoc($result)) {
?>
<form name="config" action="alitasconfig_gral_update.php" method="post" onsubmit="if(isFormValid())alert('Todo ok'); else { alert('Algo esta mal completado');return false; }">
	<table cellpadding="0" cellspacing="0" border="0" class="striped">								
		<tr>
			<td class=""><h4>Razon Social</h4></td>
			<td class=""><input class="input" type="text" name="rs" required="1" value="<?php echo $row['rs'];?>"/></td>
		</tr>	
		<tr>
			<td class=""><h4>Direccion</h4></td>
			<td class=""><input class="input" type="text" name="dir" required="1" value="<?php echo $row['dir'];?>"/></td>
		</tr>
		<tr>
			<td class=""><h4>Telefono</h4></td>
			<td class=""><input class="input" type="phone" name="tel" value="<?php echo $row['tel'];?>"/></td>
		</tr>
		<tr>
			<td class=""><h4>Codigo Postal</h4></td>
			<td class=""><input class="input" type="text" name="cp" required="1" value="<?php echo $row['cp'];?>"/></td>
		</tr>		
		<tr>
			<td class=""><h4>CUIT</h4></td>
			<td class=""><input class="input" type="text" name="cuit" value="<?php echo $row['cuit'];?>"/></td>
		</tr>
		<tr>
			<td class=""><h4>e-Mail</h4></td>
			<td class=""><input class="input" type="text" name="email" required="1" value="<?php echo $row['email'];?>"/></td>
		</tr>
		<tr>
			<td class=""><h4>Notas</h4></td>
			<td class="">
				<textarea name="notas" cols="45" rows="4"><?php echo $row['notas'];?></textarea>
			</td>
		</tr>
	</table>
	<center>
		<input type="submit" name="submit" class="default" value="Actualizar"/>
	</center>
</form>
<?php	
}
?>