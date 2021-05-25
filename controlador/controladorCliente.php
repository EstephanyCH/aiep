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

        $rut= $_POST['rut'];
        $nombre = $_POST['nombre'];
        $apellido1 = $_POST['apellido1'];
        $apellido2 = $_POST['apellido2'];
        $id_ciudad = $_POST['id_comuna'];
        $id_region = $_POST['id_ciudad'];
        $id_comuna =  $_POST['id_region'];
        $direccion = $_POST['direccion'];
        $email = $_POST['email'];
        $telefono = $_POST['telefono'];
        $giro = $_POST['giro'];

        $nuevoCliente = new Cliente($rut, $nombre, $apellido1,  $apellido2, $id_ciudad, $id_comuna, $id_region,$direccion, $email, $telefono, $giro);
        
        header("Location: ../presentacion/clientes/actualizar.php?msj=" . actualizarCliente($nuevoCliente) . " [Cliente: " . $nuevoCliente->getRut() . "]");
        die();
    }
    elseif(isset($_POST['eliminar']))
    { 
        require_once '../entidades/cliente.php';
        require_once '../persistencia/daoCliente.php';

        $rut= $_POST['rut'];
        $nombre = $_POST['nombre'];
        $apellido1 = $_POST['apellido1'];
        $apellido2 = $_POST['apellido2'];
        $id_ciudad = $_POST['id_comuna'];
        $id_region = $_POST['id_ciudad'];
        $id_comuna =  $_POST['id_region'];
        $direccion = $_POST['direccion'];
        $email = $_POST['email'];
        $telefono = $_POST['telefono'];
        $giro = $_POST['giro'];

        $nuevoCliente = new Cliente($rut, $nombre, $apellido1,  $apellido2, $id_ciudad, $id_comuna, $id_region,$direccion, $email, $telefono, $giro);
       
        header("Location: ../presentacion/clientes/eliminar.php?msj=" . eliminarCliente($rut) . " [Cliente: " . $nuevoCliente->getNombre() . "]");
        
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
