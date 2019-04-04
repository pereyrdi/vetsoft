<?php include("require/session.php"); ?>
<html>  
    <head>  
		<title><?php include("require/title.alas"); ?></title>  
    </head>  
<body>
<?php
	$texto = stripslashes($_POST['Texto']);
	$medi = $_POST['medi'];
	$fecha = $_POST['fecha'];
	$veteid =  $_POST['veteid'];
	$type = trim($_POST['type']);
	$vacuna = stripslashes($_POST['Vacuna']);
	$vacuna_lab = stripslashes($_POST['Vacuna_lab']);
	$pelu_trabajo = stripslashes($_POST['pelu_trabajo']);
/*	
	echo "Texto: ".$texto."<br>";
	echo "medi: ".$medi."<br>";
	echo "fecha: ".$fecha."<br>";
	echo "veteid: ".$veteid."<br>";
	echo "type: ".$type."<br>";
	echo "vacuna: ".$vacuna."<br>";
	echo "vacuna_lab: ".$vacuna_lab."<br>";
	echo "pelu_trabajo: ".$pelu_trabajo."<br>";
*/

	include("require/config.php");
	switch ($type) {
		case "Historia":
			//echo "ES UNA HISTORIA";
			$sql="INSERT INTO historias (veteid, fecha, texto, medico) VALUES ('".$veteid."','".$fecha."','".$texto."','".$medi."')";
			mysql_query($sql);
		break;

		case "Vacunas":
			//echo "ES UNA VACUNA";
				$sql="INSERT INTO vacunas (veteid, fecha, vacuna, medico, texto) VALUES ('".$veteid."','".$fecha."','".$vacuna."','".$medi."','".$texto."')";
			mysql_query($sql);
		break;

		case "Peluqueria":
			//echo "ES UNA PELUQUERIA";
			$sql="INSERT INTO peluqueria (veteid, fecha, medico, trabajo, texto) VALUES ('".$veteid."','".$fecha."','".$medi."','".$pelu_trabajo."','".$texto."')";
			mysql_query($sql);
		break;
	}
	mysql_close($con);

$msg = "Informacion modificada satisfactoriamente.";
echo" <a href='show.php?id=".$veteid."' target='central'><img src='images/preloader-w8-line-black.gif'></a><br>";
echo("<script language=\"javascript\">"); 
echo("self.location.href = \"show.php?id=".$veteid."&msg=$msg\";"); 
echo("</script>");  

?>
</body>
</html>
