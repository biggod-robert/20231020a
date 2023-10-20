<?php
/**
 * Esta funcion permite mostrar los registros de los nombres
 * 
 * @return texto retorna los registros de una persona
 * @param INT este parametro permite mostrar solamente el registro de una persona
 * @param varchar este parametro permite saber la contraseña de un usuario  la cual es combinacion de letras y numeros 
*/

function bases_de_datos($u = null, $c = null){
    $salida = "";//se inicializa la variable de texto

    $conexion = new mysqli('localhost', 'root', 'root', 'tour_people');//se hace una conexion con la bae de datos
    $consulta = "SELECT * FROM registro";//hace una consulta directa a la base de datos
    
    if($u != null) $consulta.= " WHERE Id='$u'";
    if($c != null) $consulta.= " AND contraseña='$c'";
    $respuesta = $conexion->query($consulta);
    //recorre el recordset
    while($fila = mysqli_fetch_assoc($respuesta)){

        $salida .= "<b> ID:  </b>".$fila['Id']."<br>";
        $salida .= "<b>   NOMBRE:  </b>".$fila['nombre']."<br>";
        $salida .= "<b>   SITIO:  </b>".$fila['sitio']."<br>";
    }

    $conexion->close();//finaliza la conexion

    return $salida;
}



?>