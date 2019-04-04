<?php include("require/session.php"); ?>
<html>
	<head>
		<?php include("header.php")?>
		<script type="text/javascript" src="js/jquery.min.js"></script>
	</head>
	<body class="modern-ui">
<?php
	include("require/config.php");
   //echo $_GET	['username']."<br>";
   $username=trim($_GET	['username']);
	$sql = "SELECT * FROM login_logs WHERE log_username='".$username."' ORDER BY log_datetime DESC"; 
	$result = mysql_query($sql);
	if (mysql_num_rows($result) == 0) { 
		echo "<center>No hay registros aun...</center>"; 
	} else {
?>
<div class="prettyprint" align="right">
	<a href="javascript:window.print()" title="Imprimir"><i class="icon-printer"></i></a>&nbsp;
</div>
<div class="row" align="left">
	<pre class='prettyprint'>
		<i class='icon-user-2'></i><b>Mostrando los registros de acceso de <?php echo strtoupper($username);?>.</b>
	</pre>
</div>

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
					<center>
						<a class="button bg-color-red fg-color-white" href="usuario_config.php" target="central" title="Atras"><b>Volver</b></a>
					</center>		
<?php } ?>
</body>
</html>