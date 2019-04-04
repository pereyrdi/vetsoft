<?php 
	include("require/session.php");
	include("require/config.php");
	$sql="UPDATE config SET rs='".$_POST['rs']."', dir='".$_POST['dir']."', tel='".$_POST['tel']."', cp='".$_POST['cp']."', cuit='".$_POST['cuit']."', email='".$_POST['email']."', notas='".$_POST['notas']."' WHERE config_id='1'";
	mysql_query($sql);
	$msg = "Informacion modificada satisfactoriamente.";
	echo("<script language=\"javascript\">"); 
	echo("self.location.href = \"alitasconfig.php?msg=$msg\";"); 
	echo("</script>"); 
?>
