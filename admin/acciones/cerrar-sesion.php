<?php
session_start();
require_once __DIR__ . '/../../bootstrap/autoload.php';
require_once __DIR__ . '/../../bootstrap/conexion.php';

$auth = new Autenticacion($db);
$auth->logout();

$_SESSION['status_exito'] = "La sesión se cerró con éxito";
header('Location: ../index.php?s=login');