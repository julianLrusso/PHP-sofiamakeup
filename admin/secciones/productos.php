<section>
	<h2 class="mt-5">Administración de productos</h2>
	<div class="mt-2 mb-4">
		<a href="index.php?s=producto-agregar" class="btn btn-primary">Agregar productos</a>
	</div>

	<table class="table">
		<thead class="thead-dark">
			<tr>
				<th scope="col">ID</th>
				<th scope="col">Imagen</th>
				<th scope="col">Nombre</th>
				<th scope="col">Precio</th>
				<th scope="col">Descripción</th>
				<th scope="col">Texto</th>
				<th scope="col">Categoría</th>
				<th scope="col">Acciones</th>
			</tr>
		</thead>

		<tbody>
		<?php 
		foreach($productos as $producto):	
		?>
			<tr>
				<th scope="row"><?= $producto->getProductoId(); ?></td>
				<td><img src="<?= RUTA_IMAGENES . $producto->getImagen(); ?>" alt="<?= $producto->getAlt(); ?>"></td>
				<td><?= $producto->getNombre(); ?></td>
				<td><?= $producto->getPrecio(); ?></td>
				<td><?= $producto->getDescripcion(); ?></td>
				<td><?= $producto->getTexto(); ?></td>
				<td><?= $producto->getCategoriaId(); ?></td>
				<td>
					<a href="./index.php?s=producto-editar&id=<?=$producto->getProductoId()?>" class="btn btn-outline-primary my-3 d-block">Editar</a>
					<form action="acciones/producto-eliminar.php" method="post" class="form-eliminar">
						<input type="hidden" name="id" value="<?= $producto->getProductoId(); ?>">
						<button type="submit" class="btn btn-danger">Eliminar</button>
					</form>
				</td>
			</tr>
		<?php endforeach; ?>
		</tbody>
	</table>
</section>

<script src="../js/delete-confirm.js"></script>