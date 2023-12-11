<?php
class Jugador
{
    public $id;
    public $nombre;
    public $telefono;
    public $email;
    public $imagen;
    public $equipoActual;


    public function __construct()
    {
    }

    public function setPropiedades($nom, $telefono, $email, $img)
    {
        $this->nombre = $nom;
        $this->telefono = $telefono;
        $this->email = $email;
        $this->imagen = $img;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getNombre()
    {
        return $this->nombre;
    }

    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }

    public function getTelefono()
    {
        return $this->telefono;
    }

    public function setTelefono($telefono)
    {
        $this->telefono = $telefono;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function getImagen()
    {
        return $this->imagen;
    }

    public function setImagen($imagen)
    {
        $this->imagen = $imagen;
    }

    public function getEquipoActual()
    {
        return $this->equipoActual;
    }

    public function setEquipoActual($equipoActual)
    {
        $this->equipoActual = $equipoActual;
    }

}
