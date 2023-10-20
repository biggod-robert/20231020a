<?php
/**
 * Esta funcion permite mostrar los registros de los nombres
 * 
 * @return texto retorna los registros de una persona
 * @param INT este parametro permite mostrar solamente el registro de una persona
 * @param varchar este parametro permite saber la contraseña de un usuario  la cual es combinacion de letras y numeros 
 * @param  numero este parametro permite traer el conteo de los registros
*/ 

function bases_de_datos( $u = null, $c = null, $count = 1){
    $salida = "";//se inicializa la variable de texto

    $conexion = new mysqli('localhost', 'root', 'root', 'tour_people');//se hace una conexion con la bae de datos

    if( $count == 1){
        $consulta = "SELECT * FROM registro";

        if($u != null){
            $consulta .= "WHERE Id='$u'";

            $salida .= "<b> ID:  </b>".$fila['Id']."<br>";// Concatenación del primer campo
            $salida .= "<b>   NOMBRE:  </b>".$fila['nombre']."<br>"; // Concatenación del segundo campo
            $salida .= "<b>   APELLIDO:  </b>".$fila['apellido']."<br>";// Concatenación del tercer campo
            $salida .= "<b>   SITIO:  </b>".$fila['sitio']."<br>";// Concatenación del cuarto campo

        }
        if($u != null && $c != null){
            $consulta = "SELECT * FROM registro WHERE Id='$u' AND contraseña='$c'";

        }

    } elseif ($count != 1){
        $consulta = "SELECT count(*) from registro";
    } else {
        $salida .= "valor incorrecto";
    }

   
 // Se ejecuta la consulta y se obtiene el conjunto de resultados.
    $respuesta = $conexion->query($consulta);
    if($respuesta)
        if($count == 1)
    //recorre el recordset
            while ($fila = mysqli_fetch_assoc($respuesta)){

                $salida .= "<b> ID:  </b>".$fila['Id']."<br>";// Concatenación del primer campo
                $salida .= "<b>   NOMBRE:  </b>".$fila['nombre']."<br>"; // Concatenación del segundo campo
                $salida .= "<b>   SITIO:  </b>".$fila['sitio']."<br>";// Concatenación del cuarto campo
        
} elseif ($count != 1) {
    // Se obtiene el resultado del recuento.
    $conteo = mysqli_fetch_row($resultado)[0];
    $salida .= "Número total de registros: $conteo";
} else {
// No se encontraron resultados o hubo un error en la consulta.
$salida .= "Error en la consulta";
}


$conexion->close();//finaliza la conexion

return $salida;// Se devuelve la cadena acumulada con los resultados de la consulta.
}

    



?>