<?php include("require/session.php"); ?>
<?php
$x=0;
foreach($_POST['var'] as $var) {
	if ($var == NULL)	{	$x=$x+1;	}	
}
foreach($_POST['esp'] as $esp) {
	if ($esp == NULL)	{	$x=$x+1;	}	
}
foreach($_POST['dias'] as $dias) {
	if ($dias == NULL)	{	$x=$x+1;	}	
}

$values_var = $_POST['var'];
$values_esp = $_POST['esp'];
$values_dias = $_POST['dias'];

if ( $x == 0 ) {
				
 		$_file = 'require/vacunas.csv';
   	$_fp = @fopen( $_file, 'w' );
   
   	$x = sizeof($_POST['var']);
  	
		for ($i = 0; $i < $x; $i++) {

				if($i == $x-1) { 
						$_csv_data = $values_var[$i].','.$values_esp[$i].','.$values_dias[$i];
					} else { 
						$_csv_data = $values_var[$i].','.$values_esp[$i].','.$values_dias[$i] . "\n"; 
					}
				
      @fwrite( $_fp, $_csv_data);			
			}
			
		@fclose( $_fp );	 
	 
} else {
	 echo  "No tienen las mismas cantidades <br />";
}

$msg = "Vacunas actualizadas satisfactoriamente.";
echo("<script language=\"javascript\">"); 
echo("self.location.href = \"alitasconfig_vacunas.php?msg=$msg\";"); 
echo("</script>");

?>
