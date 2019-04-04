<?php
	$file = new SplFileObject("require/vacuna_status.csv");
	$file->setFlags(SplFileObject::READ_CSV);
	$file->setCsvControl(',', '"', '\\'); // this is the default anyway though
	$status = array();
	$x=1;
	foreach ($file as $row) {
	    list ($status[$x]) = $row;
	    $x=$x+1;
	    // Do something with values
	}
?>

<script language="javascript">

	fields = 0;
	function addmasstatus() {
		if (fields != 10) {
			document.getElementById('masstatus').innerHTML += "<div class='row'><div class='tertiary-text span4'><input type='text' name='status[]' required='1' value='' /></div><div class='tertiary-text span1'><p class='delete_activity'>X</p></div></div>";
			fields += 1;
		} else {
			document.getElementById('msg').innerHTML += "<br />Only 10 fields allowed.";
			document.form.add.disabled=true;
		}
	}

</script>

<form name="config" action="alitasconfig_vac_status_update.php" method="post" onsubmit="if(isFormValid())alert('Todo ok'); else { alert('Algo esta mal completado');return false; }">
  
	  <div class="grid span5">
	     <div class="row">
	         <div style="background-color:#eeeDDD;" class="tertiary-text span5" align="center"><b>STATUS</b></div>
	     </div>
	
	<?php	for ($i = 1; $i < $x; $i++) { ?>	
 
	     <div class="row">
	         <div class="tertiary-text span4">
	         	<input type="text" name='status[]' required="1" value="<?php echo $status[$i]; ?>" />
	         </div>
	         <div class="tertiary-text span1">	         
	          		<p class="delete_activity">X</p> 
	         </div>
	     </div>

	<?php	} ?>	
				<div class="row" id="masstatus">
				</div>
	     
	     <div class="row">
	         <div class="span5"><button class="bg-color-green" onclick="addmasstatus()" name="add"    type="button"><i class="icon-plus-2"></i> <span class="label fg-color-white"><b>Agregar</b></span></button></div>         
	         <div class="span5"><input type="submit" name="submit" class="default" value="Actualizar"/></div>
	     </div>
	  </div>

</form>
<script>
$('.delete_activity').click(function (e) { 
  $(this).parents('div.row').remove();
  e.preventDefault();
});
</script>