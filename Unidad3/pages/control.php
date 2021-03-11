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
    <title>Control Principal</title>
    <?php
    include('../layout/disenio.php');
    ?>
    <link rel="stylesheet" href="../styles/control.css">
    <link rel="stylesheet" href="../styles/navbar.css">
</head>

<body>
    <?php
    include("../Layout/navbar.php");
    ?>
    <div class="container">
        <div class="card">
            <div class="box">
                <div class="content">
                    <h2>01</h2>
                    <h3>Card One</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Veritatis expedita illum impedit fugit inventore? Similique voluptate dicta quidem qui dolorem magni consequuntur quos veniam maiores reprehenderit aspernatur, rerum, ipsa placeat.</p>
                    <a href="#">Read More</a>
                </div>
            </div>
        </div>
    </div>

</body>

</html>