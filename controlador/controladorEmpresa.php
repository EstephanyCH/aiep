<?php

    if(isset($_POST['actualizar']))
    { 
        require_once '../entidades/empresa.php';
        require_once '../persistencia/daoEmpresa.php';

        $rut= $_POST['rut'];
        $nombre = $_POST['nombre'];
        $razon_social = $_POST['razonSocial'];
        $giro = $_POST['giro'];
    
        $nuevo = new Empresa($rut, $nombre, $razon_social, $giro);

        header("Location: ../presentacion/empresa/actualizar.php?msj=" . actualizarEmpresa($nuevo) . " [Empresa: " . $nuevo->getRut() . "]");
        die();
    }

    function evaluarParametrosPorId(){

            require_once '../../entidades/empresa.php';
            require_once '../../persistencia/daoEmpresa.php';

            $rutEmpresa = '24327088';
            $nuevoCliente = getEmpresaPorRut($rutEmpresa);

            $_GET['RutParametros'] = $nuevoCliente->getRut();
            $_GET['nombreParametros'] = $nuevoCliente->getNombre();
            $_GET['razonSocialParametros'] = $nuevoCliente->getRazonSocial();
            $_GET['giroParametros'] = $nuevoCliente->getGiro();
    }
?>
