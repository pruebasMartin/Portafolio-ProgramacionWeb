<?php
    session_start();
?>
<html>
  <head>
      <title>Login - El Ángel</title>
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" integrity="sha512-5A8nwdMOWrSz20fDsjczgUidUBR8liPYU+WymTZP1lmY9G6Oc7HlZv156XqnsgNUzTyMefFTcsFH/tnJE/+xBg==" crossorigin="anonymous" />
      <link rel="stylesheet" href="../styles/login.css">
  </head>
  <body> 
      <form method="post" action="../Database/iniciarSesion.php" class="login">
          <header>El Ángel</header>
          <div class="field">
              <span class="fa fa-user"></span>
              <input type="text" placeholder="Usuario" name="txtUsuario" id="txtUsuario">
          </div>
          <div class="field">
            <span class="fa fa-lock"></span>
            <input type="password" placeholder="Contraseña" name="txtPassword" id="txtPassword">
          </div>
          <div class="forgot-password">
              <a href="#">¿Olvidó su contraseña?</a>
          </div>
          <input type="submit" class="submit" value="Entrar">
          <span class="logn-form-copy">¿No tienes una cuenta? <a href="/" class="login-form__sign-up">Crear Cuenta</a></span>
    </form>
    <?php
        include("../Layout/sweetAlert.php");
    ?>
  </body>
</html>