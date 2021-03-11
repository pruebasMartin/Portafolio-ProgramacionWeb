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
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro Paciente</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link rel="stylesheet" href="../styles/AgregarPaciente.css">
    <link rel="stylesheet" href="../styles/navbar.css">
    <style type="text/css">
        body {
            background-color: rgb(3, 21, 48);
        }
    </style>
</head>
<body>
    <?php
    include ("../layout/navbar.php");
    
    ?>
    
<div class="container-sm">
    <form action="../Database/agregarPaciente.php" class="estilo" method="post" enctype="multipart/form-data">
        <div class="card border">
            <h4 class="card-header text-dark text-center">Ingreso de paciente</h4>
            <div class="card-body text-dark">
                <div class="form-group row">
                
                    <div class="col-6">
                        <label >Nombre</label>
                        <input type="text" name="nombrePaciente" class="form-control" aria-describedby="Nombre" placeholder="Nombre y apellidos" >
                    </div> 
                <div class="col-2">
               
                        <label >Edad</label>
                        <input type="number" name="edadPaciente" class="form-control">
                </div> 
                
                <div class="col-md-4">
                            <label>Area a la que se envia</label>
                            <select name="especialidad" id="" class="form-control">

                            <?php
                               include "../Database/conexion.php";
                               $sql="select * from area";
                               $resultado=$cn->query($sql);
                               $areas=$resultado->fetchAll(PDO::FETCH_OBJ);
                               foreach ($areas as $area) {
                                   echo "<option value='".$area->idArea."'>".$area->NombreArea."</option>";
                               } 
                            
                            ?>
                            
                            </select>
                        </div>
                </div>
                
                <div class="form-group row">
                     
                    <label >Alergias</label>
                    <textarea name="alergiasPaciente" id="" class="form-control"></textarea>
                    
                </div>

                <div class="form-group row">
                     
                     <label >Enfermedades Cronicas</label>
                     <textarea name="enfermedadesCroPaciente" id="" class="form-control"></textarea>
                     
                 </div>

                   

                    <div class="form-group row">
                        <div class="col-5">
                            
                            
                                <label class="control-label">Subir Imagen de paciente</label>
                                <input id="input-b1" name="imagenPaciente" type="file" class="file" accept=".png, .jpg,.jpeg"
                                    data-browse-on-zone-click="true" data-validation="required"
                                    data-validation-error-msg="Debe agregar un documento">
                                   
                                    
                               
                    
                                    
                        </div>    
                        <div class="col-5">
                        <input type="hidden" class="form-control" name="imagenactual" id="imagenactual">
                                <img src="../profile-user.png" width="150px" height="120px" id="imagenmuestra" class="rounded">
                               
                           </div>
                        
                    </div>

                    <div class="form-group text-center">
                                <button type="submit" class="btn btn-danger">Guardar cambios</button>
                                <a href="Principal.php" class="btn btn-dark">Regresar</a>
                         </div>
                    
            </div>
        </div>
    </form>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>
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