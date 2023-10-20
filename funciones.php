<?php
/**
 * Esta funcion permite mostrar los registros de los nombres
 * 
 * @return salida retorna los registros de una persona
 * @param numero este parametro permite mostrar solamente el registro de una persona
 * 
*/

function bases_de_datos($u = null){
    $salida = "";//se inicializa la variable de texto

    $conexion = new mysqli('localhost', 'root', 'root', 'tour_people');//se hace una conexion con la bae de datos
    $consulta = "SELECT * FROM registro";//hace una consulta directa a la base de datos
    
    if($u = null) $consulta.= "where Id = '$u'";
    $respuesta = $conexion->query($consulta);
    //recorre el recordset
    while($fila = mysqli_fetch_assoc($respuesta)){

        $salida .= $fila['Id'];
        $salida .= $fila['nombre'];
        $salida .= $fila['sitio']."<br>";

    }

    $conexion->close();

    return $salida;
}



?>