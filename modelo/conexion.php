<?php

    // CREO LA CONEXIÓN A LA BASE DE DATOS EN TELOSABES (LA BASE DE DATOS YA ESTÁ CREADA, SINO, TENDRÍA QUE CREARLA)

    $basededatos="h0122u0007_adrian";
    try {
        $dsn = "mysql:host=localhost;dbname=$basededatos";
        $usuariobd="adrian";
        $password="Murcia2023";
        $conexion = new PDO($dsn, $usuariobd, $password);
        $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e){
        echo $e->getMessage();
    }

    // CREO TABLAS SI NO EXISTEN EN LA BASE DE DATOS PARA PODER INTRODUCIR DATOS EN ELLAS

    $statement = 'CREATE TABLE IF NOT EXISTS equipos (
        id INT AUTO_INCREMENT,
        nombre VARCHAR(100) NOT NULL,
        observaciones TEXT NOT NULL, 
        PRIMARY KEY(id)
        );';
        
    $conexion->exec($statement);

    $statement2 = 'CREATE TABLE IF NOT EXISTS jugadores (
        id INT AUTO_INCREMENT,
        nombre VARCHAR(100) NOT NULL,
        telefono INT NOT NULL,
        email VARCHAR(100) NOT NULL,
        imagen VARCHAR(255),
        equipoactual VARCHAR(100) NOT NULL,
        PRIMARY KEY (id)
        );';
        
    $conexion->exec($statement2);
       
       