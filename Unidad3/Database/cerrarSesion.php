<?php
session_start();
unset($_SESSION['NombreUsuario']);
//session_destroy();
header("location: ../pages/login.php");
?>

