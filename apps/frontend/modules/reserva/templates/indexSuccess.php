<div class="container">
	<table class="table table-bordered table-stripped">
		<th>
			<td>Domingo</td>
			<td>Lunes</td>
			<td>Martes</td>
			<td>Miércoles</td>
			<td>Jueves</td>
			<td>Viernes</td>
			<td>Sábado</td>
		</th>
		<?php foreach($reservas as $reserva): ?>
		<tr>
			<td>Hora</td>
			<td><?php echo $reserva->getCliente()->getNombre(); ?></td>
			<td><?php echo $reserva->getCliente()->getTelefono(); ?></td>
			<td><?php echo $reserva->getFecha(); ?></td>
			<td><?php echo $reserva->getHora(); ?></td>
			<td><?php echo $reserva->get; ?></td>
			<td><?php echo $reserva[]; ?></td>
			<td><?php echo $reserva[]; ?></td>
		</tr>
		<?php endforeach; ?>
	</table>
</div>
