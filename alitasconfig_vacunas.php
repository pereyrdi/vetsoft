<?php include("require/session.php"); ?>
<?php if($_GET['msg']!='') echo '<div class="notification" id="notification" style="position: fixed; top: 0px; margin-left: 30%; background-color: yellow;"><i>'.$_GET['msg'].'</i></div>';  ?>
<html>  
	<head>  
		<?php include("header.php")?>
		<link rel="stylesheet" type="text/css" href="css/alta_validation.css" />
		<script type="text/javascript" src="js/alta_validation.js"></script>
		<script type="text/javascript" src="js/jquery.min.js"></script>		
		<script type="text/javascript" src="javascript/pagecontrol.js"></script>
		<script type="text/javascript"> $(document).ready(function(){	setTimeout(function(){	$("div.notification").fadeOut("slow", function () {	$("div.notification").remove();	});	}, 2000); });</script>
	</head>
<?php require("require/alasfun.php"); ?>	
<body class="modern-ui">
	<div class="page">
		<div class="page-region">
			<div class="page-region-content">
				<h2><i class="icon-cog"></i>Configuraciones para las vacunas</h2>
				<div class="page-control" data-role="page-control" style="margin-left:10px;width: 90%;">
					<ul>
						<li class="active"><a href="#2">Vacunas</a></li>
						<li><a href="#3">Estados Vacunas</a></li>
					</ul>
					<div class="frames">
						<div class="frame active" id="2"><?php include("alitasconfig_vac.php");?></div>
						<div class="frame" id="3"><?php include("alitasconfig_vac_status.php");?></div>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>

<h3>Configuracion de razas</h3>
<pre>Desde aqui se podra administrar una lista de razas para los perros y los gatos.</pre>