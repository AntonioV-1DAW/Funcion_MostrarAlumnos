<?php
//Conecta con la base de datos
include 'conexion.php';
 $_GET["id"]=2;
//Obtiene el mensaje de agradecimiento y el id del alumno que agradece
$sql= "select mensaje, idEmisor, idReceptor from agradecimientos
      where idAgradecimiento=".$_GET["id"].";"; 
   // $_GET["id"] es el valor enviado por URL en <a href...>,
   // a continuacion de la ?
   // <a href="webAlumnos/'.$web.'?id='.$idAgradecimiento.'">
$resultado=$conexion->query($sql);
$fila=$resultado->fetch_array(); // Devuelve una sola fila
/* De aquí obtenemos $fila["mensaje"] para poder mostrarlo y
   $fila["idEmisor"], $fila["idReceptor"] para buscar en la tabla alumnos los datos 
   del alumno que ha enviado el mensaje y el que ha recibigo*/
   
$mensaje=$fila["mensaje"]; // Variable para mostrar el mensaje.
$emisor=$fila["idEmisor"]; //Variable que usamos para consultar 
						   //los datos del alumno que envía el mensaje  
$receptor=$fila["idReceptor"]; 						   
						   
 
//Obtiene el nombre del jesuita y su información de la tabla alumnos.
$sql= "select nombreJesuita, infoJesuita from alumnos
      where equipo=".$emisor; //Alumno que envía el mensaje.
$resultado=$conexion->query($sql);
$fila=$resultado->fetch_array(); // Devuelve una sola fila
// ACLARACIÓN: En lugar de realizar dos consultas, lo óptimo sería 
// usar una consulta de 2 tablas que devuelve 1 sola fila.


$jesuita= $fila["nombreJesuita"]; //variable para mostrar el nombre del jesuita
$infoJesuita= $fila["infoJesuita"]; //variable para mostrar la información del jesuita
// Cerramos php y a continuación tenemos el HTML

//Obtiene el nombre alumno al que se le agradece de la tabla alumnos.
$sql= "select nombre from alumnos
      where equipo=".$receptor; //Alumno que envía el mensaje.
$resultado=$conexion->query($sql);
$fila=$resultado->fetch_array(); // Devuelve una sola fila

$receptor=$fila["nombre"]; //NOMBRE DEL ALUMNO QUE RECIBE EL AGRADECIMIENTO

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8"/>
        <meta name="author" content="San Francisco Javier">
        <link rel="StyleSheet" href="./Estilos.css" type="text/css"/>
    </head>
    <div>
        Para: <?php echo $receptor ?>
    </div>
    <body>
        <header id="Agradecer" class="tituloMisAgradecimientos">
            <img src="./imagenes/titulo.png"/>
        </header>
        <section id="./MisAgradecimientos.html" class="principal">
            <?php echo $mensaje ?>
        </section>
        <aside>
            <img src="./imagenes/jesuita.png" class="jesuita"/>
            <p>
                <?php
                    echo $jesuita
                    echo $infoJesuita
                ?>
            </p>
        </aside>
        <a class="volver" href="./inicio.html">Volver</a>
    </body>
</html>