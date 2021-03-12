<?php
session_start();
if (!isset($_SESSION['NombreUsuario'])) {
    header("location: login.php?Error=401");
} else {
    include "../Database/conexion.php";
    $IdUsuario = $_SESSION['IdUsuario'];
    $sql = "select * from Usuario where idUsuario=" . $IdUsuario;
    $resultado = $cn->query($sql);
    $imagenUsuario = $resultado->fetch(PDO::FETCH_OBJ);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actualizar Paciente</title>
    <?php
    include('../layout/disenio.php');
    ?>
    <link rel="stylesheet" href="../styles/verPacientes.css">
    <link rel="stylesheet" href="../styles/navbar.css">
    <style type="text/css">
        body {
            background-color: rgb(3, 21, 48);
        }
    </style>
</head>

<body>
    <?php
    include("../layout/navbar.php");
    ?>
    <br>
    <a href="AgregarPaciente.php" class="añadirPaciente" id="btnAdd"> <i class="fas fa-user-plus" id="iconAdd"></i> Agregar Pacientes </a>
    <a href="AgregarPaciente.php" class="consultaCardiologia" id="btnAdd"> <i class="fas fa-user-plus" id="iconAdd"></i> Cardiología </a>
    <br><br>
    <a href="control.php" class="regresar" id="btnRegresar"> <i class="fas fa-undo-alt" id="iconAdd"></i> Regresar </a>
    <div class="container" id="cards">
        <div class="row row-cols-1 row-cols-md-3">
                <?php
                $sql = "select p.idPaciente, p.NombrePaciente, p.Edad, p.Alergias, p.Enfermedades, p.urlImagen, p.Imagen,a.NombreArea, a.Especialista from Paciente as p inner join area as a on p.idArea = a.idArea";
                $resultado = $cn->query($sql);
                $pacientes = $resultado->fetchAll(PDO::FETCH_OBJ);
                foreach ($pacientes as $paciente) {
                    echo "<div class='col mb-4'>";
                    echo "<div class='card'>";
                    echo "<div class='card-body'>";
                    echo "<h5 class='card-title'>" . $paciente->NombrePaciente . "</h5>";
                    echo "<img src='../Database/" . $paciente->urlImagen . "'class='card-img-top' alt='...'>";
                    echo "<div class='agrupacion'>";
                    echo "<div class='d-flex flex-nowrap'>";
                    echo "<p id='propiedades'>Edad:</p><p class='card-text'>" . $paciente->Edad . " años</p>";
                    echo "</div>";
                    echo "<div class='d-flex flex-nowrap'>";
                    echo "<p id='propiedades'>Alergias: </p><p class='card-text'>" . $paciente->Alergias . "</p>";
                    echo "</div>";
                    echo "<div class='d-flex flex-nowrap'>";
                    echo "<p id='propiedades'>Enfermedades Crónicas: </p><p class='card-text'>" . $paciente->Enfermedades . "</p>";
                    echo "</div>";
                    echo "<div class='d-flex flex-nowrap'>";
                    echo "<p id='propiedades'>Área Designada: </p><p class='card-text'>" . $paciente->NombreArea . "</p>";
                    echo "</div>";
                    echo "<div class='d-flex flex-nowrap'>";
                    echo "<p id='propiedades'>Doctor Responsable: </p><p class='card-text'>" . $paciente->Especialista . "</p>";
                    echo "</div>";
                    echo "</div>";
                    echo "<a href='ActualizarPaciente.php?IdPaciente=" . $paciente->idPaciente . "' class='btn' id='btnEditar'><i class='fas fa-edit'></i>Editar Datos </a>";
                    echo "<a href='ActualizarPaciente.php?IdPaciente=" . $paciente->idPaciente . "' class='btn' id='btnAlta'><i class='fas fa-door-open'></i>Dar de alta </a>";
                    echo "</div>";
                    echo "</div>";
                    echo "</div>";
                }
                ?>
            </div>
        </div>
    </div>

</body>

</html>