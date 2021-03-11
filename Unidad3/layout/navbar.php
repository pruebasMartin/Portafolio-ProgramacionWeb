<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <div class="d-flex flex-nowrap">
      <div class="circulo">
        <img src="../Database/obtenerImagen.php?IdProducto=<?php echo $imagenUsuario->idUsuario ?>" class="imagen">
      </div>
      <a class="navbar-brand" href="#"><?php echo $_SESSION['NombreUsuario'] ?></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
    </div>

    <div class="col-auto">
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link" href="../pages/control.php"> Principal <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#"></a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Cuenta
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="../pages/ajustes.php">Ajustes</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="../Database/cerrarSesion.php">Cerrar Sesión</a>
            </div>
          </li>
        </ul>

      </div>
    </div>
  </div>
</nav>