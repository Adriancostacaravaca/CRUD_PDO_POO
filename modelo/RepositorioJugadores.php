<?php
require_once "Jugador.php";

class RepositorioJugadores
{
    private $conexion;

    public function __construct($con)
    {
        $this->conexion = $con;
    }

    public function findAll()
    {
        //Escribo el texto de la consulta para recuperar todos los artículos de la BBDD
        $textoSQL = "SELECT * FROM jugadores";
        //Realizo la consulta aprovechando la conexión que me han pasado en el constructor
        $resultado = $this->conexion->query($textoSQL);
        //Array de artículos que vamos a devolver
        $jugs = [];
        $cont = 0;
        //Mientras haya filas en la consulta, las convierto en artículos del array
        while ($fila = $resultado->fetch(PDO::FETCH_OBJ)) {
            $jugs[] = new Jugador();
            $jugs[$cont]->setPropiedades($fila->nombre, $fila->telefono, $fila->email, $fila->imagen);
            $jugs[$cont]->setId($fila->id);
            $jugs[$cont]->setEquipoActual($fila->equipoactual);
            $cont++;
        }

        return $jugs;
    }


    public function save($jugador)
    {
        $stmt = $this->conexion->prepare("INSERT INTO jugadores (nombre, telefono, email, imagen, equipoactual) VALUES (?, ?, ?, ?, ?)");
        $nombre = $jugador->getNombre();
        $telefono = $jugador->getTelefono();
        $email = $jugador->getEmail();
        $imagen = $jugador->getImagen();
        $equipoactual = $jugador->getEquipoActual();
        $stmt->bindParam(1, $nombre);
        $stmt->bindParam(2, $telefono);
        $stmt->bindParam(3, $email);
        $stmt->bindParam(4, $imagen);
        $stmt->bindParam(5, $equipoactual);
        $stmt->execute();
    }
}
