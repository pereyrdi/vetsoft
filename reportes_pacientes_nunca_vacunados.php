<?php
	include("require/session.php");
	include("require/config.php");
	$sql="SELECT veteid FROM vete WHERE fallecido=0";
	$result = mysql_query($sql);

	$values_vete = array();
	$x=0;
	while($row = mysql_fetch_assoc($result)) {
		$values_vete[ $x ] = $row['veteid'];
		$x=$x+1;
	}
	//echo $x;	
	//echo $values_vete;
	//var_dump($values_vete);
	//echo "<br><br>";
	
	//$sql="SELECT veteid, COUNT(veteid) FROM vacunas GROUP BY veteid";
	$sql="SELECT veteid FROM vacunas";
	$result = mysql_query($sql);
	$values_vacunas = array();
	$y=0;
	while($row = mysql_fetch_assoc($result)) {
		$values_vacunas[ $y ] = $row['veteid'];
		//$values_vacunas[ $row['veteid'] ] = $row['COUNT(veteid)'];
		$y=$y+1;
	}
	
	$y=0;
	for ($i = 0; $i <= $x; $i++) {
		if (!in_array($values_vete[ $i ], $values_vacunas)) {
			$y++;
		}
	}
	$y=$y-1;
			
?>

<html>
	<head>
		<?php include("header.php")?>
	</head>
	<body class="modern-ui">
		<div class="prettyprint" align="right">
			<a href="javascript:window.print()" title="Imprimir"><i class="icon-printer"></i></a>&nbsp;
		</div>		

		<div class="row" align="left">
			<pre class='prettyprint'><i class='icon-chart-alt'></i><b>Mascotas nunca vacunados</b></pre>
		</div>

		<?php 
			if ($y == 0) { 
				echo "<center>No hay registros aun...</center>"; 
			} else { 
		?>

		<table border="0" class="striped" width="500">
			<tr>			
				<td width="" align="center" style="background-color:#eeeDDD;" class="tertiary-text"><B>MASCOTA</B></td>
				<td width="" align="center" style="background-color:#eeeDDD;" class="tertiary-text"><B>PROPIETARIO</B></td>
				<td width="" align="center" style="background-color:#eeeDDD;" class="tertiary-text"><B>DIRECCION</B></td>
				<td width="" align="center" style="background-color:#eeeDDD;" class="tertiary-text"><B>TELEFONO</B></td>			
				<td width="" align="center" style="background-color:#eeeDDD;" class="tertiary-text"><B>CELULAR</B></td>
				<td width="" align="center" style="background-color:#eeeDDD;" class="tertiary-text"><B>E-MAIL</B></td>
			</tr>
			<?php
				for ($i = 0; $i <= $x; $i++) {
					if (!in_array($values_vete[ $i ], $values_vacunas)) {
						//echo "NOT Vacuna Id: ".$values_vete[ $i ]."<br>";
			?>
			<tr>
			<?php
				$sql_paciente="SELECT paciente,nom,ape,dir,tel1,tel2,email FROM vete WHERE veteid='".$values_vete[ $i ]."'";
				$paciente = mysql_query($sql_paciente);
				while($row = mysql_fetch_assoc($paciente)) {
			?>					
				<td align="center" width="" valign="top" class="tertiary-text"><?php echo "<b><a href='show.php?id=".$values_vete[ $i ]."' target='central'>".strtoupper($row['paciente'])."</a></b><br>";?></td>
				<td align="center" width="" valign="top" class="tertiary-text"><?php echo "".strtoupper($row['ape']).", ".strtoupper($row['nom'])."";?></td>					
				<td align="center" width="" valign="top" class="tertiary-text"><?php echo $row['dir'];?></td>
				<td align="center" width="" valign="top" class="tertiary-text"><?php if($row['tel1'] == 0) { echo "-"; } else { echo $row['tel1']; } ?></td>
				<td align="center" width="" valign="top" class="tertiary-text"><?php if($row['tel2'] == 0) { echo "-"; } else { echo $row['tel2']; } ?></td>
				<td align="center" width="" valign="top" class="tertiary-text"><?php if(!($row['email'] == NULL))  { echo $row['email']; } else { echo "-"; }?></td>
			<?php }	?>
			</tr>
			<?php
				} 
			}		
			?>
		</table>
		<?php 
			}	 //del if para contar la cantidad de registros
		?>
	</body>
</html>
