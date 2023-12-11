<?php
require_once("../modelo/conexion.php");
require_once("../modelo/Equipo.php");
require_once("../modelo/Jugador.php");
require_once("../modelo/RepositorioEquipos.php");
require_once("../modelo/RepositorioJugadores.php");
if (isset($_POST['submitequipo'])) {

  $equipo = new Equipo();
  $equipo->setPropiedades($_POST["nombre"], $_POST["observaciones"]);
  $repo = new RepositorioEquipos($conexion);
  $repo->save($equipo);

  header("location: ../index.php");
}

if (isset($_POST['submitjugador'])) {
  if (!empty($_FILES['foto']['name'])) {
    $nombreFichero = date("Y-m-d - H-i-s") . "-" . $_FILES['foto']['name'];
    //Leo la ubicación temporal del archivo para después dejarlo en la carpeta deseada
    $file_loc = $_FILES['foto']['tmp_name'];
    //movemos el archivo a la carpeta deseada
    move_uploaded_file($file_loc, "../img/" . $nombreFichero);
  } else {
    $nombreFichero = "defecto.webp";
  }

  $jugador = new Jugador();
  $jugador->setPropiedades($_POST["nombre"], $_POST["telefono"], $_POST["email"], $nombreFichero);
  $jugador->setEquipoActual($_POST["equipoactual"]);
  $repo = new RepositorioJugadores($conexion);
  $repo->save($jugador);

  header("location: ../index.php");
}
