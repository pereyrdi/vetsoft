<?php 
include("require/session.php");
include("require/config.php");

$txt_password=md5($_POST['txt_password']);
$sql="INSERT INTO login_admin (user_name, user_pass, lastin, tel1, tel2, dir, email, mn, nombre, apellido ) 
VALUES ('".$_POST['txt_username']."','".$txt_password."','".$_POST['fecha']."','".$_POST['tel1']."','".$_POST['tel2']."','".$_POST['dir']."','".$_POST['email']."','".$_POST['mn']."','".$_POST['nombre']."','".$_POST['apellido']."')";
//mysql_query($sql);
?>
<html>
	<head>
		<?php include("header.php")?>
		<link href="css/site.css" rel="stylesheet" type="text/css">
	</head>
	<body class="modern-ui">
	<?php
	if (!mysql_query($sql,$link))
	  { 
	  die('Error: ' . mysql_error());
	  }
	  ?>
	<div class="page">
		<div class="page-region">
			<div class="page-region-content">
				<h2>Usuario <?php echo $_POST['txt_username'];?> dado de alta exitosamente.</h2>
			</div>
		</div>
	</div>
	<?php mysql_close($link); ?>
	</body>
</html>

