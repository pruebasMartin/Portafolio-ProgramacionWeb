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
    <title>Ajustes</title>
    <?php
    include('../layout/disenio.php');
    ?>
    <link rel="stylesheet" href="../styles/navbar.css">
    <link rel="stylesheet" href="../styles/ajustes.css">
    <style type="text/css">
        .wrapper {
            height: 120px;
            width: 120px;
            position: relative;
            border: 5px solid #000;
            border-radius: 50%;
            background: url('../Database/obtenerImagen.php?IdProducto=<?php echo $imagenUsuario->idUsuario ?>');
            background-size: 100% 100%;
            margin: 0 auto 65px;
            overflow: hidden;
        }
    </style>
    <style type="text/css">
        body {
            background-color: rgb(3, 21, 48);
        }
    </style>
</head>

<body>
    <?php
    include("../Layout/navbar.php");
    ?>
    <form method="post" action="../Database/actualizarUsuario.php" class="login" enctype="multipart/form-data">
        <header>Ajustes</header>
        <input type="hidden" value="<?php echo $_SESSION['IdUsuario']; ?>" name="Id" />
        <div class="d-flex flex-nowrap">
            <div class="wrapper">
                <input id="input-b1" type="file" class="my_file" name="imagenProducto" data-browse-on-zone-click="true" data-validation="required" data-validation-error-msg="Debe agregar un documento" onchange="return validarExt()">
            </div>
            <i class="fas fa-user-edit" id="iconUpdate"></i>
            <div id="visorArchivo">

            </div>
        </div>


        <div class="field">
            <span class="fas fa-universal-access"></span>
            <input type="text" placeholder="Nombre" name="txtNombre" id="txtNombre">
        </div>
        <div class="field">
            <span class="fa fa-user"></span>
            <input type="text" placeholder="Usuario" name="txtUsuario" id="txtUsuario">
        </div>
        <div class="field">
            <span class="fa fa-key"></span>
            <input type="password" placeholder="Contraseña Anterior" name="txtPassword" id="txtPassword">
        </div>
        <div class="field">
            <span class="fa fa-lock"></span>
            <input type="password" placeholder="Contraseña Nueva" name="txtPasswordNew" id="txtPassword">
        </div>
        <input type="submit" class="submit" value="Actualizar">
    </form>

    <script>
        $("#input-b1").fileinput({
            language: "es",
            allowedFileExtensions: ["png", "jpg"]
        });
    </script>
    <?php
    include("../Layout/sweetAlert.php");
    ?>

</body>

</html>

<script type="text/javascript">
    function validarExt() {
        var archivoInput = document.getElementById('input-b1');
        var archivoRuta = archivoInput.value;
        var extPermitidas = /(.PNG|.JPG)$/i;
        if (!extPermitidas.exec(archivoRuta)) {
            alert('Asegurese de haber seleccionado un archivo valido');
            archivoInput.value = '';
            return false;
        } else {
            if (archivoInput.files && archivoInput.files[0]) {
                var visor = new FileReader();
                visor.onload = function(e) {
                    document.getElementById('visorArchivo').innerHTML =
                        '<embed src="' + e.target.result + '" width="100" height="100" />';
                };
                visor.readAsDataURL(archivoInput.files[0]);
            }
        }
    }
</script>