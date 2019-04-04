
<?php
	$titulo="Reporte estadistico de mascotas";
	include("require/config.php");
	require("require/alasfun.php");
	$sql="SELECT especie, COUNT(especie) FROM vete GROUP BY especie";
	//$sql="SELECT especie, COUNT(especie) FROM vete WHERE fallecido='1' GROUP BY especie  ";
	$result = mysql_query($sql);
	$values = array(); 
	while($row = mysql_fetch_assoc($result)) {
		$values[ $row['especie'] ] = $row['COUNT(especie)']; 
	}
	$values['canino']=$values['canino']+10;
	$values['felino']=$values['felino']+10;
	$values['otros']=$values['otros']+10;
	/*
	Si hay pocos pacientes no hay grafico de tortita
	$values['canino']=10;
	$values['felino']=10;
	$values['otros']=10;
	*/
?>

<html>
	<head>
		<?php include("header.php");	?>
		<script type="text/javascript" src="js/jquery.min.js"></script>
		<script type="text/javascript">
		$(function () {
			var chart;
			$(document).ready(function() {
				chart = new Highcharts.Chart({
					chart: {
						renderTo: 'container',
						plotBackgroundColor: null,
						plotBorderWidth: null,
						plotShadow: false
					},
					title: {
						text: ' '
					},
					tooltip: {
						percentageDecimals: 2,
						formatter: function() {
							return '<b>'+ this.point.name +'</b>: '+ this.percentage +' %';
						}						
					},
					plotOptions: {
						pie: {
							allowPointSelect: true,
							cursor: 'pointer',
							dataLabels: {
								enabled: true,
								color: '#000000',
								connectorColor: '#000000',
								formatter: function() {
									return '<b>'+ this.point.name +'</b>: '+ this.percentage +' %';
								}
							}
						}
					},
					series: [{
						type: 'pie',
						name: 'Browser share',
						data: [
							['Can',   <?=$values['canino']?>],
							['Fel',   <?=$values['felino']?>],
							['Otros', <?=$values['otros']?>],
						]
					}]
				});
			});
			
		});
		</script>
		<script src="js/highcharts.js"></script>
		<script src="js/modules/exporting.js"></script>
	</head>
		<?php include("require/bodying.php");	?>
		<?php	if ($print!=1)	{	?><div class="prettyprint" align="right"><a href="reportes_torta_especies.php?print=1" target="_blank" title="Imprimir"><i class="icon-printer"></i></a>&nbsp;</div><?php	}	?>
		
		<div class="row" align="left">
			<pre class='prettyprint'><i class='icon-chart-alt'></i><b><?php echo $titulo ?></b></pre>
		</div>
		
		<div class="row bg-color-white" align="center">
			<?php
			  //CAN F
				$result = mysql_query("SELECT COUNT(sexo) FROM vete WHERE sexo='f' and especie='canino'");
				while($row = mysql_fetch_array($result)){ $canf = $row['COUNT(sexo)'];	 }
			  //CAN M		
				$result = mysql_query("SELECT COUNT(sexo) FROM vete WHERE sexo='m' and especie='canino'");
				while($row = mysql_fetch_array($result)){	$canm = $row['COUNT(sexo)']; }
			  //FEL M		
				$result = mysql_query("SELECT COUNT(sexo) FROM vete WHERE sexo='f' and especie='felino'");
				while($row = mysql_fetch_array($result)){	$felf = $row['COUNT(sexo)'];	}
			//FEL F	
				$result = mysql_query("SELECT COUNT(sexo) FROM vete WHERE sexo='m' and especie='felino'");
				while($row = mysql_fetch_array($result)){	$felm = $row['COUNT(sexo)'];	}
			  //OTROS M		
				$result = mysql_query("SELECT COUNT(sexo) FROM vete WHERE sexo='f' and especie='otros'");
				while($row = mysql_fetch_array($result)){	$otrosf = $row['COUNT(sexo)'];	}
			//OTROS F	
				$result = mysql_query("SELECT COUNT(sexo) FROM vete WHERE sexo='m' and especie='otros'");
				while($row = mysql_fetch_array($result)){	$otrosm = $row['COUNT(sexo)'];	}
			?>
			<table class="striped" cellpadding="1" cellspacing="1" style="border:1px solid black;">
			<tr>
				<td width="" align="center" style="background-color:#FFFFFF;" class="tertiary-text"><B>\</B></td>
				<td width="" align="center" style="background-color:#eeeDDD;" class="tertiary-text"><B>CANINOS</B></td>
				<td width="" align="center" style="background-color:#eeeDDD;" class="tertiary-text"><B>FELINOS</B></td>
				<td width="" align="center" style="background-color:#eeeDDD;" class="tertiary-text"><B>OTROS</B></td>
				<td width="" align="center" style="background-color:#eeeDDD;" class="tertiary-text"><B>TOTALES</B></td>
			</tr>
			<tr>
				<td width="" align="center" style="background-color:#eeeDDD;" class="tertiary-text"><?php echo getsex('F'); ?></td>
				<td align="center" class="tertiary-text" width="" style="background-color:#FFFFFF;" valign="middle"><B><? echo $canf ?></B></td>				
				<td align="center" class="tertiary-text" width="" style="background-color:#FFFFFF;" valign="middle"><B><? echo $felf ?></B></td>
				<td align="center" class="tertiary-text" width="" style="background-color:#FFFFFF;" valign="middle"><B><? echo $otrosf ?></B></td>			
				<td align="center" class="tertiary-text" width="" style="background-color:#FFFFFF;" valign="middle"><B><? echo $canf+$felf+$otrosf ?></B></td>			
			</tr>			
			<tr>
				<td width="" align="center" style="background-color:#eeeDDD;" class="tertiary-text"><?php echo getsex('M'); ?></td>
				<td align="center" class="tertiary-text" width="" style="background-color:#FFFFFF;" valign="middle"><B><? echo $canm ?></B></td>				
				<td align="center" class="tertiary-text" width="" style="background-color:#FFFFFF;" valign="middle"><B><? echo $felm ?></B></td>
				<td align="center" class="tertiary-text" width="" style="background-color:#FFFFFF;" valign="middle"><B><? echo $otrosm ?></B></td>
				<td align="center" class="tertiary-text" width="" style="background-color:#FFFFFF;" valign="middle"><B><? echo $canm+$felm+$otrosm ?></B></td>				
			</tr>
			<tr>
				<td width="" align="center" style="background-color:#eeeDDD;" class="tertiary-text"><B>TOTALES</B></td>
				<td align="center" class="tertiary-text" width="" style="background-color:#FFFFFF;" valign="middle"><B><? echo $canm+$canf ?></B></td>				
				<td align="center" class="tertiary-text" width="" style="background-color:#FFFFFF;" valign="middle"><B><? echo $felm+$felf ?></B></td>
				<td align="center" class="tertiary-text" width="" style="background-color:#FFFFFF;" valign="middle"><B><? echo $otrosm+$otrosf ?></B></td>
				<td align="center" class="tertiary-text" width="" style="background-color:#FFFFFF;" valign="middle"><B><? echo $canm+$felm+$otrosm+$canf+$felf+$otrosf ?></B></td>				
			</tr>			
			</table>
		</div>
		<div class="row bg-color-white" align="center">
					<div id="container" style="min-width: 200px; height: 200px; margin: 0 auto;"></div>
		</div>					

		<div class="row" align="left">
			<pre class='prettyprint'><i class='icon-chart-alt'></i><b>Mascotas agrupadas por especies y razas.</b></pre>
		</div>
			
		<table class="" cellpadding="0" cellspacing="0"  >
			<tr>
				<td valign="top">
					<table class="striped" cellpadding="1" cellspacing="1" style="border:1px solid black;">
						<tr>
							<td width="" align="center" style="background-color:#eeeDDD;" class="tertiary-text"><B>RAZAS CANINAS</B></td>
							<td width="" align="center" style="background-color:#eeeDDD;" class="tertiary-text"><B>CANTIDAD</B></td>
						</tr>			
					<?php
						//GROUP BY RAZAS CANINAS
						$result = mysql_query("SELECT raza, COUNT(raza) FROM vete WHERE especie='canino' GROUP BY raza ORDER BY COUNT(raza) DESC");
						while($row = mysql_fetch_array($result)){
							?>
							<tr>
								<td align="center" class="tertiary-text" width="" style="background-color:#FFFFFF;" valign="middle"><a href="reporte_listasegunraza.php?especie=canino&raza=<? echo $row['raza']; ?>" target="central" title="Ver pacientes de la raza: <? echo $row['raza']; ?>"><B><? echo strtoupper($row['raza']); ?></B></a></td>
								<td align="center" class="tertiary-text" width="" style="background-color:#FFFFFF;" valign="middle"><B><? echo $row['COUNT(raza)']; ?></B></td>
							</tr>
							<?php 
						}
					?>
					</table>				
				</td>
				<td  valign="top">
						<table class="striped" cellpadding="1" cellspacing="1" style="border:1px solid black;">
						<tr>
							<td width="" align="center" style="background-color:#eeeDDD;" class="tertiary-text"><B>RAZAS FELINAS</B></td>
							<td width="" align="center" style="background-color:#eeeDDD;" class="tertiary-text"><B>CANTIDAD</B></td>
						</tr>			
					<?php
						//GROUP BY RAZAS FELINAS
						$result = mysql_query("SELECT raza, COUNT(raza) FROM vete WHERE especie='felino' GROUP BY raza ORDER BY COUNT(raza) DESC");
						while($row = mysql_fetch_array($result)){
							?>
							<tr>
								<td align="center" class="tertiary-text" width="" style="background-color:#FFFFFF;" valign="middle"><a href="reporte_listasegunraza.php?especie=felino&raza=<? echo $row['raza']; ?>" target="central" title="Ver pacientes de la raza: <? echo $row['raza']; ?>" ><B><? echo strtoupper($row['raza']); ?></B></a></td>
								<td align="center" class="tertiary-text" width="" style="background-color:#FFFFFF;" valign="middle"><B><? echo $row['COUNT(raza)']; ?></B></td>
							</tr>
							<?php 
						}
					?>
					</table>
				</td>
				<td valign="top">
					<table class="striped" cellpadding="1" cellspacing="1" style="border:1px solid black;">
						<tr>
							<td width="" align="center" style="background-color:#eeeDDD;" class="tertiary-text"><B>OTROS</B></td>
							<td width="" align="center" style="background-color:#eeeDDD;" class="tertiary-text"><B>CANTIDAD</B></td>
						</tr>			
					<?php
						//GROUP BY RAZAS FELINAS
						$result = mysql_query("SELECT raza, COUNT(raza) FROM vete WHERE especie='otros' GROUP BY raza ORDER BY COUNT(raza) DESC");
						while($row = mysql_fetch_array($result)){
							?>
							<tr>
								<td align="center" class="tertiary-text" width="" style="background-color:#FFFFFF;" valign="middle"><a href="reporte_listasegunraza.php?especie=otros&raza=<? echo $row['raza']; ?>" target="central" title="Ver pacientes de la raza: <? echo $row['raza']; ?>"><B><? echo strtoupper($row['raza']); ?></B></a></td>
								<td align="center" class="tertiary-text" width="" style="background-color:#FFFFFF;" valign="middle"><B><? echo $row['COUNT(raza)']; ?></B></td>
							</tr>
							<?php 
						}
					?>
					</table>				
				</td>
			</tr>				
		</table>
		</div>
	</div>			
</body>
</html>

