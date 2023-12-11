<?php
require_once "Equipo.php";

class RepositorioEquipos
{
    private $conexion;

    public function __construct($con)
    {
        $this->conexion = $con;
    }

    public function findAll()
    {
        //Escribo el texto de la consulta para recuperar todos los artículos de la BBDD
        $textoSQL = "SELECT * FROM equipos";
        //Realizo la consulta aprovechando la conexión que me han pasado en el constructor
        $resultado = $this->conexion->query($textoSQL);
        //Array de artículos que vamos a devolver
        $equps = [];
        $cont = 0;
        //Mientras haya filas en la consulta, las convierto en artículos del array
        while ($fila = $resultado->fetch(PDO::FETCH_OBJ)) {
            $equps[] = new Equipo();
            $equps[$cont]->setPropiedades($fila->nombre, $fila->observaciones);
            $equps[$cont]->setId($fila->id);
            $cont++;
        }

        return $equps;
    }

    public function findById($idABuscar)
    {
        $textoSQL = "SELECT * FROM equipos WHERE id=$idABuscar";
        $resultado = $this->conexion->query($textoSQL);
        $fila = $resultado->fetch(PDO::FETCH_OBJ);
        $equipo = new Equipo();
        $equipo->setPropiedades($fila->nombre, $fila->observaciones);
        $equipo->setId($fila->id);
        return $equipo;
    }

    public function save($equipo)
    {
        $stmt = $this->conexion->prepare("INSERT INTO equipos (nombre, observaciones) VALUES (?, ?)");
        $nombre = $equipo->getNombre();
        $observaciones = $equipo->getObservaciones();
        $stmt->bindParam(1, $nombre);
        $stmt->bindParam(2, $observaciones);

        $stmt->execute();
    }

    public function update($equipo)
    {
        $stmt = $this->conexion->prepare("UPDATE equipos SET nombre=?, observaciones=? WHERE id=?");
        $nombre = $equipo->getNombre();
        $observaciones = $equipo->getObservaciones();
        $id = $equipo->getId();
        $stmt->bindParam(1, $nombre);
        $stmt->bindParam(2, $observaciones);
        $stmt->bindParam(3, $id);
        $stmt->execute();
    }

    public function deleteById($id)
    {
        $stmt = $this->conexion->prepare("DELETE FROM equipos WHERE id=?");
        $stmt->bindParam(1, $id);

        $stmt->execute();
    }

}
