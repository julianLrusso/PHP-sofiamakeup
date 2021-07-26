<section class="p-3">
<h2 class="my-3">¡Contactate con nosotros!</h2>
<p class="primario">¿Algún problema? ¿Alguna recomendación? ¿Algo que nos quieras decir? Por favor, hacelo completando el formulario, vamos a responderte lo más rápido que podamos.</p>

<div class="row">
	<form class="col-md-6 mb-2" action="#" enctype="application/x-www-form-urlencoded">
		<div class="form-group">
			<label for="nombre">Nombre <span class="red">*</span></label>
			<input type="text" class="form-control" id="nombre" name="nombre" required>
		</div>
			<div class="form-group">
			<label for="apellido">Apellido</label>
			<input type="text" id="apellido" class="form-control" name="apellido">
		</div>
		<div class="form-group">
			<label for="email">Email <span class="red">*</span></label>
			<input type="email" id="email" class="form-control" name="email" aria-describedby="emailHelp" required>
			<small id="emailHelp" class="form-text text-muted">No compartiremos su email con nadie más.</small>
		</div>
		<div class="form-group">
			<label for="comentario">Comentarios <span class="red">*</span></label>
			<textarea class="form-control" name="comentario" id="comentario" rows="3" required></textarea>
		</div>
		<button type="submit" class="btn btn-primary">Enviar</button>
	</form>
</div>
<small class="text-muted ml-2">Los campos marcados con un <span class="red">*</span> son obligatorios</small>
</section>