<?php
    session_start();
    //Elimina todad las variables de sesión
    session_unset();

    //Cerrar sesión
    session_destroy();

    //Redirigir al login
    header("Location: index.php");
    exit();
?>