<?php
    class Equipo{
        public $id;
        public $nombre;
        public $observaciones;

        public function __construct()
        {

        }

        public function setPropiedades($nom, $obvs){
            $this->nombre=$nom;
            $this->observaciones = $obvs;  
        }

        public function getId() {
            return $this->id;
        }

        public function setId($id){
            $this->id=$id;
        }

        public function getNombre(){
            return $this->nombre;
        }

        public function setNombre($nombre) {
            $this->nombre=$nombre;
        }

        public function getObservaciones() {
            return $this->observaciones;
        }

        public function setObservaciones($observaciones){
            $this->observaciones=$observaciones;
        }

    }