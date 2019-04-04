<?php
	$file = new SplFileObject("require/vacunas.csv");
	$file->setFlags(SplFileObject::READ_CSV);
	$file->setCsvControl(',', '"', '\\'); // this is the default anyway though
	$VAC = array();
	$VEN = array();
	$x=1;
	foreach ($file as $row) {
	    list ($VAC[$x], $ESP[$x], $VEN[$x]) = $row;
	    $x=$x+1;
	    // Do something with values
	}
?>

<script language="javascript">

	fields = 0;
	function addInput() {
		if (fields != 10) {
			document.getElementById('text').innerHTML += "<div class='row'><div class='tertiary-text span3'><input type='text' name='var[]' required='1' value='' /></div><div class='tertiary-text span2'><select name='esp[]'><option value='CFO'>CFO</option><option value='C'>CANINOS</option><option value='F'>FELINOS</option><option value='CF'>CANINOS&FELINOS</option><option value='O'>OTROS</option></select></div>			<div class='tertiary-text span2' style='margin-left:40px;'><input type='text' name='dias[]' required='1' value='0' maxlength='4' size='4' mask='numeric'/></div><div class='tertiary-text span2' align='center'><p class='delete_activity'>o_0</p></div></div>";
			fields += 1;
		} else {
			document.getElementById('text').innerHTML += "<br />Only 10 fields allowed.";
			document.form.add.disabled=true;
		}
	}

</script>

<form name="config" action="alitasconfig_vac_update.php" method="post" onsubmit="if(isFormValid())alert('Todo ok'); else { alert('Algo esta mal completado');return false; }">
  
	  <div class="grid span9">
	     <div class="row">
	         <div style="background-color:#eeeDDD;" class="tertiary-text span3" align="center"><b>TIPO DE VACUNA</b></div>
	         <div style="background-color:#eeeDDD;" class="tertiary-text span2" align="center"><b>ESPECIE</b></div>
	         <div style="background-color:#eeeDDD;" class="tertiary-text span2" align="center"><b>DURACION EN DIAS</b></div>
	         <div style="background-color:#eeeDDD;" class="tertiary-text span2" align="center"><b>ELIMINAR</b></div>
	     </div>
	
	<?php	for ($i = 1; $i < $x; $i++) { ?>	


					  	  
	     <div class="row">
	         <div class="tertiary-text span3">
	         	<input type="text" name='var[]' required="1" value="<?php echo $VAC[$i]; ?>" />
	         </div>
	         <div class="tertiary-text span2">
	         	<!-- <input type="text" name='esp[]' required="1" size="3" value="<?php echo $ESP[$i]; ?>" /> -->
	         	<select name='esp[]' size="1">
					  <?php echo "<option value='CFO'";	if ($ESP[$i] == "CFO") { echo "SELECTED"; }	echo ">CFO</option>";?>
					  <?php echo "<option value='C'";	if ($ESP[$i] == "C") { echo "SELECTED"; }	echo ">CANINOS</option>";?>
					  <?php echo "<option value='F'";	if ($ESP[$i] == "F") { echo "SELECTED"; }	echo ">FELINOS</option>";?>
					  <?php echo "<option value='CF'";	if ($ESP[$i] == "CF") { echo "SELECTED"; }	echo ">CANINOS&FELINOS</option>";?>
					  <?php echo "<option value='O'";	if ($ESP[$i] == "O") { echo "SELECTED"; }	echo ">OTROS</option>";?>
					</select>  
	         </div>	         
	         <div class="tertiary-text span2" style="margin-left:40px;">
				<input type="text" name='dias[]' required="1" value="<?php echo $VEN[$i]; ?>" maxlength="4" size="4" mask="numeric"/>
	         </div>
	         <div class="tertiary-text span2" align="center">	         
	          		<p class="delete_activity">X</p> 
	         </div>
	     </div>

	<?php	} ?>	
				<div class="row" id="text">
				</div>
	     
	     <div class="row">
	         <div class="span3"><button class="bg-color-green" onclick="addInput()" name="add"    type="button"><i class="icon-plus-2"></i> <span class="label fg-color-white"><b>Agregar</b></span></button></div>
	         <div class="span3"><a class="button bg-color-red fg-color-white" href="alitasconfig.php" target="central" title="Cancela edicion"><b>CANCELAR</b></a></div>         
	         <div class="span3"><input type="submit" name="submit" class="default" value="Actualizar"/></div>
	     </div>
	  </div>

</form>
<i>*CFO= CANINOS, FELINOS, OTROS</i>
<script>
$('.delete_activity').click(function (e) { 
  $(this).parents('div.row').remove();
  e.preventDefault();
});
</script>