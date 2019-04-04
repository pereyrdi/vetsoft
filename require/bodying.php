<?php	
	if ($print==1) 	{ 
	include("require/config.php");					
	$sql = "SELECT * FROM config WHERE config_id=1 LIMIT 1";
	$result = mysql_query($sql);
		while($row = mysql_fetch_assoc($result)) {
?>
<body class="modern-ui" onload="setTimeout(printpage,1500)">
<div style="margin-left:10px;">
    <address>
        <strong><h2><?php echo $row['rs'];?></h2></strong>
        <b>Direccion:</b> <?php echo $row['dir'];?>, (<b>CP</b><?php echo $row['cp'];?>), Ciudad Autonoma de Buenos Aires<br>
        <b>Telefonos:</b> <?php echo $row['tel'];?><br>
        <b>CUIT:</b> <?php echo $row['cuit'];?><br>
        <b>E-MAIL:</b> <a href="mailto:#"><?php echo $row['email'];?></a><br>
        <i>"<?php echo $row['notas'];?>"</i>
    </address>
</div>
<?php 
			}
		}	else {
?>
<body class="modern-ui">
<?php			
		}
?>