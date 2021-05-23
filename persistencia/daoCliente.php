<?php

    function registrarCliente(Cliente $nuevoCliente){

        require_once 'parametrosBD.php';

        try{
            $conn = new PDO("mysql:host=$host;dbname=$nombreBaseDatos", $usuario,$password);

            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $query = $conn->prepare("INSERT INTO cliente (rut, nombre, apellido1, apellido2, id_comuna,direccion,
            email,
            telefono,
            giro)
            VALUES (?,?,?,?,?,?,?,?,?)");
     
           /*  $resultado = $query->execute([$nuevoProducto->getCodigo(), $nuevoProducto->getNombre(), $nuevoProducto->getDescripcion(),
            $nuevoCliente->getUnidadMedida(), $nuevoProducto->getPrecioUnitario()]);
 
            if($resultado)
            {
                return 'ok';
            }
            else
            {
                return 'err';
            }
 */
        }catch(PDOException $pe){

            return "err : " . $pe->getMessage();
        }
    }

    function actualizarCliente(Cliente $cliente){

        require_once 'parametrosBD.php';


        try{
            $conn = new PDO("mysql:host=$host;dbname=$nombreBaseDatos", $usuario,$password);

            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $queryUpdate = $conn->prepare("UPDATE producto SET nombre=:nombre, descripcion=:descripcion, unidad_medida=:unidad_medida,
            precio_unitario=:precio_unitario WHERE codigo=:codigo");

            $queryUpdate->bindValue("codigo", $nuevoProducto->getCodigo());
            $queryUpdate->bindValue("nombre", $nuevoProducto->getNombre());
            $queryUpdate->bindValue("descripcion", $nuevoProducto->getDescripcion());
            $queryUpdate->bindValue("unidad_medida", $nuevoProducto->getUnidadMedida());
            $queryUpdate->bindValue("precio_unitario", $nuevoProducto->getPrecioUnitario());

            $resultado = $queryUpdate->execute();
            
            if($resultado)
            {
                return "ok";
            }
            else
            {
                return "err";
            }

        }
        catch(PDOException $pe)
        {
            return "err : " . $pe->getMessage();
        }

    }

    function eliminarCliente($codigo){

        require_once 'parametrosBD.php';

        try{
            $conn = new PDO("mysql:host=$host;dbname=$nombreBaseDatos", $usuario,$password);

            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
            $queryDelete = $conn->prepare("UPDATE producto set estado = 0 where codigo=:codigo");

            $queryDelete->bindValue("codigo", $codigo);

            $resultado = $queryDelete->execute();
            
                        
            if($resultado)
            {
            return "ok";
            }
            else
            {
            return "err";
            }

        }
        catch(PDOException $pe)
        {
            echo 'Ocurrio un error:' . $pe->getMessage();
        }
    }

    function consultarClientes(){

        require_once 'parametrosBD.php';
        require_once 'daoComuna.php';
        require_once 'daoCiudad.php';
        require_once 'daoRegion.php';

        try
        {
            $conexion = new PDO("mysql:host=$host;dbname=$nombreBaseDatos;charset=UTF8", $usuario, $password);

            $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $listaDeClientes=[];

            $querySelect = $conexion->query("SELECT * FROM cliente");

            foreach($querySelect->fetchAll() as $arregloCliente)
            {

                $comuna = getComunaPorId($arregloCliente['id_comuna']);
                $ciudad = getCiudadPorId($comuna->getIdCiudad());
                $region = getRegiondPorId($ciudad->getIdRegion());

                $cliente= new Cliente($arregloCliente['rut'], $arregloCliente['nombre'], 
                $arregloCliente['apellido1'], $arregloCliente['apellido2'], $ciudad, $comuna, $region, $arregloCliente['direccion'], $arregloCliente['email'], $arregloCliente['telefono'], $arregloCliente['giro']);

                $listaDeClientes[]=$cliente;
            }

            if(count($listaDeClientes) > 0){
                return $listaDeClientes;
            }else{
                return ($lista=[]);
            }
        }
        catch(PDOException $pe)
        {
            return $pe->getMessage();

        }
    }

    
    function getClientePorId($rut){
        require 'parametrosBD.php';
        require 'daoComuna.php';
        require 'daoCiudad.php';                
        require 'daoRegion.php';                                

        try
        {
            $conexion = new PDO("mysql:host=$host;dbname=$nombreBaseDatos;charset=UTF8", $usuario, $password);

            $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $listaDeClientes=[];

            $querySelect = $conexion->query("SELECT * FROM cliente where rut='" . $rut . "'");

            foreach($querySelect->fetchAll() as $arregloCliente)
            {

                $comuna = getComunaPorId($arregloCliente['id_comuna']);
                $ciudad = getCiudadPorId($comuna->getIdCiudad());
                $region = getRegiondPorId($ciudad->getIdRegion());

                $cliente= new Cliente($arregloCliente['rut'], $arregloCliente['nombre'], 
                $arregloCliente['apellido1'], $arregloCliente['apellido2'], $ciudad, $comuna, $region, $arregloCliente['direccion'], $arregloCliente['email'], $arregloCliente['telefono'], $arregloCliente['giro']);
            
                $listaDeClientes[]=$cliente;

            }

            if(count($listaDeClientes) > 0){
                return $listaDeClientes[0];
            }else{
                return "La consulta no devuelve registros";
            }
        }
        catch(PDOException $pe)
        {
            return $pe->getMessage();

        }
    }

?>