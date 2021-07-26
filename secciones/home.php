<aside>
	<a href="index.php?s=producto-leer&id=1">
		<picture>
			<source media="(min-width:641px)" srcset="<?=RUTA_IMAGENES?>slide1PC-big.jpg">
			<source media="(min-width:321px)" srcset="<?=RUTA_IMAGENES?>slide1PC.jpg">
			<img src="<?=RUTA_IMAGENES?>slide1.jpg" class="d-block img-fluid" alt="Vinchas hechas a mano">
		</picture>
	</a>
</aside>

	<section class="mt-5">
		<div class="row">
			<div class="col-md-6">
				<h2>¿Quienes somos?</h2>
				<div class="info">
					<p>Sofía Make Up es un emprendimiento creado por una maquilladora profesional y una familia que la apoya mucho.</p> 
					<p>Querémos proporcionarles a las personas información y productos de primera calidad sobre maquillaje y cuidado facial. Además queremos concientizar sobre el correcto cuidado de la piel, porque sabemos que mucha gente no tiene todavía el hábito de hacerse una rutina para ello.</p>
					<p>¡Para poder ver todos nuestros consejos <a class="text-dark font-weight-bold" href="https://www.instagram.com/sofialopez.makeup">seguínos en Instagram!</a></p>
				</div>
			</div>
			<div class="col-md-6">
				<h2>¿Qué vendemos?</h2>
				<div class="info">
					<p>Vendemos cremas, labiales, mascarillas, bases y todo lo que se te ocurra que tenga que ver con el maquillaje y el skincare. </p>
					<p>Todos nuestros productos fueron seleccionados y probados con mucho amor, en cada uno detallamos para que tipo de piel es y cuales son sus carácteristicas. También tenemos muchos productos hecho a mano, para que reutilices y no ensucies el medioambiente (además, son mucho más bonitos que los industriales).</p>
					<p>Si tenés alguna duda, o querés una recomendación, no dudes en escribirnos en la <a class="text-dark font-weight-bold" href="index.php?s=contacto">sección de contacto</a></p>
				</div>
			</div>
		</div>
	</section>

	<section>
		<h2 class="text-center titulo">Productos Destacados</h2>

		<div class="row justify-content-center">
			<?php $i = 0;
			foreach ($productos as $producto) {
					if($i < 4) :
				?>
				<div class="col-md-6 col-xl-3">
					<div class="producto mx-auto mb-4 card">
					<a href="index.php?s=producto-leer&id=<?=$producto->getProductoId()?>">
						<img src="<?=RUTA_IMAGENES . $producto->getImagen(); ?>" class="card-img-top img-fluid" alt="<?=$producto->getAlt(); ?>">
					</a>
					<div class="card-body">
						<span class="card-title d-block h4 text-center">$<?=$producto->getPrecio();?></span>
						<span class="card-text h5 primario"><?=$producto->getNombre();?></span>
						<p class="card-text"><?=$producto->getDescripcion();?></p>
					</div>
					</div>
				</div>
		<?php $i++;
		endif;
		} ?>
			<a class="btn btn-outline-primary vertodos" href="index.php?s=productos">Ver todos los productos</a>
		</div>
	</section>

	<section>
		<h2 class="text-center titulo">Categorías</h2>
		<div class="row justify-content-center">
			<?php
			//Categorias
			$repoCat = new CategoriaRepository($db);
			$categorias = $repoCat->getAll();

			foreach ($categorias as $categoria) {
				?>
				<div class="col-md-6 col-xl-3">
					<div class="categoria mx-auto mb-4 card">
					<a href="index.php?s=productos&catId=<?=$categoria->getCategoriaId()?>">
						<img src="<?= RUTA_IMAGENES . "cat-" . $categoria->getNombre() . ".jpg"; ?>" class="card-img-top img-fluid" alt="">
					</a>
					<div class="card-body">
						<span class="card-text h5 primario"><?=ucfirst($categoria->getNombre());?></span>
					</div>
					</div>
				</div>
		<?php
		} ?>
		</div>
	</section>