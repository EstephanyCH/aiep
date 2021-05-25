
<?php

    require_once '../entidades/usuario.php';
    require_once '../persistencia/daoUsuario.php';

    session_start();

    if(isset($_GET['nombreUsuario']) && isset($_GET['password'])) {

        $lista = validarUsuario($_GET['nombreUsuario'], $_GET['password']);

        if(count($lista) > 0){
            $usuario = $lista[0];
            $_SESSION['nombre'] = $usuario->getNombreUsuario();
            $_SESSION['tipoUsuario'] = $usuario->getTipo();
            header("Location: ../presentacion/producto/administrar.php");
            die();
        }else{
            echo 'el usuario no existe';
        }

 /*        if(strtoupper($_GET['nombreUsuario']) == "CARLOS" && $_GET['password'] == "1234")
        { 
            $_SESSION['nomUsuario'] = $_GET['nombreUsuario'];
            $_SESSION['passUsuario'] = $_GET['password'];
            echo "Identificado";
            header("Location: ../presentacion/producto/administrar.php");
            die(); 
        }  */

        
    }
?>