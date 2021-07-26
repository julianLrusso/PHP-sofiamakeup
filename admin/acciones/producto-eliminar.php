<?php
session_start();

require_once __DIR__ . '/../../bootstrap/autoload.php';
require_once __DIR__ . '/../../bootstrap/conexion.php';

// Verificación de login
$auth = new Autenticacion($db);
if(!$auth->estaAutenticado()){
    $_SESSION['status_error'] = "Tenés que estar logueado para hacer eso";
    header("Location: ../index.php?s=login");
}

// Captura de ID
$id = $_POST['id'];

// Eliminamos
$repo = new ProductoRepository($db);
$exito = $repo->delete($id);

// Redirección
if($exito){
    $_SESSION['status_exito'] = 'El producto se eliminó correctamente.';
    header("Location: ./../index.php?s=productos");
} else {
    $_SESSION['status_error'] = 'Ocurrió un problema. Por favor aguarde unos segundos e intente nuevamente.';
    header("Location: ./../index.php?s=productos");
}