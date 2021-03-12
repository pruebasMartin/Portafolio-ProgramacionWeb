<?php
include "../Database/conexion.php";

$nombrePaciente=$_POST['nombrePaciente'];
$edadPaciente=$_POST['edadPaciente'];
$alergiasPaciente=$_POST['alergiasPaciente'];
$enfermedadesCroniPaciente=$_POST['enfermedadesCroPaciente'];
$area=$_POST['especialidad'];

$numero=1;

////CargaImagen

$NombreArchivo = $_FILES['imagenPaciente']['name'];
$directorioTemporal = $_FILES['imagenPaciente']['tmp_name'];
$tamanio = $_FILES['imagenPaciente']['size'];
////fin cargaImagen

if($nombrePaciente != '' && $edadPaciente != '' && $alergiasPaciente != '' && $enfermedadesCroniPaciente != '' && $area != '' && $NombreArchivo != ''){
    
$imagenPaciente = file_get_contents($directorioTemporal);
$urlPacientes = "img/";
$extImagen = strtolower(pathinfo($NombreArchivo, PATHINFO_EXTENSION));
$urlImagen = $urlPacientes.$nombrePaciente.".".$extImagen;
move_uploaded_file($directorioTemporal,$urlImagen);
    try{
        $sql=$cn->prepare("insert into Paciente ( NombrePaciente, Edad, Alergias, Enfermedades, urlImagen, imagen, idArea) values (?,?,?,?,?,?,?)");
        $resultado=$sql->execute([$nombrePaciente,$edadPaciente,$alergiasPaciente,$enfermedadesCroniPaciente,$urlImagen,$imagenPaciente,$area]);
        header('location: ../pages/verPacientes.php?Consulta=0');
    }catch (Exception $ex){
        echo "error".$ex;
    }
}else{
    header('location: ../pages/AgregarPaciente.php?Error=402');
}