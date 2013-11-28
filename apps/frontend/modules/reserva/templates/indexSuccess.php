<div class="container">
	<table class="table table-bordered table-stripped table-hover">
		<thead>
			<tr>
				<th>Hora</th>
				<th><?php echo $primerDia['nombre'] ?></th>
				<th><?php echo $segundoDia['nombre'] ?></th>
				<th><?php echo $tercerDia['nombre'] ?></th>
				<th><?php echo $cuartoDia['nombre'] ?></th>
				<th><?php echo $quintoDia['nombre'] ?></th>
				<th><?php echo $sextoDia['nombre'] ?></th>
				<th><?php echo $septimoDia['nombre'] ?></th>
			</tr>
		</thead>
		<tbody>
			<?php
				$horas = array('9:00','13:00','15:00','17:00','19:00','21:00');
				$horasSemana = array('15:00', '19:00');
				$semana = array('Lunes', 'Martes', 'Miercoles', 'Jueves', 'Viernes');
				
				foreach($horas as $hora):
			?>
			<tr>
				<td><?php echo $hora; ?></td>
				<?php
					$entre = false;
					$dia_correcto = false;
					
					if(in_array($primerDia['nombre'], $semana) && in_array($hora, $horasSemana)):
						$dia_correcto = true;
					elseif(!in_array($primerDia['nombre'], $semana) && !in_array($hora, $horasSemana)):
						$dia_correcto = true;
					endif;
					
					if($dia_correcto):
						
						foreach($reservasPrimerDia as $reserva):
							
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
					<?php endforeach; ?>
					
					<?php if($entre == false): //Convertir esto en un partial?>
							<td class="success">
								<br>
								<a class="btn btn-success btn-block" href="<?php echo url_for('reserva/agregar'). "?fecha=". $primerDia['fecha']. "&hora=". $hora ?>">Agregar reserva</a>
							</td>
						<?php else:
								$entre = false;
						endif;
					else: ?>
						<td class="warning">
							Horario
							<br>no
							<br>
							disponible
						</td>
				<?php endif;
					
					$dia_correcto = false;
					
					if(in_array($segundoDia['nombre'], $semana) && in_array($hora, $horasSemana)):
						$dia_correcto = true;
					elseif(!in_array($segundoDia['nombre'], $semana) && !in_array($hora, $horasSemana)):
						$dia_correcto = true;
					endif;
					
					if($dia_correcto):
						foreach($reservasSegundoDia as $reserva):
							
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
								<a class="btn btn-success btn-block" href="<?php echo url_for('reserva/agregar'). "?fecha=". $segundoDia['fecha']. "&hora=". $hora ?>">Agregar reserva</a>
							</td>
						<?php else:
								$entre = false;
						endif;
					else: ?>
						<td class="warning">
							Horario
							<br>no
							<br>
							disponible
						</td>
				<?php endif;
					
					$dia_correcto = false;
					
					if(in_array($tercerDia['nombre'], $semana) && in_array($hora, $horasSemana)):
						$dia_correcto = true;
					elseif(!in_array($tercerDia['nombre'], $semana) && !in_array($hora, $horasSemana)):
						$dia_correcto = true;
					endif;
					
					if($dia_correcto):
						
						foreach($reservasTercerDia as $reserva):
							
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
								<a class="btn btn-success btn-block" href="<?php echo url_for('reserva/agregar'). "?fecha=". $tercerDia['fecha']. "&hora=". $hora ?>">Agregar reserva</a>
							</td>
						<?php else:
								$entre = false;
						endif;
					else: ?>
						<td class="warning">
							Horario
							<br>no
							<br>
							disponible
						</td>
				<?php endif;
					
					$dia_correcto = false;
					
					if(in_array($cuartoDia['nombre'], $semana) && in_array($hora, $horasSemana)):
						$dia_correcto = true;
					elseif(!in_array($cuartoDia['nombre'], $semana) && !in_array($hora, $horasSemana)):
						$dia_correcto = true;
					endif;
					
					if($dia_correcto):
						
						foreach($reservasCuartoDia as $reserva):
							
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
								<a class="btn btn-success btn-block" href="<?php echo url_for('reserva/agregar'). "?fecha=". $cuartoDia['fecha']. "&hora=". $hora ?>">Agregar reserva</a>
							</td>
						<?php else:
								$entre = false;
						endif;
					else: ?>
						<td class="warning">
							Horario
							<br>no
							<br>
							disponible
						</td>
				<?php endif;
					
					$dia_correcto = false;
					
					if(in_array($quintoDia['nombre'], $semana) && in_array($hora, $horasSemana)):
						$dia_correcto = true;
					elseif(!in_array($quintoDia['nombre'], $semana) && !in_array($hora, $horasSemana)):
						$dia_correcto = true;
					endif;
					
					if($dia_correcto):
						
						foreach($reservasQuintoDia as $reserva):
							
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
								<a class="btn btn-success btn-block" href="<?php echo url_for('reserva/agregar'). "?fecha=". $quintoDia['fecha']. "&hora=". $hora ?>">Agregar reserva</a>
							</td>
						<?php else:
								$entre = false;
						endif;
					else: ?>
						<td class="warning">
							Horario
							<br>no
							<br>
							disponible
						</td>
				<?php endif;
					
					$dia_correcto = false;
					
					if(in_array($sextoDia['nombre'], $semana) && in_array($hora, $horasSemana)):
						$dia_correcto = true;
					elseif(!in_array($sextoDia['nombre'], $semana) && !in_array($hora, $horasSemana)):
						$dia_correcto = true;
					endif;
					
					if($dia_correcto):
						
						foreach($reservasSextoDia as $reserva):
							
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
								<a class="btn btn-success btn-block" href="<?php echo url_for('reserva/agregar'). "?fecha=". $sextoDia['fecha']. "&hora=". $hora ?>">Agregar reserva</a>
							</td>
						<?php else:
								$entre = false;
						endif;
					else: ?>
						<td class="warning">
							Horario
							<br>no
							<br>
							disponible
						</td>
				<?php endif;
					
					$dia_correcto = false;
					
					if(in_array($septimoDia['nombre'], $semana) && in_array($hora, $horasSemana)):
						$dia_correcto = true;
					elseif(!in_array($septimoDia['nombre'], $semana) && !in_array($hora, $horasSemana)):
						$dia_correcto = true;
					endif;
					
					if($dia_correcto):
						
						foreach($reservasSeptimoDia as $reserva):
							
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
								<a class="btn btn-success btn-block" href="<?php echo url_for('reserva/agregar'). "?fecha=". $septimoDia['fecha']. "&hora=". $hora ?>">Agregar reserva</a>
							</td>
						<?php else:
								$entre = false;
						endif;
						
					else: ?>
						<td class="warning">
							Horario
							<br>no
							<br>
							disponible
						</td>
					<?php endif; ?>
			</tr>
			<?php endforeach; ?>
		</tbody>
	</table>
</div>
