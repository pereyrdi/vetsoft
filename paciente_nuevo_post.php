<?php include("require/session.php"); ?>

<html>
    <head>  
		<?php include("header.php")?>
    </head>  
	<body class="modern-ui">
	<?php

	$nom = stripslashes($_POST['nom']);
	$ape = stripslashes($_POST['ape']);
	$dir = stripslashes($_POST['dir']);
	$tel = stripslashes($_POST['tel']);
	$cel = stripslashes($_POST['cel']);
	$email = stripslashes($_POST['email']);
	$note = stripslashes($_POST['note']);
	$paci = stripslashes($_POST['paci']);
	$sexo = stripslashes($_POST['sexo']);
	$espe = stripslashes($_POST['especie']);
	
	switch ($espe) {
    case 'canino':
        $raza = stripslashes($_POST['raza_can']);
        #VERIFICAR SI EXISTE LA RAZA, SINO AGREGARLA?
        break;
    case 'felino':
        $raza = stripslashes($_POST['raza_fel']);
        break;
    case 'otros':
        $raza = stripslashes($_POST['raza_otr']);
        break;
}

	$alta = stripslashes($_POST['alta']);
	$naci = stripslashes($_POST['naci']);
	$este = stripslashes($_POST['este']);
	$repro = stripslashes($_POST['repro']);
	$pedi = stripslashes($_POST['pedi']);
	$color = stripslashes($_POST['color']);
	$repro = stripslashes($_POST['repro']);
	$ciru = stripslashes($_POST['ciru']);
	$alim = stripslashes($_POST['alim']);
	$antip = stripslashes($_POST['antip']);
	$senias = stripslashes($_POST['senias']);
	$medi = stripslashes($_POST['medi']);
	$lastupdate = stripslashes($_POST['lastupdate']);
/*
	echo "<br>";
	echo "<b>Nombre: </b>".$nom."<br>";
	echo "<b>Apellido: </b>".$ape."<br>";
	echo "<b>Direccion: </b>".$dir."<br>";
	echo "<b>Telefono: </b>". $tel."<br>";
	echo "<b>Celular: </b>".$cel."<br>";
	echo "<b>Email: </b>".$email."<br>";
	echo "<b>Notas: </b>".$note."<br>";
	echo "<b>Paciente: </b>".$paci."<br>";
	echo "<b>Sexo: </b>".$sexo."<br>";
	echo "<b>Especie: </b>".$espe."<br>";
	echo "<b>Raza: </b>".$raza."<br>";
	echo "<b>Fecha de Alta: </b>".$alta."<br>";
	echo "<b>Fecha de Nacimiento: </b>".$naci."<br>";
	echo "<b>Castrado: </b>".$este."<br>";
	echo "<b>Reproduccion: </b>".$repro."<br>";
	echo "<b>Pedigree: </b>".$pedi."<br>";
	echo "<b>Color: </b>".$color."<br>";
	echo "<b>Peso: </b>".$peso."<br>";
	echo "<b>Cirugias: </b>".$ciru."<br>";
	echo "<b>Alimentacion: </b>".$alim."<br>";
	echo "<b>Antiparasitarios: </b>".$antip."<br>";
	echo "<b>Señas Particulares: </b>".$senias."<br>";
	echo "<b>Actualizados a las: </b>".$lastupdate."<br>";	
	echo "<b>Medico: </b>".$medi."<br>";
*/
	include("require/config.php");

	$result = mysql_query("SELECT veteid FROM vete ORDER BY veteid DESC LIMIT 1", $link);
	while ($row = mysql_fetch_array($result)) {
		$veteid=$row['veteid'];
		}
	$veteid=$veteid+1;

	$sql="INSERT INTO vete (nom, ape, dir, tel1, tel2, email, notas, paciente, sexo, especie, raza, fechadealta, fechanaci, esterilizado, reproduccion, pedigree, color, peso, medico, cirugias, alimentacion, antiparasitarios, senias, fallecido, lastupdate) VALUES ('".$nom."','".$ape."','".$dir."','".$tel."','".$cel."','".$email."','".$note."','".$paci."','".$sexo."','".$espe."','".$raza."','".$alta."','".$naci."','".$este."','".$repro."','".$pedi."','".$color."','".$peso."','".$medi."','".$ciru."','".$alim."','".$antip."','".$senias."','0','".$lastupdate."')";

if (!mysql_query($sql,$link))
  { 
  die('Error: ' . mysql_error());
  }


mysql_close($link);

$msg = "Paciente ingresado !!!";

echo("<script language=\"javascript\">"); 
echo("self.location.href = \"show.php?id=".$veteid."&msg=$msg\";"); 
echo("</script>");   

?>

</body>
</html>
