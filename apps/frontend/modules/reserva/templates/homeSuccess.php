<div class="container">
	<form method="POST" action="../web/home.php" class="form-inline">
		<label>Filtrar por:</label>
		<div class="form-group">
			<select name="filtro" class="form-control">
				<option value="<?php echo "hoy"; ?>">Hoy</option>
				<option value="<?php echo "semana"; ?>">Semana</option>
				<option value="<?php echo "mes"; ?>">Mes</option>
			</select>
		</div>
		<button type="submit" class="btn btn-default">Ver</button>
	</form>
	<?php if(isset($_reservas)): ?>
	<table class="table table-hover">
		<tr class="success">
			<th>Cliente</th>
			<th>Telefono</th>
			<th>Dia</th>
			<th>Hora</th>
			<th>Seña</th>
		</tr>
		<?php
			foreach($_reservas as $reserva):
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
