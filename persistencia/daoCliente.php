<?php

    function registrarCliente(Cliente $nuevoCliente){

        require_once 'parametrosBD.php';

        try{
            $conn = new PDO("mysql:host=$host;dbname=$nombreBaseDatos", $usuario,$password);

            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
            $query = $conn->prepare("INSERT INTO cliente (rut, nombre, apellido1, apellido2, id_comuna,
            direccion,
            email,
            telefono,
            giro,
            estado)
            VALUES (?,?,?,?,?,?,?,?,?,?)");

            $resultado = $query->execute([$nuevoCliente->getRut(), $nuevoCliente->getNombre(), $nuevoCliente->getApellido1(),
            $nuevoCliente->getApellido2(), $nuevoCliente->getComuna(), $nuevoCliente->getDireccion(), $nuevoCliente->getEmail(), $nuevoCliente->getTelefono(), $nuevoCliente->getGiro(), 1 ]);
 
            
            if($resultado)
            {
                return 'ok';
            }
            else
            {
                return 'err';
            }

        }catch(PDOException $pe){

            return "err : " . $pe->getMessage();
        }
    }

    function actualizarCliente(Cliente $cliente){

        require_once 'parametrosBD.php';

        try{
            $conn = new PDO("mysql:host=$host;dbname=$nombreBaseDatos", $usuario,$password);

            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $queryUpdate = $conn->prepare("UPDATE cliente SET
            nombre=:nombre,
            apellido1=:apellido1,
            apellido2=:apellido2,
            id_comuna=:id_comuna,
            direccion=:direccion,
            email=:email,
            telefono=:telefono,
            giro=:giro
            WHERE rut=:rut");

            $queryUpdate->bindValue("nombre", $cliente->getNombre());
            $queryUpdate->bindValue("apellido1", $cliente->getApellido1());
            $queryUpdate->bindValue("apellido2", $cliente->getApellido2());
            $queryUpdate->bindValue("id_comuna", $cliente->getComuna());
            $queryUpdate->bindValue("direccion", $cliente->getDireccion());
            $queryUpdate->bindValue("email", $cliente->getEmail());
            $queryUpdate->bindValue("telefono", $cliente->getTelefono());
            $queryUpdate->bindValue("giro", $cliente->getGiro());
            $queryUpdate->bindValue("rut", $cliente->getRut());

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

    function eliminarCliente($rut){

        require_once 'parametrosBD.php';

        try{
            $conn = new PDO("mysql:host=$host;dbname=$nombreBaseDatos", $usuario,$password);

            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
            $queryDelete = $conn->prepare("UPDATE cliente set estado = 0 where rut=:rut");

            $queryDelete->bindValue("rut", $rut);

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

        require 'parametrosBD.php';
        require_once 'daoComuna.php';
        require_once 'daoCiudad.php';
        require_once 'daoRegion.php';

        try
        {
            $conexion = new PDO("mysql:host=$host;dbname=$nombreBaseDatos;charset=UTF8", $usuario, $password);

            $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $listaDeClientes=[];

            $querySelect = $conexion->query("SELECT * FROM cliente where estado=1");

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
        require_once 'daoComuna.php';
        require_once 'daoCiudad.php';                
        require_once 'daoRegion.php';   
        require_once '../../entidades/cliente.php';   

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