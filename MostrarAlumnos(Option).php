<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8"/>
    </head>
    <body>

    </body>
</html>
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