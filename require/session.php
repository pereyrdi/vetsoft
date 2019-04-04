<?php
	session_start();

	if (empty($_SESSION['username'])) 
	{
		//header("location:login.php"); // Redirect to login.php page
		echo("<script language=\"javascript\">"); 
		echo("parent.location.href = \"login.php?msg=Sesion caducada\";"); 
    	//echo "<script>parent.location.href= '/php/fail.php?txt=".$error."';
		echo "</script>";
		
	} else {
		header( 'Content-Type: text/html; charset=utf-8' );
	}

?>
