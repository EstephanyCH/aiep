<?php
    class TipoUsuario{

        private $id_tipo;
        private $tipo;

        function __construct($id_tipo, $tipo )
        {
            $this->id_tipo=$id_tipo;
            $this->tipo=$tipo;
        }

        function getId(){
            return $this->id_tipo;
        }

        function getTipo(){
            return $this->tipo;
        }
    }
?>