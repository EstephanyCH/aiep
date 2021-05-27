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

<body class="bg-light">
    <?php 
        include_once '../controlador/controladorLogin.php';
    ?>

    <div class="container content pt-5">
        <div class="row d-flex justify-content-center">
            <div class="col-md-7 mt-5 ">
                <div class="card p-5">
                    <div class="card-body">
                    <h3 class="mb-3">REPI TELRAMO ELECTRONICS LTDA</h1>
                    <form action="Login.php" class="mt-5">

                        <div class="mb-3">
                            <label for="txtNombreUsuario" class="form-label">Ingrese usuario</label>
                            <input type="text" class="form-control" name="nombreUsuario" id="txtNombreUsuario">
                        </div>
                        <div class="mb-3">
                            <label for="txtPassword" class="form-label">Ingrese password</label>
                            <input type="text" class="form-control" name="password" id="txtPassword">
                        </div>

                        <div class="mb-3 d-flex justify-content-center">
                            <button type="submit" name="login"
                                class="btn btn-warning btn-lg btn-block mt-3 ">Login</button>
                        </div>

                    </form>
                    </div>
                </div>  
            </div>
        </div>
    </div>

</html>