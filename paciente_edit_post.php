<?php include("require/session.php"); ?>
<?php
$veteid = stripslashes($_POST['veteid']);
$paci = stripslashes($_POST['paci']);
$nom = stripslashes($_POST['nom']);
$ape = stripslashes($_POST['ape']);
$dir = stripslashes($_POST['dir']);
$tel = stripslashes($_POST['tel']);
$cel = stripslashes($_POST['cel']);
$email = stripslashes($_POST['email']);
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

$naci = stripslashes($_POST['naci']);
$este = stripslashes($_POST['este']);
$repro = stripslashes($_POST['repro']);
$pedi = stripslashes($_POST['pedi']);
$color = stripslashes($_POST['color']);
$peso = stripslashes($_POST['peso']);
$ciru = stripslashes($_POST['ciru']);
$alim = stripslashes($_POST['alim']);
$antip = stripslashes($_POST['antip']);
$senias = stripslashes($_POST['senias']);
$medi = stripslashes($_POST['medi']);
$falle = stripslashes($_POST['falle']);
$fechafalle = stripslashes($_POST['fechafalle']);
$causafalle = stripslashes($_POST['causafalle']);
$note = stripslashes($_POST['note']);
$lastupdate = stripslashes($_POST['lastupdate']);

include("require/config.php");

if (!$link)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db("alas", $con);

$sql="UPDATE vete SET
nom='".$nom."', 
ape='".$ape."',
dir='".$dir."', 
tel1='".$tel."', 
tel2='".$cel."', 
email='".$email."', 
notas='".$note."', 
paciente='".$paci."', 
sexo='".$sexo."', 
especie='".$espe."', 
raza='".$raza."', 
fechanaci='".$naci."', 
esterilizado='".$este."', 
reproduccion='".$repro."', 
pedigree='".$pedi."', 
color='".$color."', 
peso='".$peso."', 
medico='".$medi."', 
cirugias='".$ciru."', 
alimentacion='".$alim."', 
antiparasitarios='".$antip."', 
senias='".$senias."',
fallecido='".$falle."',
fechafallecido='".$fechafalle."',
causafalle='".$causafalle."',
lastupdate='".$lastupdate."'
WHERE veteid='$veteid'";

if (!mysql_query($sql,$link))
  { 
  die('Error: ' . mysql_error());
  }

mysql_close($link);
	
$msg = "Paciente ".$paci." modificado !!!";
echo("<script language=\"javascript\">"); 
echo("self.location.href = \"show.php?id=".$veteid."&msg=$msg\";"); 
echo("</script>");  
?>