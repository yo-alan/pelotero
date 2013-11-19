<div class="container">
	<table class="table table-bordered table-stripped table-hover">
		<thead>
			<tr>
				<th>Hora</th>
				<th>Domingo</th>
				<th>Lunes</th>
				<th>Martes</th>
				<th>Miércoles</th>
				<th>Jueves</th>
				<th>Viernes</th>
				<th>Sábado</th>
			</tr>
		</thead>
		<tbody>
			<?php
				$horas = array('9:00','13:00','15:00','17:00','19:00','21:00');
				foreach($horas as $hora):
			?>
			<tr>
				<td><?php echo $hora; ?></td>
				<?php
					$i = 1;
					$semana = array('Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado');
					foreach($reservas as $reserva):
						if($reserva->getHora() == $hora):
				?>
							<td class="danger">
								<?php echo $reserva->getCliente()->getNombre(); ?>
								<br>
								<?php echo $reserva->getCliente()->getTelefono(); ?>
								<br>
								<?php echo $reserva->getFecha(); ?>
								<br>
								<?php echo $reserva->getHora(); ?>
							</td>
				<?php
						else:
				?>
						<td class="success">
							<a class="btn btn-success btn-block" href="<?php echo url_for('reserva/agregar') ?>">Agregar reserva</a>
						</td>
				<?php
						endif;
						$i++;
					endforeach; ?>
			</tr>
			<?php endforeach; ?>
		</tbody>
	</table>
</div>
