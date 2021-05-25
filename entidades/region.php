<?php
    class Region{

        private $id_region;
        private $region;

        function __construct($id_region, $region )
        {
            $this->id_region=$id_region;
            $this->region=$region;
        }

        function getId(){
            return $this->id_region;
        }

        function getNombre(){
            return $this->region;
        }
    }
?>