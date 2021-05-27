<?php

    if(isset($_POST['actualizar']))
    { 
        require_once '../entidades/EncabezadoDocumento.php';
        require_once '../persistencia/daoFactura.php';

        $rut_empresa = $_POST['rutEmpresa'];
        $fecha_emision = $_POST['fechaEmision'];
        $observaciones = $_POST['observaciones'];
        $id_tipo = $_POST['idTipo'];
        $id_estado = $_POST['idEstado'];
        $iva = $_POST['iva'];
        $neto = $_POST['neto'];
        $total = $_POST['total'];

        $nuevo = new EncabezadoDocumento($rut_empresa, $fecha_emision, $observaciones, $id_tipo, $id_estado, $iva, $neto, $total);

      /*   header("Location: ../presentacion/factura/actualizar.php?msj=" . actualizarFactura($nuevo) . " [Empresa: " . $nuevo->getRut() . "]");
        die(); */
    }

    if(isset($_POST['registrar']))
    { 
        require_once '../entidades/encabezado_documento.php';
        require_once '../persistencia/daoFactura.php';

        $rut_empresa = $_POST['rutEmpresa'];
        $observaciones = $_POST['observaciones'];
        $id_tipo = $_POST['idTipo'];
        $iva = $_POST['iva'];
        $cliente = $_POST['cliente'];
        $nuevo = new EncabezadoDocumento($rut_empresa, $observaciones, $id_tipo, $id_estado, $iva, $cliente);

        header("Location: ../presentacion/facturas/actualizar.php?msj=" . registrarFactura($nuevo) . " [Empresa: " . $nuevo->getIdDocumento() . "]");
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
    
    function getFacturas(){

        require_once '../../persistencia/daoFactura.php';
        require_once '../../entidades/encabezado_documento.php';

        $lista = consultar();
        
        return $lista;
    }

?>
