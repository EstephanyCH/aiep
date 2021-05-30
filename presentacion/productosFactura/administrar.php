<?php 
    header('Content-Type: text/html; charset=UTF-8');
?>
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

    <?php 
            if(isset($_GET['msj']) && $_GET['msj'] == "ok")
            {
                echo "<div class='alert alert-success alert-dismissible'>";
                echo '<a href="" class="close" data-dismiss="alert" aria-label="close">&times;</a>';
                echo '<strong>¡Operación Realizada!</strong> Se ha ejecutado al acción registro de manera correcta.</div>';
            }
            elseif(isset($_GET['msj']) && $_GET['msj'] == "err")
            {
                echo "<div class='alert alert-danger alert-dismissible'>";
                echo '<a href="" class="close" data-dismiss="alert" aria-label="close">&times;</a>';
                echo '<strong>¡Operación Incorrecta!</strong> Sucedio algo inesperado...</div>';
            }
         ?>

    <?php include("../header/header.php");?>

    <div class="container content pt-5">
        <div class="row">
            <div class="col-md-6">
                <h4><b><i class="glyphicon glyphicon-education">&nbsp;</i>Administrar Productos para factura <?php echo $_GET['numeroDocumentoParametros']?></b></h4>
            </div>

            <div class="col-md-6 d-flex justify-content-end">
                <a href="registrar.php?numeroDocumentoParametros=<?php echo $_GET['numeroDocumentoParametros']?>"><button class="btn btn-warning" type="button">Agregar producto <i
                            class="bi bi-plus-circle"></i> </button></a>
            </div>
        </div>
        <div class="row">

            <form action="../producto/administrar.php" method="POST">
                <div>
                    <table class='table table-striped table-hover table-responsive mt-4'>

                        <thead>
                            <tr>
                                <th>Codigo</th>
                                <th>Nombre</th>
                                <th>Descripción</th>
                                <th>Unidad de medida</th>
                                <th>Precio unitario</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php

                            include '../../controlador/controladorFactura.php';

                            $listaProductos = getProductosFactura();

                            if(count($listaProductos) > 0){
                                foreach($listaProductos as $detalle)
                                {
                                    echo "<tr>";
                                    echo "<td><p class='label label-primary'>" . $detalle->getProducto()->getCodigo() . "</p></td>";
                                    echo "<td>" . $detalle->getProducto()->getNombre() . "</td>";
                                    echo "<td>" . $detalle->getProducto()->getDescripcion() . "</td>";
                                    echo "<td>" . $detalle->getProducto()->getUnidadMedida() . "</td>";
                                    echo "<td>" . $detalle->getPrecio() . "</td>";
                                    echo "</tr>";

                                }
                            }
                            else
                            {
                                echo "<tr><td colspan=8 class='text-center'><span class='glyphicon glyphicon-plus'></span>&nbsp;No existen datos de productos registrados</td>";
                                echo "<td class='text-center'>--</td>";
                                echo "<td class='text-center'>--</td>";
                            }



                        ?>
                        </tbody>

                    </table>
                </div>

                <button id="btnAccion" type="submit" class="btn btn-primary">Refrescar</button>

            </form>

        </div>

    </div>
</body>

</html>