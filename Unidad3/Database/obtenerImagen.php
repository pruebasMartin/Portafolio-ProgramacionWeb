<?php
    $id = $_GET['IdProducto'];
    include "../Database/conexion.php";
    $sql = "select UrlImagen from Usuario where idUsuario=".$id;
    $resultado = $cn->query($sql);
    $fila = $resultado->fetch(PDO::FETCH_OBJ);
    header("Content-Type: image/png");
    readfile($fila->UrlImagen);
?>