<div class="prettyprint" align="right">
	<a href="javascript:window.print()" title="Imprimir"><i class="icon-printer"></i></a>&nbsp;
</div>
<?php
$peri=$_GET["peri"];
$repa=$_GET["repa"];
$repb=$_GET["repb"];
$repc=$_GET["repc"];
//echo $peri;
//echo $repa;
//echo $repb;
//echo $repc;
$rep= array("false", "false", "false");
if (($repa == "a") or ($repb == "b") or ($repc == "c")) {
	//echo "<h4>Reporte del tipo: </h4>";	
	if ($repa == "a") { //echo "Historias medicas, "; 
						$rep[0]="historias";}
	if ($repb == "b") { //echo "Vacunas, "; 
						$rep[1]="vacunas";}
	if ($repc == "c") { //echo "Peluqueria"; 
						$rep[2]="peluqueria";}
	//echo " para el periodo '".$peri."' </div>";
	//echo "<br><br>";
		
	//var_dump($rep);
	//echo "<br>";
	//$x=0;
	
	include("require/config.php");
	for ($x = 0; $x < 3; $x++) {
		//echo "[".$x."] Reps: " . $rep[$x] . "<br>";
	
		if ($rep[$x] != "false") {			
			switch ($peri) {
				case "hoy":
					$sql="SELECT * FROM ".$rep[$x]." WHERE DATE(fecha) = CURDATE() ORDER BY fecha DESC";
				break;
				case "ayer":
					$sql="SELECT * FROM ".$rep[$x]." WHERE fecha < CURDATE( ) AND fecha > DATE_ADD( CURDATE( ) , INTERVAL -1 DAY ) ORDER BY fecha DESC ";
				break;
				case "7dias":
					$sql="SELECT * FROM ".$rep[$x]." WHERE DATE(fecha) = CURDATE( ) OR fecha < CURDATE( ) AND fecha > DATE_ADD( CURDATE( ) , INTERVAL -7 DAY ) ORDER BY fecha DESC ";
				break;
				case "15dias":
					$sql="SELECT * FROM ".$rep[$x]." WHERE DATE(fecha) = CURDATE( ) OR fecha < CURDATE( ) AND fecha > DATE_ADD( CURDATE( ) , INTERVAL -15 DAY ) ORDER BY fecha DESC ";
				break;
				case "mesactual":
					$sql="SELECT * FROM ".$rep[$x]." WHERE MONTH( fecha ) = MONTH(CURRENT_TIMESTAMP ) AND YEAR( fecha ) = YEAR(CURRENT_TIMESTAMP ) ORDER BY fecha DESC";										
				break;
				case "mesanterior":
					$sql="SELECT * FROM ".$rep[$x]." WHERE MONTH(fecha) = (MONTH(NOW()) - 1) AND YEAR(fecha) = YEAR(NOW()) ORDER BY fecha DESC";
				break;
				case "6meses":
					$sql="SELECT * FROM ".$rep[$x]." WHERE fecha > DATE_SUB( now( ) , INTERVAL 6 MONTH )  ORDER BY fecha DESC ";
				break;
				case "ano":
					$sql="SELECT * FROM ".$rep[$x]." WHERE YEAR(fecha) = YEAR(CURDATE()) ORDER BY fecha DESC";										
				break;
				case "ano2":
					$sql="SELECT * FROM ".$rep[$x]." WHERE YEAR(fecha) = (YEAR(NOW()) - 1)  ORDER BY fecha DESC";
				break;				
			}			
			$result = mysql_query($sql);
			//echo mysql_num_rows($result);
			echo "<pre class='prettyprint linenums'><i class='icon-chart-alt'></i><b>".strtoupper($rep[$x])."</b>: ".mysql_num_rows($result)." resultados</pre>";
			?>
			<table border="0" align="left" cellspacing="0" cellpadding="0" class="bordered" width="">
			<?php
			$i=1;
			while($row = mysql_fetch_assoc($result)) {
			  if ($i%2==0){ $color="#FFFFFF";	}else{$color="#FFFFFF";	}
			  echo "<tr style='background-color:".$color."'>";
			  ?>
			  <td width="10%" align="center" valign="top" class="tertiary-text">
				<?php 
					echo substr($row['fecha'],8,2)."/".substr($row['fecha'],5,2)."/".substr($row['fecha'],0,4);
					echo "<br>";
					echo substr($row['fecha'],11,8);
				?>
				  <br>
				  <small>(<?php echo $row['medico'];?>)</small>
			  </td>
			  <td width="10%" align="center" valign="top" class="tertiary-text">
  				<?php 
					$idq=$row['veteid'];
					include("procedure_pacientes.php");	
				?>	
			  </td>			  
			  <?php
				switch ($rep[$x]) {
					case "historias":
						?>
						<td width="99%" valign="top" class="tertiary-text">
								<?php echo $row['texto'];?>
						</td>
						<?php
					break;
					case "vacunas":
						?>
						<td width="99%" valign="top" class="tertiary-text">
								<b><?php echo $row['vacuna'];?>:</b> <?php echo $row['texto'];?>
						</td>
						<?php
					break;
					case "peluqueria":
						?>
						<td width="99%" valign="top" class="tertiary-text">
							<b><?php echo $row['trabajo'];?></b> - <?php echo $row['texto'];?>
						</td>
						<?php
					break;
				}
				echo "</tr>";
				$i=$i+1;
			  }
			echo "</table>";
			echo "&nbsp;";
		}	
		
	}
	mysql_close($con);
} else { 	
	echo "<pre class='prettyprint linenums'><i class='icon-chart-alt'></i><b>Seleccione al menos un tipo de reporte !!!</b></pre>";	
}

?>
