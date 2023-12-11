<?php
  $titulo = "Añadir equipo";
  $activo = "Añadirequipo";
  require_once "templates/header.php";
?>
<div class="container">
  <h1>Añadir equipo</h1>

  <form action="crud/add.php" method="post" enctype="multipart/form-data">

    <div class="mb-3">
      <label for="nombre" class="form-label">Nombre</label>
      <input type="text" class="form-control" id="nombre" name="nombre" required>
    </div>

    <div class="mb-3">
      <label for="observaciones" class="form-label">Observaciones</label>
      <textarea class="form-control" id="observaciones" name="observaciones" rows="3" required></textarea>
    </div>

    <div class="form-group">
      <a href="index.php" class="btn btn-outline-dark">Volver al listado</a>
      <button type="submit" name="submitequipo" class="btn btn-outline-success">Añadir</button>
    </div>
    
  </form>
  
</div>

<?php
require_once "templates/footer.php";
?>