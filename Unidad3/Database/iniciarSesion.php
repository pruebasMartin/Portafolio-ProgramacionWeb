<?php
session_start();
$usuario = $_POST['txtUsuario'];
$password = $_POST['txtPassword'];

include "conexion.php";
$sentencia = $cn->prepare("select*from Usuario where Usuario=? and Contrasena=?");
$sentencia->execute([$usuario, $password]);
$login = $sentencia->fetch(PDO::FETCH_OBJ);

if($login){
    $_SESSION['NombreUsuario'] = $login->Nombre;
    header("location: ../php/control.php");
}
else{
    header("location: ../php/login.php?Error=400");
}
?>