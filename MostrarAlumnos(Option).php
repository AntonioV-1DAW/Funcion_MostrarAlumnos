<?php
    function conectar(){
        $conexion=new mysqli("localhost", "root", "", "alumnos");
        return $conexion;
    }

    function mostrarAlumnos($conexion){
        $sql="SELECT idAlumno, nombre FROM alumnos";
        $resultado=$conexion->query($sql);

        while($fila=$resultado->fetch_array()){
            echo '<option  value="'.&fila['idAlumno'].'">';
            echo $fila['idAlumno'].'-'.$fila['nombre'];
            echo '</option>';
        }
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8"/>
    </head>
    <body>
        <div>
            <label for="alumnos" placeholder="Selecciona un alumno">Para: </label>
            <select name="alumnos" id="alumnos"></select>
        </div>
        <br>
        <div>
            <label for="nombre">Agradecimiento:</label><br>
            <input type="password" id="contrasena" name="contrasena" placeholder="Introduce tu agradecimiento" class="agradecer" required><br>
         </div>
    </body>
</html>