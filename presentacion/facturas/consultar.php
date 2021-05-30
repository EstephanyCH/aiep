<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1; charset=UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous">
    </script>

    </style>
</head>

<body>
    <?php include("../header/header.php");?>
    <?php 
            require_once '../../controlador/controladorImprimirFactura.php';
            require_once '../../controlador/controladorFactura.php';
    ?>

    <div class="container pt-5">

        <div class="row">
            <?php if(isset($_GET['msj']) && strpos($_GET['msj'],"ok") !== false) {  ?>

            <div class='alert alert-success alert-dismissible'>
                <strong>¡Operación Realizada!</strong> <?php echo $_GET['msj'] ?> Registrado Correctamente!
            </div>

            <?php } elseif(isset($_GET['msj']) && strpos($_GET['msj'],"err") !== false) { ?>

            <div class='alert alert-danger alert-dismissible'>
                <strong>¡Operación Incorrecta!</strong> Sucedió algo inesperado: <?php echo $_GET['msj'] ?>
            </div>

            <?php    } ?>
        </div>
        <div class="row">
            <div class="col-md-12">
                <h3>Consultar factura <span class="badge bg-secondary"><?php echo $_GET['detalleFactura']->getIdDocumento();?></span></h3>

                <div class="row mt-5">
                    <div class="col-md-6">

                        <div class="card bg-light">
                            <div class="card-body">

                                <h4 class="">Empresa</h4>
                                <div class="mt-3 mb-3">
                                    <p><b>R.U.T</b></p>
                                    <p><?php echo $_GET['empresa']->getRut();?></p>
                                </div>

                                <div class="mb-3">
                                    <p><b>Razon social empresa:</b></p>
                                    <p><?php echo $_GET['empresa']->getRazonSocial();?></p>
                                </div>

                                <div class=" mb-3">
                                    <p><b>Giro empresa:</b></p>
                                    <p><?php echo $_GET['empresa']->getGiro();?></p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="card bg-light">
                            <div class="card-body">

                                <h4>Detalle de Factura</h4>

                                <div class="mb-3">
                                    <p><b>Número factura:</b></p>
                                    <p><?php echo $_GET['detalleFactura']->getIdDocumento();?></p>
                                </div>

                                <div class="mb-3">
                                    <p><b>Observaciones:</b></p>
                                    <p><?php echo $_GET['detalleFactura']->getObservaciones();?></p>
                                </div>

                                <div class="mb-3">
                                    <p><b>Tipo de documento:</b></p>
                                    <p><?php echo $_GET['detalleFactura']->getIdTipo();?></p>
                                </div>

                                <div class="mb-3">
                                    <p><b>Fecha de emisión:</b></p>
                                    <p><?php echo $_GET['detalleFactura']->getFechaEmision();?></p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 mt-3">
                        <div class="card bg-light">
                            <div class="card-body">
                                <h4>Datos del cliente</h4>

                                <div class="mb-3">
                                    <p><b>Señores:</b></p>
                                    <p><?php echo $_GET['cliente']->getNombre();?></p>
                                </div>

                                <div class="mb-3">
                                    <p><b>R.U.T:</b></p>
                                    <p><?php echo $_GET['cliente']->getRut();?></p>
                                </div>

                                <div class="mb-3">
                                    <p><b>Giro:</b></p>
                                    <p><?php echo $_GET['cliente']->getGiro();?></p>
                                </div>

                                <div class="mb-3">
                                    <p><b>Direccion:</b></p>
                                    <p><?php echo $_GET['cliente']->getDireccion();?></p>
                                </div>

                                <div class="mb-3">
                                    <p><b>Ciudad:</b></p>
                                    <p><?php echo $_GET['cliente']->getCiudad()->getNombre();?></p>
                                </div>

                                <div class="mb-3">
                                    <p><b>Telefono:</b></p>
                                    <p><?php echo $_GET['cliente']->getTelefono();?></p>
                                </div>

                                <div class="mb-3">
                                    <p><b>Email:</b></p>
                                    <p><?php echo $_GET['cliente']->getEmail();?></p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="card bg-light mt-3">
                            <div class="card-body">
                                <h4>Productos</h4>

                                <?php 

                                $list = getProductosFactura();
                                
                                foreach($list as $detalle)
                                {
                                    echo "<p>Nombre: " .  $detalle->getProducto()->getNombre() . "</p>";
                                    echo "<p>Descripción: " .  $detalle->getProducto()->getDescripcion() . "</p>";
                                    echo "<p>Codigo: " .  $detalle->getProducto()->getCodigo() . "</p>";
                                    echo "<p>Unidad de medida: " .  $detalle->getProducto()->getUnidadMedida() . "</p>";
                                    echo "<p>Precio: " .  $detalle->getPrecio(). "</p>";
                                    echo "<p>Cantidad: " .  $detalle->getCantidad() . "</p>";
                                }
                                ?>

                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <p><b>Neto:</b></p>
                            <p><?php echo $_GET['detalleFactura']->getNeto();?></p>
                        </div>

                        <div class="mb-3">
                            <p><b>Iva:</b></p>
                            <p><?php echo $_GET['detalleFactura']->getIva();?></p>
                        </div>

                        <div class="mb-3">
                            <p><b>Total:</b></p>
                            <p><?php echo $_GET['detalleFactura']->getTotal();?></p>
                        </div>

                      
                    </div>
                </div>

            </div>
        </div>
    </div>

</body>

</html>