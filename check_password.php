<?php
if(isSet($_POST['claveactual']))
{			
	include("require/config.php");
	$dbC = mysqli_connect($dbhostname, $dbusername, $dbpassword, $database_name) or die('Error Connecting to MySQL DataBase');
	$password = md5($_POST['claveactual']); //Set Password

		if(isset($_POST['username'], $password)) {
			ob_start();
			include(DOC_ROOT.'/config.php'); //Initiate the MySQL connection

			$myusername = stripslashes($_POST['username']);
			$mypassword = stripslashes($password);
			$myusername = mysqli_real_escape_string($dbC, $myusername);
			$mypassword = mysqli_real_escape_string($dbC, $mypassword);
			$sql_check = mysql_query("SELECT user_name, user_pass FROM login_admin WHERE user_name='$myusername' and user_pass='$mypassword'") or die(mysql_error());

			if(mysql_num_rows($sql_check))
			{
				echo '1';
			}
				else
			{
				echo '0';
			}

		}
}
?>
