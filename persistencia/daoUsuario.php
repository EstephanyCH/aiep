<?php

    function validarUsuario($NombreUsuario, $PasswordUsuario){
        require_once 'parametrosBD.php';
        require_once '../entidades/usuario.php';

        try
        {
            $conexion = new PDO("mysql:host=$host;dbname=$nombreBaseDatos;charset=UTF8", $usuario, $password);

            $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $lista=[];

            $querySelect = $conexion->query("SELECT * FROM usuario where nombreUsuario='$NombreUsuario' and password='$PasswordUsuario'");

            foreach($querySelect->fetchAll() as $arregloItem)
            {
                $item= new Usuario($arregloItem['rut'], $arregloItem['nombre'], 
                $arregloItem['apellido1'], $arregloItem['apellido2'], $arregloItem['id_comuna'], $arregloItem['direccion'], $arregloItem['email'], $arregloItem['telefono'], $arregloItem['giro'], $arregloItem['id_tipo'] , $arregloItem['nombreUsuario'], $arregloItem['password']);
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
?>