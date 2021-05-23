<?php
    class Usuario{

        private $rut;
        private $nombre;
        private $apellido1;
        private $apellido2;
        private $id_comuna;
        private $direccion;
        private $email;
        private $telefono;
        private $giro;
        private $tipo;


        function __construct($rut, $nombre, $apellido1, $apellido2, $id_comuna,$direccion,$email, $telefono, $giro, $tipo )
        {
            $this->rut=$rut;
            $this->nombre=$nombre;
            $this->apellido1=$apellido1;
            $this->apellido2=$apellido2;
            $this->id_comuna=$id_comuna;
            $this->direccion=$direccion;
            $this->email=$email;
            $this->telefono=$telefono;
            $this->giro=$giro;
            $this->tipo=$tipo;
        }

        function getRut(){
            return $this->rut;
        }

        function getNombre(){
            return $this->nombre;
        }

        function getAppelido1(){
            return $this->apellido1;
        }

        function getApellido2(){
            return $this->apellido2;
        }

        function getComuna(){
            return $this->id_comuna;
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

        function getTipo(){
            return $this->tipo;
        }
    }
?>