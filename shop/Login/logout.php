<!DOCTYPE html>

<?php include '../functions/functions.php';?>
//Destroy the Session
<?php
session_start();
unset($_SESSION);
session_destroy();
session_write_close();
header("Location:./login.php");
exit;
?>
