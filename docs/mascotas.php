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
				<h2><i class="icon-github"></i>Mascotas</h2>
				<p class="body-secondary-text">...</p>   
 				<div class="grid">
 					<div class="row">
 						<ul>
							<li><a href="#alta">Alta</a></li>
							<ul style="text-indent:20px;"><li><a href="#copy">Copiar cliente</a></li></ul>
							<li><a href="#busqueda">Busqueda</a></li>
							<li><a href="#ver">Ver Mascota</a></li>
							<li><a href="#agregar-info">Agregar info</a></li>
							<li><a href="#modificacion">Modificacion</a></li>
						</ul>
					</div>
					<div class="row" align="center">
						<pre class='prettyprint'><a name="alta"><b>Alta</b></a></pre>
						<p class="body-secondary-text">...</p>
						<img src="etc/mascota-agregar-0.png" class="border-color-blueLight" width=""><br>
						<img src="etc/mascota-nueva.png" class="border-color-blueLight" width="750"><br>
					</div>
					<div class="row" align="center">
						<pre class='prettyprint'><a name="copy"><b>Copiar cliente</b></a></pre>
						<p class="body-secondary-text">Esta funcion es util cuando se debe ingresar una mascota con un dueño ya existente, se mantienen los datos personales y hay que ingresar los datos del paciente.</p>
						<img src="etc/mascota-copiar1.png" class="border-color-blueLight" width=""><br>
						<p class="body-secondary-text">Desde el icono que figura aqui se abrira la venta de alta de mascota con los datos del dueño ya ingresados.	</p>
						<img src="etc/mascota-copiar2.png" class="border-color-blueLight" width=""><br>
					</div>					
					<div class="row" align="center">
						<pre class='prettyprint'><a name="busqueda"><b>Busqueda</b></a></pre>
						<p class="body-secondary-text">las busquedas instantaneas se realizan ingresando las letras que contengan al nombre de la mascota o el nombre, apellido del dueño.<br>Inmediatamente apareceran en el listado informando tambien la especie y el sexo.<br>Las mascotas fallecidas no aparecen en el listado.</p>
						<table><tr>
						<td align="center" valign="top"><img src="etc/mascota-busqueda.png"  class="border-color-blueLight" width=""><br></td>
						<td align="center" valign="top"><img src="etc/mascota-busqueda1.png" class="border-color-blueLight" width=""><br></td>
						</tr></table>
					</div>
					<div class="row" align="center">
						<pre class='prettyprint'><a name="ver"><b>Ver Mascota</b></a></pre>
						<p class="body-secondary-text">Informacion de la mascota, donde en los tres cuadros azules superiores se ve la informacion de la mascota y del dueño. Como tambien datos adicionales.</p>
						<p class="body-secondary-text">Abajo se observa un resumen de todo lo ingresado para la mascota. Se muestran solo los ultimos 10 registros.</p>
						<img src="etc/mascota-ver.png" class="border-color-blueLight" width="750"><br>
						<p class="body-secondary-text"><b>Historial clinico de consultas: </b>El total de registros clinicos de la mascota.</p>
						<img src="etc/mascota-ver-historias.png" class="border-color-blueLight" width="750"><br>
						<p class="body-secondary-text">Historial de vacunas</p>
						<p class="body-secondary-text"><b>Historial de vacunas: </b>El total de vacunas aplicadas.</p>
						<img src="etc/mascota-ver-vacunas.png" class="border-color-blueLight" width="750"><br>
						<p class="body-secondary-text"><b>Historial de trabajos en peluqueria: </b>El total de trabajos realizados en la peluqueria, corte, baño, etc..</p>
						<img src="etc/mascota-ver-peluqueria.png" class="border-color-blueLight" width="750"><br>
					</div>					
					<div class="row" align="center">
						<pre class='prettyprint'><a name="agregar-info"><b>Agregar info</b></a></pre>
						<p class="body-secondary-text"><b>Historial clinica: </b>Se completa el cuadro de texto con lo deseado y listo.</p>
						<img src="etc/mascota-agregar-1.png" class="border-color-blueLight" width="500"><br>
						<p class="body-secondary-text"><b>Vacunas: </b>Se elije la vacuna y se ingresa alguna nota.</p>
						<img src="etc/mascota-agregar-2.png" class="border-color-blueLight" width="500"><br>
						<p class="body-secondary-text"><b>Peluqueria: </b>Se elije el trabajo hecho y se debe ingresar una nota.</p>
						<img src="etc/mascota-agregar-3.png" class="border-color-blueLight" width="500"><br>
					</div>										
					<div class="row" align="center">
						<pre class='prettyprint'><a name="modificacion"><b>Modificacion</b></a></pre>
						<p class="body-secondary-text">Haciendo click en el dibuji de la llave se abre la pagina para editar a la mascota. Esta arriba a la derecha, en el ultimo cuadro azul.</p>
						<img src="etc/mascota-modificar0.png" class="border-color-blueLight" width=""><br>
						<p class="body-secondary-text">Se realizan las modificaciones y se da click en listo para actualizar los cambios.</p>
						<img src="etc/mascota-modificar.png" class="border-color-blueLight" width="750"><br>
					</div>					
				</div>
			</div>
		</div>
	</div>
</body>
</html>