<?php include("require/session.php"); ?>
<html>
<head>
	<?php include("header.php")?>
</head>

<body class="modern-ui">
	<div class="page">
		<div class="page-region">
			<div class="page-region-content">
				<div class="page-sidebar">
					<ul class="sub-menu light">
						<li><a href="docs/navegacion.php" target="docs_content" title="Navegacion por "><i class="icon-support"></i> <b>Navegacion...</b></a></li>
						<!-- <li><a href="docs/paginainicial.php" target="docs_content" title=""><i class="icon-home"></i> <b>Pagina inicial...</b></a></li> -->				
						<?php if($_SESSION['username']=="admin"){?>
						
						<li><a href="docs/conf.php" target="docs_content" title=""><i class="icon-cog"></i> <b>Configuracion...</b></a>
							<ul class="sub-menu light" style="margin-left:20px;">
								<li><a href="docs/conf.php#preferencias" target="docs_content" title="">Preferencias...</a></li>
								<li><a href="docs/conf.php#nuevomedico" target="docs_content" title="">Nuevo Medico...</a></li>
								<li><a href="docs/conf.php#medicos" target="docs_content" title="">Medicos...</a></li>
							</ul>
						</li>
										
						<?php } ?> 
		
						<li><a href="docs/usuario.php" target="docs_content" title=""><i class="icon-user-2"></i> <b>Usuario...</b></a>
							<ul class="sub-menu light" style="margin-left:20px;">
								<li><a href="docs/usuario.php#verinfo" target="docs_content" title="">Ver informacion...</a></li>
								<li><a href="docs/usuario.php#logs" target="docs_content" title="">Historial de accesos...</a></li>
								<li><a href="docs/usuario.php#clave" target="docs_content" title="">Cambio de clave...</a></li>
							</ul>
						</li>
						<li><a href="docs/mascotas.php" target="docs_content" title=""><i class="icon-github"></i> <b>Mascotas...</b></a>
							<ul class="sub-menu light" style="margin-left:20px;">
								<li><a href="docs/mascotas.php#alta" target="docs_content" title="">Alta...</a></li>
								<li><a href="docs/mascotas.php#busqueda" target="docs_content" title="">Busqueda...</a></li>							
								<li><a href="docs/mascotas.php#ver" target="docs_content" title="">Ver...</a></li>
								<li><a href="docs/mascotas.php#agregar-info" target="docs_content" title="">Agregar info...</a></li>
								<li><a href="docs/mascotas.php#modificacion" target="docs_content" title="">Modificacion...</a></li>
							</ul>
						</li>
						<li><a href="docs/reportes.php" target="docs_content" title=""><i class="icon-chart-alt"></i> <b>Reportes...</b></a>
							<ul class="sub-menu light" style="margin-left:20px;">
								<li><a href="docs/reportes.php#acceso" target="docs_content" title="">Acceso...</a></li>
								<li><a href="docs/reportes.php#listado" target="docs_content" title="">Listado...</a></li>
								<li><a href="docs/reportes.php#ejecucion" target="docs_content" title="">Ejecucion...</a></li>
								<li><a href="docs/reportes.php#opciones" target="docs_content" title="">Opciones...</a></li>
							</ul>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</body>
</html>
