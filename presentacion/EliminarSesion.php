<?php

    session_start();
    session_destroy();
    header("Location: ../presentacion/Login.php");
?>
