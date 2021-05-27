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
            require_once '../../controlador/controladorEmpresa.php';
            evaluarParametrosPorId();  
        ?>

        <?php include("../header/header.php");?>

        <div class="container content pt-5">

            <div class="row">
                <?php if(isset($_GET['msj']) && strpos($_GET['msj'],"ok") !== false) {  ?>

                <div class='alert alert-success alert-dismissible'>
                    <strong>¡Operación Realizada!</strong> <?php echo $_GET['msj'] ?> Actualizado Correctamente!
                </div>

                <?php } elseif(isset($_GET['msj']) && strpos($_GET['msj'],"err") !== false) { ?>

                <div class='alert alert-danger alert-dismissible'>
                    <strong>¡Operación Incorrecta!</strong> Sucedió algo inesperado: <?php echo $_GET['msj'] ?>
                </div>

                <?php    } ?>
            </div>

            <div class="row">
                <div class="col-md-8">
                    <h4 class="mb-3"><b><span class='glyphicon glyphicon-repeat'></span>&nbsp;Actualizar información de la empresa</b>
                    </h4>
                    <form action="../../controlador/controladorEmpresa.php" method="POST">
                        <div class="form-group mb-3">
                            <label for="txtRut">Rut Empresa:</label>
                            <input type="text" value='<?php echo $_GET['RutParametros'];?>' readonly="true"
                                class="form-control" name="rut" id="txtRut">

                            </input>
                        </div>

                        <div class="form-group mb-3">
                            <label for="txtNombre">Nombre:</label>
                            <input type="text" value='<?php echo $_GET['nombreParametros'];?>' class="form-control"
                                name="nombre" id="txtNombre">

                        </div>

                        <div class="form-group mb-3">
                            <label for="txtRazonSocial">Razon social:</label>
                            <input type="text" value='<?php echo $_GET['razonSocialParametros'];?>' class="form-control"
                                name="razonSocial" id="txtRazonSocial">
                        </div>

                        <div class="form-group mb-3">
                            <label for="txtGiro">Giro</label>
                            <input type="text" value='<?php echo $_GET['giroParametros'];?>' class="form-control"
                                name="giro" id="txtGiro">
                        </div>

                        <button id="btnAccion" type="submit" name="actualizar"
                            class="btn btn-primary">Actualizar</button>
                        <a href="administrar.php"><button type="button" class="btn btn-secondary">Cancelar</button></a>
                </div>

                </form>

            </div>
        </div>
        </div>
    </body>

</html>