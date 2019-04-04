<meta charset="utf-8">
<meta name="description" content="Software minimalista de gestion veterinaria">
<meta name="author" content="Diego Pereyra" >
<meta name="keywords" content="veterinaria, gestion, alas, perros, gatos, vacunas">
<?php
	$print=trim($_GET["print"]);
	if ($print==1) { 					
?>
	<script language="Javascript1.2">
		 <!--
		  function printpage() {
		  window.print();
		  }
		  //-->
	</script>	
	<style type="text/css">
		body { width:210mm; height:297mm; margin-left: auto;	margin-right: auto;	   background: white; font-size: 12pt;}
		@media screen	{		p.bodyText {font-family:verdana, arial, sans-serif;}		}
		@media print		{		p.bodyText {font-family:georgia, times, serif;}		}
		@media screen, print		{		p.bodyText {font-size:10pt}		}
		@page Section1 {
			size:8.27in 11.69in; 
			margin:.5in .5in .5in .5in; 
			mso-header-margin:.5in; 
			mso-footer-margin:.5in; 
			mso-paper-source:0;
		}
		a:link, a:visited {
			 color: #000;
			 background: transparent;
		}
	</style>

<?php		} ?>		
<title><?php include("require/title.alas"); ?> <?php echo $titulo;?></title>
<link href="css/modern.css" rel="stylesheet">
<link href="css/modern-responsive.css" rel="stylesheet">
<link rel="icon" href="favicon.ico" type="image/x-icon">
<link rel="shortcut icon" href="favicon.ico" type="image/x-icon">