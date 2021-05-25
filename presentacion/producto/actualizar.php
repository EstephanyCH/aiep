<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1; charset=UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>   
     <body>        

</head>

<body>                
        <?php 
            include_once '../../controlador/controladorProducto.php'; 
            evaluarParametrosPorId();
        ?>
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <div class="container">
    <a class="navbar-brand" href="#">REPI TELRAMO ELECTRONICS LTDA</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
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
            <strong>¡Operación Realizada!</strong> <?php echo $_GET['msj'] ?>  Registrado Correctamente!
        </div>
    
    <?php } elseif(isset($_GET['msj']) && strpos($_GET['msj'],"err") !== false) { ?>

            <div class='alert alert-danger alert-dismissible'>
                <strong>¡Operación Incorrecta!</strong> Sucedió algo inesperado:  <?php echo $_GET['msj'] ?> 
            </div>
    
    <?php    } ?>
</div>


    <div class="row">
        <div class="col-md-8">
            <h4 class="mb-3"><b><span class='glyphicon glyphicon-repeat'></span>&nbsp;Actualizar producto</b></h4>
            <form action="../../controlador/controladorProducto.php" method="POST">
                <div class="form-group mb-3">
                    <label for="txtCodigo">Codigo:</label>
                    <input type="text" value='<?php echo $_GET['codigoParametros'];?>' readonly="true" class="form-control" name="codigo" id="txtCodigo">

                    </input>
                </div>

                <div class="form-group mb-3">
                    <label for="txtNombre">Nombre:</label>
                    <input type="text" value='<?php echo $_GET['nombreParametros'];?>' class="form-control" name="nombre" id="txtNombre">
                    
                </div>

                <div class="form-group mb-3">
                    <label for="txtDescripción">Descripción:</label>
                    <input type="text" value='<?php echo $_GET['descripcionParametros'];?>' class="form-control" name="descripcion" id="txtDescripción">
                </div>

                <div class="form-group mb-3">
                    <label for="txtUnidadMedida">Unidad de medida</label>
                    <input type="text" value='<?php echo $_GET['unidad_medidaParametros'];?>' class="form-control" name="unidadMedida" id="txtUnidadMedida">
                </div>

                <div class="form-group mb-3">
                    <label for="txtApellido2">Precio unitario</label>
                    <input type="text" value='<?php echo $_GET['precioUnitarioParametros'];?>' class="form-control" name="precioUnitario" id="txtPrecioUnitario">
                </div>
                

                <button id="btnAccion" type="submit" name="actualizar" class="btn btn-primary">Modificar</button>
                <a href="administrar.php"><button type="button" class="btn btn-secondary">Cancelar</button></a>
            </form>

        </div>
        </div>
        </div>
    </body>
</html>