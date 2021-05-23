<?php
    class Cliente{

        private $rut;
        private $nombre;
        private $apellido1;
        private $apellido2;
        private $comuna;
        private $ciudad;
        private $region;
        private $direccion;
        private $email;
        private $telefono;
        private $giro;

        function __construct($rut, $nombre, $apellido1, $apellido2, $ciudad, $comuna, $region,$direccion,$email, $telefono, $giro )
        {
            $this->rut=$rut;
            $this->nombre=$nombre;
            $this->apellido1=$apellido1;
            $this->apellido2=$apellido2;
            $this->direccion=$direccion;
            $this->email=$email;
            $this->telefono=$telefono;
            $this->giro=$giro;
            $this->comuna=$comuna;
            $this->ciudad=$ciudad;
            $this->region=$region;
        }

        function getRut(){
            return $this->rut;
        }

        function getNombre(){
            return $this->nombre;
        }

        function getApellido1(){
            return $this->apellido1;
        }

        function getApellido2(){
            return $this->apellido2;
        }

        function getComuna(){
            return $this->comuna;
        }

        function getCiudad(){
            return $this->ciudad;
        }

        function getRegion(){
            return $this->region;
        }
        function getDireccion(){
            return $this->direccion;
        }

        function getEmail(){
            return $this->email;
        }

        function getTelefono(){
            return $this->telefono;
        }

        function getGiro(){
            return $this->giro;
        }
    }
?>