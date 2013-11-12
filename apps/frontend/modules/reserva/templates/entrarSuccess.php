<?php if($sf_user->hasFlash('error')): 
		$error = "has-error";
?>
		<center><?php include_partial('global/error', array('mensaje' => $sf_user->getFlash('error')));?></center>
<?php endif; ?>
<div class="container well <?php echo $error; ?>" style="width: 30%">
	<form method="POST" action="<?php echo url_for('reserva/entrar'); ?>">
	<fieldset>
		<legend class="text-muted">Identificarse</legend>
		<div class="form-group">
			<label class="lead control-label" for="nombreUsuario">Usuario:</label>
			<input name="usuario[nombre]" autofocus type="text" class="form-control" id="nombreUsuario" placeholder="Nombre de usuario">
		</div>
		<div class="form-group">
			<label class="lead control-label" for="contrasena">Contraseña:</label>
			<input name="usuario[contrasena]" type="password" class="form-control" id="contrasena" placeholder="Contraseña">
		</div>
			<button class="btn btn-primary" type="submit">Entrar</button>
		</fieldset>
	</form>
</div>
