<?php
    include'configdb.php';
    session_start();

    $conexion=new mysqli(SERVIDOR, USUARIO, PASSWORD, BBDD);

    if($_POST){
        $nombre=$_POST["nombre"];
        $contrasena=$_POST["contrasena"];

        //Consulta del query
        $sql = "SELECT idAlumno FROM alumnos WHERE nombre = '$nombre' AND contrasena = '$contrasena'";
        echo $sql
        echo'<br/>';
        echo'<br/>';
        $resultado=$conexion->query($sql);

        if($resultado->num_rows>0){
            header("Location: inicio.html");
            exit();
        } else {
            echo "Usuario o contrasena incorrectos";
        }
    }
    // Ejecutar la función si se envió el formulario
    if($_POST){
        iniciarSesion($conexion);
    }
    $conexion->close();
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Inicio-AGRADECE_EN_COMPAÑIA</title>
        <meta charset="UTF-8">
        <meta name="Author" content="San Francisco Javier">
		<link rel="StyleSheet" href="./Estilos.css" type="text/css">
    </head>
    <body class="fondoIntroducir">
        <header class="tituloIntroducir">
            <img src="./imagenes/titulo.png"/>
            <br>
            <img src="./imagenes/comparte.png"/>
        </header>
        <nav>
            <a class="botones" href="./inicio.html">Inicio</a>
			<a class="botones" href="./agradecer.php">Agradecer</a>
			<a class="botones" href="./MisAgradecimientos.html">Mis Agradecimientos</a>
            <a class="botones" href="./cerrar_sesion.php">Cerrar sesión</a>
        </nav>
        <article class="introducir">
            <div  class="inicio">
                <img src="./imagenes/inicia.png"/>
            </div>
            <div>
                <form action="introducir.php" method="POST">
                    <div>
                        <label for="nombre">Usuario:</label><br>
                        <input type="text" id="nombre" name="nombre" placeholder="Introduce tu usuario" class="campo" required><br><br>

                        <label for="nombre">Contraseña:</label><br>
                        <input type="password" id="contrasena" name="contrasena" placeholder="Introduce tu contraseña" class="campo" required><br>
                    </div>
                    <div>
                        <p>
                            <input type="radio" id="recordarme" name="recordarme" value="recordarme">
                            <label for="recordarme">Recordarme</label>
                            <br>
                            <input type="submit" value="Enviar" class="btnEnviar"/>
                        </p>
                    </div>
                </form>
            </div>
        </article>
    </body>
</html>