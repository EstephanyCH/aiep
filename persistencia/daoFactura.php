<?php
/* 
    function actualizarFactura(EncabezadoDocumento $element){

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

    } */

    function registrarFactura(EncabezadoDocumento $element){

        require_once 'parametrosBD.php';

        try{
            $conn = new PDO("mysql:host=$host;dbname=$nombreBaseDatos", $usuario,$password);

            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $query = $conn->prepare("INSERT INTO encabezado_documento (
            rut_empresa,
            observaciones,
            id_tipo,
            id_estado,
            iva,
            rut_cliente)
            VALUES (?,?,?,?,?,?)");
     
            $resultado = $query->execute([
            $element->getRutEmpresa(), 
            $element->getObservaciones(),
            $element->getIdTipo(),
            2,
            $element->getIva(),
            $element->getCliente()]);
 
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
    
    function consultar(){

        require_once 'parametrosBD.php';
        
        try
        {
            $conexion = new PDO("mysql:host=$host;dbname=$nombreBaseDatos;charset=UTF8", $usuario, $password);

            $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $lista=[];

            $querySelect = $conexion->query("SELECT * FROM encabezado_documento");

            foreach($querySelect->fetchAll() as $item)
            {

                $factura= new EncabezadoDocumento(
                    $item['rut_empresa'],
                    $item['observaciones'],
                    $item['id_tipo'],
                    $item['id_estado'], 
                    $item['iva'], 
                    $item['rut_cliente']);

                $factura->id_documento = $item['id_documento'];
                $factura->fecha_emision = $item['fecha_emision'];
                $factura->neto = $item['neto'];
                $factura->total = $item['total'];

                $lista[]=$factura;
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