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
            <div class="col-md-8">
                <h4 class="mb-5"><b><span class='glyphicon glyphicon-plus'></span>&nbsp;Ingresar factura</b></h4>
                <form action="/proyectoFacturas/controlador/controladorFactura.php" method="POST">

                    <div class="form-group  mb-3">
                        <label for="txtRut">Rut empresa:</label>
                        <input type="text" class="form-control" name="rutEmpresa" value="24327088" readonly="true"
                            placeholder="Ingresa el código del producto">
                    </div>

                    <div class="form-group  mb-3">
                        <label for="txtNombre1">Observaciones:</label>
                        <input type="text" class="form-control" name="observaciones" id="txtDescripcion"
                            placeholder="Ingresa la descripción del producto">
                    </div>

                    <div class="form-group mb-3">
                        <label for="dpCursos">Tipo:</label>
                        <select class="form-control" name="idTipo">
                            <option value="1">Factura</option>
                        </select>
                    </div>

                    <div class="form-group  mb-3">
                        <label for="txtNombre2">Valor del iva:</label>
                        <input type="text" class="form-control" name="iva" id="txtUnidadMedida"
                            placeholder="Ingresa la unidad de medida del producto">
                    </div>

                    <div class="form-group mb-3">
                        <label for="dpCursos">Cliente:</label>

                        <select class="form-control" name="cliente" id="dpCursos">
                            <?php

                            require_once '../../controlador/controladorCliente.php';
                            $listaClientes = getClientes();

                            if(count($listaClientes) > 0){
                                foreach($listaClientes as $cliente)
                                {
                                    echo "<option value='".$cliente->getRut() ."'>". $cliente->getNombre()."</option>";
                                }
                            }
                            ?>
                        </select>

                    </div>

                    <p>Posterior al ingreso puede agregar los productos asociados</p>
                    <div class="mt-3">
                        <button id="btnAccion" type="submit" name="registrar" class="btn btn-primary">Guardar</button>
                        <a href="administrar.php"><button type="button" class="btn btn-secondary">Cancelar</button></a>
                    </div>

                </form>

            </div>
        </div>
    </div>


</body>

</html>