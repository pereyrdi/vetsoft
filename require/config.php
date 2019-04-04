<?php  
 $dbhostname = "localhost";  
 $dbusername = "root";  
 $dbpassword = "root";  
 $database_name = "alas1.48";  
 $link = mysql_connect($dbhostname, $dbusername, $dbpassword) or exit(mysql_error());
 if	(!$link)	{	die('Could not connect: ' . mysql_error());	}
 $db =mysql_select_db($database_name) or exit(mysql_error());       
?>  
