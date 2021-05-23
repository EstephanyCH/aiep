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

    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container">
            <a class="navbar-brand" href="#">REPI TELRAMO ELECTRONICS LTDA</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="../producto/administrar.php">Productos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../empresa/administrar.php">Empresa</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="administrar.php">Clientes</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../facturas/administrar.php">Facturas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../libro_ventas/administrar.php">Libro de ventas</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container content pt-5">
        <div class="row">
            <div class="col-md-6">
                <h4><b><i class="glyphicon glyphicon-education">&nbsp;</i>Administrar Clientes</b></h4>
            </div>

            <div class="col-md-6 d-flex justify-content-end">
                <a href='registrar.php'><button class="btn btn-warning" type="button">Agregar cliente <i
                            class="bi bi-plus-circle"></i> </button></a>
            </div>
        </div>
        <div class="row">

            <form action="../producto/administrar.php" method="POST">
                <div>
                    <table class='table table-striped table-hover table-responsive mt-4'>

                        <thead>
                            <tr>
                                <th>Rut</th>
                                <th>Nombre</th>
                                <th>Apellido materno</th>
                                <th>Apellido paterno</th>
                                <th>Comuna</th>
                                <th class='text-center'>Ciudad</th>
                                <th class='text-center'>Region</th>
                                <th class='text-center'>Dirección</th>
                                <th class='text-center'>Email</th>
                                <th class='text-center'>Telefono</th>
                                <th class='text-center'>Giro</th>
                                <th class='text-center'>Actualizar</th>
                                <th class='text-center'>Eliminar</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php

                            include '../../controlador/controladorCliente.php';

                            $listaClientes = getClientes();

                            if(count($listaClientes) > 0){
                                foreach($listaClientes as $cliente)
                                {
                                    echo "<tr>";
                                    echo "<td><p class='label label-primary'>" . $cliente->getRut() . "</p></td>";
                                    echo "<td>" . $cliente->getNombre() . "</td>";
                                    echo "<td>" . $cliente->getApellido1() . "</td>";
                                    echo "<td>" . $cliente->getApellido2() . "</td>";
                                    echo "<td>" . $cliente->getComuna()->getNombre(). "</td>";
                                    echo "<td>" . $cliente->getCiudad()->getNombre() . "</td>";
                                    echo "<td>" . $cliente->getRegion()->getNombre() . "</td>";
                                    echo "<td>" . $cliente->getDireccion() . "</td>";
                                    echo "<td>" . $cliente->getEmail() . "</td>";
                                    echo "<td>" . $cliente->getTelefono() . "</td>";
                                    echo "<td>" . $cliente->getGiro() . "</td>";
                                    echo "<td class='text-center'><a href='actualizar.php?RutParametros=" . $cliente->getRut() . "'><i class='bi bi-pencil-square'></i></i>
                                    </a></td>";
                                    echo "<td class='text-center'><a href='eliminar.php?RutParametros=" . $cliente->getRut() . "'><i class='bi bi-trash'></i></a></td>";
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