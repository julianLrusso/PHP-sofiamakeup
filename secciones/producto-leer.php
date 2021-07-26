<?php

$repo = new ProductoRepository($db);
$id = (int) $_GET['id'];
$producto = $repo->getById($id);
?>
<section class="desapretador">
	<article class="container">
		<div class="row justify-content-around my-4 info">
			<h3 class="col-12 titulo mt-0"><?= $producto->getNombre(); ?></h3>
			<div class="col-md-5">
				<div class="row">
					<div class="col-12 align-self-center">
						<img class="img-fluid d-block m-auto" src="<?= RUTA_IMAGENES . $producto->getImagen(); ?>" alt="<?= $producto->getAlt(); ?>">
					</div>
					<span class="h3 col-12 text-center mt-2">$<?= $producto->getPrecio(); ?></span>
				</div>
			</div>
			<div class="col-md-5">
				<p class="h2">Descripción:</p>
				<p><?= $producto->getTexto(); ?></p>
			</div>
		</div>
	</article>
</section>