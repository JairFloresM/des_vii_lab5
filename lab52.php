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
    
    if(move_uploaded_file($_FILES['archivo']['tmp_name'], $directorio . $nombreDelArchivo)) {

        $tipo = $_FILES['archivo']['type'];
        if($tipo == 'image/jpg' or $tipo == 'image/jpeg' or $tipo == 'image/gif' or $tipo == 'image/png'){
            $tamanio = $_FILES['archivo']['size'];
            if($tamanio < 1000000) {
                echo "el archivo se ha subido correctamente";
            } else {
                echo "el archivo es muy pesado";
            }
        } else {
            echo "el archivo no tiene el formato correcto";
        }

        echo "El archivo se ha subido correctamente al directorio $nombreCompleto";
    } else {
        echo "No se ha podido subir el archivo asdasds";
    }


} else {
    echo "No se ha podido subir el archivo";
}

?>