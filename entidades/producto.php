<?php

    class Producto{

        private $nombre;
        private $codigo;
        private $descripcion;
        private $unidad_medida;
        private $precio_unitario;

        function __construct($nombre, $codigo, $descripcion, $unidad_medida, $precio_unitario)
        {
            $this->nombre=$nombre;
            $this->codigo=$codigo;
            $this->descripcion=$descripcion;
            $this->unidad_medida=$unidad_medida;
            $this->precio_unitario=$precio_unitario;
        }

        function getNombre(){
            return $this->nombre;
        }

        function getCodigo(){
            return $this->codigo;
        }

        function getDescripcion(){
            return $this->descripcion;
        }

        function getUnidadMedida(){
            return $this->unidad_medida;
        }

        function getPrecioUnitario(){
            return $this->precio_unitario;
        }
    }
?>