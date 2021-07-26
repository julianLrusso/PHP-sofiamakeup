<?php

// DATOS PARA LA CONEXIÓN:
const DB_HOST = "localhost";
const DB_NAME = "dw3_lopezrusso_julian";
const DB_CHARSET = "utf8mb4";
const DB_USER = "root";
const DB_PASS = "";

// DSN
const DB_DSN = "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=" . DB_CHARSET;


// CONEXION Y CATCHEO
try {
    $db = new PDO(DB_DSN, DB_USER, DB_PASS);
} catch (Exception $e){
    die("Error al conectar con MySQL. Motivo: " . $e->getMessage());
}