<?php

    function getTodosLasRegiones(){
        echo'region';
        include_once '../../persistencia/daoRegion.php';
        include_once '../../entidades/region.php';

        $lista = traerRegiones();

        return $lista;
    }
        
?>