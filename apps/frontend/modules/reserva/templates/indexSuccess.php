<div class="container">
	<table class="table table-bordered table-stripped table-hover">
		<thead>
			<tr>
				<th>Hora</th>
				<th><?php echo $primerDia ?></th>
				<th><?php echo $segundoDia ?></th>
				<th><?php echo $tercerDia ?></th>
				<th><?php echo $cuartoDia ?></th>
				<th><?php echo $quintoDia ?></th>
				<th><?php echo $sextoDia ?></th>
				<th><?php echo $septimoDia ?></th>
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
					$entre = false;
					
					foreach($reservasDomingo as $reserva):
						
						if($reserva->getHora() == $hora):
						$entre = true;
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
					<?php endif; ?>
				
				<?php endforeach;
					
					if($entre == false): ?>
						<td class="success">
							<br>
							<a class="btn btn-success btn-block" href="<?php echo url_for('reserva/agregar') ?>">Agregar reserva</a>
						</td>
					<?php else:
							$entre = false;
					endif;
					
					foreach($reservasLunes as $reserva):
						
						if($reserva->getHora() == $hora):
							$entre = true;
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
					<?php endif; ?>
				
				<?php endforeach;
					
					if($entre == false): ?>
						<td class="success">
							<br>
							<a class="btn btn-success btn-block" href="<?php echo url_for('reserva/agregar') ?>">Agregar reserva</a>
						</td>
					<?php else:
							$entre = false;
					endif;
					
					foreach($reservasMartes as $reserva):
						
						if($reserva->getHora() == $hora):
						$entre = true;
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
					<?php endif; ?>
				
				<?php endforeach;
					
					if($entre == false): ?>
						<td class="success">
							<br>
							<a class="btn btn-success btn-block" href="<?php echo url_for('reserva/agregar') ?>">Agregar reserva</a>
						</td>
					<?php else:
							$entre = false;
					endif;
					
					foreach($reservasMiercoles as $reserva):
						
						if($reserva->getHora() == $hora):
						$entre = true;
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
					<?php endif; ?>
				
				<?php endforeach;
					
					if($entre == false): ?>
						<td class="success">
							<br>
							<a class="btn btn-success btn-block" href="<?php echo url_for('reserva/agregar') ?>">Agregar reserva</a>
						</td>
					<?php else:
							$entre = false;
					endif;
					
					foreach($reservasJueves as $reserva):
						
						if($reserva->getHora() == $hora):
						$entre = true;
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
					<?php endif; ?>
				
				<?php endforeach;
					
					if($entre == false): ?>
						<td class="success">
							<br>
							<a class="btn btn-success btn-block" href="<?php echo url_for('reserva/agregar') ?>">Agregar reserva</a>
						</td>
					<?php else:
							$entre = false;
					endif;
					
					foreach($reservasViernes as $reserva):
						
						if($reserva->getHora() == $hora):
						$entre = true;
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
					<?php endif; ?>
				
				<?php endforeach;
					
					if($entre == false): ?>
						<td class="success">
							<br>
							<a class="btn btn-success btn-block" href="<?php echo url_for('reserva/agregar') ?>">Agregar reserva</a>
						</td>
					<?php else:
							$entre = false;
					endif;
					
					foreach($reservasSabado as $reserva):
						
						if($reserva->getHora() == $hora):
						$entre = true;
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
					<?php endif; ?>
				
				<?php endforeach;
					
					if($entre == false): ?>
						<td class="success">
							<br>
							<a class="btn btn-success btn-block" href="<?php echo url_for('reserva/agregar') ?>">Agregar reserva</a>
						</td>
					<?php else:
							$entre = false;
					endif;
				?>
			</tr>
			<?php endforeach; ?>
		</tbody>
	</table>
</div>
