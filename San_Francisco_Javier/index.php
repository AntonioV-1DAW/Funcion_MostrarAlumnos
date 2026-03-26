<?php
    include'configdb.php';
    include'conexion.php';
    session_start();

    if($_POST){
        $usuario=$_POST["usuario"];
        $password=$_POST["contrasena"];

        //Consulta del query
        $sql = "SELECT idAlumno FROM alumnos WHERE usuario = '$usuario' AND contrasena = '$password'";
        echo $sql;
        echo'<br/>';
        echo'<br/>';
        $resultado=$conexion->query($sql);

        if($resultado->num_rows>0){
            header("Location: index.php");
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
			<a class="botones" href="./index.php">Agradecer</a>
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
                        <input type="text" id="usuario" name="usuario" placeholder="Introduce tu usuario" class="campo" required><br><br>

                        <label for="nombre">Contraseña:</label><br>
                        <input type="password" id="password" name="password" placeholder="Introduce tu contraseña" class="campo" required><br>
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