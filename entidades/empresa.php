<?php
    class Empresa{

        private $rut;
        private $nombre;
        private $razon_social;
        private $giro;

        function __construct($rut, $nombre, $razon_social, $giro )
        {
            $this->rut=$rut;
            $this->nombre=$nombre;
            $this->razon_social=$razon_social;
            $this->giro=$giro;
        }

        function getRut(){
            return $this->rut;
        }

        function getNombre(){
            return $this->nombre;
        }

        function getRazonSocial(){
            return $this->razon_social;
        }

        function getGiro(){
            return $this->giro;
        }
    }
?>