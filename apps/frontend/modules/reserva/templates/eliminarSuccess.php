<center><?php if(isset($exito) && $exito) include_partial('reserva/exito'); ?></center>
<h3>Eliminar reserva:</h3>
<div class="container" style="width: 40%">
	<form method="POST" action="eliminar" role="form">
		<div class="form-group">
			<input type="hidden" name="buscarReserva">
		</div>
		<label>Buscar reserva:</label>
		<div class="form-group">
			<input autofocus type="date" class="form-control" name="dia">
		</div>
		<button class="btn btn-default" class="btn btn-default" type="submit">Buscar</button>
	</form>
</div>
<?php if(isset($reservas) && !empty($reservas)): ?>
	<div class="container" style="width: 40%">
		<form method="POST" action="../web/eliminarReserva.php" role="form">
			<div class="form-group">
				<input type="hidden" class="form-control" name="eliminarReserva">
			</div>
			<div class="form-group">
				<select class="form-control" name="reserva">
					<?php foreach($reservas as $reserva): 
							$cliente = Cliente::getCliente($conexion, $reserva['cliente']);
					?>
					<option value="<?php echo $reserva['id']; ?>"><?php echo $cliente['nombre']. " | ". $cliente['telefono']. " | ". $reserva['fecha']. " | ". $reserva['hora']; ?></option>
					<?php endforeach; ?>
				</select>
			</div>
			<button class="btn btn-default" type="submit">Eliminar</button>
		</form>
	</div>
<?php elseif(isset($reservas) && empty($reservas)): ?>
	<h3 style="color: red">No hay reservas para este dia.</h3>
<?php endif; ?>

