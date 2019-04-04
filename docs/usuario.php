<?php include dirname(__FILE__).'/../require/session.php'; ?>
<html>
<head>
	<meta charset="utf-8">
	<meta name="description" content="Software minimalista de gestion veterinaria">
	<meta name="author" content="Diego Pereyra" >
	<meta name="keywords" content="veterinaria, gestion, alas, perros, gatos, vacunas">
		
	<title><?php include dirname(__FILE__).'/../require/title.alas'; ?></title>
	<link href="../css/modern.css" rel="stylesheet">
	<link href="../css/modern-responsive.css" rel="stylesheet">
	
	<link rel="icon" href="../favicon.ico" type="image/x-icon">
	<link rel="shortcut icon" href="../favicon.ico" type="image/x-icon"> 
</head>

<body class="modern-ui">
	<div class="page">
		<div class="page-region">
			<div class="page-region-content">
				<div class="prettyprint" align="right"><a href="javascript:window.print()" title="Imprimir"><i class="icon-printer"></i></a>&nbsp;</div>			
				<h2><i class="icon-user-2"></i>Usuarios</h2>
				<p class="body-secondary-text">...</p>   
 				<div class="grid">
 					<div class="row">
 						<ul>
							<li><a href="#verinfo">Ver informacion</a></li>
							<li><a href="#logs">Historial de accesos</a></li>
							<li><a href="#clave">Cambio de clave</a></li>
						</ul>
					</div>
					<div class="row" align="center">
						<pre class='prettyprint'><a name="verinfo"><b>Ver informacion</b></a></pre>
						<p class="body-secondary-text">Salvo el numero de MN y el telefono secundario, todos los campos son obligatorios. No se pude cambiar al nombre de usuario.</p>
						<img src="etc/usuario-info.png" class="border-color-blueLight" width=""><br>
					</div>
					<div class="row" align="center">
						<pre class='prettyprint'><a name="logs"><b>Historial de accesos</b></a></pre>
						<p class="body-secondary-text">Se muestran los ultimos 15 accesos.</p>
						<img src="etc/usuario-logs.png" class="border-color-blueLight" width=""><br>
					</div>					
					<div class="row" align="center">
						<pre class='prettyprint'><a name="clave"><b>Cambio de clave</b></a></pre>
						<p class="body-secondary-text">Se debe ingresar la clave actual correctamente para cambiarla, y no debe tener menos de tres letras.</p>
						<img src="etc/usuario-clave.png" class="border-color-blueLight" width=""><br>
						<p class="body-secondary-text">Si todo esta bien escrito se puede actualizar la clave.</p>
						<img src="etc/usuario-claveok.png" class="border-color-blueLight" width=""><br>
					</div>				
				</div>
			</div>
		</div>
	</div>
</body>
</html>