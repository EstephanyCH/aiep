<?php

    function traerComunas(){

        include 'parametrosBD.php';
        
        try
        {
            $conexion = new PDO("mysql:host=$host;dbname=$nombreBaseDatos;charset=UTF8", $usuario, $password);

            $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $lista=[];

            $querySelect = $conexion->query("SELECT * FROM comuna");

            foreach($querySelect->fetchAll() as $arregloItem)
            {

                $item= new Comuna($arregloItem['id_comuna'], $arregloItem['comuna'], 
                $arregloItem['id_ciudad']);
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

    function getComunaPorId($id){
        include 'parametrosBD.php';
        require_once '../../entidades/comuna.php';

        try
        {
            $conexion = new PDO("mysql:host=$host;dbname=$nombreBaseDatos;charset=UTF8", $usuario, $password);

            $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $listaDeComunas=[];

            $querySelect = $conexion->query("SELECT * FROM comuna WHERE id_comuna=". $id);

            foreach($querySelect->fetchAll() as $arregloComuna)
            {
                $comuna= new Comuna($arregloComuna['id_comuna'], $arregloComuna['comuna'], $arregloComuna['id_ciudad']);
                $listaDeComunas[]=$comuna;
            }

            if(count($listaDeComunas) > 0){
                return $listaDeComunas[0];
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