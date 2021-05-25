<?php

    function traerCiudades(){

        include 'parametrosBD.php';
        
        try
        {
            $conexion = new PDO("mysql:host=$host;dbname=$nombreBaseDatos;charset=UTF8", $usuario, $password);

            $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $lista=[];

            $querySelect = $conexion->query("SELECT * FROM ciudad");

            foreach($querySelect->fetchAll() as $arregloItem)
            {

                $item= new Ciudad($arregloItem['id_ciudad'], $arregloItem['ciudad'], 
                $arregloItem['id_region']);
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

    function getCiudadPorId($id){
        include 'parametrosBD.php';
        require_once '../../entidades/ciudad.php';

        try
        {
            $conexion = new PDO("mysql:host=$host;dbname=$nombreBaseDatos;charset=UTF8", $usuario, $password);

            $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $listaDeCiudades=[];

            $querySelect = $conexion->query("SELECT * FROM ciudad WHERE id_ciudad=". $id);

            foreach($querySelect->fetchAll() as $arregloCiudad)
            {
                $ciudad= new Ciudad($arregloCiudad['id_ciudad'], $arregloCiudad['ciudad'], $arregloCiudad['id_region']);
                $listaDeCiudades[]=$ciudad;
            }

            if(count($listaDeCiudades) > 0){
                return $listaDeCiudades[0];
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