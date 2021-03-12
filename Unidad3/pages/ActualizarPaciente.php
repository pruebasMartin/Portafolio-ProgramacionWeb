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

    $Idpaciente=$_GET['IdPaciente'];
    $sql = "select * from Paciente where idPaciente=" . $Idpaciente;
    $resultado = $cn->query($sql);
    $paciente = $resultado->fetch(PDO::FETCH_OBJ);
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actualizar Paciente</title>
    <?php
    include('../layout/disenio.php');
    ?>
    <link rel="stylesheet" href="../styles/ActualizarPaciente.css">
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
    <div class="container-sm">
        <form action="../Database/actualizarPaciente.php" class="estilo" method="post" enctype="multipart/form-data">
            <div class="card border" id="cardForm">
                <h4 class="card-header text-center" id="titleForm">
                    <id= class="fas fa-user-edit" id="iconPacientLeft"></i>Actualizar Paciente<i class="fas fa-user-injured" id="iconPacientRight"></i>
                </h4>
                <div class="card-body text-dark">
                    <div class="container">
                        <div class="form-group row">
                            <input type="hidden" value="<?php echo $paciente->idPaciente; ?>" name="Id" />
                            <div class="col-6">
                                <label>Nombre</label>
                                <input type="text" name="nombrePaciente" id="textos" class="form-control" aria-describedby="Nombre" value="<?php echo $paciente->NombrePaciente; ?>">
                            </div>
                            <div class="col-2">
                                <label>Edad</label>
                                <input type="number" name="edadPaciente" value="<?php echo $paciente->Edad;?>" class="form-control" >
                            </div>
                            <div class="col-md-4">
                                <label>Área asignada</label>
                                <select name="especialidad" id="" class="form-control">
                                    <?php
                                    include "../Database/conexion.php";
                                    $sql = "select * from Area";
                                    $resultado = $cn->query($sql);
                                    $areas = $resultado->fetchAll(PDO::FETCH_OBJ);
                                    foreach ($areas as $area) {
                                        if($paciente->idArea==$area->idArea){
                                            echo "<option selected value='" . $area->idArea. "'>" . $area->NombreArea."</option>";

                                        }else{

                                        
                                        echo "<option value='" . $area->idArea . "'>" . $area->NombreArea . "</option>";
                                    }
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="d-flex flex-nowrap">
                        <div class="container">
                            <label>Alergias</label>
                            <textarea name="alergiasPaciente" id="txtAreaA" class="form-control"><?php echo $paciente->Alergias;?></textarea>
                        </div>
                        <div class="container">
                            <label>Enfermedades Crónicas</label>
                            <textarea name="enfermedadesCroPaciente" id="txtAreaEC" class="form-control"><?php echo $paciente->Enfermedades;?></textarea>
                        </div>
                    </div>
                    <div class="container" id="seccionImg">
                        <div class="form-group row">
                            <div class="col-5">
                                <label class="control-label">Subir Imagen de paciente</label>
                                <input id="input-b1" name="imagenPaciente" type="file" class="file" accept=".png, .jpg,.jpeg" data-browse-on-zone-click="true" data-validation="required" data-validation-error-msg="Debe agregar un documento">
                            </div>
                            <div class="col-5" id="img1">
                                <input type="hidden" class="form-control" name="imagenactual" id="imagenactual">
                                <?php
                               echo " <img src='../Database/" . $paciente->urlImagen . "' width='150px' height='120px' id='imagenmuestra' class='rounded'>";
                                ?>
                                
                            </div>
                        </div>
                    </div>

                    <div class="form-group text-center">
                        <button type="submit" class="btn" id="btnSubmit"><i class="fas fa-cloud-upload-alt"></i> Guardar </button>
                        <a href="control.php" class="btn" id="btnReturn"><i class="fas fa-undo"></i> Regresar </a>
                    </div>
                </div>
            </div>
        </form>
    </div>
    
    <?php
    include("../Layout/sweetAlert.php");
    ?>
    <script>
        $("#input-b1").fileinput({
            language: "es",
            allowedFileExtensions: ["png", "jpg"],
            required: true
        });
    </script>
    <script>
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    // Asignamos el atributo src a la tag de imagen
                    $('#imagenmuestra').attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
        // El listener va asignado al input
        $("#input-b1").change(function() {
            readURL(this);
        });
    </script>

</body>

</html>