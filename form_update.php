<?php
$titulo = "Modificar equipo";
$activo = "";
require_once("templates/header.php");
require_once("modelo/conexion.php");
require_once("modelo/Equipo.php");
require_once("modelo/RepositorioEquipos.php");

$id = $_GET["id"];
$repo = new RepositorioEquipos($conexion);
$equipo = $repo->findById($id);


?>
<div class="container">
  <h1>Modificar equipo</h1>

  <form action="crud/update.php" method="post" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?php echo $id; ?>">
    <div class="mb-3">
      <label for="titulo" class="form-label">Nombre</label>
      <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo $equipo->getNombre(); ?>" required>
    </div>

    <div class="mb-3">
      <label for="contenido" class="form-label">Observaciones</label>
      <textarea class="form-control" id="observaciones" name="observaciones" rows="3" required><?php echo $equipo->getObservaciones(); ?></textarea>
    </div>

    <div class="form-group">
      <a href="index.php" class="btn btn-outline-dark">Volver al listado</a>
      <button type="submit" name="submit" class="btn btn-outline-success">Modificar</button>
    </div>
  </form>

</div>

<?php include_once "templates/footer.php"; ?>