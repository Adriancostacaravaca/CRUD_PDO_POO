<?php
    require_once("../modelo/conexion.php");
    require_once("../modelo/Equipo.php");
    require_once("../modelo/RepositorioEquipos.php");

    $id = $_GET["id"];

        $repo=new RepositorioEquipos($conexion);
        $repo->deleteById($id);
    
        header("location: ../index.php");
      