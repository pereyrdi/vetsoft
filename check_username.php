<?php
if(isSet($_POST['username']))
$str_username = $_POST['username'];
{
/*$str_usernames = array('venu','benny','roger', 'thomas', 'danny');


if(in_array($str_username, $str_usernames))
	{
	echo '<font color="red">The username <STRONG>'.$str_username.'</STRONG> is already in use. Please try again.</font>';
	}
	else
	{
	echo 'OK';
	}
*/
	include("require/config.php");
	$dbC = mysqli_connect($dbhostname, $dbusername, $dbpassword, $database_name) or die('Error Connecting to MySQL DataBase');
	$sql_check = mysql_query("SELECT user_name FROM login_admin WHERE user_name='$str_username'") or die(mysql_error());
	if(mysql_num_rows($sql_check)) 	{
		echo '0';		
		} 	else	{
		echo '1';
	}
}

/* 
// This is a sample code in case you wish to check the username from a mysql db table

if(isSet($_POST['username']))
{
$username = $_POST['username'];

$dbHost = 'db_host_here'; // usually localhost
$dbUsername = 'db_username_here';
$dbPassword = 'db_password_here';
$dbDatabase = 'db_name_here';

$db = mysql_connect($dbHost, $dbUsername, $dbPassword) or die ("Unable to connect to Database Server.");
mysql_select_db ($dbDatabase, $db) or die ("Could not select database.");

$sql_check = mysql_query("select id from members where username='".$username."'") or die(mysql_error());

if(mysql_num_rows($sql_check))
{
echo '<font color="red">The nickname <STRONG>'.$username.'</STRONG> is already in use.</font>';
}
else
{
echo 'OK';
}

}
*/
?>
