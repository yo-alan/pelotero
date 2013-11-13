<div class="container">
	<form method="POST" action="<?php url_for('reserva/index') ?>" class="form-inline">
		<label>Filtrar por:</label>
		<div class="form-group">
			<select name="filtro" onchange="this.form.submit()" class="form-control">
				<option <?php if($filtro == "hoy") echo "selected "; ?> value="hoy">Hoy</option>
				<option <?php if($filtro == "semana") echo "selected "; ?>value="semana">Semana</option>
				<option <?php if($filtro == "mes") echo "selected "; ?>value="mes">Mes</option>
			</select>
		</div>
	</form>
	<?php if(isset($reservas)): ?>
	<table class="table table-bordered table-hover table-condensed">
		<thead>
			<tr>
				<th>Cliente</th>
				<th>Telefono</th>
				<th>Dia</th>
				<th>Hora</th>
				<th>Seña</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach($reservas as $reserva): ?>
			<tr class="<?php echo ($reserva['vigente'] == true) ? "success" : "danger"; ?>">
				<td><?php echo $reserva['nombre']; ?></td>
				<td><?php echo $reserva['telefono']; ?></td>
				<td><?php echo $reserva['fecha']; ?></td>
				<td><?php echo $reserva['hora']; ?></td>
				<td><?php echo $reserva['senia']; ?></td>
			</tr>
			<?php endforeach; ?>
		</tbody>
	</table>
	<?php endif; ?>
</div>
