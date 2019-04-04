<?php include("require/session.php"); ?>
<?php
$username=stripslashes($_GET['username']);
$clave_actual=md5(stripslashes($_GET['clave_actual']));
$clave_nueva=md5(stripslashes($_GET['txt_password']));

/*
echo "username: ".$username."<br>";
echo "Clave actual: ".$clave_actual."<br>";
echo "Clave nueva: ".$clave_nueva."<br>";
*/

include("require/config.php");
$sql="UPDATE `login_admin` SET user_pass='".$clave_nueva."' WHERE user_name='".$_SESSION['username']."' and user_pass='".$clave_actual."'";
mysql_query($sql);

$msg = "Clave cambiada satisfactoriamente.";
echo" <a href='usuario_info.php' target='central'>....actualizandoooo.....</a><br>";
echo("<script language=\"javascript\">"); 
echo("self.location.href = \"usuario_info.php?msg=$msg\";"); 
echo("</script>"); 
?>
