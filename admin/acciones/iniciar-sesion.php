<?php
session_start();
require_once __DIR__ . '/../../bootstrap/autoload.php';
require_once __DIR__ . '/../../bootstrap/conexion.php';

// Datos
$email = $_POST['email'];
$password  = $_POST['password'];

// TODO: validar

echo $email;
echo $password;

// Autenticación
$auth = new Autenticacion($db);
$login = $auth->login($email, $password);

if($login){
    $_SESSION['status_exito'] = "Sesión iniciada exitosamente.";
    header("Location: ../index.php?s=productos");
} else {
    $_SESSION['status_error'] = "Email o contraseña incorrectos.";
    $_SESSION['exDatos'] = $_POST;
    header("Location: ../index.php?s=login");
}