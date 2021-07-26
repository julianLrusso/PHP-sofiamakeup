<?php 

session_start();

/** @var IMAGENES ruta a la carpeta imágenes */
const RUTA_IMAGENES = '../img/';

require_once __DIR__ . '/../bootstrap/autoload.php';
require_once __DIR__ . '/../bootstrap/conexion.php';
require __DIR__ . '/rutas/secciones.php';

// Productos
$repo = new ProductoRepository($db);
$productos = $repo->getAll();

// Autenticación
$auth = new Autenticacion($db);

// Secciones
$secciones = getSeccionesLista();
$seccionActual = $_GET['s'] ?? 'login';

if(!isset($secciones[$seccionActual])) {
    $seccionActual = '404';
}

// Checkeo autenticacion
$requiresAuth = $secciones[$seccionActual]['requiresAuth'] ?? false;
if($requiresAuth && !$auth->estaAutenticado()){
	header("Location: index.php?s=login");
	exit;
}

// Mensajes
$statusExito = $_SESSION['status_exito'] ?? null;
$statusError = $_SESSION['status_error'] ?? null;
unset($_SESSION['status_exito'], $_SESSION['status_error']);
 ?>

<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Sofia Make Up | <?=$secciones[$seccionActual]['title'];?></title>
	<link rel="shortcut icon" href="../favicon.ico">
	<meta name="viewport" content="width=device-width initial-scale=1">
	<link rel="stylesheet" href="../css/estilo.css">
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
</head>
<body>
	<nav class="navbar navbar-expand-lg navbar-dark row">
		<div class="col">
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
			<span class="navbar-toggler-icon"></span>
			</button>

			<div class="collapse navbar-collapse justify-content-lg-center" id="collapsibleNavbar">
				<ul class="navbar-nav">
					<?php
					if(!$auth->estaAutenticado()): ?>
					<li class="nav-item">
						<a class="nav-link" href="index.php?s=login">Iniciar sesión</a>
					</li>
					<?php
					endif ?>
					<li class="nav-item">
						<a class="nav-link" href="../index.php?s=home">Inicio</a>
					</li>					
					<?php
					if($auth->estaAutenticado()): ?>
					<li class="nav-item">
						<a class="nav-link" href="index.php?s=productos">Administrar Productos</a>
					</li>
					<?php
					endif ?>
				</ul>
			</div>
		</div>
		<h1 class="col order-lg-first col-lg-2 align-self-baseline">Sofia Make Up</h1>
		<div class="col col-lg-2 d-flex justify-content-end align-self-start">
			<?php
			if($auth->estaAutenticado()): ?>
			<ul class="navbar-nav cerrar-sesion">
				<li class="nav-item">
					<a class="nav-link" href="acciones/cerrar-sesion.php">Cerrar Sesión</a>
				</li>
			</ul>
			<?php
			endif ?>
		</div>
	</nav>

	<?php
    if($statusExito):
    ?>
        <div class="msg-ok"><?= $statusExito;?></div>
    <?php
    endif;
    ?>
    <?php
    if($statusError):
    ?>
        <div class="msg-mal"><?= $statusError;?></div>
    <?php
    endif;
    ?>

	<main>
		<?php 
			require __DIR__ . "/secciones/" . $seccionActual . ".php";
		 ?>
	</main>

	<footer>
		<div class="container">
			<a id="contacto" href="index.php"></a>
			<div>
				<p>Contacto</p>
				<div id="redes" class="d-flex justify-content-center">
					<a id="ig" href="https://www.instagram.com/sofialopez.makeup"></a>
				</div> 
			</div>
			<div class="mt-4">
				<p><a href="mailto:sofia.lopez@makeup.com.ar">Sofia.lopez@makeup.com.ar</a></p>
			</div>
			<div>
				<?php $año= date('Y');?>
				<p>Sofia Lopez Make Up &copy; <?= $año ?>- Todos los derechos reservados</p>
			</div>
		</div>
	</footer>
	<script src="../js/jquery-3.5.1.js"></script>
	<script src="../js/bootstrap.bundle.min.js"></script>
</body>
</html>