<?php include("require/session.php"); ?>
<?php if($_GET['msg']!='') echo '<div class="notification" id="notification" style="position: fixed; top: 0px; margin-left: 30%; background-color: yellow;"><i>'.$_GET['msg'].'</i></div>';  ?>
<?php
	include("require/config.php");
	include("require/alasfun.php");
?>
<html>
	<head>
		<?php include("header.php")?>
		<script type="text/javascript" src="js/jquery.min.js"></script>
		<style type="text/css">
			.question{
				cursor:pointer;		/* Cursor is like a hand when someone rolls the mouse over the question */
			}
			input {
			 height: 19px;
			 width: 80px;
			 }
			.answer{
				display:none;	
			}
		</style>
		<script type="text/javascript">
			function showHideAnswer()
			{
				var numericID = this.id.replace(/[^\d]/g,'');
				var obj = document.getElementById('a' + numericID);
				if(obj.style.display=='block'){
					obj.style.display='none';
				}else{
					obj.style.display='block';
				}		
			}
			
			
			function initShowHideContent()
			{
				var divs = document.getElementsByTagName('DIV');
				for(var no=0;no<divs.length;no++){
					if(divs[no].className=='question'){
						divs[no].onclick = showHideAnswer;
					}	
					
				}	
			}
			
			window.onload = initShowHideContent;
		</script>
		<script type="text/javascript" src="javascript/pagecontrol.js"></script>
		<script type="text/javascript"> $(document).ready(function(){	setTimeout(function(){	$("div.notification").fadeOut("slow", function () {	$("div.notification").remove();	});	}, 2000); });</script>
	</head>
	<body class="modern-ui">
	<div class="page">

		<div class="page-region">
			<div class="page-region-content">
				
				<h2><i class="icon-user-2"></i>Usuarios</h2>				
				<div class="page-control" data-role="page-control" style="margin-left:10px;width: 90%;">
					
					<ul>
						<li class="active"><a href="#11">Listado de usuarios</a></li>
						<li><a href="#22">Estadisticas de usuarios</a></li>
					</ul>
					
					<div class="frames">
						<div class="frame active" id="11">
								<?php include("require/iconodeimprimir.php");?>
							<h4><i>Es recomendable que la clave sea mayor a 4 caracteres</i></h4>			
							<table border="0" class="striped" width="500">
							<tr>
								<!--
								<td width="" align="center" style="background-color:#eeeDDD;" class="tertiary-text"><B>Id</B></td>
								-->
								<td width="" align="center" style="background-color:#eeeDDD;" class="tertiary-text"><B>USUARIO</B></td>
								<td width="" align="center" style="background-color:#eeeDDD;" class="tertiary-text"><B>APELLIDO, NOMBRE</B></td>
								<td width="" align="center" style="background-color:#eeeDDD;" class="tertiary-text"><B>CLAVE</B></td>
								<td width="" align="center" style="background-color:#eeeDDD;" class="tertiary-text"><B>M.N.</B></td>			
								<td width="" align="center" style="background-color:#eeeDDD;" class="tertiary-text"><B>ULTIMA MOD.</B></td>
								<td width="" align="center" style="background-color:#eeeDDD;" class="tertiary-text"><B>TELEFONOS</B></td>
								<td width="" align="center" style="background-color:#eeeDDD;" class="tertiary-text"><B>DIRECCION</B></td>
								<td width="" align="center" style="background-color:#eeeDDD;" class="tertiary-text"><B>EMAIL</B></td>
								<td width="" align="center" style="background-color:#eeeDDD;" class="tertiary-text"><B>LOGS</B></td>
							</tr>
							<?php
								$sql="SELECT * FROM  login_admin ORDER BY id ASC";
								$result = mysql_query($sql);
								while($row = mysql_fetch_assoc($result)) {
									?>
									<tr>
									<!--
										<td align="center" width="" valign="top" class="tertiary-text"><?php echo $row['id'];?></td>
									-->
										<td align="center" width="" valign="top" class="tertiary-text"><?php echo $row['user_name'];?></td>
										<td align="center" width="" valign="top" class="tertiary-text"><?php echo "".strtoupper($row['apellido']).", ".strtoupper($row['nombre'])."";?></td>
										<td align="center" width="" valign="top" class="tertiary-text">******<br>
										
										<div id="q<?php echo $row['id'];?>" class="question"><a href="#"><i><small>cambiar</small></i></a></div>
										<div id="a<?php echo $row['id'];?>" class="answer">
											<form name="cambioclave_<?php echo $row['id'];?>" action="usuario_config_clavepost.php" method="post" onsubmit="if(isFormValid())alert('Todo ok'); else { alert('Algo esta mal completado');return false; }">
												<input type="password" name="usuario_password" value="" required="1"/><br>
					 							<input type="hidden" name="usuario_id" value="<?php echo $row['id'];?>">
					 							<input type="hidden" name="usuario_name" value="<?php echo $row['user_name'];?>">
					 							<input class="input" type="hidden" name="fecha"  value="<?php echo date("Y-m-d G:i:s"); ?>"/>	
												<button class="mini" onclick="document.getElementById('cambioclave_<?php echo $row['id'];?>').doNotSubmit();">Actualizar clave</button>
											</form>
										</div>
										</td>
										<td align="center" width="" valign="top" class="tertiary-text"><?php echo $row['mn'];?></td>
										<td align="center" width="" valign="top" class="tertiary-text"><?php echo $row['lastin'];?></td>
										<td align="center" width="" valign="top" class="tertiary-text"><?php if($row['tel1'] == 0) { echo "-"; } else { echo $row['tel1']; } ?><?php if($row['tel2'] == 0) { echo ""; } else { echo "<br>".$row['tel2']; } ?></td>
										<td align="center" width="" valign="top" class="tertiary-text"><?php echo $row['dir'];?></td>
										<td align="center" width="" valign="top" class="tertiary-text"><?php if(!($row['email'] == NULL))  { echo $row['email']; } else { echo "-"; }?></td>
										<td align="center" width="" valign="top" class="tertiary-text"><a href="usuario_config_logs.php?username=<?php echo $row['user_name'];?>" target="central" title="Ver todos los accesos de este usuario">Ver logs</a></td>
									</tr>
									<?php
							}	
							?>
							</table>
						
						</div>
						<div class="frame" id="22">
						<?php include("require/iconodeimprimir.php");?>
						<h4>Cantidad de registros ingresados por cada usuario.</h4>
						<?php
						$sql="SELECT *
							FROM (	 ( SELECT vetecol, medico, COUNT(medico) FROM historias GROUP by medico )
							UNION ALL ( SELECT vetecol, medico, COUNT(medico) FROM peluqueria GROUP by medico)
							UNION ALL ( SELECT vetecol, medico, COUNT(medico) FROM vacunas GROUP by medico )
						)results ORDER BY vetecol ASC";
						
						$result = mysql_query($sql);
						
						$count_hpv = array(); 
						while($row = mysql_fetch_assoc($result)) {
							$count_hpv[ $row['vetecol'].$row['medico'] ] = $row['COUNT(medico)'];
						}
											
						//print "<pre>";
						//print_r($count_hpv);
						//print "</pre>";
						
						?>
	 						<!-- ### HISTORIAS ### -->
							<table border="0" class="bordered" width="500">
								<tr>
									<td width="10%" align="center" style="background-color:#eeeDDD;" class="tertiary-text"><B>HISTORIAS</B></td>
									<td width="" align="center" style="background-color:#eeeDDD;" class="tertiary-text"><B>USUARIO</B></td>
									<td width="5%" align="center" style="background-color:#eeeDDD;" class="tertiary-text"><B>CANTIDAD</B></td>
								</tr>
								<?php
								$i=0;
								foreach ($count_hpv as $j => $k) {			
									if ($j[0] == 1) {
										?>	    	
										<tr>
											<td align="center" width="" valign="top" class="tertiary-text">&nbsp; </td>
											<td align="center" width="" valign="top" class="tertiary-text"><?php echo strtoupper(substr($j, 1)); ?></td>
											<td align="center" width="" valign="top" class="tertiary-text"><?php echo $k; ?></td>
								      </tr>
								      <?php
								      $i=$i+$k;
									}
								}
								?>	    	
								<tr>
									<td align="center" width="" valign="top" class="tertiary-text" colspan="2">&nbsp; </td>
									<td align="center" width="" valign="top" class="tertiary-text bg-color-orange"><b><?php echo $i; ?></b></td>
						      </tr>
							</table>
	 						<!-- ### PELU ### -->
							<table border="0" class="bordered" width="500">
								<tr>
									<td width="10%" align="center" style="background-color:#eeeDDD;" class="tertiary-text"><B>PELUQUERIA</B></td>
									<td width="" align="center" style="background-color:#eeeDDD;" class="tertiary-text"><B>USUARIO</B></td>
									<td width="5%" align="center" style="background-color:#eeeDDD;" class="tertiary-text"><B>CANTIDAD</B></td>
								</tr>
								<?php
								$i=0;
								foreach ($count_hpv as $j => $k) {			
									if ($j[0] == 2) {
										?>	    	
										<tr>
											<td align="center" width="" valign="top" class="tertiary-text">&nbsp; </td>
											<td align="center" width="" valign="top" class="tertiary-text"><?php echo strtoupper(substr($j, 1)); ?></td>
											<td align="center" width="" valign="top" class="tertiary-text"><?php echo $k; ?></td>
								       </tr>
								      <?php
										$i=$i+$k;
									}
								}
								?>
								<tr>
									<td align="center" width="" valign="top" class="tertiary-text" colspan="2">&nbsp; </td>
									<td align="center" width="" valign="top" class="tertiary-text bg-color-orange"><b><?php echo $i; ?></b></td>
						      </tr>
							</table>
	 						<!-- ### VACUNAS ### -->							
							<table border="0" class="bordered" width="500">
								<tr>
									<td width="10%" align="center" style="background-color:#eeeDDD;" class="tertiary-text"><B>VACUNAS</B></td>
									<td width="" align="center" style="background-color:#eeeDDD;" class="tertiary-text"><B>USUARIO</B></td>
									<td width="5%" align="center" style="background-color:#eeeDDD;" class="tertiary-text"><B>CANTIDAD</B></td>
								</tr>
								<?php
								$i=0;
								foreach ($count_hpv as $j => $k) {			
									if ($j[0] == 3) {
										?>	    	
										<tr>
											<td align="center" width="" valign="top" class="tertiary-text">&nbsp; </td>
											<td align="center" width="" valign="top" class="tertiary-text"><?php echo strtoupper(substr($j, 1)); ?></td>
											<td align="center" width="" valign="top" class="tertiary-text"><?php echo $k; ?></td>
								       </tr>
								      <?php
										$i=$i+$k;
									}
								}
								?>
								<tr>
									<td align="center" width="" valign="top" class="tertiary-text" colspan="2">&nbsp; </td>
									<td align="center" width="" valign="top" class="tertiary-text bg-color-orange"><b><?php echo $i; ?></b></td>
						      </tr>
							</table>
	 						<!-- ### ALTAS ### -->
	 						<?php
						$sql="SELECT medico, COUNT(medico) FROM vete GROUP by medico ORDER BY medico ASC";
						
						$result = mysql_query($sql);
						
						$count_vete = array(); 
						while($row = mysql_fetch_assoc($result)) {
							$count_vete[ $row['medico'] ] = $row['COUNT(medico)'];
						}

						?>
							<table border="0" class="bordered" width="500">
								<tr>
									<td width="10%" align="center" style="background-color:#eeeDDD;" class="tertiary-text"><B>ALTAS</B></td>
									<td width="" align="center" style="background-color:#eeeDDD;" class="tertiary-text"><B>USUARIO</B></td>
									<td width="5%" align="center" style="background-color:#eeeDDD;" class="tertiary-text"><B>CANTIDAD</B></td>
								</tr>
								<?php
									$i=0;
									foreach ($count_vete as $j => $k) {
										?>	    	
										<tr>
											<td align="center" width="" valign="top" class="tertiary-text">&nbsp; </td>
											<td align="center" width="" valign="top" class="tertiary-text"><?php echo strtoupper($j); ?></td>
											<td align="center" width="" valign="top" class="tertiary-text"><?php echo $k; ?></td>
								       </tr>
								      <?php
								   	$i=$i+$k;
									}
								?>
								<tr>
									<td align="center" width="" valign="top" class="tertiary-text" colspan="2">&nbsp; </td>
									<td align="center" width="" valign="top" class="tertiary-text bg-color-orange"><b><?php echo $i; ?></b></td>
						      </tr>
							</table>							

						</div>

					</div>
				</div>
			</div>
		</div>
	</div>	
		

	</body>
</html>


