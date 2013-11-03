<?php if($sf_user->hasFlash('reservaError')): ?>
		<center><?php include_partial('global/error', array('mensaje' => $sf_user->getFlash('reservaError')));?></center>
<?php endif;?>
<?php if($sf_user->hasFlash('operacionExitosa')): ?>
		<center><?php include_partial('global/exito', array('mensaje' => $sf_user->getFlash('operacionExitosa')));?></center>
<?php endif;?>
<div class="container" style="width: 40%" align="center">
	<h3><strong>Eliminar reserva:</strong></h3>
	<form method="POST" action="eliminar" role="form">
		<label>Buscar reserva:</label>
		<div class="form-group">
			<input autofocus type="date" class="form-control" name="fecha">
		</div>
		<button class="btn btn-default" class="btn btn-default" type="submit">Buscar</button>
	</form>
</div>
<?php if(isset($reservas) && count($reservas) > 0): ?>
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
<?php elseif(isset($reservas)): ?>
	<h3 style="color: red">No hay reservas para este dia.</h3>
<?php endif; ?>
