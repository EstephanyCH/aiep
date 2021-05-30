<?php

    function getTodosLasEstados(){
        include_once '../../persistencia/daoEstadoDocumento.php';
        include_once '../../entidades/estado_documento.php';

        $lista = traerEstados();

        return $lista;
    } 
?>