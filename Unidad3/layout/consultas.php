<?php
if (isset($_GET['Consulta'])) {
    if ($_GET['Consulta'] == 0) {
        $sql = "select p.idPaciente, p.NombrePaciente, p.Edad, p.Alergias, p.Enfermedades, p.urlImagen, p.Imagen,a.NombreArea, a.Especialista from Paciente as p inner join Area as a on p.idArea = a.idArea";
        $resultado = $cn->query($sql);
        $pacientes = $resultado->fetchAll(PDO::FETCH_OBJ);
    }else if($_GET['Consulta'] == 1){
        $sql = "select p.idPaciente, p.NombrePaciente, p.Edad, p.Alergias, p.Enfermedades, p.urlImagen, p.Imagen,a.NombreArea, a.Especialista from Paciente as p inner join Area as a on p.idArea = a.idArea where a.idArea = 1";
        $resultado = $cn->query($sql);
        $pacientes = $resultado->fetchAll(PDO::FETCH_OBJ);
    }else if($_GET['Consulta'] == 2){
        $sql = "select p.idPaciente, p.NombrePaciente, p.Edad, p.Alergias, p.Enfermedades, p.urlImagen, p.Imagen,a.NombreArea, a.Especialista from Paciente as p inner join Area as a on p.idArea = a.idArea where a.idArea = 2";
        $resultado = $cn->query($sql);
        $pacientes = $resultado->fetchAll(PDO::FETCH_OBJ);
    }else if($_GET['Consulta'] == 3){
        $sql = "select p.idPaciente, p.NombrePaciente, p.Edad, p.Alergias, p.Enfermedades, p.urlImagen, p.Imagen,a.NombreArea, a.Especialista from Paciente as p inner join Area as a on p.idArea = a.idArea where a.idArea = 3";
        $resultado = $cn->query($sql);
        $pacientes = $resultado->fetchAll(PDO::FETCH_OBJ);
    }
}
?>
