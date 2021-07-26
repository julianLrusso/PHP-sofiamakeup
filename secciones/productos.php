<?php
$repoCat = new CategoriaRepository($db);
$cat = $repoCat->getAll();
$categoria_id = $_GET['catId'] ?? null;
$repoByCat = new ProductoRepository($db);
if(isset($categoria_id)){
	$productosByCategoria = $repoByCat->getByCategoriaId($categoria_id);
	$categorias = new CategoriaRepository($db);
	$categoria = $categorias->getById($categoria_id);
}
?>

<section>
	
	<div class="text-center mt-3">
		<span class="h5">Ver por categorias: </span>
		<ul class="d-inline-block">
		<li class="prod-cat">
				<a class="<?php 
					if(!isset($categoria_id)){
						echo "catActiva";
					} else {echo "catSelector";} ?>" href="index.php?s=productos">Todos</a>
			</li>
			<?php
			for($i=0; $i < count($cat); $i++){
			?>
			<li class="prod-cat">
				<a class="<?php 
					if(($i+1) == $categoria_id){
						echo "catActiva";
					} else{echo "catSelector";} ?>" href="index.php?s=productos&catId=<?=$cat[$i]->getCategoriaId()?>"><?=$cat[$i]->getNombre();?></a>
			</li>
			<?php
			} ?>
		</ul>
	</div>

	<?php
	if(!isset($categoria_id)):
		//TODOS LOS PRODUCTOS
	?>

	
	<h2 class="text-center titulo">Catálogo completo de productos</h2>

	<div class="row">
		<?php
		foreach ($productos as $producto) {
			?>
			<article class="col-md-6 col-xl-3">
					<div class="producto mx-auto mb-4 card">
					<a href="index.php?s=producto-leer&id=<?=$producto->getProductoId(); ?>">
						<img src="<?=RUTA_IMAGENES . $producto->getImagen(); ?>" class="card-img-top img-fluid" alt="<?=$producto->getAlt(); ?>">
					</a>
					<div class="card-body">
						<span class="card-title d-block h4 text-center">$<?=$producto->getPrecio();?></span>
						<h3 class="card-text h5 primario"><?=$producto->getNombre(); ?></h3>
						<p class="card-text"><?=$producto->getDescripcion(); ?></p>
					</div>
					</div>
			</article>
	<?php } ?>
	</div>
	<?php
	else:
		//PRODUCTOS POR CATEGORIA
	?>
	<h2 class="text-center titulo">Catálogo de <?= $categoria->getNombre(); ?></h2>

	<div class="row">
	<?php
	foreach ($productosByCategoria as $productoCat) {
		?>
		<article class="col-md-6 col-xl-3">
				<div class="producto mx-auto mb-4 card">
				<a href="index.php?s=producto-leer&id=<?=$productoCat->getProductoId(); ?>">
					<img src="<?=RUTA_IMAGENES . $productoCat->getImagen(); ?>" class="card-img-top img-fluid" alt="<?=$productoCat->getAlt(); ?>">
				</a>
				<div class="card-body">
					<span class="card-title d-block h4 text-center">$<?=$productoCat->getPrecio();?></span>
					<h3 class="card-text h5 primario"><?=$productoCat->getNombre(); ?></h3>
					<p class="card-text"><?=$productoCat->getDescripcion(); ?></p>
				</div>
				</div>
		</article>
	<?php } ?>
	</div>
	<?php
	endif;
	?>
</section>