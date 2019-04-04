<?php ini_set('display_errors', '1'); ?>

<?php

include("require/config.php");

$dbC = mysqli_connect($dbhostname, $dbusername, $dbpassword, $database_name) or die('Error Connecting to MySQL DataBase');
$username = $_POST['username']; //Set UserName
$password = md5($_POST['password']); //Set Password
$msg ='';
if(isset($username, $password)) {
    ob_start();
    #include(DOC_ROOT.'/config.php'); //Initiate the MySQL connection
    // To protect MySQL injection (more detail about MySQL injection)
    $myusername = stripslashes($username);
    $mypassword = stripslashes($password);
    $myusername = mysqli_real_escape_string($dbC, $myusername);
    $mypassword = mysqli_real_escape_string($dbC, $mypassword);
   
    $sql="SELECT * FROM login_admin WHERE user_name='$myusername' and user_pass='$mypassword'";
    $result=mysqli_query($dbC, $sql);
    // Mysql_num_row is counting table row
    $count=mysqli_num_rows($result);
    // If result matched $myusername and $mypassword, table row must be 1 row
    if($count==1){
		session_start(); 
        $_SESSION['username']=$myusername;
		$phpdate = $_POST['fecha'];
		$sql = "INSERT INTO login_logs (log_username, log_datetime) VALUES ('".$myusername."','".$phpdate."')";
        $result=mysqli_query($dbC, $sql);
        header("location:alitasweb.php");
    }
    else {
        $msg = "Clave o Usuario incorrectos, reintente.";
        header("location:login.php?msg=$msg");
    }
    ob_end_flush();
}
else {
    header("location:login.php?msg=Por favor ingrese usuario y clave.");
}
?>
