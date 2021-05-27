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
                <h3>Consultar factura <span class="badge bg-secondary">87878</span></h3>

                <div class="row mt-5">
                    <div class="col-md-6">

                        <div class="card bg-light">
                            <div class="card-body">

                                <h4 class="">Empresa</h4>
                                <div class="mt-3 mb-3">
                                    <p><b>Rut empresa</b></p>
                                    <p>67789</p>
                                </div>

                                <div class="mb-3">
                                    <p><b>Razon social empresa:</b></p>
                                    <p>girio</p>
                                </div>

                                <div class=" mb-3">
                                    <p><b>Giro empresa:</b></p>
                                    <p>kkk</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="card bg-light">
                            <div class="card-body">

                                <h4>Factura</h4>

                                <div class="mb-3">
                                    <p><b>Número factura:</b></p>
                                    <p>yiuiuiuiu</p>
                                </div>

                                <div class="mb-3">
                                    <p><b>Observaciones:</b></p>
                                    <p>yiuiuiuiu</p>
                                </div>

                                <div class="mb-3">
                                    <p><b>Tipo de documento:</b></p>
                                    <p>yiuiuiuiu</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 mt-3">
                        <div class="card bg-light">
                            <div class="card-body">
                                <h4>Cliente</h4>

                                <div class="mb-3">
                                    <p><b>Nombre:</b></p>
                                    <p>este</p>
                                </div>

                                <div class="mb-3">
                                    <p><b>Rut:</b></p>
                                    <p>36778</p>
                                </div>

                                <div class="mb-3">
                                    <p><b>Giro:</b></p>
                                    <p>36778</p>
                                </div>

                                <div class="mb-3">
                                    <p><b>Direccion:</b></p>
                                    <p>yiuiuiuiu</p>
                                </div>

                                <div class="mb-3">
                                    <p><b>Ciudad:</b></p>
                                    <p>yiuiuiuiu</p>
                                </div>

                                <div class="mb-3">
                                    <p><b>Telefono:</b></p>
                                    <p>yiuiuiuiu</p>
                                </div>

                                <div class="mb-3">
                                    <p><b>Email:</b></p>
                                    <p>yiuiuiuiu</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="card bg-light mt-3">
                            <div class="card-body">
                                <h4>Productos</h4>

                                <div class="mb-3">
                                    <p><b>Nombre:</b></p>
                                    <p>este</p>
                                </div>

                                <div class="mb-3">
                                    <p><b>Rut:</b></p>
                                    <p>36778</p>
                                </div>

                                <div class="mb-3">
                                    <p><b>Giro:</b></p>
                                    <p>36778</p>
                                </div>

                                <div class="mb-3">
                                    <p><b>Direccion:</b></p>
                                    <p>yiuiuiuiu</p>
                                </div>

                                <div class="mb-3">
                                    <p><b>Ciudad:</b></p>
                                    <p>yiuiuiuiu</p>
                                </div>

                                <div class="mb-3">
                                    <p><b>Telefono:</b></p>
                                    <p>yiuiuiuiu</p>
                                </div>

                                <div class="mb-3">
                                    <p><b>Email:</b></p>
                                    <p>yiuiuiuiu</p>
                                </div>
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
                            <p>este</p>
                        </div>

                        <div class="mb-3">
                            <p><b>Iva:</b></p>
                            <p>este</p>
                        </div>

                        <div class="mb-3">
                            <p><b>Total:</b></p>
                            <p>este</p>
                        </div>

                        <div class="mb-3">
                            <p><b>Observaciones:</b></p>
                            <textarea name="" id="" cols="30" rows="10"></textarea>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

</body>

</html>