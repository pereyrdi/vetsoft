<?php
	include("require/session.php");
	include("require/config.php");
	require("require/alasfun.php");
	
	$startdate=date("mdY");
	$latestdate=date("md").(date("Y")+5);
	$earliestdate=date("md").(date("Y")-15);

	switch ($_GET['altamodo']) {
	    case 1:
	        $titulo="Alta de un nuevo paciente";
			$result = mysql_query("SELECT veteid FROM vete ORDER BY veteid DESC LIMIT 1", $link);
			while ($row = mysql_fetch_array($result)) {
				$num_rows=$row['veteid'];
				}
			$num_rows=$num_rows+1;
			mysql_close($link);	        
	        break;
	    case 2:
	        $titulo="Alta de un nuevo paciente usando datos del cliente";
			if (empty($_GET['id'])) { echo "No hay datos....".$_GET['id']; } else {
				$veteid=$_GET['id'];
			    $sql = "SELECT * FROM vete WHERE veteid='$veteid'";
			    $result = mysql_query($sql);
			    if (mysql_num_rows($result) == 0) {
					echo "No existe ID....";
					$_GET['altamodo']=0;
					break;
			    }

		       	$idq=$_GET['id'];
				$result = mysql_query("SELECT veteid FROM vete ORDER BY veteid DESC LIMIT 1", $link);
				while ($row = mysql_fetch_array($result)) {
					$num_rows=$row['veteid'];
					}
				$num_rows=$num_rows+1;	       	
				$result = mysql_query("SELECT nom, ape, dir, tel1, tel2, email FROM vete WHERE veteid='$idq'", $link);
				while ($row = mysql_fetch_array($result)) {
					$nom=$row['nom'];
					$ape=$row['ape'];
					$dir=$row['dir'];
					$tel1=$row['tel1'];
					$tel2=$row['tel2'];
					$email=$row['email'];
				}
				mysql_close($link);
			}
	        break;
	    case 3:
	        $titulo="Modificaci&oacute;n de datos del paciente";
			if (empty($_GET['id'])) { echo "No hay datos....".$_GET['id']; } else {
				$veteid=$_GET['id'];
				$medi = stripslashes($_GET['medi']);
			    $sql = "SELECT * FROM vete WHERE veteid='$veteid' LIMIT 1";
			    $result = mysql_query($sql);
			    if (mysql_num_rows($result) == 0) {
					echo "No existe ID....";
				} else {
					while($row = mysql_fetch_assoc($result)) {
						
						$paciente=$row['paciente'];
						$nom=$row['nom'];
						$ape=$row['ape'];
						$dir=$row['dir'];
						$tel1=$row['tel1'];
						$tel2=$row['tel2'];
						$email=$row['email'];						
						$fechadealta=$row['fechadealta'];
						$fechanaci=$row['fechanaci'];
						$lastupdate=$row['lastupdate'];
						$medico=$row['medico'];
						$sexo=$row['sexo'];
						$especie=$row['especie'];
						$raza=$row['raza'];
						$esterilizado=$row['esterilizado'];
						$reproduccion=$row['reproduccion'];
						$color=$row['color'];
						$peso=$row['peso'];
						$ciru=$row['cirugias'];
						$alim=$row['alimentacion'];
						$antip=$row['antiparasitarios'];
						$senias=$row['senias'];
						$pedigree=$row['pedigree'];
						$fallecido=$row['fallecido'];
						$fechafallecido=$row['fechafallecido'];
						$causafalle=$row['causafalle'];
						$notas=$row['notas'];
					}
			    }
			}
	        break;
    	default:
			echo("<script language=\"javascript\">"); 
			echo("self.location.href = \"alitasweb.php\";"); 
			echo("</script>");       
	}
	//echo $_GET['altamodo'];
?>
<html>  
    <head>  
		<?php include("header.php")?>
		<script type="text/javascript" src="js/alta_validation.js"></script>
		<link rel="stylesheet" type="text/css" href="css/alta_validation.css" />
		<link rel="stylesheet" type="text/css" href="css/razas.css" />
		<link rel="stylesheet" type="text/css" media="all" href="css/datechooser.css">
		<script type="text/javascript" src="js/datechooser.js"></script>
		<script type="text/javascript">
		<!-- //
			events.add(window, 'load', WindowLoad);
			function FunctionEx6(objDate)
			{
				var ndExample5 = document.getElementById('datechooserex5');
				ndExample5.DateChooser.setEarliestDate(objDate);
				ndExample5.DateChooser.updateFields();
				return true;
			}
		// -->
		</script>
		<script type="text/javascript">
			<!--
			var lastDiv = "";
			function showDiv(divName) {
				// hide last div
				if (lastDiv) {
					document.getElementById(lastDiv).className = "hiddenDiv";
				}

				if (divName && document.getElementById(divName)) {
					document.getElementById(divName).className = "visibleDiv";
					lastDiv = divName;
				}
			}
			function hideDiv(divName) {
				document.getElementById(divName).className = "hiddenDiv";
				lastDiv = divName;
			}
		  //-->
		</script>

		<style type="text/css">
			.hiddenDiv {
				display: none;
				}
			.visibleDiv {
				display: block;
				}
		</style>		

		<script type="text/javascript" src="js/lib/jquery.js"></script>
		<script type="text/javascript" src="js/jquery.autocomplete.js"></script>
		<link rel="stylesheet" type="text/css" href="js/jquery.autocomplete.css" />
		<script>
		 $(document).ready(function(){
		  $("#raza_can").autocomplete("require/listar_razas_can.php", {
		        selectFirst: true
		  });
		  $("#raza_fel").autocomplete("require/listar_razas_fel.php", {
		        selectFirst: true
		  });
		  $("#raza_otr").autocomplete("require/listar_razas_otros.php", {
		        selectFirst: true
		  });		  		  
		 });
		</script>
   </head>  

	<body class="modern-ui">
		<div class="page">
			<div class="page-region">
				<div class="page-region-content">
					<?php if($_GET['altamodo'] != "0") { ?>
					<h2><i class="icon-github"></i>
					<?php 
						echo $titulo;
						if($_GET['altamodo'] != "3") {	echo "<small>(#".$num_rows.")</small></h2>";	}
						if($_GET['altamodo'] == "3") {	
							?>
								<p style="margin-left:100px;">Paciente desde <b><?php ConvFecha($fechadealta); ?></b> y su ultima modificaci&oacute;n fue por: <b><?php echo $medico;?></b> el <b><?php ConvFecha($lastupdate);?></b></p>
							<?php 
						}
					?>
					</h2> 

					<legend><i><b><span style="color: rgb(255, 0, 0);">*</span></b> Los campos con marco en rojo son obligatorios.</i></legend>
					
					<?php if($_GET['altamodo'] == "3") {	?>
					<form name="myform" action="paciente_edit_post.php" method="post" onsubmit="if(isFormValid())alert('Todo ok'); else { alert('Algo esta mal completado');return false; }">
						<input class="input" type="hidden" name="veteid" value="<?php echo $veteid; ?>"/>
						<input class="input" type="hidden" name="medi"   value="<?php echo $medi; ?>"/>
						<input class="input" type="hidden" name="lastupdate"  value="<?php echo date("Y-m-d G:i:s"); ?>"/>
					<?php } else { ?>
					<form name="myform" action="paciente_nuevo_post.php" autocomplete="off" method="post" onsubmit="if(isFormValid())alert('Todo ok'); else { alert('Algo esta mal completado');return false; }">
						<input class="input" type="hidden" name="id" value="<?php echo $num_rows;?>"/>
						<input class="input" type="hidden" name="lastupdate"  value="<?php echo date("Y-m-d G:i:s"); ?>"/>
					<?php } ?>

					<!-- Campos Cliente-->
					<table border="0" valign="top" cellpadding="0" cellspacing="0" bgcolor="#ddcdf">
						<tr>
							<td class="" align="right"><h4>Nombre</h4></td>
							<td class="" align=""><input class="input" type="text" name="nom" required="1" value="<?php if($_GET['altamodo']=="2" || $_GET['altamodo']=="3") { echo $nom; } ?>" /></td>
							<td class="" align="right"><h4>Apellido</h4></td>
							<td class="" align=""><input class="input" type="text" name="ape" required="1" value="<?php if($_GET['altamodo']=="2" || $_GET['altamodo']=="3") { echo $ape; } ?>" /></td>
							<td class="" align="right"><h4>Direcci&oacute;n</h4></td>
							<td class="" align=""><input class="input" type="text" name="dir" required="1" value="<?php if($_GET['altamodo']=="2" || $_GET['altamodo']=="3") { echo $dir; } ?>"/></td>
						</tr>
						<tr>
							<td class="" align="right"><h4>Telefono</h4></td>
							<td class=""><input class="input" type="phone" name="tel" required="1" mask="numeric" value="<?php if($_GET['altamodo']=="2" || $_GET['altamodo']=="3") { echo $tel1; } ?>"/></td>
							<td class="" align="right"><h4>Celular</h4></td>
							<td class=""><input class="input" type="phone" name="cel" mask="numeric" value="<?php if($_GET['altamodo']=="2" || $_GET['altamodo']=="3") { echo $tel2; } ?>"/></td>
							<td class="" align="right"><h4>eMail</h4></td>
							<td class=""><input class="input" type="email" name="email" id="email" mask="email" value="<?php if($_GET['altamodo']=="2" || $_GET['altamodo']=="3") { echo $email; } ?>"/></td>
						</tr>
					</table>

					<!-- Campos Paciente-->
					<table border="0" valign="top" cellpadding="0" cellspacing="0" bgcolor="#fffcdf">
						<tr>
							<td class="" align="right"><h4>Nombre del Paciente</h4></td>
							<td class=""><input class="input" type="text" name="paci" required="1" value="<?php if($_GET['altamodo']=="3") { echo $paciente; }?>"/></td>

							<td class="" align="right"><h4>Especie</h4></td>
							<td>
								<?php if($_GET['altamodo'] == "3") {	?>
								<label class="input-control radio">
									<input type='radio' name='especie' value='canino' <?php if ($especie=='canino') { echo"checked"; }?> onclick="showDiv(this.value);"><p>Canino</p>
								</label>
								<label class="input-control radio">
									<input type='radio' name='especie' value='felino' <?php if ($especie=='felino') { echo"checked"; }?> onclick="showDiv(this.value);"><p>Felino</p>
								</label>
								<label class="input-control radio">
									<input type='radio' name='especie' value='otros' <?php if ($especie=='otros') { echo"checked"; }?> onclick="showDiv(this.value);"><p>Otros</p>
								</label>
								<?php } else {	?>
								<div class="input-control select">
								<select name="especie" required="1" class="input" onchange="showDiv(this.value);">
									<option value="1eroSele"></option>
									<option value="canino">Canino</option>
									<option value="felino">Felino</option>
									<option value="otros">Otros</option>
								</select>
								</div>										
								<?php }	?>
							</td>
							<td class="" align="right"><h4>Raza</h4></td>
							<td class="">
								<?php 
									if($_GET['altamodo'] == "3") {	

										if ($especie=='canino') { 
											echo "<div id='canino' class='visibleDiv'>";
											echo "<input name='raza_can' type='text' id='raza_can' size='20' value=".$raza." />";
											echo "</div>";
										} else {
											?> 
											<div id="canino" class="hiddenDiv">
												<input name="raza_can" type="text" id="raza_can" size="20"/>
											</div>
											<?php
										}
									
										if ($especie=='felino') { 
											echo "<div id='felino' class='visibleDiv'>";
											echo "<input name='raza_fel' type='text' id='raza_fel' size='20' value=".$raza." />";
											echo "</div>";
										} else {
											?> 
											<div id="felino" class="hiddenDiv">
												<input name="raza_fel" type="text" id="raza_fel" size="20"/>
											</div>
											<?php
										}
									
										if ($especie=='otros') { 
											echo "<div id='otros' class='visibleDiv'>";
											echo "<input name='raza_otr' type='text' id='raza_otr' size='20' value=".$raza." />";
											echo "</div>";
										} else {
											?> 
											<div id="otros" class="hiddenDiv">
												<input name="raza_otr" type="text" id="raza_otr" size="20"/>
											</div>
											<?php
										}
									} else {
								?>
								<div id="1eroSele"	class="visibleDiv"><i>1ro seleccionar especie...</i></div>
								<div id="canino" class="hiddenDiv">
									<input name="raza_can" type="text" id="raza_can" size="20"/>
								</div>
								<div id="felino"  class="hiddenDiv">
									<input name="raza_fel" type="text" id="raza_fel" size="20"/>
								</div>
								<div id="otros"   class="hiddenDiv">
									<input name="raza_otr" type="text" id="raza_otr" size="20"/>
								</div>
								<?php }	?>
							</td>
						</tr>
						<tr>
							<td class="" align="right"><h4>Sexo</h4></td>
							<td>
								<?php if($_GET['altamodo'] == "3") {	?>
								<label class="input-control radio">
									<input type='radio' name='sexo' value='M' <?php if ($sexo=='F') { echo"checked"; } ?>><p>F</p>
								</label>
								<label class="input-control radio">
									<input type='radio' name='sexo' value='F' <?php if ($sexo=='M') { echo"checked"; } ?>><p>M</p>
								</label>
								<?php } else {	?>
								<select name="sexo" required="1" class="input">
									<option value=""></option>
									<option value="M">Hembra</option>
									<option value="F">Macho</option>
								</select>
								<?php }	?>
							</td>
							<td class="" align="right"><h4>Fecha de Nacimiento</h4></td>
							<td class="">
								<?php if ($_GET['altamodo'] == "3" ) {	?>
								<input maxlength="11" size="11" name="naci" id="datechooserex6" class="datechooser dc-dateformat='Y-m-d' dc-iconlink='datechooser.png' dc-weekstartday='1' dc-startdate='<?php echo $startdate; ?>' dc-latestdate='<?php echo $latestdate; ?>' dc-earliestdate='<?php echo $earliestdate; ?>' dc-onupdate='FunctionEx6'" type="text" value="<?php echo $fechanaci; ?>" >
								<?php } else {	?>
								<input maxlength="11" size="11" name="naci" id="datechooserex6" class="datechooser dc-dateformat='Y-m-d' dc-iconlink='datechooser.png' dc-weekstartday='1' dc-startdate='<?php echo $startdate; ?>' dc-latestdate='<?php echo $latestdate; ?>' dc-earliestdate='<?php echo $earliestdate; ?>' dc-onupdate='FunctionEx6'" type="text" placeholder="<?php echo date("d-M-Y"); ?>" value="">
								<?php }	?>
							</td>
							<td class="" align="center"><h4>Castrado</h4>
								<?php if($_GET['altamodo'] == "3") {	?>
								<label class="input-control radio">
									<input type='radio' name='este' value='1' <?php if ($esterilizado=='1') { echo"checked"; }?>><p>Si</p>
								</label>
								<label class="input-control radio">
									<input type='radio' name='este' value='0' <?php if ($esterilizado=='0') { echo"checked"; }?>><p>No</p>
								</label>
								<?php } else {	?>
								<div class="input-control select">
								<select name="este" class="input">
									<option value="0">NO</option>
									<option value="1">SI</option>
								</select>
								</div>
								<?php }	?>
							</td>
							<td class="" align="center"><h4>Reproducci&oacute;n</h4>
								<?php if($_GET['altamodo'] == "3") {	?>
								<label class="input-control radio">
									<input type='radio' name='repro' value='1' <?php if ($reproduccion=='1') { echo"checked"; }?>><p>Si</p>
								</label>
								<label class="input-control radio">
									<input type='radio' name='repro' value='0' <?php if ($reproduccion=='0') { echo"checked"; }?>><p>No</p>
								</label>
								<?php } else {	?>
								<div class="input-control select">
								<select name="repro" class="input">
									<option value="0">NO</option>
									<option value="1">SI</option>
								</select>
								</div>
								<?php }	?>
							</td>
							<td class="" align="center"><h4>Pedigree</h4>
								<?php if($_GET['altamodo'] == "3") {	?>
								<label class="input-control radio">
									<input type='radio' name='pedi' value='1' <?php if ($pedigree=='1') { echo"checked"; }?>><p>Si</p>
								</label>
								<label class="input-control radio">
									<input type='radio' name='pedi' value='0' <?php if ($pedigree=='0') { echo"checked"; }?>><p>No</p>
								</label>
								<?php } else {	?>
								<div class="input-control select">
								<select name="pedi" class="input">
									<option value="0">NO</option>
									<option value="1">SI</option>
								</select>
								</div>
								<?php }	?>
							</td>
						</tr>
						<tr>
							<td class="" align="right"><h4>Color</h4></td>
							<td class=""><input class="input" type="text" name="color" value="<?php if($_GET['altamodo']=="3") { echo $color; } ?>"/></td>
							<td class="" align="right"><h4>Peso</h4></td>
							<td class=""><input class="input" type="text" name="peso" value="<?php if($_GET['altamodo'] == "3") { echo $peso; } ?>" /></td>
							<td class="" align="right"><h4>Cirugias Previas</h4></td>
							<td class=""><input class="input" type="text" name="ciru" value="<?php if($_GET['altamodo'] == "3") { echo $ciru; } ?>" /></td>
						</tr>
						<tr>
							<td class="" align="right"><h4>Alimentaci&oacute;n</h4></td>
							<td class=""><input class="input" type="text" name="alim" value="<?php if($_GET['altamodo'] == "3") { echo $alim; } ?>" /></td>
							<td class="" align="right"><h4>Antiparasitarios</h4></td>
							<td class=""><input class="input" type="text" name="antip" value="<?php if($_GET['altamodo'] == "3") { echo $antip; } ?>" /></td>
							<td class="" align="right"><h4>Señas Particulares</h4>
							<td class=""><input class="input" type="text" name="senias" value="<?php if($_GET['altamodo']=="3") { echo $senias; } ?>" />
						</tr>
						<tr>
							<td class="" align="right"><h4>notas</h4></td>
							<td class=""><input class="input" type="text" name="note" value="<?php if($_GET['altamodo']=="3") { echo $notas; } ?>" /></td>
							<td class="" align="right"><h4>Fecha de Alta</h4></td>
							<td class="">
								<?php if($_GET['altamodo'] == "3") {	?>
								<input class="input" type="hidden" name="alta" value="<?php echo $fechadealta; ?>"/><p><?php echo $fechadealta; ?></p>
								<?php } else {	?>
								<input class="input" type="hidden" name="alta" value="<?php echo date("Y-m-d"); ?>"/><p><?php echo date("d-M-Y"); ?></p>
								<?php }	?>
							</td>
							<td class="" align="right"><h4>Medico</h4></td>
							<td class=""><input class="input" type="hidden" name="medi" value="<?php echo $_SESSION['username'];?>"/><p><?php echo $_SESSION['username'];?></p></td>
						</tr>
						<?php if($_GET['altamodo'] == "3") {	?>
						<tr>
							<td valign="top"><h4>Fallecido</h4></td>
							<td>
								<label class="input-control radio">
									<input onchange="showDiv(this.value);hideDiv(0);" type='radio' name='falle' value='1' <?php if ($fallecido=='1') { echo"checked"; }?>><p>Si</p>
								</label>
								<label class="input-control radio">
									<input onchange="showDiv(this.value);hideDiv(1);" type='radio' name='falle' value='0' <?php if ($fallecido=='0') { echo"checked"; }?>><p>No</p>
								</label>
								<div id="1" <?php if ($fallecido=='0') { echo "class='hiddenDiv'"; }?> >
									<h4>Causa de fallecimiento</h4>
									<input class="input" type="text" name="causafalle" value="<?php echo $causafalle;?>"/>
									<h4>Fecha de fallecimiento</h4>						
									<input maxlength="11" size="11" name="fechafalle" id="datechooserex5" class="datechooser dc-dateformat='Y-m-d' dc-iconlink='datechooser.png' dc-weekstartday='1' dc-weekstartday='1' dc-startdate='<?php echo $startdate; ?>' dc-latestdate='<?php echo $latestdate; ?>' dc-earliestdate='<?php echo $earliestdate; ?>'  dc-onupdate='FunctionEx6'" type="text" value="<?php echo $fechafallecido; ?>">
								</div>
								<div id="0" <?php if ($fallecido=='1') { echo "class='hiddenDiv'"; }?> >It's alive !!!</div>				
							</td>
						</tr>
					<?php } ?>
					</table>
					<center><input type="submit" name="submit" class="button" value="Listo !" /></center>
					</form>
					<?php } //del IF != 0 ?>
				</div>
			</div>
		</div>
	</body>
</html>
