<?php if($sf_user->hasFlash('exito')): ?>
		<center><?php include_partial('global/exito', array('mensaje' => $sf_user->getFlash('exito')));?></center>
<?php elseif($sf_user->hasFlash('error')): ?>
		<center><?php include_partial('global/error', array('mensaje' => $sf_user->getFlash('error')));?></center>
<?php endif;?>
<div class="container" style="width: 40%" align="center">
	<h3><strong>Agregar reserva:</strong></h3>
	<form method="POST" action="<?php echo url_for('reserva/agregar') ?>" class="form-horizontal" role="form">
		<div class="form-group<?php echo $errorNombre ? " has-error" : ""; ?>">
			<label class="col-lg-2 control-label">Nombre:</label>
			<div class="col-lg-10">
				<input autofocus type="text" class="form-control" name="cliente[nombre]" placeholder="Nombre del cliente">
			</div>
		</div>
		<div class="form-group<?php echo $errorTelefono ? " has-error" : ""; ?>">
			<label class="col-lg-2 control-label">Telefono:</label>
			<div class="col-lg-10">
				<input type="text" class="form-control" name="cliente[telefono]" placeholder="Telefono del cliente">
			</div>
		</div>
		<div class="form-group<?php echo $errorSenia ? " has-error" : ""; ?>">
			<label class="col-lg-2 control-label">Seña:</label>
			<div class="col-lg-10">
				<input type="text" class="form-control" name="reserva[senia]" placeholder="Monto de la seña">
			</div>
		</div>
		<div class="form-group<?php echo $errorFecha ? " has-error" : ""; ?>">
			<label class="col-lg-2 control-label">Dia:</label>
			<div class="col-lg-10">
				<input type="date" class="form-control" name="reserva[fecha]" value="<?php echo $fecha ?>">
			</div>
		</div>
		<div class="form-group<?php echo $errorHora ? " has-error" : ""; ?>">
			<label class="col-lg-2 control-label">Hora:</label>
			<div class="col-lg-10">
				<select name="reserva[hora]" class="form-control">
					<option <?php if($hora == '9:00') echo "selected='selected'"?> value="9:00">9:00</option>
					<option <?php if($hora == '13:00') echo "selected='selected'"?> value="13:00">13:00</option>
					<option <?php if($hora == '15:00') echo "selected='selected'"?> value="15:00">15:00</option>
					<option <?php if($hora == '17:00') echo "selected='selected'"?> value="17:00">17:00</option>
					<option <?php if($hora == '19:00') echo "selected='selected'"?> value="19:00">19:00</option>
					<option <?php if($hora == '21:00') echo "selected='selected'"?> value="21:00">21:00</option>
				</select>
			</div>
		</div>
		<button type="submit" class="btn btn-default">Agregar</button>
		</fieldset>
	</form>
</div>
