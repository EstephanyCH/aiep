<?php
    class Comuna{

        private $id_comuna;
        private $comuna;
        private $id_ciudad;

        function __construct($id_comuna, $comuna, $id_ciudad )
        {
            $this->id_comuna=$id_comuna;
            $this->comuna=$comuna;
            $this->id_ciudad=$id_ciudad;
        }

        function getId(){
            return $this->id_comuna;
        }

        function getNombre(){
            return $this->comuna;
        }

        function getIdCiudad(){
            return $this->id_ciudad;
        }
    }
?>