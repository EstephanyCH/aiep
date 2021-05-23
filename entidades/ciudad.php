<?php
    class Ciudad{

        private $id_ciudad;
        private $ciudad;
        private $id_region;

        function __construct($id_ciudad, $ciudad, $id_region )
        {
            $this->id_ciudad=$id_ciudad;
            $this->ciudad=$ciudad;
            $this->id_region=$id_region;
        }

        function getId(){
            return $this->id_ciudad;
        }

        function getNombre(){
            return $this->ciudad;
        }

        function getIdRegion(){
            return $this->id_region;
        }
    }
?>