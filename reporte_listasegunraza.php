<?php include("require/session.php"); ?>
<?php
	$espe=$_GET["especie"];
	$raza=$_GET["raza"];
	$titulo="Mascotas de epecie ".strtoupper($espe)." y raza ".strtoupper($raza)."";
?>
<html>
	<head>
		<?php include("header.php")?>
	</head>
	<?php include("require/bodying.php");	?>
	<?php	if ($print!=1)	{	?><div class="prettyprint" align="right"><a href="reporte_listasegunraza.php?especie=<? echo $espe; ?>&raza=<? echo $raza; ?>&print=1" target="_blank" title="Imprimir"><i class="icon-printer"></i></a>&nbsp;</div><?php	}	?>
	
		<div class="row" align="left">
			<pre class='prettyprint'><i class='icon-chart-alt'></i><b><?php echo $titulo;?></b></pre>
		</div>

		<table border="0" class="striped" width="500">
		<tr>
			<td width="" align="center" style="background-color:#eeeDDD;" class="tertiary-text"><B>MASCOTA</B></td>
			<td width="" align="center" style="background-color:#eeeDDD;" class="tertiary-text"><B>PROPIETARIO</B></td>
			<td width="" align="center" style="background-color:#eeeDDD;" class="tertiary-text"><B>FALLECIDO</B></td>
			<td width="" align="center" style="background-color:#eeeDDD;" class="tertiary-text"><B>SEXO</B></td>
			<td width="" align="center" style="background-color:#eeeDDD;" class="tertiary-text"><B>ESPECIE</B></td>
			<td width="" align="center" style="background-color:#eeeDDD;" class="tertiary-text"><B>RAZA</B></td>		
			<td width="" align="center" style="background-color:#eeeDDD;" class="tertiary-text"><B>ALTA</B></td>
		</tr>
		<?php
			include("require/config.php");
			require("require/alasfun.php");
			$sql="SELECT veteid, nom, ape, paciente, sexo, especie, raza, fechadealta,fallecido FROM vete WHERE especie='$espe' AND raza='$raza' ORDER BY veteid DESC";
			$mascota = mysql_query($sql);
			while($row = mysql_fetch_assoc($mascota)) {
			?>
			<tr>
				<td align="center" width="" valign="top" class="tertiary-text"><?php echo "<b><a href='show.php?id=".$row['veteid']."' target='central'>".strtoupper($row['paciente'])."</a></b><br>";?></td>			
				<td align="center" width="" valign="top" class="tertiary-text"><?php echo "".strtoupper($row['ape']).", ".strtoupper($row['nom'])."";?></td>					
				<td align="center" width="" valign="top" class="tertiary-text"><?php if($row['fallecido']=="0" ){echo "NO";} else {echo "SI";}?></td>	
				<td align="center" width="" valign="top" class="tertiary-text"><?php echo $row['sexo'];?></td>
				<td align="center" width="" valign="top" class="tertiary-text"><?php echo strtoupper($row['especie']);?></td>
				<td align="center" width="" valign="top" class="tertiary-text"><?php echo strtoupper($row['raza']);?></td>				
				<td align="center" width="" valign="top" class="tertiary-text"><?php ConvFecha($row['fechadealta']);  ?></td>
			</tr>
		<?php }	?>
		</table>
		<div>
			<a class="button bg-color-red fg-color-white" href="reportes_torta_especies.php" target="central" title="Volver al reporte"><b>Volver</b></a>
		</div>
	</body>
</html>