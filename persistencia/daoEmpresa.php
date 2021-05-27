<?php

    function actualizarEmpresa(Empresa $empresa){

        require_once 'parametrosBD.php';

        try{
            $conn = new PDO("mysql:host=$host;dbname=$nombreBaseDatos", $usuario,$password);

            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $queryUpdate = $conn->prepare("UPDATE empresa SET
            nombre=:nombre,
            razon_social=:razon_social,
            giro=:giro
            WHERE rut_empresa=:rut");

            $queryUpdate->bindValue("nombre", $empresa->getNombre());
            $queryUpdate->bindValue("razon_social", $empresa->getRazonSocial());
            $queryUpdate->bindValue("giro", $empresa->getGiro());
            $queryUpdate->bindValue("rut", $empresa->getRut());

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

    function getEmpresaPorRut($rut) {
        include 'parametrosBD.php';
        require_once '../../entidades/empresa.php';

        try
        {
            $conexion = new PDO("mysql:host=$host;dbname=$nombreBaseDatos;charset=UTF8", $usuario, $password);

            $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $lista=[];

            $querySelect = $conexion->query("SELECT * FROM empresa WHERE rut_empresa=". $rut);

            foreach($querySelect->fetchAll() as $empresa)
            {
                $empresa= new Empresa($empresa['rut_empresa'], $empresa['nombre'], $empresa['razon_social'],$empresa['giro'] );
                $lista[]=$empresa;
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