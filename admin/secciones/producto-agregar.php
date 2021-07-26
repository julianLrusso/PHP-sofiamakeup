<?php
$errores = $_SESSION['errores'] ?? [];
$exDatos = $_SESSION['exDatos'] ?? [];

unset($_SESSION['errores'], $_SESSION['exDatos']);
$repoCat = new CategoriaRepository($db);
$categories = $repoCat->getAll();
?>

<section class="p-3">
<h2 class="my-3">Agregar un producto al catálogo</h2>

<div class="row">
	<form class="col-md-6 mb-2" action="acciones/producto-crear.php" enctype="multipart/form-data" method="post">
		<div class="form-group">
			<label for="nombre">Nombre</label><span class="red"> *</span>
			<input id="nombre" type="text" class="form-control" name="nombre" value="<?= $exDatos['nombre'] ?? '' ?>" <?= isset($errores['nombre']) ? 'aria-describedby="error-nombre"' : ''; ?>>
			<?php
			if(isset($errores['nombre'])):?>

			<span id="error-nombre" class="red"><?=$errores['nombre'];?></span>

			<?php endif; ?>
		</div>
			<div class="form-group">
			<label for="precio">Precio</label><span class="red"> *</span>
			<input id="precio" type="number" class="form-control" name="precio" value="<?= $exDatos['precio'] ?? '' ?>" <?= isset($errores['precio']) ? 'aria-describedby="error-precio"' : ''; ?>>

			<?php
			if(isset($errores['precio'])):?>

			<span id="error-precio" class="red"><?=$errores['precio'];?></span>

			<?php endif; ?>
		</div>
		<div class="form-group">
			<label for="descripcion">Breve descripción</label><span class="red"> *</span>
			<textarea id="descripcion" class="form-control" name="descripcion" <?= isset($errores['descripcion']) ? 'aria-describedby="error-descripcion"' : ''; ?> ><?= $exDatos['descripcion'] ?? '' ?></textarea>
			<?php
			if(isset($errores['descripcion'])):?>

			<span id="error-descripcion" class="red"><?=$errores['descripcion'];?></span>

			<?php endif; ?>
		</div>
		<div class="form-group">
			<label for="texto">Descripción completa</label><span class="red"> *</span>
			<textarea id="texto" class="form-control" name="texto" rows="3" <?= isset($errores['texto']) ? 'aria-describedby="error-texto"' : ''; ?>><?= $exDatos['texto'] ?? '' ?></textarea>
			<?php
			if(isset($errores['texto'])):?>

			<span id="error-texto" class="red"><?=$errores['texto'];?></span>

			<?php endif; ?>
		</div>
		<div class="form-group">
			<label for="imagen">Imagen</label>
			<input id="imagen" type="file" class="form-control" name="imagen">

			<label class="mt-2" for="alt">Descripción de la imagen</label>
			<input id="alt" type="text" class="form-control" name="alt" value="<?= $exDatos['alt'] ?? '' ?>">

		</div>
		<div class="form-group">
			<label for="categoria">Categoría</label>
			<select id="categoria" name="categoria" class="form-control">
				<?php foreach($categories as $cat): ?>
				<option value="<?=$cat->getCategoriaId();?>"><?=$cat->getNombre();?></option>
				<?php endforeach ?>
			</select>
		</div>
		<button type="submit" class="btn btn-primary w-100">Enviar</button>
	</form>
</div>
<small class="text-muted ml-2">Los campos marcados con un <span class="red">*</span> son obligatorios</small>
</section>