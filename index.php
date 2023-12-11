<?php

    $titulo = "Inicio";
    $activo = "Inicio";

    require_once "modelo/Equipo.php";
    require_once "modelo/Jugador.php";
    require_once "modelo/RepositorioEquipos.php";
    require_once "modelo/RepositorioJugadores.php";
    require_once "modelo/conexion.php";
    require_once "templates/header.php";

    $repo=new RepositorioEquipos($conexion);

    $lista = $repo->findAll();

    echo "<div class='container table-responsive'>";
    echo "<table class='table table-bordered mt-2'>";
    echo "<tr><th class='table-light'>Id</th><th class='table-light'>Nombre equipo</th><th class='table-light'>Observaciones</th></tr>";
    
    foreach($lista as $equipo){
        echo "<tr><td>$equipo->id</td>";
        echo "<td>$equipo->nombre</td>";
        echo "<td class='text-break'>$equipo->observaciones</td>";
        echo "<td><a href='form_update.php?id=$equipo->id'>Modificar</a></td>";
        echo "<td><a href='crud/delete.php?id=$equipo->id'>Borrar</a></td></tr>";
    }
    
    echo "</table></div>";


    // MUESTRO TAMBIÉN LOS JUGADORES CON EL MISMO FORMATO QUE LOS EQUIPOS

    $repo=new RepositorioJugadores($conexion);

    $lista2 = $repo->findAll();

    echo "<div class='container table-responsive'>";
    echo "<table class='table table-bordered mt-2'>";
    echo "<tr><th class='table-light'>Id</th><th class='table-light'>Nombre jugador</th><th class='table-light'>Teléfono</th><th class='table-light'>Email</th><th class='table-light'>Fotografía</th><th class='table-light'>Equipo</th></tr>";
    
    foreach($lista2 as $jugador){
        echo "<tr><td>$jugador->id</td>";
        echo "<td>$jugador->nombre</td>";
        echo "<td>$jugador->telefono</td>";
        echo "<td>$jugador->email</td>";
        echo "<td><img src='img/$jugador->imagen' class='card-img-top mx-auto' style='max-width: 10vw;height:5vw'>";
        echo "<td>$jugador->equipoActual</td></tr>";
    }
    
    echo "</table></div>";

    require_once "templates/footer.php";

