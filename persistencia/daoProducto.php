<?php

    function registrarProducto(Producto $nuevoProducto){

        require_once 'parametrosBD.php';

        try{
            $conn = new PDO("mysql:host=$host;dbname=$nombreBaseDatos", $usuario,$password);

            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $query = $conn->prepare("INSERT INTO producto (codigo, nombre, descripcion, unidad_medida, precio_unitario ,estado)
            VALUES (?,?,?,?,?, 1)");
     
            $resultado = $query->execute([$nuevoProducto->getCodigo(), $nuevoProducto->getNombre(), $nuevoProducto->getDescripcion(),
            $nuevoProducto->getUnidadMedida(), $nuevoProducto->getPrecioUnitario()]);
 
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

    function actualizarProducto(Producto $nuevoProducto){

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

    function eliminar($codigo){

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

    function consultar(){

        require_once 'parametrosBD.php';
        
        try
        {
            $conexion = new PDO("mysql:host=$host;dbname=$nombreBaseDatos;charset=UTF8", $usuario, $password);

            $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $listaDeProductos=[];

            $querySelect = $conexion->query("SELECT * FROM producto where estado = 1");

            foreach($querySelect->fetchAll() as $arregloProducto)
            {

                $producto= new Producto($arregloProducto['nombre'], $arregloProducto['codigo'], 
                $arregloProducto['descripcion'], $arregloProducto['unidad_medida'],$arregloProducto['precio_unitario']);

                $listaDeProductos[]=$producto;
            }

            if(count($listaDeProductos) > 0){
                return $listaDeProductos;
            }else{
                return ($lista=[]);
            }
        }
        catch(PDOException $pe)
        {
            return $pe->getMessage();

        }
    }

    
    function getProductoPorId($codigo){

        require 'parametrosBD.php';        
        require_once '../../entidades/producto.php';        

        try
        {
            $conexion = new PDO("mysql:host=$host;dbname=$nombreBaseDatos;charset=UTF8", $usuario, $password);

            $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $listaDeProductos=[];

            $querySelect = $conexion->query("SELECT * FROM producto where codigo='" . $codigo . "'");

            foreach($querySelect->fetchAll() as $arregloProducto)
            {

                $productoSel= new Producto($arregloProducto['nombre'], $arregloProducto['codigo'],
                $arregloProducto['descripcion'], $arregloProducto['unidad_medida'],$arregloProducto['precio_unitario']);

                $listaDeProductos[]=$productoSel;
            }

            if(count($listaDeProductos) > 0){
                return $listaDeProductos[0];
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