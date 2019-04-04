<?php include dirname(__FILE__).'/../require/session.php'; ?>
<html>
<head>
	<meta charset="utf-8">
	<meta name="description" content="Software minimalista de gestion veterinaria">
	<meta name="author" content="Diego Pereyra" >
	<meta name="keywords" content="veterinaria, gestion, alas, perros, gatos, vacunas">
		
	<title><?php include dirname(__FILE__).'/../require/title.alas'; ?>-Configuraciones del sistema</title>
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
				<h2><i class="icon-cog"></i>Configuraciones del sistema</h2>
				<p class="body-secondary-text">Al hacer click en <b>CONFIG</b> se expande en tres ocpiones:</p>
             <div class="grid span10">
                 <div class="row">                        
                     <div class="span5">
								<ul>
									<li><a href="#preferencias">Preferencias</A></li>
									<li><a href="#nuevomedico">Nuevo Medico</A></li>
									<li><a href="#medicos">Medicos</A></li>
								</ul>
                     </div>
                     <div class="span5"><img src="etc/conf.png" class="border-color-blueLight" height=""></div>
                 </div>
             </div>       
 				<div class="grid">
					<div class="row" align="center">
						<pre class='prettyprint'><a name="preferencias"><b>Preferencias</b></a></pre>
						<p class="body-secondary-text">...</p>
						<img src="etc/conf_preferencias_001.png" class="border-color-blueLight" width="500"><br>
						<p class="body-secondary-text">...</p>
						<img src="etc/conf_preferencias_002.png" class="border-color-blueLight" width="500"><br>
						<p class="body-secondary-text">...</p>
						<img src="etc/conf_preferencias_003.png" class="border-color-blueLight" width="500"><br>
						<p class="body-secondary-text">...</p>
						<img src="etc/conf_preferencias_004.png" class="border-color-blueLight" width="500"><br>
						<p class="body-secondary-text">...</p>
						<img src="etc/conf_preferencias_005.png" class="border-color-blueLight" width="500"><br>
					</div>
					<div class="row" align="center">
						<pre class='prettyprint'><a name="nuevomedico"><b>Nuevo Medico</b></a></pre>
						<p class="body-secondary-text">Todos los usuario que se den de alta tendran permisos de 'USUARIO' y no de 'ADMIN'. </p>
						<img src="etc/conf_altamedico.png" class="border-color-blueLight" height="500"><br>
					</div>
					<div class="row" align="center">
						<pre class='prettyprint'><a name="medicos"><b>Medicos</b></a></pre>
						<p class="body-secondary-text">...</p>
						<img src="etc/conf_medicos.png" class="border-color-blueLight" width="750"><br>
						<p class="body-secondary-text">...</p>
						<img src="etc/conf_medicos_logs.png" class="border-color-blueLight" width=""><br>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>