<?php
	include("require/session.php");
	include("require/config.php");
	$idq = trim($_GET['id']);
	$sql = "SELECT * FROM (
			(SELECT peluqueria.veteid, peluqueria.fecha FROM peluqueria) 
			UNION ALL
			(SELECT historias.veteid, historias.fecha FROM historias) 
			UNION ALL
			(SELECT vacunas.veteid, vacunas.fecha FROM vacunas)
			) results WHERE veteid='$idq' ORDER BY fecha DESC LIMIT 15";
	$result = mysql_query($sql);
	$values1 = array();
	$values2 = array();
	$x=0;
	while($row = mysql_fetch_assoc($result)) {

		$values1[ $x ] = substr($row['fecha'],8,2)."/".substr($row['fecha'],5,2); 
		$values1[ $x ] = ltrim($values1[ $x ], '0');  
		//echo $values1[ $x ];		
		//echo "<br>";
		$minute=substr($row['fecha'],14,2)/60;
		$minute=round($minute, 2);
		$minute=ltrim($minute, '0');  
		$values2[ $x ] = substr($row['fecha'],11,2).$minute;
		$values2[ $x ] = ltrim($values2[ $x ], '0');  
		//echo $values2[ $x ];
		//echo "<br>";
		//$values2[ $x ] = $values2[ $x ] * 3600 * 1000;
		//echo $values2[ $x ];
		$x=$x+1;
	}
	//print_r($values1);
	//print_r($values2);
	foreach ($values1 as $v) {
		$categorias=$categorias."'".$v."', ";	
	}
	$categorias=substr_replace($categorias ," ",-2);
	//echo $categorias;
	//echo "<br>";
	foreach ($values2 as $v) {
		$horarios=$horarios.$v.", ";	
	}
	$horarios=substr_replace($horarios ," ",-2);
	//echo $horarios;
?>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<title>TimeLine mascotas</title>
		<script type="text/javascript">
			$(function () {
				var chart;
				$(document).ready(function() {
					chart = new Highcharts.Chart({
						chart: {
							renderTo: 'container',
							type: 'spline',
							marginRight: 130,
							marginBottom: 25
						},
						title: {
							text: 'TIMELINE',
							x: -20 //center
						},
						subtitle: {
							text: 'Las visitas de cualquier indole que tuvo este paciente los ultimos 15 dias',
							x: -20
						},
						xAxis: {
							type: 'text',
							reversed: true,
							categories: [<?php echo $categorias; ?>]							
						},
						yAxis: {
							min:0, 
							max:23,
							type: 'text',
							reversed: true,
							title: {
								text: 'HORARIOS'
							},
							plotLines: [{
								value: 0,
								width: 2,
								color: '#808080'
							}],
							plotBands: [{ // Light air
							from: 10,
							to: 20.5,
							color: 'rgba(68, 170, 213, 0.1)',
							label: {
								text: 'Horario laboral',
								style: {
									color: '#606060'
								}
							}
						}]
						},
						tooltip: {
							formatter: function() {
									return '<b>'+ this.y +' Hs</b>';
							}
						},
						legend: {
							layout: 'vertical',
							align: 'right',
							verticalAlign: 'top',
							x: -10,
							y: 100,
							borderWidth: 1
						},
						series: [{
							name: 'Paciente',
			                marker: {
								symbol: 'url(http://localhost/alitas/pics/dog_icon.png)'
							},	
							data: [<?php echo $horarios; ?>]
						}]
					});
				});
				
			});
		</script>
	</head>
	<body>
		<script src="reportes/js/highcharts.js"></script>
		<script src="reportes/js/modules/exporting.js"></script>
		<div id="container" style="min-width: 90%; height: 400px; margin: 0 auto"></div>
	</body>
</html>
