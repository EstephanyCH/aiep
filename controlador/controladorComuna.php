<?php

    function getTodosLasComunas(){
        echo 'comunas';
        include_once '../../persistencia/daoComuna.php';
        include_once '../../entidades/comuna.php';
        $lista = traerComunas();

        return $lista;
    }
?>