<?php
if(is_uploaded_file($_FILES['archivo']['tmp_name'])) {
    $directorio = "archivos/";
    $nombreDelArchivo = $_FILES['archivo']['name'];
    $nombreCompleto = $directorio . $nombreDelArchivo;

    if(is_file($nombreCompleto)) {
        $idUnico = time();
        $nombreDelArchivo = $idUnico . $nombreDelArchivo;
        echo "archivo repetido, se cambiara el nombre a $nombreDelArchivo <br><br>";
    }
    echo "<br>";
    if(move_uploaded_file($_FILES['archivo']['tmp_name'], $directorio . $nombreDelArchivo)) {
        echo "El archivo se ha subido correctamente al directorio $nombreCompleto";
    } else {
        echo "No se ha podido subir el archivo asdasds";
    }
 

} else {
    echo "No se ha podido subir el archivo";
}

?>