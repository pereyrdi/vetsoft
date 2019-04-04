<?php
$meses = array("","enero", "febrero", "marzo", "abril", "mayo", "junio", "julio", "agosto", "septiempre", "octubre", "noviembre", "diciembre");
$meses_c = array("","Ene", "Feb", "Mar", "Abr", "May", "Jun", "Jul", "Ago", "Sep", "Oct", "Nov", "Dic");

function ConvFecha($fecha) {
	switch (substr($fecha,5,2)) {
    case 01:
        echo substr($fecha,8,2)."/Ene/".substr($fecha,0,4);
        break;
    case 01:
        echo substr($fecha,8,2)."/Ene/".substr($fecha,0,4);
        break;
    case 02:
        echo substr($fecha,8,2)."/Feb/".substr($fecha,0,4); 
        break;
    case 03:
        echo substr($fecha,8,2)."/Mar/".substr($fecha,0,4); 
        break;
    case 04:
        echo substr($fecha,8,2)."/Abr/".substr($fecha,0,4);
        break;                        
    case 05:
        echo substr($fecha,8,2)."/May/".substr($fecha,0,4);
        break;
    case 06:
        echo substr($fecha,8,2)."/Jun/".substr($fecha,0,4);
        break;
    case 07:
        echo substr($fecha,8,2)."/Jul/".substr($fecha,0,4);
        break;
    case 08:
        echo substr($fecha,8,2)."/Ago/".substr($fecha,0,4);
        #echo "/Ago/";
        break;        
    case 8:
        echo substr($fecha,8,2)."/Ago/".substr($fecha,0,4);
        #echo "/Ago/";
        break;
    case 09:
        echo substr($fecha,8,2)."/Sep/".substr($fecha,0,4);
        break;
    case 9:
        echo substr($fecha,8,2)."/Sep/".substr($fecha,0,4);
        break;        
    case 10:
        echo substr($fecha,8,2)."/Oct/".substr($fecha,0,4);
        break;
    case 11:
        echo substr($fecha,8,2)."/Nov/".substr($fecha,0,4);
        break;
    case 12:
        echo substr($fecha,8,2)."/Dic/".substr($fecha,0,4);
        break;                                                        
	}
}

function GetAge($naci){
	$birthDate = substr($naci,5,2)."/".substr($naci,8,2)."/".substr($naci,0,4);
	$birthDate = explode("/", $birthDate);
	$age = (date("md", date("U", mktime(0, 0, 0, $birthDate[0], $birthDate[1], $birthDate[2]))) > date("md") ? ((date("Y")-$birthDate[2])-1):(date("Y")-$birthDate[2]));
	if ($age==0) {	return " "; 	} 	else {	return " (".$age." a&ntilde;os)";	}
}

function GetAge2($d1, $d2) {

   $date_parts1=explode("-", $d1);
   $date_parts2=explode("-", $d2);
   return $date_parts2[0] - $date_parts1[0];	

}
function dateDiff($start, $end) {
	$start_ts = strtotime($start);
	$end_ts = strtotime($end);
	$diff = $end_ts - $start_ts;
	return round($diff / 86400);
}

function escape($values) {
		if(is_array($values)) {
			$values = array_map('escape', $values);
		} else {
			/* Quote if not integer */
			if ( !is_numeric($values) || $values{0} == '0' ) {
				$values = "'" .mysql_real_escape_string($values) . "'";
			}
		}
	   return $values;
}
	
function getdatenaci($naci){
		if (substr($naci,1,1) == "-") { 
			$nacid="0".substr($naci,0,1);
			if (substr($naci,2,3)=='Ene') $nacim="01";
			if (substr($naci,2,3)=='Feb') $nacim="02";
			if (substr($naci,2,3)=='Mar') $nacim="03";
			if (substr($naci,2,3)=='Abr') $nacim="04";
			if (substr($naci,2,3)=='May') $nacim="05";
			if (substr($naci,2,3)=='Jun') $nacim="06";
			if (substr($naci,2,3)=='Jul') $nacim="07";
			if (substr($naci,2,3)=='Ago') $nacim="08";
			if (substr($naci,2,3)=='Sep') $nacim="09";
			if (substr($naci,2,3)=='Oct') $nacim="10";
			if (substr($naci,2,3)=='Nov') $nacim="11";
			if (substr($naci,2,3)=='Dic') $nacim="12";
			$nacia=substr($naci,6,4);
			}
		if (substr($naci,2,1) == "-") {
			$nacid=substr($naci,0,2);
			if (substr($naci,3,3)=='Ene') $nacim="01";
			if (substr($naci,3,3)=='Feb') $nacim="02";
			if (substr($naci,3,3)=='Mar') $nacim="03";
			if (substr($naci,3,3)=='Abr') $nacim="04";
			if (substr($naci,3,3)=='May') $nacim="05";
			if (substr($naci,3,3)=='Jun') $nacim="06";
			if (substr($naci,3,3)=='Jul') $nacim="07";
			if (substr($naci,3,3)=='Ago') $nacim="08";
			if (substr($naci,3,3)=='Sep') $nacim="09";
			if (substr($naci,3,3)=='Oct') $nacim="10";
			if (substr($naci,3,3)=='Nov') $nacim="11";
			if (substr($naci,3,3)=='Dic') $nacim="12";
			$nacia=substr($naci,7,4);
		}
		return $nacia."-".$nacim."-".$nacid;
	}
	
	function getsex($arg){ 	switch ($arg) {
		case "M":
		echo "<img src='images/el.png' width='20' title='Macho' border='0'>";
		break;

		case "F":
		echo "<img src='images/ella.png' width='20' title='Hembra' border='0'>";
		break;
		}
	}
	
	function getespecie($arg){ 	switch ($arg) {
		case "canino":
		//echo "CANINO";
			echo "<img src='images/dog_icon.png' width='20' title='Canino' border='0'>";
		break;

		case "felino":
		//echo "FELINO";
			echo "<img src='images/cat_icon.png' width='20' title='Felino' border='0'>";
		break;
		
		case "otros":
			echo "<img src='images/otros_icon.png' width='20' title='Otra especie' border='0'>";
		break;
		}
	}
	function getyes($arg){ 	switch ($arg) {
		case "1":
		echo "<img src='images/si.gif' width='20' title='si' border='0'>";
		break;

		case "0":
		echo "<img src='images/no.png' width='20' title='no' border='0'>";
		break;
		}
	}

?>
