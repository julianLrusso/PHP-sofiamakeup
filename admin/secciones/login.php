<?php
$datosViejos = $_SESSION['exDatos'] ?? [];
unset($_SESSION['exDatos']);
?>

<section class="p-4">
	<h2>Inicia sesión</h2>
	<p>Ingresá tus credenciales de acceso para continuar.</p>

	<div class="row mt-5">
		<form action="acciones/iniciar-sesion.php" class="col-md-6 mb-5" method="post">
			<div class="form-group mt-3">
				<label for="email">Email</label>
				<input type="email" name="email" id="email" class="form-control" value="<?= $datosViejos['email'] ?? ''; ?>">
			</div>
			<div class="form-group mt-4">
				<label for="password">Contraseña</label>
				<input type="password" name="password" id="password" class="form-control">
			</div>
			<button type="submit" class="btn btn-primary w-75 mx-auto d-block mt-4">Ingresar</button>
		</form>
	</div>
</section>