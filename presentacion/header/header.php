<?php  
    session_start();
    if(isset($_SESSION['nombre']))
    {
    } else {
        header("Location: ../Login.php");
    } 
?>
</div>

<nav class="navbar navbar-expand-lg navbar-dark bg-danger">
    <div class="container">
        <a class="navbar-brand" href="#">REPI TELRAMO ELECTRONICS LTDA</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <?php if($_SESSION['tipoUsuario'] == 1) {  ?>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="../producto/administrar.php">Productos</a>
                </li>
                <?php } ?>
                <?php if($_SESSION['tipoUsuario'] == 1) {  ?>
                <li class="nav-item">
                    <a class="nav-link" href="../empresa/actualizar.php">Empresa</a>
                </li>
                <?php } ?>
                <?php if($_SESSION['tipoUsuario'] == 1) {  ?>
                <li class="nav-item">
                    <a class="nav-link" href="../clientes/administrar.php">Clientes</a>
                </li>
                <?php } ?>
                <?php if($_SESSION['tipoUsuario'] == 1) {  ?>
                <li class="nav-item">
                    <a class="nav-link" href="../facturas/administrar.php">Facturas</a>
                </li>
                <?php } ?>
                <?php if($_SESSION['tipoUsuario'] == 1 || $_SESSION['tipoUsuario'] == 2) {  ?>
                <li class="nav-item">
                    <a class="nav-link" href="../libro_ventas/administrar.php">Libro de ventas</a>
                </li>
                <?php } ?>
            </ul>

        </div>

        <div class="d-flex justify-content-end">
            <?php        
                        if(isset($_SESSION['nombre']))
                        {
                             echo "<h5><span class='text-white'>" .$_SESSION['nombre']. "</span> <a href='../EliminarSesion.php'><i class='text-white bi bi-box-arrow-right'></i></a> </h5>";
                        } else {
                            echo "sesión no creada";
                        }
                        
                    ?>
        </div>
    </div>
</nav>