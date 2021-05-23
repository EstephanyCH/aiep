<?php

    if(isset($_POST['registrar']))
    { 
        require_once '../entidades/cliente.php';
        require_once '../persistencia/daoCliente.php';

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
        require_once '../entidades/cliente.php';
        require_once '../persistencia/daoCliente.php';

        $rut = $_POST['RutParametros'];
        $nombre = $_POST['nombreParametros'];
        $apellido1 = $_POST['apellido1Parametros'];
        $direccion = $_POST['direccionParametros'];
        $email = $_POST['emailParametros'];
        $telefono = $_POST['telefonoParametros'];
        $giro = $_POST['giroParametros'];

        $nuevoCliente = new Cliente($rut, $nombre, $apellido1,  $apellido2, 1, 2, 3, $direccion, $email, $telefono, $giro);

        header("Location: ../presentacion/producto/actualizar.php?msj=" . actualizarProducto($nuevoProducto) . " [Producto: " . $nuevoProducto->getNombre() . "]");
        
        die();    
    }
    elseif(isset($_POST['eliminar']))
    { 
        require_once '../entidades/cliente.php';
        require_once '../persistencia/daoCliente.php';

        $nombre = $_POST['nombre'];
        $codigo = $_POST['codigo'];
        $descripcion = $_POST['descripcion'];
        $unidadMedida = $_POST['unidadMedida'];
        $precioUnitario = $_POST['precioUnitario'];
        $nuevoProducto = new Producto($nombre, $codigo, $descripcion,  $unidadMedida, $precioUnitario);
       
        header("Location: ../presentacion/producto/eliminar.php?msj=" . eliminar($codigo) . " [Producto: " . $nuevoProducto->getNombre() . "]");
        
        die();    
    }


    function getClientes(){

        require_once '../../entidades/cliente.php';
        require_once '../../persistencia/daoCliente.php';

        $lista = consultarClientes();
        
        return $lista;
    }

    function evaluarParametrosPorId(){
        if(isset($_GET['RutParametros']) && $_GET['RutParametros'] !== "")
        {
            require_once '../../entidades/cliente.php';
            require_once '../../persistencia/daoCliente.php';

            $nuevoCliente = getClientePorId($_GET['RutParametros']);
            $_GET['nombreParametros'] = $nuevoCliente->getNombre();
            $_GET['apellido1Parametros'] = $nuevoCliente->getApellido1();
            $_GET['apellido2Parametros'] = $nuevoCliente->getApellido2();
            $_GET['comunaParametros'] = $nuevoCliente->getComuna();
            $_GET['ciudadParametros'] = $nuevoCliente->getCiudad();
            $_GET['regionParametros'] = $nuevoCliente->getRegion();
            $_GET['direccionParametros'] = $nuevoCliente->getDireccion();
            $_GET['emailParametros'] = $nuevoCliente->getEmail();
            $_GET['telefonoParametros'] = $nuevoCliente->getTelefono();
            $_GET['giroParametros'] = $nuevoCliente->getGiro();

        }
        else
        {
            $_GET['nombreParametros'] = "";
            $_GET['apellido1Parametros'] = "";
            $_GET['apellido2Parametros'] = "";
            $_GET['comunaParametros'] = "";
            $_GET['ciudadParametros'] = "";
            $_GET['regionParametros'] = "";
        }
    }

    
?>
