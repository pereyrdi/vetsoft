<?php include("require/session.php"); ?>
<?php if($_GET['msg']!='') echo '<div class="notification" id="notification" style="position: fixed; top: 0px; margin-left: 30%; background-color: yellow;"><i>'.$_GET['msg'].'</i></div>';  ?>
<html>  
	<head>  
		<?php include("header.php")?>
		<script type="text/javascript" src="js/jquery.min.js"></script>		
		<script type="text/javascript" src="javascript/pagecontrol.js"></script>
		<script type="text/javascript"> $(document).ready(function(){	setTimeout(function(){	$("div.notification").fadeOut("slow", function () {	$("div.notification").remove();	});	}, 2000); });</script>	
	</head>
	<?php require("require/alasfun.php"); ?>	
	<body class="modern-ui">
		<div class="page">
			<div class="page-region">
				<div class="page-region-content">
				<h2><i class="icon-cog"></i>Configuracion de razas</h2>
					<div class="page-control" data-role="page-control" style="margin-left:10px;width: 90%;">
						<ul>
							<li class="active"><a href="#1">Caninas</a></li>
							<li><a href="#2">Felinas</a></li>
							<li><a href="#3">Otras</a></li>
						</ul>
						<div class="frames">
							<div class="frame active" id="1">
								<?php include("require/iconodeimprimir.php");?>
								<h4>Desde aqui se podra administrar una lista de razas para los perros.</h4>
							</div>
							<div class="frame" id="2">
								<?php include("require/iconodeimprimir.php");?>
								<h4>Desde aqui se podra administrar una lista de razas para los gatos.</h4>
							</div>
							<div class="frame" id="3">
								<?php include("require/iconodeimprimir.php");?>
								<h4>Desde aqui se podra administrar una lista de especies exoticas.</h4>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>