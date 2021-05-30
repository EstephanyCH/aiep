<?php

    $nuevaFactura;

    if(isset($_GET['numeroDocumentoParametros']) && $_GET['numeroDocumentoParametros'] !== "")
    {
        require_once '../../entidades/encabezado_documento.php';
        require_once '../../persistencia/daoImprimirFactura.php';

        $nuevaFactura = getFacturaPorIdImprimir($_GET['numeroDocumentoParametros']);
        $_GET['empresa'] = $nuevaFactura->getEmpresa();
        $_GET['cliente'] = $nuevaFactura->getCliente();
        $_GET['detalleFactura'] = $nuevaFactura->getDetalleFactura();
    }
?>
