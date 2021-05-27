<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1; charset=UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous">
    </script>

<body>

    </head>

    <body>

        <?php 
            include_once '../../controlador/controladorProducto.php'; 
            evaluarParametrosPorId();
        ?>

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
                <div class="col-md-8">
                    <h4 class="mb-5"><b><span class='glyphicon glyphicon-repeat'></span>&nbsp;Eliminar producto:
                        </b><?php echo $_GET['nombreParametros'];?></h4>
                    <form action="../../controlador/controladorProducto.php" method="POST">
                        <div class="form-group mb-3">
                            <label for="txtNombre">Nombre:</label>
                            <input readonly="False" type="text" value='<?php echo $_GET['nombreParametros'];?>'
                                readonly="true" class="form-control" name="nombre" id="txtNombre">

                            </input>
                        </div>

                        <div class="form-group mb-3">
                            <label for="txtCodigo">Código:</label>
                            <input readonly="False" type="text" value='<?php echo $_GET['codigoParametros'];?>'
                                class="form-control" name="codigo" id="txtCodigo">

                        </div>


                        <div class="form-group mb-3">
                            <label for="txtDescripción">Descripcion:</label>
                            <input readonly="False" type="text" value='<?php echo $_GET['descripcionParametros'];?>'
                                class="form-control" name="descripcion" id="txtDescripción">
                        </div>

                        <div class="form-group mb-3">
                            <label for="txtUnidadMedida">Unidad de medida:</label>
                            <input readonly="False" type="text" value='<?php echo $_GET['unidad_medidaParametros'];?>'
                                class="form-control" name="unidadMedida" id="txtUnidadMedida">
                        </div>

                        <div class="form-group mb-3">
                            <label for="txtPrecioUnitario">Precio unitario:</label>
                            <input readonly="False" type="text" value='<?php echo $_GET['precioUnitarioParametros'];?>'
                                class="form-control" name="precioUnitario" id="txtPrecioUnitario">
                        </div>
                        <div class="mt-5">
                            <button id="btnAccion" type="submit" name="eliminar"
                                class="btn btn-primary">Eliminar</button>
                            <a href="administrar.php"><button type="button"
                                    class="btn btn-secondary">Cancelar</button></a>
                        </div>

                    </form>

                </div>
            </div>
        </div>

    </body>

</html>