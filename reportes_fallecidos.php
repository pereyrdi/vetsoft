<?php
	include("require/session.php");
	include("require/config.php");
	require("require/alasfun.php");
	$titulo="Listado de pacientes fallecidos";
?>
<html>
	<head>
		<?php include("header.php")?>
	</head>
	<?php include("require/bodying.php");	?>
	<?php	if ($print!=1)	{	?>
	<div class="prettyprint" align="right">
		<a href="reportes_fallecidos.php?print=1" target="_blank" title="Imprimir"><i class="icon-printer"></i></a>&nbsp;
	</div>
	<?php	}	?>
		<div class="row" align="left">
			<pre class='prettyprint'><i class='icon-chart-alt'></i><b><?php echo $titulo ?></b></pre>
		</div>
		<?php
			$sql="SELECT veteid, nom, ape, sexo, especie, raza, paciente, fechanaci, fechadealta, fechafallecido, causafalle, lastupdate, medico FROM vete WHERE fallecido='1' ORDER BY fechafallecido DESC";
			$result = mysql_query($sql);
			$values = array(); 
			if (mysql_num_rows($result) == 0) { 
				echo "<center>No hay registros aun...</center>"; 
			} else {
		?>
				<table border="0" class="striped" width="500">
				<tr>
					<td width="" align="center" style="background-color:#eeeDDD;" class="tertiary-text"><B>#</B></td>
					<td width="" align="center" style="background-color:#eeeDDD;" class="tertiary-text"><B>MASCOTA</B></td>
					<td width="" align="center" style="background-color:#eeeDDD;" class="tertiary-text"><B>PROPIETARIO</B></td>
					<td width="" align="center" style="background-color:#eeeDDD;" class="tertiary-text"><B>SEXO</B></td>
					<td width="" align="center" style="background-color:#eeeDDD;" class="tertiary-text"><B>ESPECIE</B></td>
					<td width="" align="center" style="background-color:#eeeDDD;" class="tertiary-text"><B>RAZA</B></td>		
					<td width="" align="center" style="background-color:#eeeDDD;" class="tertiary-text"><B>ALTA</B></td>
					<td width="" align="center" style="background-color:#eeeDDD;" class="tertiary-text"><B>FECHA<BR> NACIMIENTO</B></td>
					<td width="" align="center" style="background-color:#eeeDDD;" class="tertiary-text"><B>FECHA<BR> FALLECIMIENTO</B></td>
					<td width="" align="center" style="background-color:#eeeDDD;" class="tertiary-text"><B>CAUSA FALLECIMIENTO</B></td>
					<td width="" align="center" style="background-color:#eeeDDD;" class="tertiary-text"><B>EDAD</B></td>
					<td width="" align="center" style="background-color:#eeeDDD;" class="tertiary-text"><B>ULTIMA<BR>MODIFICACION</B></td>
				</tr>				
		<?php
			while($row = mysql_fetch_assoc($result)) {
		?>
		<tr>
				<td align="center" width="" valign="top" class="tertiary-text"><?php echo $row['veteid'];?></td>
				<td align="center" width="" valign="top" class="tertiary-text"><?php echo "<b><a href='show.php?id=".$row['veteid']."' target='central'>".strtoupper($row['paciente'])."</a></b><br>";?></td>				
				<td align="center" width="" valign="top" class="tertiary-text"><?php echo "".strtoupper($row['ape']).", ".strtoupper($row['nom'])."";?></td>										
				<td align="center" width="" valign="top" class="tertiary-text"><?php echo $row['sexo'];?></td>
				<td align="center" width="" valign="top" class="tertiary-text"><?php echo strtoupper($row['especie']);?></td>
				<td align="center" width="" valign="top" class="tertiary-text"><?php echo strtoupper($row['raza']);?></td>				
				<td align="center" width="" valign="top" class="tertiary-text"><?php ConvFecha($row['fechadealta']); ?></td>	
<!--
			<td width="10%" align="center" valign="top" class="tertiary-text">
			<?php 
				echo "<b><a href='show.php?id=".$row['veteid']."' target='central'>".strtoupper($row['paciente'])."</a></b><br>";
				echo "".$row['ape'].", ".$row['nom']."<br>";
			?>	
			</td>
-->						
			<td align="center" width="10%" valign="top" class="tertiary-text"><?php ConvFecha($row['fechanaci']);?>     </td>
			<td align="center" width="10%" valign="top" class="tertiary-text"><?php ConvFecha($row['fechafallecido']);?></td>
			<td align="center" width=""    valign="top" class="tertiary-text"><?php echo $row['causafalle'];?>    </td>
			<td align="center" width="10%" valign="top" class="tertiary-text"><?php echo GetAge2($row['fechanaci'],$row['fechafallecido'])." a&ntilde;os"; ?></td>
			<td align="center" width="20%" valign="top" class="tertiary-text"><?php echo $row['lastupdate'];?><br><i>Por: <b><?php echo strtolower($row['medico']);?></b></i></td>
		</tr>
		<?php
			}
		?>
		</table>		
		<?php
			}	
		?>
	</body>
</html>


