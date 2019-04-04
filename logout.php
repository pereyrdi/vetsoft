<?
  session_start();
  unset($_SESSION["username"]); 
  session_destroy();
  header("location:login.php?msg=Saliste del sistema !!"); // Move back to login.php with a logout message
  exit;
?>
