<?php
    require_once("../modelo/conexion.php");
    require_once("../modelo/Equipo.php");
    require_once("../modelo/RepositorioEquipos.php");
    if (isset($_POST['submit'])) {
        
        $equipo=new Equipo();
        $equipo->setPropiedades($_POST["nombre"], $_POST["observaciones"]);
        $equipo->setId($_POST["id"]);
        $repo=new RepositorioEquipos($conexion);
        $repo->update($equipo);

        header("location: ../index.php");

      }