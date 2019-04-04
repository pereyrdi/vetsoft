<?php include("require/session.php"); ?>
<?php if($_GET['msg']!='') echo '<div class="notification" id="notification" style="position: fixed; top: 0px; margin-left: 30%; background-color: yellow;"><i>'.$_GET['msg'].'</i></div>';  ?>
<html>
    <head>  
		<?php include("header.php")?>
		<script type="text/javascript" src="js/alta_validation.js"></script>
		<link rel="stylesheet" type="text/css" href="css/alta_validation.css" />		
		<script type="text/javascript" src="js/jquery.min.js"></script>
		<script type="text/javascript" src="javascript/pagecontrol.js"></script>
		<script type="text/javascript"> $(document).ready(function(){	setTimeout(function(){	$("div.notification").fadeOut("slow", function () {	$("div.notification").remove();	});	}, 2000); });</script>
   </head>
<body class="modern-ui">

<div class="page">
	<div class="page-region">
		<div class="page-region-content">
			
			<h2><i class="icon-user-2"></i>Preferencias del usuario "<?php echo strtoupper($_SESSION['username']);?>"</h2>
			
			<div class="page-control" data-role="page-control" style="margin-left:10px;width: 90%;">
				<ul>
					<li class="active"><a href="#datos">Informacion</a></li>
					<li><a href="#logs">Historial de accesos</a></li>
					<li><a href="#clave">Cambio de clave</a></li>
				</ul>
				<div class="frames">
					<div class="frame active" id="datos">
					<?php include("require/iconodeimprimir.php");?><br>
					<?php
						include("require/config.php");
						$username=$_SESSION['username'];
						$sql = "SELECT * FROM login_admin WHERE user_name='$username'";
						$result = mysql_query($sql);
						while($row = mysql_fetch_assoc($result)) {
					?>

					<form name="usuario" action="usuario_info_update.php" method="post" onsubmit="if(isFormValid())alert('Todo ok'); else { alert('Algo esta mal completado');return false; }">
						<table cellpadding="0" cellspacing="0" border="0" class="striped">
							<!--
							<tr>
								<td class=""><h4>Profesional ID</h4></td>
								<td class=""><span class="input" ><?php echo $row['id'];?></span></td>
							</tr>
							-->
							<tr>
								<td class=""><h4>Nombre de usuario</h4></td>
								<td class=""><span class="input" ><?php echo strtoupper($row['user_name']);?></span>
								<input type="hidden" name="user_name" value="<?php echo $row['user_name'];?>"/>
								</td>
							</tr>							
							<tr>
								<td class=""><h4>Nombre</h4></td>
								<td class=""><input class="input" type="text" name="nombre" required="1" value="<?php echo $row['nombre'];?>"/></td>
							</tr>	
							<tr>
								<td class=""><h4>Apellido</h4></td>
								<td class=""><input class="input" type="text" name="apellido" required="1" value="<?php echo $row['apellido'];?>"/></td>
							</tr>
							<tr>
								<td class=""><h4>M.N.</h4></td>
								<td class=""><input class="input" type="text" name="mn" value="<?php echo $row['mn'];?>"/></td>
							</tr>
							<tr>
								<td class=""><h4>Telefono 1</h4></td>
								<td class=""><input class="input" type="phone" name="tel1" required="1" value="<?php echo $row['tel1'];?>"/></td>
							</tr>		
							<tr>
								<td class=""><h4>Telefono 2</h4></td>
								<td class=""><input class="input" type="phone" name="tel2" value="<?php echo $row['tel2'];?>"/></td>
							</tr>
							<tr>
								<td class=""><h4>Direccion</h4></td>
								<td class=""><input class="input" type="text" name="dir" required="1" value="<?php echo $row['dir'];?>"/></td>
							</tr>
							<tr>
								<td class=""><h4>e-Mail</h4></td>
								<td class=""><input class="input" type="email" name="email" mask="email" required="1" value="<?php echo $row['email'];?>"/></td>
							</tr>
							<tr>
								<td class=""><h4>Ultima modificacion</h4></td>
								<td class=""><span class="input" ><?php echo $row['lastin'];?></span>	<input class="input" type="hidden" name="fecha"  value="<?php echo date("Y-m-d G:i:s"); ?>"/>	</td>
							</tr>
						</table>
						<center>
							<input type="submit" name="submit" class="default" value="Actualizar"/>
						</center>
					</form>
					<?php	
					}
					?>
									
					</div>
					<div class="frame" id="logs"><?php include("usuario_logs.php");?></div>
					<div class="frame" id="clave"><?php include("usuario_pass_popup.php");?></div>
				</div>
			</div>
    
		</div>	
	</div>
</div>
</body>
</html>
