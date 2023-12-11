<?php
$titulo = "Añadir jugador";
$activo = "Añadirjugador";
require_once "templates/header.php";
require_once "modelo/Equipo.php";
require_once "modelo/RepositorioEquipos.php";
require_once "modelo/conexion.php";
?>
<div class="container">
  <h1>Añadir jugador</h1>

  <form action="crud/add.php" method="post" enctype="multipart/form-data">

    <div class="mb-3">
      <label for="nombre" class="form-label">Nombre</label>
      <input type="text" class="form-control" id="nombre" name="nombre" required>
    </div>

    <div class="mb-3">
      <label for="telefono" class="form-label">Teléfono</label>
      <input type="number" class="form-control" id="telefono" name="telefono" required>
    </div>

    <div class="mb-3">
      <label for="email" class="form-label">Email</label>
      <input type="text" class="form-control" id="email" name="email" required>
    </div>

    <div class="mb-3">
      <label for="foto" class="form-label">Fotografía</label>
      <input type="file" class="form-control" id="foto" name="foto">
    </div>

    <div class="mb-3">
      <select name="equipoactual">

        <?php

        $repo = new RepositorioEquipos($conexion);
        $lista = $repo->findAll();

        foreach ($lista as $equipo) {
          echo "<option value='  $equipo->nombre  '>$equipo->nombre</option>";
        }

        ?>

      </select>
    </div>


    <div class="form-group">
      <a href="index.php" class="btn btn-outline-dark">Volver al listado</a>
      <button type="submit" name="submitjugador" class="btn btn-outline-success">Añadir</button>
    </div>

  </form>

</div>

<?php
require_once "templates/footer.php";
?>