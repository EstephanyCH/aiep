<?php

    function actualizarFactura(EncabezadoDocumento $element){

        require_once 'parametrosBD.php';

        try{

            //fecha de emision //estado 3 es emitido
            if($element->getIdEstado() == 3){

                $conn = new PDO("mysql:host=$host;dbname=$nombreBaseDatos", $usuario,$password);

                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                $queryUpdate = $conn->prepare("UPDATE encabezado_documento SET
                observaciones=:observaciones,
                id_tipo=:id_tipo,
                id_estado=:id_estado,
                iva=:iva,
                fecha_emision=now(),
                rut_cliente=:rut_cliente

                WHERE id_documento=:id_documento");

                $queryUpdate->bindValue("observaciones", $element->getObservaciones());
                $queryUpdate->bindValue("id_tipo", $element->getIdTipo());
                $queryUpdate->bindValue("id_estado", $element->getIdEstado());
                $queryUpdate->bindValue("iva", $element->getIva());
                $queryUpdate->bindValue("rut_cliente", $element->getCliente());
                $queryUpdate->bindValue("id_documento", $element->getIdDocumento());

            }
            else {
                $conn = new PDO("mysql:host=$host;dbname=$nombreBaseDatos", $usuario,$password);

                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                $queryUpdate = $conn->prepare("UPDATE encabezado_documento SET
                observaciones=:observaciones,
                id_tipo=:id_tipo,
                id_estado=:id_estado,
                iva=:iva,
                rut_cliente=:rut_cliente

                WHERE id_documento=:id_documento");

                $queryUpdate->bindValue("observaciones", $element->getObservaciones());
                $queryUpdate->bindValue("id_tipo", $element->getIdTipo());
                $queryUpdate->bindValue("id_estado", $element->getIdEstado());
                $queryUpdate->bindValue("iva", $element->getIva());
                $queryUpdate->bindValue("rut_cliente", $element->getCliente());
                $queryUpdate->bindValue("id_documento", $element->getIdDocumento());
            }

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
    
    function consultarFaturas($dateStart, $dateEnd){

        require_once 'parametrosBD.php';
        require_once 'daoEstadoDocumento.php';   

        try
        {
            $conexion = new PDO("mysql:host=$host;dbname=$nombreBaseDatos;charset=UTF8", $usuario, $password);

            $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $lista=[];

            if(isset($dateStart) && isset($dateEnd)){
                $querySelect = $conexion->query("SELECT * FROM encabezado_documento where (fecha_emision between  '2021-05-29 00:00:00'  and '2021-05-30 00:00:00' )
                ");
            }
            else {
                $querySelect = $conexion->query("SELECT * FROM encabezado_documento");
            }

            foreach($querySelect->fetchAll() as $item)
            {

                $estado = getEstadoPorId($item['id_estado']);

                $factura= new EncabezadoDocumento(
                    $item['rut_empresa'],
                    $item['observaciones'],
                    $item['id_tipo'],
                    $estado, 
                    $item['iva'], 
                    $item['rut_cliente']);

                $factura->id_documento = $item['id_documento'];
                $factura->fecha_emision = $item['fecha_emision'];
                $factura->detalle = consultarProductosFactura($item['id_documento']);
                $neto = 0;

                //Calcular Neto
                foreach ($factura->getDetalle() as $detalle){
                    $neto = $neto + ($detalle->getPrecio() * $detalle->getCantidad());
                }

                 //Calcular Bruto
                $factura->total = ($neto * $factura->iva) + $neto;

                $factura->neto = $neto;

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

    function registrarProductosPorFactura (DetalleDocumento $element){
        require_once 'parametrosBD.php';

        try{
            $conn = new PDO("mysql:host=$host;dbname=$nombreBaseDatos", $usuario,$password);

            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $query = $conn->prepare("INSERT INTO detalle_documento (
            id_encabezado_documento,
            codigo_producto,
            precio_unitario_producto,
            cantidad)
            VALUES (?,?,?,?)");
     
            $resultado = $query->execute([
            $element->getIdFactura(), 
            $element->getProducto(),
            $element->getPrecio(),
            $element->getCantidad()]);
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

    function getFacturaPorId($numero){

        require 'parametrosBD.php'; 
        require_once 'daoCliente.php';   
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
                $estado = getEstadoPorId($arreglo['id_estado']);
                $itemSel= new EncabezadoDocumento($arreglo['rut_empresa'],
                $arreglo['observaciones'],
                $arreglo['id_tipo'], 
                $estado,
                $arreglo['iva'],
                $cliente
                );

                $itemSel->detalle = consultarProductosFactura($arreglo['id_documento']);
                $itemSel->id_documento = $arreglo['id_documento'];
                $itemSel->fecha_emision = $arreglo['fecha_emision'];

                $neto = 0;

                //Calcular Neto
                foreach ($itemSel->getDetalle() as $detalle){
                    $neto = $neto + ($detalle->getPrecio() * $detalle->getCantidad());
                }

                $itemSel->neto = $neto;
                $itemSel->total = ($neto * ($itemSel->iva / 100))  + $neto;

                $lista[]=$itemSel;
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

    function consultarProductosFactura($idFactura){
        require 'parametrosBD.php';
        require_once 'daoProducto.php';
        require_once '../../entidades/detalle_documento.php';

        try
        {
            $conexion = new PDO("mysql:host=$host;dbname=$nombreBaseDatos;charset=UTF8", $usuario, $password);

            $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $listaDeProductos=[];

            $querySelect = $conexion->query("SELECT * FROM detalle_documento where id_encabezado_documento =" . $idFactura . "");

            foreach($querySelect->fetchAll() as $arregloProducto)
            {
                $detalle = new DetalleDocumento( 
                $arregloProducto['id_encabezado_documento'], 
                $arregloProducto['precio_unitario_producto'],
                $arregloProducto['cantidad']);
                $detalle->productoFactura = getProductoPorId($arregloProducto['codigo_producto']);
                $listaDeProductos[]=$detalle;
            }

            if(count($listaDeProductos) > 0){
                return $listaDeProductos;
            }else{
                return ($listaDeProductos=[]);
            }
        }
        catch(PDOException $pe)
        {
            return $pe->getMessage();

        }
    }
?>