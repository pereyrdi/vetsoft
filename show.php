<?php include("require/session.php"); ?>
<?php if($_GET['msg']!='') echo '<div class="notification" id="notification" style="position: fixed; top: 0px; margin-left: 30%; background-color: yellow;"><i>'.$_GET['msg'].'</i></div><br>';  ?>
<?php
	$titulo="Mascota";
	$idq = trim($_GET['id']);
?>
<html>  
<head>
	<?php include("header.php")?>
	<script type="text/javascript" src="js/jquery.min.js"></script>
	<script type="text/javascript" src="js/ajax.js"></script>
	<script type="text/javascript" src="javascript/pagecontrol.js"></script>
	<style type="text/css">
	.hiddenDiv {
		display: none;
		}
	.visibleDiv {
		display: block;
		}
	</style>
	<script type="text/javascript"> $(document).ready(function(){	setTimeout(function(){	$("div.notification").fadeOut("slow", function () {	$("div.notification").remove();	});	}, 2000); });</script>

	<script language="JavaScript" type="text/javascript" src="rte/richtext.js"></script>
	<link href="rte/rte.css" rel="stylesheet">
	
</head>
<?php
require("require/alasfun.php");
include("require/config.php");
if (empty($_GET['id'])) { echo "No es un ID correcto...."; } else {     
    $sql = "SELECT * FROM vete WHERE veteid='$idq'";
    $result = mysql_query($sql);
    if (mysql_num_rows($result) == 0) {
		echo "No existe ID....";
    } else {
	    while($row = mysql_fetch_assoc($result)) {
					$id=trim($row['veteid']);
					$nom=strtoupper(trim($row['nom']));
					$ape=strtoupper(trim($row['ape']));
					$dir=trim($row['dir']);
					$tel=trim($row['tel1']);
					$cel=trim($row['tel2']);
					$email=trim($row['email']);
					$notes=$row['notas'];
					$paci=strtoupper(trim($row['paciente']));
					$sexo=trim($row['sexo']);
					$espe=trim($row['especie']);
					$raza=strtoupper(trim($row['raza']));
					$alta=trim($row['fechadealta']);
					$naci=trim($row['fechanaci']);
					$este=trim($row['esterilizado']);
					$repro=trim($row['reproduccion']);
					$pedi=trim($row['pedigree']);
					$color=strtoupper(trim($row['color']));
					$peso=trim($row['peso']);
					$medi=trim($row['medico']);
					$ciru=trim($row['cirugias']);
					$alim=trim($row['alimentacion']);
					$antip=trim($row['antiparasitarios']);
					$senias=trim($row['senias']);
					$falle=trim($row['fallecido']);
					if ($falle==1) { 
						$fallefecha=trim($row['fechafallecido']);
						$fallecausa=trim($row['causafalle']);
						}
					$lastupdate=trim($row['lastupdate']);
		} //while
?>
<?php include("require/bodying.php");	?>
<div class="page">
	<div class="page-region">
		<div class="page-region-content">
		
		<?php	if ($print==1)	{	?>
				 <hr>
				 <table width="100%" bgcolor="#FFF" align="center">
				 	<tr valign="TOP">
				 		<td align="center">
				 			<h2><b><?php echo $paci;?></b></h2>
				 			<p><?php if(!($raza == NULL))  { echo "<b>".$raza."</b>";  	}?>
							<?php if(!($color == NULL))  { echo "&nbsp;|&nbsp;<b>".$color."</b>";	}?>
							<?php if(!($peso == NULL)) { 
									if($peso > 0) {
										echo "&nbsp;|&nbsp;<b>".$peso."Kg</b>";
										}
							}?></p>				 			
				 		</td>
				 		<td align="center">
				 			<b>
				 				<?php ConvFecha($naci); ?> <?php if ($falle==0) { echo GetAge($naci); } else { ConvFecha($fallefecha); }?>
				 				<br>
				 				<?php echo $sexo; ?> / <?php echo strtoupper($espe); ?>
				 				</b>
				 		</td>
				 		<td align="center">
				      	<p align="center">
									<?php if(!($email == NULL))  { ?><a href="mailto:<?php echo $email; ?>" title="<?php echo $email; ?>"<i class='icon-mail'></i></a><?php } ?>
									<b><?php echo $nom;?>, <?php echo $ape;?></b>&nbsp;|&nbsp;
									<?php if(!($tel == NULL) and !($cel == NULL))  { echo "<i class='icon-phone'></i>";	}?>
									<?php if(!($tel == NULL))  { echo "<b>".$tel."</b>";	}?>
									<?php if(!($cel == NULL)) { 
										if($cel > 0) {
										echo "&nbsp;|&nbsp;<i class='icon-mobile'></i><b>".$cel."</b>";
										}
									}?>
									<br>
									<?php if(!($dir == NULL))  { echo "<i class='icon-location'></i><b>".$dir."</b>";	}?>
				         </p>
						</td>
				 	</tr>
				 </table>
			<h2>Historia Clinica</h2>
			<div class="" id=""><?php include("procedure_resumen.php");?></div>

<?php } else { ?>

				 <table width="100%" bgcolor="#FFF" align="center" style="margin-left:10px;width: 90%;color: #fff;" cellpadding="0" cellspacing="0" border="0">
				 	<tr>				 	
				 		<td colspan="4" align="right">
		            <div class="tile-content">
							<a href="show.php?id=<?php echo $id; ?>" target="central" title="Actualizar paciente."><i class="icon-loop"></i></a>
							<a href="paciente_nuevo.php?altamodo=3&id=<?php echo $id; ?>&medi=<?php echo ADMIN;?>" title="Modificar Paciente"><i class="icon-wrench"></i></a>&nbsp;
							<a href="show.php?id=<?php echo $id; ?>&print=1" target="_blank" title="Imprimir"><i class="icon-printer"></i></a>&nbsp;
							<a href="paciente_nuevo.php?altamodo=2&id=<?php echo $id; ?>" title="Copiar datos del cliente para un nuevo paciente"><i class="icon-copy"></i></a>
				 		</div>
				 		</td>
				 	</tr>
				 	<tr valign="TOP">
				 		<td align="center" bgcolor="#2d89ef">
				 			<div class="tile-content"><h1 style="color: #fff;"><?php echo $paci;?></h1></div>
				 			<?php ConvFecha($naci); ?><?php if ($falle==0) { echo GetAge($naci); } else { echo "&nbsp;-&nbsp;"; ConvFecha($fallefecha); }?><br>
				 			<?php if(!($raza == NULL))  { echo "<b>".$raza."</b>";  	}?>|<?php if(!($color == NULL)) { echo "<b>".$color."</b>";	}?><?php if(!($peso == NULL))  {	if($peso > 0) {	echo "| <b>".$peso."Kg</b>";	}	}?>
				 			<?php echo getsex($sexo); ?> <?php echo getespecie($espe); ?>
				 		</td>
				 		<td align="left" bgcolor="#2d89ef">
				      	<p>
								<?php if(!($email == NULL))  { ?><a href="mailto:<?php echo $email; ?>" title="<?php echo $email; ?>"<i class='icon-mail fg-color-white'></i></a><?php } ?>
								<b><?php echo $nom;?>, <?php echo $ape;?></b>&nbsp;|&nbsp;
								<?php if(!($tel == NULL) and !($cel == NULL))  { echo "<i class='icon-phone'></i>";	}?>
								<?php if(!($tel == NULL))  { echo "<b>".$tel."</b>";	}?>
								<?php if(!($cel == NULL)) { 
									if($cel > 0) {
									echo "&nbsp;|&nbsp;<i class='icon-mobile'></i><b>".$cel."</b>";
									}
								}?>
								<br>
								<?php if(!($dir == NULL))  { echo "<i class='icon-location'></i><b>".$dir."</b>";	}?><br>
								Desde <?php ConvFecha($alta);?>, Ultima Mod. <?php ConvFecha($lastupdate); ?><br>							
				         </p>
				 			<p>
	 						<?php if(!($ciru == NULL))   { echo "<b>Cirugias previas: </b>".$ciru."<br>";	}?>
		 					<?php if(!($alim == NULL))   { echo "<b>Alimentacion: </b>".$alim."<br>";	}?>
		 					<?php if(!($antip == NULL))  { echo "<b>Antiparasitarios: </b>".$antip."<br>";	}?>
			 				<?php if(!($senias == NULL)) { echo "<b>Señas particulares: </b>".$senias."<br>";	}?>
			 				</p>				         
						</td>
						<?php if(!($este=="0") | !($repro=="0") | !($pedi=="0" ) | !($falle=="0")) { ?>
				 		<td align="left" bgcolor="#2d89ef">
				 		<div class="row">
		               <p valign="top">
		                  <?php if($este=="0" ){echo "  ";} else {echo "Castrado</b><i class='icon-checkmark'></i><br>";}?>
								<?php if($repro=="0"){echo "  ";} else {echo "Reprod.</b>&nbsp;<i class='icon-checkmark'></i><br>";}?>
								<?php if($pedi=="0" ){echo "  ";} else {echo "Pedigree&nbsp;<i class='icon-checkmark'></i><br>";}?>
								<?php if($falle=="0"){echo "  ";} else {echo "Fallecido&nbsp;<i class='icon-checkmark'></i><br>";}?>
		               </p>
			 			</div>
				 		</td>
				 		<?php } ?>
				 	</tr>
					<?php if(!($notes == NULL))   { ?>
					 	<tr>				 	
					 		<td colspan="4" align="left">	
								<p style="margin-left:10px;color: #000;"><b>Notas: </b><?php echo $notes; ?></p>
					 		</td>
				 		</tr>
					<?php }?>
				 </table>


			<div class="grid">
			<!--
				<div class="row" align="center">
					<div class="tile double bg-color-blueDark" style="width: 28%;">
	            	<div class="tile-content">
	                   <h1><?php echo $paci;?></h1><br>
							 <h4><?php ConvFecha($naci); ?> <?php if ($falle==0) { echo GetAge($naci); } else { ConvFecha($fallefecha); }?></h4>
	               </div>
	               <div class="brand" style="vertical-align:text-top;">
							<p>
								<?php if(!($raza == NULL))  { echo "<b>".$raza."</b>";  	}?>
								<?php if(!($color == NULL))  { echo "&nbsp;|&nbsp;<b>".$color."</b>";	}?>
								<?php if(!($peso == NULL)) { 
									if($peso > 0) {
										echo "&nbsp;|&nbsp;<b>".$peso."Kg</b>";
									}
								}?>
							</p>
							<div class="name"><?php echo getsex($sexo); ?></div>
							<div class="icon"></div>
							<div class="badge"><?php echo getespecie($espe); ?></div>
						</div>
               </div>
					<div class="tile double bg-color-blueDark" style="width: 50%;">
	               <div class="tile-content">
	                   <p align="left">
								<?php if(!($email == NULL))  { ?><a href="mailto:<?php echo $email; ?>" title="<?php echo $email; ?>"<i class='icon-mail'></i></a><?php } ?>
								<b><?php echo $nom;?>, <?php echo $ape;?></b>&nbsp;|&nbsp;
								<?php if(!($tel == NULL) and !($cel == NULL))  { echo "<i class='icon-phone'></i>";	}?>
								<?php if(!($tel == NULL))  { echo "<b>".$tel."</b>";	}?>
								<?php if(!($cel == NULL)) { 
									if($cel > 0) {
										echo "&nbsp;|&nbsp;<i class='icon-mobile'></i><b>".$cel."</b>";
											
									}
								}?>
								<br>
								<?php if(!($dir == NULL))  { echo "<i class='icon-location'></i><b>".$dir."</b>";	}?><br>
								Desde <?php ConvFecha($alta);?>, Ultima Mod. <?php ConvFecha($lastupdate); ?><br>
	                   </p>                            
	                   <p align="left">
								<?php if(!($ciru == NULL))   { echo "<b>Cirugias previas: </b>".$ciru."<br>";	}?>
								<?php if(!($alim == NULL))   { echo "<b>Alimentacion: </b>".$alim."<br>";	}?>
								<?php if(!($antip == NULL))  { echo "<b>Antiparasitarios: </b>".$antip."<br>";	}?>
								<?php if(!($senias == NULL)) { echo "<b>Señas particulares: </b>".$senias."<br>";	}?>
								<?php if ($falle==1) { ?><br>Fallecio el <?php ConvFecha($fallefecha); ?> a causa de '<?php echo $fallecausa; ?>"<?php } ?>
	                   </p>
	               </div>
               </div>
					<div class="tile double bg-color-blue" style="width: 12%;">
		            <div class="tile-content">
							<a href="show.php?id=<?php echo $id; ?>" target="central" title="Actualizar paciente."><i class="icon-loop"></i></a>
							<a href="paciente_edit.php?id=<?php echo $id; ?>&medi=<?php echo ADMIN;?>" title="Modificar Paciente"><i class="icon-wrench"></i></a>&nbsp;
							<a href="show.php?id=<?php echo $id; ?>&print=1" target="_blank" title="Imprimir"><i class="icon-printer"></i></a>&nbsp;
		               <p valign="top">
		                  <?php if($este=="0" ){echo "  ";} else {echo "Castrado</b><i class='icon-checkmark'></i><br>";}?>
								<?php if($repro=="0"){echo "  ";} else {echo "Reprod.</b>&nbsp;<i class='icon-checkmark'></i><br>";}?>
								<?php if($pedi=="0" ){echo "  ";} else {echo "Pedigree&nbsp;<i class='icon-checkmark'></i><br>";}?>
								<?php if($falle=="0"){echo "  ";} else {echo "Fallecido&nbsp;<i class='icon-checkmark'></i><br>";}?>
		               </p>
		            </div>
		            <div class="brand" style="vertical-align:text-top;">
		  					<div class="name"></div>
							<div class="icon"></div>
		               <div class="badge"><a href="paciente_nuevo_copy.php?id=<?php echo $id; ?>" title="Copiar datos del cliente para un nuevo paciente"><i class="icon-copy"></i></a></div>
		            </div>
               </div>
				</div>
				
				<?php if(!($notes == NULL))   { ?>	
				<div class="row" align="left">
					<div><p><b>Notas: </b><?php echo $notes; ?></p>	</div>
				</div>
				<?php }?>
				-->
				<div class="page-control" data-role="page-control" style="margin-left:10px;width: 90%;">
					<ul>
						<li class="active"><a href="#resumen">Resumen</a></li>
						<li><a href="#historias">Historias</a></li>
						<li><a href="#peluqueria">Peluqueria</a></li>
						<li><a href="#vacunas">Vacunas</a></li>
						<li></li>
						<li><a href="#new">Agregar</a></li>
					</ul>
					<div class="frames">
						<div class="frame active" id="resumen"><?php include("procedure_resumen.php");?></div>
						<div class="frame" id="historias"><?php include("procedure_historias.php");?></div>
						<div class="frame" id="peluqueria"><?php include("procedure_peluqueria.php");?></div>
						<div class="frame" id="vacunas"><?php include("procedure_vacunas.php");?></div>
						<div class="frame" id="new"><?php include("procedure_agregar.php");?></div>
					</div>
				</div>
			</div>
<?php	} 	// del print?>
		</div>
	</div>
</div>
<?php
	} //if id no existe en bd
} //if id no valido
?>
</body>
</html>
