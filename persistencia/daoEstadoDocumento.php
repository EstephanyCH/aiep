<?php

    function traerEstados(){

        include 'parametrosBD.php';
        
        try
        {
            $conexion = new PDO("mysql:host=$host;dbname=$nombreBaseDatos;charset=UTF8", $usuario, $password);

            $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $lista=[];

            $querySelect = $conexion->query("SELECT * FROM estado_documento");

            foreach($querySelect->fetchAll() as $arregloItem)
            {

                $item= new EstadoDocumento($arregloItem['id_estado'], $arregloItem['estado']);
                $lista[]=$item;
            }

            if(count($lista) > 0){
                return $lista;
            }else{
                return ($lista=[]);
            }
        }
        catch(PDOException $pe)
        {
            return $pe->getMessage();

        }
    }

    function getEstadoPorId($id){
        include 'parametrosBD.php';
        include_once '../../entidades/estado_documento.php';

        try
        {
            $conexion = new PDO("mysql:host=$host;dbname=$nombreBaseDatos;charset=UTF8", $usuario, $password);

            $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $lista=[];

            $querySelect = $conexion->query("SELECT * FROM estado_documento WHERE id_estado=". $id);

            foreach($querySelect->fetchAll() as $arregloEstado)
            {
                $item= new EstadoDocumento($arregloEstado['id_estado'], $arregloEstado['estado']);
                $lista[]=$item;
            }

            if(count($lista) > 0){
                return $lista[0];
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