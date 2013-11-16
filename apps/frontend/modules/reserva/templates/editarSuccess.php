<?php if($sf_user->hasFlash('exito')): ?>
		<center><?php include_partial('global/exito', array('mensaje' => $sf_user->getFlash('exito')));?></center>
<?php elseif($sf_user->hasFlash('error')): ?>
		<center><?php include_partial('global/error', array('mensaje' => $sf_user->getFlash('error')));?></center>
<?php endif;?>
<div class="container" style="width: 40%" align="center">
	<h3><strong>Editar reserva:</strong></h3>
	<?php if(isset($reservaParaEditar)): ?>
	<form method="POST" action="<?php echo url_for('reserva/editar'). "/id/". $reservaParaEditar->getId() ?>">
		<p class="lead text-left">Fecha:</p>
		<div class="form-group">
			<input class="form-control" type="date" name="fecha" value="<?php echo $reservaParaEditar->getFecha(); ?>">
		</div>
		<p class="lead text-left">Hora:</p>
		<div class="form-group">
			<select name="hora" class="form-control">
				<option <?php if($reservaParaEditar->getHora() == '9:00') echo "selected='selected'"; ?> value="9:00">9:00</option>
				<option <?php if($reservaParaEditar->getHora() == '13:00') echo "selected='selected'"; ?> value="13:00">13:00</option>
				<option <?php if($reservaParaEditar->getHora() == '15:00') echo "selected='selected'"; ?> value="15:00">15:00</option>
				<option <?php if($reservaParaEditar->getHora() == '17:00') echo "selected='selected'"; ?> value="17:00">17:00</option>
				<option <?php if($reservaParaEditar->getHora() == '19:00') echo "selected='selected'"; ?> value="19:00">19:00</option>
				<option <?php if($reservaParaEditar->getHora() == '21:00') echo "selected='selected'"; ?> value="21:00">21:00</option>
			</select>
		</div>
		<p class="lead text-left">Vigente:</p>
		<div class="form-group">
			<select class="form-control" name="vigente">
				<option <?php if($reservaParaEditar->getVigente() == true) echo "selected='selected'" ?> value="si">Si</option>
				<option <?php if($reservaParaEditar->getVigente() == false) echo "selected='selected'" ?> value="no">No</option>
			</select>
		</div>
		<button type="submit" class="btn btn-default">Guardar cambios</button>
	</form>
	<?php else: ?>
	<form method="POST" action="<?php echo url_for('reserva/editar') ?>">
		<label>Fecha:</label>
		<div class="form-group">
			<input autofocus class="form-control" type="date" name="fecha">
		</div>
		<button type="submit" class="btn btn-default">Buscar</button>
	</form>
	<?php if(isset($reservas)): ?>
	<form method="POST" action="<?php echo url_for('reserva/editar') ?>">
		<select class="form-control" name="reserva">
			<?php foreach($reservas as $reserva): ?>
			<option value="<?php echo $reserva->getId(); ?>"><?php echo $reserva->getCliente()->getNombre(). " | ". $reserva->getFecha(). " | ". $reserva->gethora(); ?></option>
			<?php endforeach; ?>
		</select>
		<button type="submit" class="btn btn-default">Editar</button>
	</form>
	<?php endif; ?>
	<?php endif; ?>
</div>
