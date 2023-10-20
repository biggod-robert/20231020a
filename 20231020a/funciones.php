<?php
//la funcion permite mostrar los registros de los nombres
function bases_de_datos(){
    $salida = "";//se inicializa la variable de texto

    $conexion = new mysqli('localhost', 'root', 'root', 'tour_people');//se hace una conexion con la bae de datos
    $consulta = "SELECT nombre as nombre FROM registro";
    $respuesta = $conexion->query($consulta);
   
    while($fila = mysqli_fetch_assoc($respuesta)){

        $salida .= $fila['nombre']."<br>";

    }

    $conexion->close();

    return $salida;
}



?>