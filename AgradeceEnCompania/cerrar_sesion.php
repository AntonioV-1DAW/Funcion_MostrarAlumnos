<?php
    session_start();
    //Elimina todad las variables de sesión
    session_unset();

    //Cerrar sesión
    session_destroy();

    //Redirigir al login
    header("Location: introducir.php");
    exit();
?>