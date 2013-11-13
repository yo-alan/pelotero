<script type="text/javascript">
$('#filtro').change(function(){
    document.forms['form_filtro'].submit();
});
</script>
<div class="container">
	<form id="form_filtro" method="POST" action="<?php url_for('reserva/index') ?>" class="form-inline">
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
