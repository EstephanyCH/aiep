<?php

    function getTodosLasRegiones(){
        include_once '../../persistencia/daoRegion.php';
        include_once '../../entidades/region.php';
        $lista = traerComunas();

        return $lista;
    }
        
?>