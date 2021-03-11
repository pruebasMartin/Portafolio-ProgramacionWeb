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
    $_SESSION['IdUsuario'] = $login->idUsuario;
    header("location: ../pages/control.php");
}
else{
    header("location: ../pages/login.php?Error=400");
}
?>