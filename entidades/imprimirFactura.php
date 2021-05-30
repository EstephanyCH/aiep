<?php
    class ImprimirFactura{

        private $cliente;
        private $empresa;
        private $productos;
        private $detalleFactura;

        function __construct($empresa , $detalleFactura, $cliente )
        {
            $this->empresa=$empresa;
            $this->detalleFactura=$detalleFactura;
            $this->cliente=$cliente;
        }

        function getCliente(){
            return $this->cliente;
        }

        function getEmpresa(){
            return $this->empresa;
        }

        function getProductos(){
            return $this->productos;
        }
        function getDetalleFactura(){
            return $this->detalleFactura;
        }

    }
?>