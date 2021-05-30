<?php

    class DetalleDocumento{

        private $id_encabezado_documento;
        public  $productoFactura;
        private $precio_unitario_producto;
        private $cantidad;
        public $id_detalle_documento;

        function __construct( $id_encabezado_documento, $precio_unitario_producto, $cantidad)
        {
            $this->id_encabezado_documento=$id_encabezado_documento;
            $this->precio_unitario_producto=$precio_unitario_producto;
            $this->cantidad=$cantidad;
        }

        function getIdDetalle(){
            return $this->id_detalle_documento;
        }

        function getIdFactura(){
            return $this->id_encabezado_documento;
        }

        function getProducto(){
            return $this->productoFactura;
        }

        function getPrecio(){
            return $this->precio_unitario_producto;
        }

        function getCantidad(){
            return $this->cantidad;
        }
    }
?>