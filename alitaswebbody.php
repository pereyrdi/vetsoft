<!DOCTYPE html>
<?php include("require/session.php"); ?>
<?php
	include("require/config.php");
	require("require/alasfun.php");
	$usuario=$_SESSION['username'];
	//echo $_SESSION['username'];
	//echo $usuario;
	$sql = "SELECT nombre,apellido FROM login_admin WHERE user_name='$usuario'";
	$result = mysql_query($sql);
	while($row = mysql_fetch_assoc($result)) {
		$user_nombre=$row['nombre'];
		$user_apellido=$row['apellido'];
		$user_lastin=$row['lastin'];
	}
	//busco anteultimo registro de ingreso, y si da cero? es la 1ra vez!
	$sql="SELECT log_datetime FROM login_logs WHERE log_username='$usuario' ORDER BY log_datetime DESC LIMIT 1 OFFSET 1";
	$result = mysql_query($sql);
	
	if (mysql_num_rows($result) == 0) { 
		$msg="Hoy es su primera vez en el sistema!!!";
	}
	if (mysql_num_rows($result) >= 1) { 
		while($row = mysql_fetch_assoc($result)) {
				$user_lastin=substr($row['log_datetime'],8,2)."/".substr($row['log_datetime'],5,2)."/".substr($row['log_datetime'],0,4);
			}
		
		$msg="Su ultimo ingreso fue el ".$user_lastin.".";
	}
?> 
<html>
	<head>
		<?php include("header.php")?>
		<style type="text/css">
			._holder {
			    width: 52px;
			    height: 94px;
			    position: relative;
			    margin:0px 20px 20px 20px;
			    font-family: "Helvetica Neue", Arial, Helvetica, sans-serif;
			    float: left;
			}
			._month {
			    width: 50px;
			    height: 25px;
			    border: 1px solid rgba(0,0,0,0.25);
			    -webkit-border-top-left-radius: 6px;
			    -webkit-border-top-right-radius: 6px;
			    -moz-border-radius-topleft: 6px;
			    -moz-border-radius-topright: 6px;
			    border-top-left-radius: 6px;
			    border-top-right-radius: 6px;
			    box-shadow: inset 0px 1px 1px 0px rgba(255,255,255,0.4);
			}
			._month p {
			    text-align: center;
			    color: white;
			    font-size: 11px;
			    font-weight: 600;
			    text-shadow: 1px 1px 0px rgba(0,0,0,0.40);
			    margin: 5px 0 0 0;
			    border-bottom: 1px dashed rgba(0,0,0,0.30);
			    margin: 5px 8px 0px 8px;
			    padding: 0 0 1px 0;
			}
			._day {
			    width: 50px;
			    height: 45px;
			    border: 1px solid rgba(0,0,0,0.25);
			    -webkit-border-bottom-right-radius: 6px;
			    -webkit-border-bottom-left-radius: 6px;
			    -moz-border-radius-bottomright: 6px;
			    -moz-border-radius-bottomleft: 6px;
			    border-bottom-right-radius: 6px;
			    border-bottom-left-radius: 6px;
			    background: white;
			    background: url(data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiA/Pgo8c3ZnIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgd2lkdGg9IjEwMCUiIGhlaWdodD0iMTAwJSIgdmlld0JveD0iMCAwIDEgMSIgcHJlc2VydmVBc3BlY3RSYXRpbz0ibm9uZSI+CiAgPGxpbmVhckdyYWRpZW50IGlkPSJncmFkLXVjZ2ctZ2VuZXJhdGVkIiBncmFkaWVudFVuaXRzPSJ1c2VyU3BhY2VPblVzZSIgeDE9IjAlIiB5MT0iMCUiIHgyPSIwJSIgeTI9IjEwMCUiPgogICAgPHN0b3Agb2Zmc2V0PSIwJSIgc3RvcC1jb2xvcj0iI2ZmZmZmZiIgc3RvcC1vcGFjaXR5PSIxIi8+CiAgICA8c3RvcCBvZmZzZXQ9IjEwMCUiIHN0b3AtY29sb3I9IiNmN2Y3ZjciIHN0b3Atb3BhY2l0eT0iMSIvPgogIDwvbGluZWFyR3JhZGllbnQ+CiAgPHJlY3QgeD0iMCIgeT0iMCIgd2lkdGg9IjEiIGhlaWdodD0iMSIgZmlsbD0idXJsKCNncmFkLXVjZ2ctZ2VuZXJhdGVkKSIgLz4KPC9zdmc+);
			    background: -moz-linear-gradient(top, rgba(255, 255, 255, 1) 0%, rgba(247, 247, 247, 1) 100%);
			    background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,rgba(255, 255, 255, 1)), color-stop(100%,rgba(247, 247, 247, 1)));
			    background: -webkit-linear-gradient(top, rgba(255, 255, 255, 1) 0%,rgba(247, 247, 247, 1) 100%);
			    background: -o-linear-gradient(top, rgba(255, 255, 255, 1) 0%,rgba(247, 247, 247, 1) 100%);
			    background: -ms-linear-gradient(top, rgba(255, 255, 255, 1) 0%,rgba(247, 247, 247, 1) 100%);
			    background: linear-gradient(top, rgba(255, 255, 255, 1) 0%,rgba(247, 247, 247, 1) 100%);
			    filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#ffffff', endColorstr='#f7f7f7',GradientType=0 );
			    box-shadow: 0px 1px 0px 0px #fff, 0px 2px 0px 0px #ccc,0px 3px 0px 0px #fff, 0px 4px 0px 0px #ccc;
			}
			._day p {
			    text-align: center;
			    font-size: 24px;
			    font-weight: 700;
			    color: #444;
			    text-shadow: 1px 1px 0px white;
			    margin-top: 8px;
			}
			._red{
			 	background: rgb(169,3,41);
				background: url(data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiA/Pgo8c3ZnIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgd2lkdGg9IjEwMCUiIGhlaWdodD0iMTAwJSIgdmlld0JveD0iMCAwIDEgMSIgcHJlc2VydmVBc3BlY3RSYXRpbz0ibm9uZSI+CiAgPGxpbmVhckdyYWRpZW50IGlkPSJncmFkLXVjZ2ctZ2VuZXJhdGVkIiBncmFkaWVudFVuaXRzPSJ1c2VyU3BhY2VPblVzZSIgeDE9IjAlIiB5MT0iMCUiIHgyPSIwJSIgeTI9IjEwMCUiPgogICAgPHN0b3Agb2Zmc2V0PSIwJSIgc3RvcC1jb2xvcj0iI2E5MDMyOSIgc3RvcC1vcGFjaXR5PSIxIi8+CiAgICA8c3RvcCBvZmZzZXQ9IjQ0JSIgc3RvcC1jb2xvcj0iIzhmMDIyMiIgc3RvcC1vcGFjaXR5PSIxIi8+CiAgICA8c3RvcCBvZmZzZXQ9IjEwMCUiIHN0b3AtY29sb3I9IiM2ZDAwMTkiIHN0b3Atb3BhY2l0eT0iMSIvPgogIDwvbGluZWFyR3JhZGllbnQ+CiAgPHJlY3QgeD0iMCIgeT0iMCIgd2lkdGg9IjEiIGhlaWdodD0iMSIgZmlsbD0idXJsKCNncmFkLXVjZ2ctZ2VuZXJhdGVkKSIgLz4KPC9zdmc+);
				background: -moz-linear-gradient(top,  rgba(169,3,41,1) 0%, rgba(143,2,34,1) 44%, rgba(109,0,25,1) 100%);
				background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,rgba(169,3,41,1)), color-stop(44%,rgba(143,2,34,1)), color-stop(100%,rgba(109,0,25,1)));
				background: -webkit-linear-gradient(top,  rgba(169,3,41,1) 0%,rgba(143,2,34,1) 44%,rgba(109,0,25,1) 100%);
				background: -o-linear-gradient(top,  rgba(169,3,41,1) 0%,rgba(143,2,34,1) 44%,rgba(109,0,25,1) 100%);
				background: -ms-linear-gradient(top,  rgba(169,3,41,1) 0%,rgba(143,2,34,1) 44%,rgba(109,0,25,1) 100%);
				background: linear-gradient(top,  rgba(169,3,41,1) 0%,rgba(143,2,34,1) 44%,rgba(109,0,25,1) 100%);
				filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#a90329', endColorstr='#6d0019',GradientType=0 );
			}
			._green {
				background: rgb(138,182,107);
				background: url(data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiA/Pgo8c3ZnIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgd2lkdGg9IjEwMCUiIGhlaWdodD0iMTAwJSIgdmlld0JveD0iMCAwIDEgMSIgcHJlc2VydmVBc3BlY3RSYXRpbz0ibm9uZSI+CiAgPGxpbmVhckdyYWRpZW50IGlkPSJncmFkLXVjZ2ctZ2VuZXJhdGVkIiBncmFkaWVudFVuaXRzPSJ1c2VyU3BhY2VPblVzZSIgeDE9IjAlIiB5MT0iMCUiIHgyPSIwJSIgeTI9IjEwMCUiPgogICAgPHN0b3Agb2Zmc2V0PSIwJSIgc3RvcC1jb2xvcj0iIzhhYjY2YiIgc3RvcC1vcGFjaXR5PSIxIi8+CiAgICA8c3RvcCBvZmZzZXQ9IjEwMCUiIHN0b3AtY29sb3I9IiMzOTgyMzUiIHN0b3Atb3BhY2l0eT0iMSIvPgogIDwvbGluZWFyR3JhZGllbnQ+CiAgPHJlY3QgeD0iMCIgeT0iMCIgd2lkdGg9IjEiIGhlaWdodD0iMSIgZmlsbD0idXJsKCNncmFkLXVjZ2ctZ2VuZXJhdGVkKSIgLz4KPC9zdmc+);
				background: -moz-linear-gradient(top,  rgba(138,182,107,1) 0%, rgba(57,130,53,1) 100%);
				background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,rgba(138,182,107,1)), color-stop(100%,rgba(57,130,53,1)));
				background: -webkit-linear-gradient(top,  rgba(138,182,107,1) 0%,rgba(57,130,53,1) 100%);
				background: -o-linear-gradient(top,  rgba(138,182,107,1) 0%,rgba(57,130,53,1) 100%);
				background: -ms-linear-gradient(top,  rgba(138,182,107,1) 0%,rgba(57,130,53,1) 100%);
				background: linear-gradient(top,  rgba(138,182,107,1) 0%,rgba(57,130,53,1) 100%);
				filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#8ab66b', endColorstr='#398235',GradientType=0 );
			}
			._blue {
				background: rgb(79,133,187);
				background: url(data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiA/Pgo8c3ZnIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgd2lkdGg9IjEwMCUiIGhlaWdodD0iMTAwJSIgdmlld0JveD0iMCAwIDEgMSIgcHJlc2VydmVBc3BlY3RSYXRpbz0ibm9uZSI+CiAgPGxpbmVhckdyYWRpZW50IGlkPSJncmFkLXVjZ2ctZ2VuZXJhdGVkIiBncmFkaWVudFVuaXRzPSJ1c2VyU3BhY2VPblVzZSIgeDE9IjAlIiB5MT0iMCUiIHgyPSIwJSIgeTI9IjEwMCUiPgogICAgPHN0b3Agb2Zmc2V0PSIwJSIgc3RvcC1jb2xvcj0iIzRmODViYiIgc3RvcC1vcGFjaXR5PSIxIi8+CiAgICA8c3RvcCBvZmZzZXQ9Ijk5JSIgc3RvcC1jb2xvcj0iIzI0NTg4YyIgc3RvcC1vcGFjaXR5PSIxIi8+CiAgPC9saW5lYXJHcmFkaWVudD4KICA8cmVjdCB4PSIwIiB5PSIwIiB3aWR0aD0iMSIgaGVpZ2h0PSIxIiBmaWxsPSJ1cmwoI2dyYWQtdWNnZy1nZW5lcmF0ZWQpIiAvPgo8L3N2Zz4=);
				background: -moz-linear-gradient(top,  rgba(79,133,187,1) 0%, rgba(36,88,140,1) 99%);
				background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,rgba(79,133,187,1)), color-stop(99%,rgba(36,88,140,1)));
				background: -webkit-linear-gradient(top,  rgba(79,133,187,1) 0%,rgba(36,88,140,1) 99%);
				background: -o-linear-gradient(top,  rgba(79,133,187,1) 0%,rgba(36,88,140,1) 99%);
				background: -ms-linear-gradient(top,  rgba(79,133,187,1) 0%,rgba(36,88,140,1) 99%);
				background: linear-gradient(top,  rgba(79,133,187,1) 0%,rgba(36,88,140,1) 99%);
				filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#4f85bb', endColorstr='#24588c',GradientType=0 );
			}
			._yellow {
				background: rgb(255,203,73);
				background: url(data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiA/Pgo8c3ZnIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgd2lkdGg9IjEwMCUiIGhlaWdodD0iMTAwJSIgdmlld0JveD0iMCAwIDEgMSIgcHJlc2VydmVBc3BlY3RSYXRpbz0ibm9uZSI+CiAgPGxpbmVhckdyYWRpZW50IGlkPSJncmFkLXVjZ2ctZ2VuZXJhdGVkIiBncmFkaWVudFVuaXRzPSJ1c2VyU3BhY2VPblVzZSIgeDE9IjAlIiB5MT0iMCUiIHgyPSIwJSIgeTI9IjEwMCUiPgogICAgPHN0b3Agb2Zmc2V0PSIxJSIgc3RvcC1jb2xvcj0iI2ZmY2I0OSIgc3RvcC1vcGFjaXR5PSIxIi8+CiAgICA8c3RvcCBvZmZzZXQ9IjEwMCUiIHN0b3AtY29sb3I9IiNmOGI1MDAiIHN0b3Atb3BhY2l0eT0iMSIvPgogIDwvbGluZWFyR3JhZGllbnQ+CiAgPHJlY3QgeD0iMCIgeT0iMCIgd2lkdGg9IjEiIGhlaWdodD0iMSIgZmlsbD0idXJsKCNncmFkLXVjZ2ctZ2VuZXJhdGVkKSIgLz4KPC9zdmc+);
				background: -moz-linear-gradient(top,  rgba(255,203,73,1) 1%, rgba(248,181,0,1) 100%);
				background: -webkit-gradient(linear, left top, left bottom, color-stop(1%,rgba(255,203,73,1)), color-stop(100%,rgba(248,181,0,1)));
				background: -webkit-linear-gradient(top,  rgba(255,203,73,1) 1%,rgba(248,181,0,1) 100%);
				background: -o-linear-gradient(top,  rgba(255,203,73,1) 1%,rgba(248,181,0,1) 100%);
				background: -ms-linear-gradient(top,  rgba(255,203,73,1) 1%,rgba(248,181,0,1) 100%);
				background: linear-gradient(top,  rgba(255,203,73,1) 1%,rgba(248,181,0,1) 100%);
				filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#ffcb49', endColorstr='#f8b500',GradientType=0 );
			}

		</style>
		<script type="text/javascript" src="js/jquery.min.js"></script>
		<script type="text/javascript" src="javascript/pagecontrol.js"></script>
	</head>
	<body class="modern-ui">
		<div class="page">
			<div class="page-region">
				<div class="page-region-content">
				
					<div class="grid" style="width:100%;">
				   	<div class="row">
				   		<div style="float:left;"><h2><i class="icon-home"></i>Bienvenido/a <?php echo $user_apellido; ?>, <?php echo $user_nombre; ?></h2></div>
				   		<div style="float:right;"><i><?php echo $msg; ?></i></div>
				   	</div>
				   </div>
					
					<div>
						<div style="width:100px;float:left;display:inline-block;">
							<div class="_holder"><div class="_month _yellow"><p><?php echo date('M'); ?></p></div><div class="_day"><p><?php echo date('d'); ?></p></div></div>
						</div>
					   <div style="margin-left:100px;">
							<?php include("procedure_pacientesdeldia.php"); ?>
						</div>
					</div>
					<br><br><br>
					<div>			
						<div style="width:100px;float:left;display:inline-block;">
							<div class="_holder"><div class="_month _green"><p><?php echo date("M", strtotime( '-1 days' ) ); ?></p></div><div class="_day"><p><?php echo date("d", strtotime( '-1 days' ) ); ?></p></div></div>
						</div>
					   <div style="margin-left:100px;">
							<?php include("procedure_pacientesdeayer.php");?>
						</div>
					</div>
	
				</div>
			</div>
		</div>
	</body>
</html>
