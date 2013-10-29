<div class="container">
	<form method="POST" action="home" class="form-inline">
		<label>Filtrar por:</label>
		<div class="form-group">
			<select name="filtro" class="form-control">
				<option value="hoy">Hoy</option>
				<option value="semana">Semana</option>
				<option value="mes">Mes</option>
			</select>
		</div>
		<button type="submit" class="btn btn-default">Ver</button>
	</form>
	<?php if(isset($reservas)): ?>
	<table class="table table-hover">
		<tr class="success">
			<th>Cliente</th>
			<th>Telefono</th>
			<th>Dia</th>
			<th>Hora</th>
			<th>Seña</th>
		</tr>
		<?php
			foreach($reservas as $reserva):
		?>
		<tr>
			<td><?php echo $reserva['nombre']; ?></td>
			<td><?php echo $reserva['telefono']; ?></td>
			<td><?php echo $reserva['fecha']; ?></td>
			<td><?php echo $reserva['hora']; ?></td>
			<td><?php echo $reserva['senia']; ?></td>
		</tr>
		<?php endforeach; ?>
		
	</table>
	<?php endif; ?>
</div>
