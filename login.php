<!DOCTYPE html>
<?php $msg = $_GET['msg']; ?>
<html>
<head>
	<?php include("header.php")?>
	<link href="css/site.css" rel="stylesheet" type="text/css">
	<script type="text/javascript" src="js/jquery.min.js"></script>
	<script type="text/javascript" src="javascript/accordion.js"></script>
	<script type="text/javascript">
		  $(document).ready(function(){
		   setTimeout(function(){
				  $("div.notification").fadeOut("slow", function () {
				  $("div.notification").remove();
		      });

				}, 2000);
		 });
</script>		
</head>
<body class="modern-ui">
	<div class="page">
		<div class="nav-bar bg-color-blueDark">
			<div class="nav-bar-inner padding10">
				<span class="element">
					<?php include("require/title.alas"); ?>&copy; by <a class="fg-color-white" href="mailto:diegomp777@gmail.com">Pereyra Diego</a> 2013
				</span>
			</div>
		</div>
		<div class="page-header">
			<div class="page-header-content">
				<h1><?php include("require/title.alas"); ?></h1>
			</div>
		</div>	
		<div class="page-region">
			<div class="page-region-content">
				<div class="offset1"><h3>Ingresa tus datos para iniciar sesion</h3>
					<form name="login" id="login" method="POST" action="login_check.php">
						<input class="input" type="hidden" name="fecha"  value="<?php echo date("Y-m-d G:i:s"); ?>"/>
						<div class="grid">
							<div class="row">
								<div class="span4">
									<h2>Usuario</h2>
									<div class="input-control text">
										<input type="text" placeholder="Ingrese su nombre de usuario" name="username"/>
										<button class="helper"></button>
									</div>
								</div>
								<div class="span4">
									<h2>Clave</h2>
									<div class="input-control password">
										<input type="password" placeholder="Ingrese su clave" name="password"/>
										<button class="helper"></button>
									</div>
								</div>
							</div>
							<input type="submit" name="submit" value="ENTRAR" />
						</div>
					</form>	
				</div>
			</div>
		</div>
		
		<div class="page-region-content">
				<ul class="accordion" data-role="accordion">
                    <li>
                        <a href="#">Sobre "<?php include("require/title.alas"); ?>" </a>
                        <div>
                            <h3>Sobre <?php include("require/title.alas"); ?></h3>
                            <p><b><?php include("require/title.alas"); ?></b> comenzo en marzo del 2001 utilizando ASP y descontinuado el mismo año.<br>
                            Y regreso durante el 2012 en un formato mas minimalista y sencillo, que sea facil de usar y poder administrar ficheros de mascotas de una veterinaria.
                            </p>
                        </div>
                    </li>
                    <li>
                        <a href="#">Navegadores soportados</a>
                        <div>
                            <h3>Navegadores soportados</h3>
							<div class="browsers-icons clearfix">
								<img src="images/ie.png" title="Internet Explorer 9+"/>
								<img src="images/chrome.png" title="Google Chrome"/>
								<img src="images/firefox.png" title="Firefox"/>
								<img src="images/opera.png" title="Opera"/>
							</div>                            
                            <p>Esta aplicacion es multiplataforma y puede utilizar en distintos navegadores sobre cualquier sistema operativo.</p>
                            <p>Con la version 9 del IE no anda bien...</p>
                        </div>
                    </li>
                    <li>
                        <a href="#">Recursos utilizados</a>
                        <div>
                            <h3>Recursos utilizados</h3>
                            <p>La aplicacion se desarrollo utilizando los lenguajes PHP, HTML, JavaScript, MySQL, Ajax.</p>
                            <div class="grid">
								<div class="row span10">
									<div class="span4">
									<ul>
										<li><b>Style CSS: </b><a href="http://metroui.org.ua/" title="">Metro-UI-CSS</a></li>
										<li><b>CSS Script: </b><a href="" title="">Boxy</a></li>
										<li><b>PHP SCript: </b><a href="http://jquery.com" title="">Jquery</a></li>
										<li><b>: </b><a href="" title=""></a></li>
									</ul>
									</div>
									<div class="span6">
									<ul>
										<li><b>Chart Script: </b><a href="www.highcharts.com" title="">High Charts</a></li>
										<li><b>Calendar Script: </b><a href="http://yellow5.us/projects/datechooser/" title="">DateChooser 2.11</a></li>
										<li><b>Referencias: </b><a href="www.dhtmlgoodies.com/" title="">DHTML, Ajax And Javascript Code Library</a></li>
										<li><b>: </b><a href="" title=""></a></li>
									</ul>
									</div>									
								</div>
                            </div>
                        </div>
                    </li>                      
                    <li>
                        <a href="#">Licencias</a>
                        <div>
							<img src="images/garland_logo.png" class="place-right" style="margin: 10px;"/>
                            <h3>The MIT License</h3>
							<p>Copyright (c) 2013 Pereyra Diego (diegomp777@gmail.com)</p>							

							<p>Permission is hereby granted, free of charge, to any person obtaining a copy
							of this software and associated documentation files (the "Software"), to deal
							in the Software without restriction, including without limitation the rights
							to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
							copies of the Software, and to permit persons to whom the Software is
							furnished to do so, subject to the following conditions:</p>

							<p>The above copyright notice and this permission notice shall be included in
							all copies or substantial portions of the Software.</p>

							<p>THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
							IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
							FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT.  IN NO EVENT SHALL THE
							AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
							LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
							OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
							THE SOFTWARE.</p>                            
                            <p><b></b><a href="http://opensource.org/licenses/MIT" title="The MIT License (MIT)">The MIT License (MIT)</a></p>
                        </div>
                    </li>                    
                </ul>
		</div>
		<?php if($msg!='') echo '<div class="notification" id="notification" style="position: fixed; top: 0px; margin-left: 30%; background-color: yellow;"><i>'.$msg.'</i></div>'; ?>
	</div>
</body>
</html>
