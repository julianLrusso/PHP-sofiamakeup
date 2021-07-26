<?php

session_start();

/** @var PDO $db */
require_once __DIR__ . '/../../bootstrap/autoload.php';
require_once __DIR__ . '/../../bootstrap/conexion.php';
require_once __DIR__ . '/../../funciones/subirArchivo.php';

// Verificación de login
$auth = new Autenticacion($db);
if(!$auth->estaAutenticado()){
    $_SESSION['status_error'] = "Tenés que estar logueado para hacer eso";
    header("Location: ../index.php?s=login");
}

// 1. Capturamos los datos.
$id_producto        = $_POST['id_producto'];
$nombre             = $_POST['nombre'];
$precio             = $_POST['precio'];
$descripcion        = $_POST['descripcion'];
$texto              = $_POST['texto'];
$alt                = $_POST['alt'];
$imagenActual       = $_POST['imagenActual'];
$imagen             = $_FILES['imagen'];
$categoria          = $_POST['categoria'];

// 2. Validamos los datos
$validador = new ValidadorProducto($_POST);

if($validador->falla()) {
    $_SESSION['errores'] = $validador->getErrores();
    $_SESSION['exDatos'] = $_POST;
    header('Location: ./../index.php?s=producto-editar&id=' . $id_producto);
    exit;
}
if(!empty($imagen['tmp_name'])){
    $nombreImagen = subirArchivo($imagen, __DIR__ . "/../../img/");
} else {
    $nombreImagen = $imagenActual;
}


// 3. Llamamos a la función de grabar.
$repo = new ProductoRepository($db);
$exito = $repo->update($id_producto, [
    'nombre'                => $nombre,
    'precio'                => $precio,
    'descripcion'           => $descripcion,
    'texto'                 => $texto,
    'alt'                   => $alt,
    'imagen'                => $nombreImagen,
    'categoria_id'          => $categoria,
    'usuario_id'            => 1, // Hardcodeamos temporalmente el id del usuario hasta que tengamos el login.
]);

// 4. Verificamos el resultado.
if($exito) {
    $_SESSION['status_exito'] = 'El producto <b>' . $nombre . '</b> se actualizó correctamente al catálogo.';
    header("Location: ./../index.php?s=productos");
    exit;
} else {
    $_SESSION['status_error'] = 'Ocurrió un error inesperado. Por favor aguarde unos segundos e intente de nuevo.';
    header("Location: ./../index.php?s=producto-editar&id=" . $id_producto);
    exit;
}
