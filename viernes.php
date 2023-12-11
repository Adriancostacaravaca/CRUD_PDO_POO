<?php
require_once "modelo/conexion.php";
require_once "modelo/Equipo.php";
require_once "modelo/RepositorioEquipos.php";

$titulo = "Viernes aleatorio";
$activo = "Viernes";

require_once "templates/header.php";

// COJO EQUIPOS DE UN ARRAY BÁSICO

/* $arrayEquipos = array("Real Madrid","Barcelona","Unicaja");

$resultado = rand(0, sizeof($arrayEquipos) -1);

$equipos = $arrayEquipos[$resultado];

echo "<p>" . $equipos . "</p>"; */


// COJO EQUIPOS DE LA BASE DE DATOS Y LOS METO EN UN ARRAY

$repo = new RepositorioEquipos($conexion);

$lista = $repo->findAll();

$arrayEquipos = array();

foreach ($lista as $equipo) {
    $resultado = array_push($arrayEquipos, $equipo->nombre);
}

$aleatorio = rand(0, sizeof($arrayEquipos) - 1);
$aleatorio2 = rand(0, sizeof($arrayEquipos) - 1);

$equipos = $arrayEquipos[$aleatorio];

$equipos2 = $arrayEquipos[$aleatorio2];


echo "<div class='container table-responsive'>";
    echo "<table class='table table-bordered mt-2'>";
    echo "<tr><th class='table-light'>Equipo 1</th><th class='table-light'>Contra</th><th class='table-light'>Equipo 2</th></tr>";
    echo "<td>$equipos</td>";
    echo "<td></td>";
    echo "<td>$equipos2</td>";
    echo "</table></div>";
?>



<?php
require_once "templates/footer.php";
?>
