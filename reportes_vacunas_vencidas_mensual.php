<?php 
	include("require/session.php");
	require("require/alasfun.php");
	include("require/config.php");

$file = new SplFileObject("require/vacunas.csv");
$file->setFlags(SplFileObject::READ_CSV);
$file->setCsvControl(',', '"', '\\'); // this is the default anyway though
$VAC = array();
$VEN = array();
$x=1;
foreach ($file as $row) {
    list ($VAC[$x], $ESP[$x], $VEN[$x]) = $row;
    $x=$x+1;
}

//selecciono todos los registros de vacunas de los ultimos tres meses (90 dias) como tope para verificar las vencidas. 
	$sql_vacunas="SELECT * FROM vacunas WHERE  fecha > (NOW() - INTERVAL 3 MONTH) ORDER BY fecha ASC" ;

?>
<html>
	<head>
		<?php include("header.php")?>
		<script type="text/javascript">
			function saveChanges(var1,var2)
			{
			if (var1=="")
			  {
			  document.getElementById("var1").innerHTML="";
			  return;
			  } 
			if (window.XMLHttpRequest)
			  {// code for IE7+, Firefox, Chrome, Opera, Safari
			  xmlhttp=new XMLHttpRequest();
			  }
			else
			  {// code for IE6, IE5
			  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
			  }
			xmlhttp.onreadystatechange=function()
			  {
			  if (xmlhttp.readyState==4 && xmlhttp.status==200)
			    {
			    document.getElementById(var1).innerHTML=xmlhttp.responseText;
			    }
			  }
			xmlhttp.open("GET","reportes_vac_status_update.php?q="+var1+'&w='+var2,true);
			xmlhttp.send();
			}
		</script>	
	</head>
	<body class="modern-ui">
	
		<div class="prettyprint" align="right">	
			<a href="javascript:window.print()" title="Imprimir"><i class="icon-printer"></i></a>&nbsp;
			<a href="reportes_vacunas_vencidas_mensual.php" target="central" title="Actualizar vista."><i class="icon-loop"></i></a>
		</div>		

		<div class="row" align="left">
			<pre class='prettyprint'><i class='icon-chart-alt'></i><b>Vencimiento de vacunas del mes de <?php echo $meses[date("n")]; ?></b></pre>
		</div>

	<?php 
		$vacunas = mysql_query($sql_vacunas);
		if (mysql_num_rows($vacunas) == 0) { 
			echo "<center>No hay registros aun...</center>"; 
		} else { 
	?>
		
<table border="0" class="striped" width="500">
	<tr>
	<!--
			<td width="" align="center" style="background-color:#eeeDDD;" class="tertiary-text"><B>VACUID</B></td>
			<td width="" align="center" style="background-color:#eeeDDD;" class="tertiary-text"><B>VETEID</B></td>
	-->
			<td width=""    align="center" style="background-color:#eeeDDD;" class="tertiary-text"><B>MASCOTA</B></td>
			<td width=""    align="center" style="background-color:#eeeDDD;" class="tertiary-text"><B>PROPIETARIO</B></td>			
			<td width=""    align="center" style="background-color:#eeeDDD;" class="tertiary-text"><B>TELEFONOS</B></td>
			<td width=""    align="center" style="background-color:#eeeDDD;" class="tertiary-text"><B>EMAIL</B></td>
			<td width="100" align="center" style="background-color:#eeeDDD;" class="tertiary-text"><B>VACUNA</B></td>			
			<td width="99"  align="center" style="background-color:#eeeDDD;" class="tertiary-text"><B>FECHA<br>VACUNA</B></td>
<!--<td width="99"  align="center" style="background-color:#eeeDDD;" class="tertiary-text"><B>FECHA<br>ACTUAL</B></td>-->
			<td width="150" align="center" style="background-color:#eeeDDD;" class="tertiary-text"><B>FECHA<br>VENCIMIENTO</B></td>
			<td width="99"  align="center" style="background-color:#eeeDDD;" class="tertiary-text"><B>DIAS<br>VENCIDA</B></td>
			<td width="150" align="center" style="background-color:#eeeDDD;" class="tertiary-text"><B>AVISO</B></td>
			<td width="30"    align="center" style="background-color:#eeeDDD;" class="tertiary-text"></td>
	</tr>			
		<?php	
			while($row = mysql_fetch_assoc($vacunas)) {
				$vacuid=$row['vacuid'];
				$rowstatus=$row['status'];
				//$vete_vac=$row['vacuna'];
				$day1=substr($row['fecha'],0,4)."-".substr($row['fecha'],5,2)."-".substr($row['fecha'],8,2); //fecha vacuna
				$day2=date("Y-m-d"); //fecha actual
		?>				
	<tr>
		<!--
			<td align="center" width="" valign="top" class="tertiary-text"><?php echo $row['vacuid'];?></td>
			<td align="center" width="" valign="top" class="tertiary-text"><?php echo $row['veteid'];?></td>
		-->
  	<?php 
			$idq=$row['veteid'];
			include("reportes_vacunas_vencidas_mensual_mascotas.php");	
		?>	
		<?php
				for ($i = 1; $i < $x; $i++) {					
					if ($VAC[$i] == $row['vacuna']) {
							$day3=date('Y-m-d', strtotime($day1. ' + '.$VEN[$i].' days'));; //fecha vencimiento
							$daydiff=dateDiff($day3, $day2);
		?>
			<td align="center" width="" valign="top" class="tertiary-text"><?php echo $row['vacuna']." (".$VEN[$i].")";?></td>
			<td align="center" width="" valign="top" class="tertiary-text"><?php echo ConvFecha($day1);?></td>
<!-- <td align="center" width="" valign="top" class="tertiary-text"><?php echo $day2;?></td>		-->	
			<td align="center" width="" valign="top" class="tertiary-text"><?php echo ConvFecha($day3);?></td>
			<td align="center" width="" valign="top" class="tertiary-text">
				<?php
					if ($daydiff >= 0) { echo "<div class='bg-color-orangeDark'><b>"; }
					if (($daydiff < 0) && ($daydiff > -15))  {echo "<div class='bg-color-yellow'><b>"; } 
					if ($daydiff <= -15)  { echo "<div class='bg-color-green'><b>"; }					
					echo $daydiff;
					echo "</b></div>";
				?>
			</td>
			<td align="center" width="" valign="top" class="tertiary-text">
			
				<?php
					
					$file = new SplFileObject("require/vacuna_status.csv");
					$file->setFlags(SplFileObject::READ_CSV);
					$file->setCsvControl(',', '"', '\\'); // this is the default anyway though
					$status = array();

					$x=1;
					foreach ($file as $row) {
					    list ($status[$x]) = $row;
					    $x=$x+1;
					    //echo $status[$x];
					    // Do something with values
					}
				?>
				
				<select name="<?php echo $vacuid; ?>" class="input" onchange="saveChanges(this.name,this.value);">
						<option value=" " <?php if ($rowstatus ==' ') { echo "selected='selected'"; } ?> >  </option> 
						<?php
						for ($i = 1; $i < $x; $i++) {
							echo "<option ";
							if ($rowstatus == $status[$i]) { echo "selected='selected'"; }   
							echo "value='".$status[$i]."'>".$status[$i]."</option>";	 	
							}
						?>				
				</select>

			</td>
			<td align="center" width="" valign="top" class="tertiary-text"><div id="<?php echo $vacuid; ?>"><br></div></td>
		<?php		
						}
					}			
		?>
					
	</tr>
	<?php
		} 
	?>
</table>
<?php	
	} //del IF si hay registros que mostrar
?>
	</body>
</html>
