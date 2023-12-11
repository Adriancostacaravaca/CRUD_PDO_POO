<?php

    $titulo = "Ver ganador";
    $activo = "Ganador";

    require_once "modelo/conexion.php";
    require_once "templates/header.php";

    if (isset($_POST['submit'])) {

        $equipo1 = $_POST["nombre1"];
        $equipo2 = $_POST["nombre2"];
        $puntos1 = $_POST["puntos1"];
        $puntos2 = $_POST["puntos2"];
        
        if ($puntos1 > $puntos2) {
            echo "<p>El ganador es el equipo 1: $equipo1. La diferencia de puntos ha sido " . $puntos1-$puntos2 . " puntos.</p>";
        }else if($puntos2 > $puntos1) {
            echo "<p>El ganador es el equipo 2: $equipo2. La diferencia de puntos ha sido " . $puntos2-$puntos1 . " puntos.</p>";
        }
        else{
            echo "<p>Empate con $puntos1 y $puntos2 puntos.</p>";
        }

      }

?>

<div class="container">
  <h1>Consulta el ganador</h1>

  <form action="" method="post" enctype="multipart/form-data">

    <div class="mb-3">
      <input type="text" class="form-control" id="nombre1" name="nombre1" required placeholder="Nombre equipo 1">
    </div>
    
    <div class="mb-3">
        <input type="number" class="form-control" id="puntos1" name="puntos1" required placeholder="Puntos del equipo 1">
    </div>

    <div class="mb-3">
      <input type="text" class="form-control" id="nombre2" name="nombre2" required placeholder="Nombre equipo 2">
    </div>

    <div class="mb-3">
        <input type="number" class="form-control" id="puntos2" name="puntos2" required placeholder="Puntos del equipo 2">
    </div>

    <div class="form-group">
      <a href="index.php" class="btn btn-outline-dark">Volver al listado</a>
      <button type="submit" name="submit" class="btn btn-outline-success">Consultar</button>
    </div>
    
  </form>
  
</div>

<?php
    require_once "templates/footer.php";
?>
