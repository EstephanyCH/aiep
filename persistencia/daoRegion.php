<?php

    function traerRegiones(){

        require_once 'parametrosBD.php';
        
        try
        {
            $conexion = new PDO("mysql:host=$host;dbname=$nombreBaseDatos;charset=UTF8", $usuario, $password);

            $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $lista=[];

            $querySelect = $conexion->query("SELECT * FROM comuna");

            foreach($querySelect->fetchAll() as $arregloItem)
            {

                $item= new Region($arregloItem['id_region'], $arregloItem['region']);
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

    function getRegiondPorId($id){
        include 'parametrosBD.php';
        require_once '../../entidades/region.php';

        try
        {
            $conexion = new PDO("mysql:host=$host;dbname=$nombreBaseDatos;charset=UTF8", $usuario, $password);

            $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $listaDeRegiones=[];

            $querySelect = $conexion->query("SELECT * FROM region WHERE id_region=". $id);

            foreach($querySelect->fetchAll() as $arregloComuna)
            {
                $comuna= new Region($arregloComuna['id_region'], $arregloComuna['region']);
                $listaDeRegiones[]=$comuna;
            }

            if(count($listaDeRegiones) > 0){
                return $listaDeRegiones[0];
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