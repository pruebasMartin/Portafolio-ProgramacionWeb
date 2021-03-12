<?php

include "../Database/conexion.php";

$nombrePaciente=$_POST['nombrePaciente'];
$edadPaciente=$_POST['edadPaciente'];
$alergiasPaciente=$_POST['alergiasPaciente'];
$enfermedadesCroniPaciente=$_POST['enfermedadesCroPaciente'];
$area=$_POST['especialidad'];
$id = $_POST["Id"];

$NombreArchivo = $_FILES['imagenPaciente']['name'];
$directorioTemporal = $_FILES['imagenPaciente']['tmp_name'];
$tamanio = $_FILES['imagenPaciente']['size'];



//$IdUsuario = $_SESSION['IdUsuario'];



        if($_FILES['imagenPaciente']['name'] != null){
            if($nombrePaciente != '' && $edadPaciente != '' && $alergiasPaciente != '' && $enfermedadesCroniPaciente != '' && $area != '' && $NombreArchivo != ''){
            $imagenPaciente = file_get_contents($directorioTemporal);
            $urlPacientes = "img/";
            $extImagen = strtolower(pathinfo($NombreArchivo, PATHINFO_EXTENSION));
            $urlImagen = $urlPacientes.$nombrePaciente.".".$extImagen;
            move_uploaded_file($directorioTemporal,$urlImagen); 
            try{
            $sql = $cn->prepare("update paciente set NombrePaciente=?, Edad=?, Alergias=?, Enfermedades=?, urlImagen=?, imagen=?, idArea=? where idPaciente=?");
            $resultado = $sql->execute([$nombrePaciente,$edadPaciente,$alergiasPaciente,$enfermedadesCroniPaciente,$urlImagen, $imagenPaciente, $area,$id]);
            header('location: ../pages/control.php?Consulta=0');
        }catch (Exception $ex){
            header('location: ../pages/control.php?Error=402');    
            }
        
        }else{
            header('location: ../pages/control.php?Error=402');
        }
        
    }else{
        if($nombrePaciente != '' && $edadPaciente != '' && $alergiasPaciente != '' && $enfermedadesCroniPaciente != '' && $area != ''){
            try{
            $sql = $cn->prepare("update paciente set NombrePaciente=?, Edad=?, Alergias=?, Enfermedades=?, idArea=? where idPaciente=?");
            $resultado = $sql->execute([$nombrePaciente,$edadPaciente,$alergiasPaciente,$enfermedadesCroniPaciente,$area,$id]);
            header('location: ../pages/verPacientes.php?Consulta=0');
        }catch (Exception $ex){
            header('location: ../pages/control.php?Error=402');   
            }
        }  else{
            header('location: ../pages/control.php?Error=402');
        }
    }
   


?>
