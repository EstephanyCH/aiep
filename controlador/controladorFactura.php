<?php

    if(isset($_POST['filtrar']))
    { 
        session_start();

        $_SESSION['fechaInicio'] = $_POST['trip-start'];
        $_SESSION['fechaFin'] = $_POST['trip-end'];
        header("Location: ../presentacion/libro_ventas/administrar.php");
        die();
        
    }

    if(isset($_POST['actualizar']))
    { 
        require_once '../entidades/encabezado_documento.php';
        require_once '../persistencia/daoFactura.php';

        $rut_empresa = $_POST['rutEmpresa'];
        $observaciones = $_POST['observaciones'];
        $id_tipo = $_POST['observa'];
        $id_estado = $_POST['idEstado'];
        $iva = $_POST['iva'];
        $cliente = $_POST['cliente'];
        $nuevo = new EncabezadoDocumento($rut_empresa, $observaciones, $id_tipo, $id_estado, $iva, $cliente);
        $nuevo->id_documento = $_POST['numeroDocumento'];
         header("Location: ../presentacion/facturas/actualizar.php?msj=" . actualizarFactura($nuevo) . " [Empresa: " . $nuevo->getIdDocumento() . "]");
        die();
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

    if(isset($_POST['registrarProducto']))
    { 
        require_once '../persistencia/daoFactura.php';
        require_once '../entidades/detalle_documento.php';

        $idFactura = $_POST['numeroDocumentoParametros'];
        $producto = $_POST['idProducto'];
        $cantidad = $_POST['cantidad'];
        $precio = $_POST['precio'];
       
        $nuevo = new DetalleDocumento($idFactura, $precio, $cantidad);
        $nuevo->productoFactura = $producto;

        header("Location: ../presentacion/productosFactura/administrar.php?msj=" . registrarProductosPorFactura($nuevo) . " [Empresa: " . $nuevo->getIdDetalle() . "]");
        die();
    }

    function consultarFactura(){

        if(isset($_GET['numeroDocumentoParametros']) && $_GET['numeroDocumentoParametros'] !== "")
        {
            require_once '../../entidades/encabezado_documento.php';
            require_once '../../persistencia/daoFactura.php';

            $nuevaFactura = getFacturaPorId($_GET['numeroDocumentoParametros']);
            $_GET['RutEmpresaParametros'] = $nuevaFactura->getRutEmpresa();
            $_GET['observacionesParametros'] = $nuevaFactura->getObservaciones();
            $_GET['tipoParametros'] = $nuevaFactura->getIdTipo();
            $_GET['estadoParametros'] = $nuevaFactura->getIdEstado();
            $_GET['ivaParametros'] = $nuevaFactura->getIva();
            $_GET['clienteParametros'] = $nuevaFactura->getCliente();
        }
    }
    
    function getFacturas($datestart, $dateEnd ){

        require_once '../../persistencia/daoFactura.php';
        require_once '../../entidades/encabezado_documento.php';
        $lista = consultarFaturas($datestart, $dateEnd);
        
        return $lista;
    }

    function getProductosFactura(){
        if(isset($_GET['numeroDocumentoParametros']) && $_GET['numeroDocumentoParametros'] !== "")
        {
            require_once '../../persistencia/daoFactura.php';

            $lista = consultarProductosFactura($_GET['numeroDocumentoParametros']);
            
            return $lista;
        }
       
    }

?>
