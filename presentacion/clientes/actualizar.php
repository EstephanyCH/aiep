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
            require_once '../../controlador/controladorCliente.php';
            require_once '../../controlador/controladorComuna.php';
            require_once '../../controlador/controladorRegion.php';
            require_once '../../controlador/controladorCiudad.php';

            evaluarParametrosPorId();  
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
                            <a class="nav-link active" aria-current="page" href="administrar.php">Productos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../empresa/administrar.php">Empresa</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../clientes/administrar.php">Clientes</a>
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
                    <h4 class="mb-3"><b><span class='glyphicon glyphicon-repeat'></span>&nbsp;Actualizar cliente</b>
                    </h4>
                    <form action="../../controlador/controladorCliente.php" method="POST">
                        <div class="form-group mb-3">
                            <label for="txtRut">Rut:</label>
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
                            <label for="txtApellido1">Apellido materno:</label>
                            <input type="text" value='<?php echo $_GET['apellido1Parametros'];?>' class="form-control"
                                name="apellido1" id="txtApellido1">
                        </div>

                        <div class="form-group mb-3">
                            <label for="txtApellido2">Apellido paterno</label>
                            <input type="text" value='<?php echo $_GET['apellido2Parametros'];?>' class="form-control"
                                name="apellido2" id="txtApellido2">
                        </div>

                        <div class="form-group mb-3">
                            <label for="dpCursos">Region:</label>

                            <?php 
                              
                            $listaRegiones = getTodosLasRegiones();

                            echo " <select class='form-control' name='id_region'> ";
                            foreach($listaRegiones as $region)
                            {
                                if($_GET['regionParametros'] != null)
                                {                                   

                                    if($_GET['regionParametros']->getId() == $region->getId())
                                    {
                                        echo "<option selected value='".$region->getId() ."'>". $region->getNombre()."</option>";
                                    }
                                    else
                                    {
                                        echo "<option value='".$region->getId() ."'>". $region->getNombre()."</option>";
                                    }
                                }
                                else
                                {
                                    echo "<option value='".$region->getId() ."'>". $region->getNombre()."</option>";
                                }
                            }
                            echo " </select> ";

                        ?>

                        </div>
                        <div class="form-group mb-3">
                            <label for="dpCursos">Ciudad:</label>

                            <select class="form-control" name="id_ciudad" id="dpCursos">
                                <?php 
                              
                            $listaCursos = getTodosLasCiudades();

                            foreach($listaCursos as $curso)
                            {
                                if($_GET['ciudadParametros'] != null)
                                {
                                    if($_GET['ciudadParametros']->getId() == $curso->getId())
                                    {
                                        echo "<option selected value='".$curso->getId() ."'>". $curso->getNombre()."</option>";
                                    }
                                    else
                                    {
                                        echo "<option value='".$curso->getId() ."'>". $curso->getNombre()."</option>";
                                    }
                                }
                                else
                                {
                                    echo "<option value='".$curso->getId() ."'>". $curso->getNombre()."</option>";
                                }
                            }

                        ?>
                            </select>
                        </div>
                        <div class="form-group mb-3">
                            <label for="dpCursos">Comuna:</label>

                            <select class="form-control" name="id_comuna" id="dpCursos">
                                <?php 
                              
                            $listaCursos = getTodosLasComunas();

                            foreach($listaCursos as $curso)
                            {
                                if($_GET['comunaParametros'] != null)
                                {
                                    if($_GET['comunaParametros']->getId() == $curso->getId())
                                    {
                                        echo "<option selected value='".$curso->getId() ."'>". $curso->getNombre()."</option>";
                                    }
                                    else
                                    {
                                        echo "<option value='".$curso->getId() ."'>". $curso->getNombre()."</option>";
                                    }
                                }
                                else
                                {
                                    echo "<option value='".$curso->getId() ."'>". $curso->getNombre()."</option>";
                                }
                            }

                        ?>
                            </select>
                        </div>
                        <div class="form-group mb-3">
                            <label for="txtDireccion">Direccion</label>
                            <input type="text" value='<?php echo $_GET['direccionParametros'];?>' class="form-control"
                                name="direccion" id="txtDireccion">
                        </div>

                        <div class="form-group mb-3">
                            <label for="txtEmail">Email</label>
                            <input type="text" value='<?php echo $_GET['emailParametros'];?>' class="form-control"
                                name="email" id="txtEmail">
                        </div>

                        <div class="form-group mb-3">
                            <label for="txtTelefono">Telefono</label>
                            <input type="text" value='<?php echo $_GET['telefonoParametros'];?>' class="form-control"
                                name="telefono" id="txtTelefono">
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