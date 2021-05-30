<?php
    class EstadoDocumento{

        private $id_estado;
        private $estado;

        function __construct($id_estado, $estado )
        {
            $this->id_estado=$id_estado;
            $this->estado=$estado;
        }

        function getId(){
            return $this->id_estado;
        }

        function getEstado(){
            return $this->estado;
        }
    }
?>