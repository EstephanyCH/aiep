<?php 
    header('Content-Type: text/html; charset=UTF-8');
?>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1; charset=UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>    <body>        

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
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
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
          <a class="nav-link" href="../clientes/administrar.php">Clientes</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="administrar.php">Facturas</a>
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
                <h4><b><i class="glyphicon glyphicon-education">&nbsp;</i>Administrar Facturas</b></h4>
            </div>

            <div class="col-md-6 d-flex justify-content-end">
            <a href='registrar.php'><button class="btn btn-warning" type="button">Agregar factura <i class="bi bi-plus-circle"></i></button></a>
            </div>
            </div>
       
<form method="POST">
    <div>
        <table class='table table-striped table-hover table-responsive mt-4'>

        <thead>
            <tr>
                <th>Folio</th>
                <th>N Factura</th>
                <th>Rut empresa</th>
                <th>Fecha emisión</th>
                <th>Tipo</th>
                <th class='text-center'>Observaciones</th>
                <th class='text-center'>Estado</th>
                <th class='text-center'>Neto</th>
                <th class='text-center'>Total</th>
                <th class='text-center'>Actualizar</th>
                <th class='text-center'>Eliminar</th>
            </tr>
        </thead>
        <tbody>
           <tr>
           <td>123456</td>
           <td>6788 </td>
           <td>24327088k</td>
           <td>23/10/2021</td>
           <td>Factura </td>
           <td>ninguna</td>
           <td>Registrada</td>
           <td>1200</td>
           <td>1800</td>
           <td class='text-center'><i class='bi bi-pencil-square'></i></td>";
            <td class='text-center'><i class='bi bi-trash'></i></td>;
           </tr>
        </tbody>

        </table>
    </div>

</form>

</div>     
    </body>
</html>