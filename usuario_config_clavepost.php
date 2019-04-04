<?php include("require/session.php"); ?>
<?php
	$clave_nueva=md5(stripslashes($_POST['usuario_password']));
	include("require/config.php");
	$sql="UPDATE `login_admin` SET user_pass='".$clave_nueva."', lastin='".$_POST['fecha']."' WHERE id='".$_POST['usuario_id']."' ";
	mysql_query($sql);
	$msg = "Clave cambiada satisfactoriamente para el usuario: ".$_POST['usuario_name'].".";
	echo("<script language=\"javascript\">"); 
	echo("self.location.href = \"usuario_config.php?msg=$msg\";"); 
	echo("</script>"); 
?>
