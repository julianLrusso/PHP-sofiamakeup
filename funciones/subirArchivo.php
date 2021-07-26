<?php
/**
 * Sube el archivo de formulario $archivoSubido a la $ruta indicada.
 * El nombre que genera para el archivo es la fecha y hora actual más el nombre original.
 * Retorna el nombre del archivo subido en caso de éxito, false de lo contrario.
 *
 * @param array $archivoSubido
 * @param string $ruta
 * @return bool|string
 */
function subirArchivo(array $archivoSubido, string $ruta = "") {

    $nombreArchivo = date('YmdHis') . $archivoSubido['name'];

    if(move_uploaded_file($archivoSubido['tmp_name'], $ruta . $nombreArchivo)) {
        return $nombreArchivo;
    } else {
        return false;
    }
}