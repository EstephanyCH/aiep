<?php
    class EncabezadoDocumento{

        public $id_documento;
        private $rut_empresa;
        public $fecha_emision;
        private $observaciones;
        private $id_tipo;
        private $id_estado;
        private $iva;
        public $neto;
        public $total;
        private $cliente;

        function __construct($rut_empresa, $observaciones, $id_tipo, $id_estado, $iva, $cliente )
        {
            $this->rut_empresa=$rut_empresa;
            $this->observaciones=$observaciones;
            $this->id_tipo=$id_tipo;
            $this->id_estado=$id_estado;
            $this->iva=$iva;
            $this->cliente=$cliente;
        }

        function getIdDocumento(){
            return $this->id_documento;
        }

        function getRutEmpresa(){
            return $this->rut_empresa;
        }

        function getFechaEmision(){
            return $this->fecha_emision;
        }

        function getObservaciones(){
            return $this->observaciones;
        }

        function getIdTipo(){
            return $this->id_tipo;
        }

        function getIdEstado(){
            return $this->id_estado;
        }

        function getIva(){
            return $this->iva;
        }

        function getNeto(){
            return $this->neto;
        }

        function getTotal(){
            return $this->total;
        }

        function getCliente(){
            return $this->cliente;
        }
    }
?>