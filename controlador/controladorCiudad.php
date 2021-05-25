<?php

    function getTodosLasCiudades(){
        include_once '../../persistencia/daoCiudad.php';
        include_once '../../entidades/ciudad.php';

        $lista = traerCiudades();

        return $lista;
    }
    
?>