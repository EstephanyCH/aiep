<?php

session_start();

if(isset($_SESSION['nomUsuario']))
{
     echo "El usuario conectado es " .$_SESSION ['nomUsuario'] . "...";
}else {
    echo "sesión no creada";
}

?>