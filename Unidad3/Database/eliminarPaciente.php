<?php
include "conexion.php";

$id = $_POST["Id"];
try{
    $sql = $cn->prepare("delete from Paciente where idPaciente=?");
    $resultado = $sql->execute([$id]);
    header('location: ../pages/verPacientes.php?Consulta=0');
}catch (Exception $ex){
    echo $ex;
}
