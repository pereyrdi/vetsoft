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
				<h2><i class="icon-support"></i>Navegacion</h2>
 				<div class="grid">
 					<div class="row">
 						<ul>
							<li><a href="#ingreso">Pagina de Ingreso</a></li>
							<li><a href="#menu">Pagina del menu</a></li>
							<li><a href="#inicial">Pagina principal</a></li>
						</ul>
					</div> 				
					<div class="row" align="center">
						<pre class='prettyprint'><a name="ingreso"><b>Pagina de Ingreso</b></a></pre>
						<p class="body-secondary-text">Se identificaran las partes principales del sistema para poder usarlo.</p>			
						<img src="etc/pagina_login.png" class="border-color-blueLight" width="650"><br>
					</div>
					<div class="row" align="center">
						<pre class='prettyprint'><a name="menu"><b>Pagina del menu</b></a></pre>
						<img src="etc/pagina_menu.png" class="border-color-blueLight" width="140"><br>
					</div>
					<div class="row" align="center">
						<pre class='prettyprint'><a name="inicial"><b>Pagina principal</b></a></pre>
						<p class="body-secondary-text">Al ingresar al sistema la pagina inicial informara los ingresos que hubo en el dia, ordenados por hora.<br>Ya sean vacunas, consultas y trabajos de peluqueria.</p>
						<img src="etc/pagina_principal2.png" class="border-color-blueLight"  width="650"><br>
						<p class="body-secondary-text">
						Entre parentesis esta el alias del usuario que realizo el ingreso y tambien los datos de la mascota y dueños. Se puede hacer click en el nombre del paciente y verlo en detalle.
						</p>
					</div>					
				</div>
			</div>
		</div>
	</div>
</body>
</html>