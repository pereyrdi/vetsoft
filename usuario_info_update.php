<?php include("require/session.php"); ?>
<?php
/*
echo $_POST['nombre']."<br>";
echo $_POST['apellido']."<br>";
echo $_POST['mn']."<br>";
echo $_POST['tel1']."<br>";
echo $_POST['tel2']."<br>";
echo $_POST['dir']."<br>";
echo $_POST['email']."<br>";
echo $_POST['fecha']."<br>";
echo $_POST['user_name']."<br>";
*/
include("require/config.php");
$sql="UPDATE `login_admin` SET nombre='".$_POST['nombre']."', apellido='".$_POST['apellido']."', mn='".$_POST['mn']."', lastin='".$_POST['fecha']."', tel1='".$_POST['tel1']."', tel2='".$_POST['tel2']."', email='".$_POST['email']."', dir='".$_POST['dir']."' WHERE user_name='".$_POST['user_name']."'";
mysql_query($sql);

$msg = "Informacion modificada satisfactoriamente.";
echo"<br><br><center><a href='usuario_info.php' target='central'><img src='images/preloader-w8-line-black.gif'></a></center>";
echo("<script language=\"javascript\">"); 
echo("self.location.href = \"usuario_info.php?msg=$msg\";"); 
echo("</script>"); 
?>
