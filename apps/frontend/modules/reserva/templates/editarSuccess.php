<center><?php if(isset($exito) && $exito) include_partial('reserva/exito'); ?></center>
<h3>Editar reserva:</h3>
<div class="container" style="width: 40%">
	<form method="POST" action="../web/editarReserva.php">
		<label>Fecha:</label>
		<div class="form-group">
			<input class="form-control" type="date" name="dia">
		</div>
		<button type="submit" class="btn btn-default">Buscar</button>
	</form>
	<?php if(isset($reservas)): ?>
	<form method="POST" action="../web/editarReserva.php">
		<select class="form-control" name="reserva">
			<?php foreach($reservas as $reserva): ?>
			<option value="<?php echo $reserva['id']; ?>"><?php echo $reserva['cliente']. " | ". $reserva['fecha']. " | ". $reserva['hora']; ?></option>
			<?php endforeach; ?>
		</select>
		<button type="submit" class="btn btn-default">Editar</button>
	</form>
	<?php elseif(isset($reservaAEditar)): ?>
	<form method="POST" action="../web/editarReserva.php">
		<label>Fecha:</label>
		<div class="form-group">
			<input class="form-control" type="date" name="fecha" value="<?php echo $reservaAEditar['fecha']; ?>">
		</div>
		<label>Hora:</label>
		<div class="form-group">
			<select name="hora" class="form-control">
				<option value="9:00">9:00</option>
				<option value="13:00">13:00</option>
				<option value="15:00">15:00</option>
				<option value="17:00">17:00</option>
				<option value="19:00">19:00</option>
				<option value="21:00">21:00</option>
			</select>
		</div>
		<label>Vigente:</label>
		<div class="form-group">
			<select class="form-control" name="vigente">
				<option value="si">Si</option>
				<option value="no">No</option>
			</select>
		</div>
		<button type="submit" class="btn btn-default">Guardar cambios</button>
	</form>
	<?php endif; ?>
</div>
