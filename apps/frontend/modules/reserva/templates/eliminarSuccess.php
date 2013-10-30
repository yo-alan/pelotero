<center><?php if(isset($exito) && $exito) include_partial('reserva/exito'); ?></center>
<center><?php if(isset($error) && $error) include_partial('reserva/error'); ?></center>
<h3>Eliminar reserva:</h3>
<div class="container" style="width: 40%">
	<form method="POST" action="eliminar" role="form">
		<label>Buscar reserva:</label>
		<div class="form-group">
			<input autofocus type="date" class="form-control" name="fecha">
		</div>
		<button class="btn btn-default" class="btn btn-default" type="submit">Buscar</button>
	</form>
</div>
<?php if(isset($reservas) && !empty($reservas)): ?>
	<div class="container" style="width: 40%">
		<form method="POST" action="eliminar" role="form">
			<div class="form-group">
				<select class="form-control" name="reserva">
					<?php foreach($reservas as $reserva): ?>
					<option value="<?php echo $reserva->getId(); ?>"><?php echo $reserva->getCliente()->getNombre(). " | ". $reserva->getCliente()->getTelefono(). " | ". $reserva->getFecha(). " | ". $reserva->getHora(); ?></option>
					<?php endforeach; ?>
				</select>
			</div>
			<button class="btn btn-default" type="submit">Eliminar</button>
		</form>
	</div>
<?php elseif(isset($reservas) && empty($reservas)): ?>
	<h3 style="color: red">No hay reservas para este dia.</h3>
<?php endif; ?>
