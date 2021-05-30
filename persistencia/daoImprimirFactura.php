<?php

    function getFacturaPorIdImprimir($numero){

        require 'parametrosBD.php'; 
        require_once 'daoCliente.php';  
        require_once 'daoEmpresa.php';   
        require_once 'daoImprimirFactura.php';   
        require_once 'daoFactura.php';   
        require_once '../../entidades/imprimirFactura.php';
        require_once 'daoEstadoDocumento.php';   

        try
        {
            $conexion = new PDO("mysql:host=$host;dbname=$nombreBaseDatos;charset=UTF8", $usuario, $password);

            $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $lista=[];

            $querySelect = $conexion->query("SELECT * FROM encabezado_documento where id_documento='" . $numero . "'");

            foreach($querySelect->fetchAll() as $arreglo)
            {

                $cliente = getClientePorId($arreglo['rut_cliente']);
                $empresa = getEmpresaPorRut($arreglo['rut_empresa']);
                $detalle_factura = getFacturaPorId($arreglo['id_documento']);

                $item= new ImprimirFactura(
                $empresa,
                $detalle_factura,
                $cliente
            );

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