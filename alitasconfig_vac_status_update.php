<?php include("require/session.php"); ?>
<?php
$x=0;
foreach($_POST['status'] as $status) {
	if ($status == NULL)	{	$x=$x+1;	}	
}

$values_status = $_POST['status'];

if ($x == 0 ){

 		$_file = 'require/vacuna_status.csv';
   	$_fp = @fopen( $_file, 'w' );
   
   	$x = sizeof($_POST['status']);
  	
		for ($i = 0; $i < $x; $i++) {
				if($i == $x-1) { 
						$_csv_data = $values_status[$i];
					} else { 
						$_csv_data = $values_status[$i] . "\n";
					}

      @fwrite( $_fp, $_csv_data);			
			}
			
		@fclose( $_fp );	 
	 
} else {
	 echo  "wrong values <br />";
	 echo $x;
}

$msg = "Estado para las vacunas actualizados satisfactoriamente.";
echo("<script language=\"javascript\">"); 
echo("self.location.href = \"alitasconfig_vacunas.php?msg=$msg\";"); 
echo("</script>");

?>
