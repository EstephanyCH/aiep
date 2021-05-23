<?php

    if(isset($_POST['registrar']))
    { 
        require_once '../entidades/producto.php';
        require_once '../persistencia/daoProducto.php';

        $nombre = $_POST['nombre'];
        $codigo = $_POST['codigo'];
        $descripcion = $_POST['descripcion'];
        $unidadMedida = $_POST['unidadMedida'];
        $precioUnitario = $_POST['precioUnitario'];

        $nuevoProducto = new Producto($nombre, $codigo, $descripcion,  $unidadMedida, $precioUnitario);
        header("Location: ../presentacion/producto/registrar.php?msj=" . registrarProducto($nuevoProducto) . " [Producto: " . $nuevoProducto->getNombre() . "]");
        
        die();    
    }
    elseif(isset($_POST['actualizar']))
    { 
        require_once '../entidades/producto.php';
        require_once '../persistencia/daoProducto.php';

        $nombre = $_POST['nombre'];
        $codigo = $_POST['codigo'];
        $descripcion = $_POST['descripcion'];
        $unidadMedida = $_POST['unidadMedida'];
        $precioUnitario = $_POST['precioUnitario'];
       
        $nuevoProducto = new Producto($nombre, $codigo, $descripcion,  $unidadMedida, $precioUnitario);

        header("Location: ../presentacion/producto/actualizar.php?msj=" . actualizarProducto($nuevoProducto) . " [Producto: " . $nuevoProducto->getNombre() . "]");
        
        die();    
    }
    elseif(isset($_POST['eliminar']))
    { 
        require_once '../entidades/producto.php';
        require_once '../persistencia/daoProducto.php';

        $nombre = $_POST['nombre'];
        $codigo = $_POST['codigo'];
        $descripcion = $_POST['descripcion'];
        $unidadMedida = $_POST['unidadMedida'];
        $precioUnitario = $_POST['precioUnitario'];
        $nuevoProducto = new Producto($nombre, $codigo, $descripcion,  $unidadMedida, $precioUnitario);
       
        header("Location: ../presentacion/producto/eliminar.php?msj=" . eliminar($codigo) . " [Producto: " . $nuevoProducto->getNombre() . "]");
        
        die();    
    }


    function getProductos(){

        require_once '../../persistencia/daoProducto.php';
        require_once '../../entidades/producto.php';

        $lista = consultar();
        
        return $lista;
    }

    function evaluarParametrosPorId(){

        if(isset($_GET['codigoParametros']) && $_GET['codigoParametros'] !== "")
        {
            require_once '../../entidades/producto.php';
            require_once '../../persistencia/daoProducto.php';

            $nuevoProducto = getProductoPorId($_GET['codigoParametros']);
            $_GET['nombreParametros'] = $nuevoProducto->getNombre();
            $_GET['codigoParametros'] = $nuevoProducto->getCodigo();
            $_GET['descripcionParametros'] = $nuevoProducto->getDescripcion();
            $_GET['unidad_medidaParametros'] = $nuevoProducto->getUnidadMedida();
            $_GET['precioUnitarioParametros'] = $nuevoProducto->getPrecioUnitario();

        }
        else
        {
            $_GET['nombreParametros'] = "";
            $_GET['codigoParametros'] = "";
            $_GET['descripcionParametros'] = "";
            $_GET['unidad_medidaParametros'] = "";
            $_GET['precioUnitarioParametros'] = "";
        }
    }

    
?>
