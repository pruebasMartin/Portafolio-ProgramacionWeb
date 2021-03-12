<?php
session_start();
$name = $_POST['txtNombre'];
$usuario = $_POST['txtUsuario'];
$pwdOld = $_POST['txtPassword'];
$pwdNew = $_POST['txtPasswordNew'];
$id = $_POST['Id'];


$NombreArchivo = $_FILES['imagenProducto']['name'];
$directorioTemporal = $_FILES['imagenProducto']['tmp_name'];
$tamanio = $_FILES['imagenProducto']['size'];

include ('conexion.php');

$IdUsuario = $_SESSION['IdUsuario'];
$sql = "select * from Usuario where idUsuario=" . $IdUsuario;
$resultado = $cn->query($sql);
$datosUsuario = $resultado->fetch(PDO::FETCH_OBJ);

if($name != '' && $usuario != '' &&  $pwdOld != '' && $pwdNew != ''){
    if($pwdOld == $datosUsuario->Contrasena){
        if($_FILES['imagenProducto']['name'] != null){
            $imagenProducto = file_get_contents($directorioTemporal);
            $urlProductos = "img/";
            $extImagen = strtolower(pathinfo($NombreArchivo, PATHINFO_EXTENSION));
            $urlImagen = $urlProductos.$name.".".$extImagen;
            move_uploaded_file($directorioTemporal,$urlImagen);
            $sql = $cn->prepare("update Usuario set Nombre=?, Usuario=?, Contrasena=?, urlImagen=?, imagen=? where idUsuario=?");
            $resultado = $sql->execute([$name, $usuario, $pwdNew, $urlImagen, $imagenProducto,$id]);
            header('location: ../pages/login.php');
        }else{
            $sql = $cn->prepare("update Usuario set Nombre=?, Usuario=?, Contrasena=? where idUsuario=?");
            $resultado = $sql->execute([$name, $usuario, $pwdNew,$id]);
            header('location: ../pages/login.php');
        }
    }else{
        header('location: ../pages/ajustes.php?Error=400');
    }
}else{
    header('location: ../pages/ajustes.php?Error=402');
}

?>