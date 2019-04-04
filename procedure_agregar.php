<script type="text/javascript">
	<!--
	var lastDiv = "";
	function showDiv(divName) {
		// hide last div
		if (lastDiv) {
			document.getElementById(lastDiv).className = "hiddenDiv";
		}
		//if value of the box is not nothing and an object with that name exists, then change the class
		if (divName && document.getElementById(divName)) {
			document.getElementById(divName).className = "visibleDiv";
			lastDiv = divName;
		}
	}
	function DoSubmit ()	{
		if (document.historia_post.Texto.value == "") {
			updateRTEs();
			var titleError = document.getElementById('titleError');
			titleError.innerHTML = "No ha ingresado: Motivo de consulta/Notas/Descripciones.";
			//alert ("Enter your support ticket!");
			document.form.Texto.focus ();
			return "";
		}
		updateRTEs();
		document.historia_post.submit ();
	  }
  //-->
</script>


<form name="historia_post" action="procedure_agregar_post.php" method="post">
<div class="grid" align="left" style="width=100%;">
	<input class="input" type="hidden" name="veteid" value="<?php echo $id; ?>"/>
	<input class="input" type="hidden" name="medi"   value="<?php echo $_SESSION['username'];?>"/>
	<input class="input" type="hidden" name="fecha"  value="<?php echo date("Y-m-d G:i:s"); ?>"/>
	
		<div class="row">
			<div class="span7">
				<div class="row">
					<div class="span2" align="center"><label for="type">Tipo</label></div>
					<div class="span5" align="left">
						<select name="type" size="1" onchange="showDiv(this.value);">					
							<option value="Historia">Historia</option>						
							<option value="Peluqueria">Peluqueria</option>
							<option value="Vacunas">Vacunas</option>
						</select>					
					</div>
				</div>
			</div>
		</div>

		<div class="row">
			<div class="span8">
				<div class="row">
					<div class="span2" align="left"><label for="Opciones"></label></div>
					<div class="span6" align="left">
						<div id="Historia"   class="hiddenDiv">Historia - Sin mas opciones extras...</div>
						<div id="Vacunas" class="hiddenDiv">
							<?php
								$file = new SplFileObject("require/vacunas.csv");
								$file->setFlags(SplFileObject::READ_CSV);
								$file->setCsvControl(',', '"', '\\'); // this is the default anyway though
								$VAC = array();
								$ESP = array();
								$VEN = array();
								$x=1;
								foreach ($file as $row) {
								    list ($VAC[$x], $ESP[$x], $VEN[$x]) = $row;
								    $x=$x+1;
								    //echo $VAC[$x];
								    //echo $ESP[$x];
									//echo $VEN[$x];
								}
							//echo "ESPECIE: ".strtoupper($espe[0])."<br>";
							?>
							<select name="Vacuna" size="1" >
							<?php							
							for ($i = 1; $i < $x; $i++) {
								if (strpos($ESP[$i], strtoupper($espe[0])) !== false) {
							    //echo 'true';
							    echo "<option value='".$VAC[$i]."'>".$VAC[$i]."</option>";
								}
								//echo "".$ESP[$i]."<br>";
							}						
							//echo "ESPECIE: ".strtoupper($espe[0])."<br>"
							?>
							</select>							
						</div>
						<div id="Peluqueria" class="hiddenDiv">
							<input type="radio" name="pelu_trabajo" value="Baño" checked> Ba&ntilde;o 
							<input type="radio" name="pelu_trabajo" value="Corte" > Corte 
							<input type="radio" name="pelu_trabajo" value="Baño y Corte"> Ba&ntilde;o y Corte
							<input type="radio" name="pelu_trabajo" value="Corte Tijera" > Corte  Tijera  
						</div>						
					</div>
				</div>
			</div>
		</div>
		
		<div class="row">
			<div class="span7">
				<div class="row">
					<div class="span2" align="center">
						<label for="Texto">Motivo de consulta<br>Notas<br>Descripciones</label>
					</div>
					<div class="span5" align="left">

						<script language="JavaScript" type="text/javascript">
						<!--
						//Usage: initRTE(imagesPath, includesPath, cssFile)
						initRTE("images/", "", "");
						//-->
						</script>
						<noscript><p><b>Javascript must be enabled to use this form.</b></p></noscript>

						<script language="JavaScript" type="text/javascript">
						<!--
						//Usage: writeRichText(fieldname, html, width, height, buttons, readOnly)
						writeRichText('Texto', '', 520, 200, true, false);
						//-->
						</script>

					</div>
				</div>
			</div>
		</div>

		<div class="row">
			<div class="span7" align="center">
				<input type="hidden" name="mode" value="submit">
				<button class="bg-color-green" onclick="DoSubmit ();" type="button"><i class="icon-checkmark"></i> <span class="label fg-color-white"><b>INGRESAR</b></span></button>
			</div>
		</div>

		<div class="row">
			<div class="span7" align="center">
				<span id="titleError" style="color:#FF0000;font-weight: bold;font-size: 11px;"></span>	
			</div>
		</div>
	</form>
</div>