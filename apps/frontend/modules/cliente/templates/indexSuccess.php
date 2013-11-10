<center>

<h1><strong><i>Listado de clientes</i></strong></h1>

<table class="table table-bordered table-hover table-condensed" style="width: 80%">
  <thead>
	<tr>
	  <th>Nombre</th>
	  <th>Telefono</th>
	  <th>Acción</th>
	</tr>
  </thead>
  <tbody>
	<tr>
		<td><input name="cliente[nombre]" autofocus class="form-control" type="text"/></td>
		<td><input name="cliente[telefono]" class="form-control" type="text"/></td>
<!--
		<td><a class="btn btn-success btn-block" href="<?php echo url_for('cliente/create') ?>">Agregar</a></td>
-->
		<td><?php echo link_to('Agregar', 'cliente/create', array('class' => 'btn btn-success btn-block', 'method' => 'post')); ?>
		</td>
	</tr>
	<?php foreach ($clientes as $cliente): ?>
	<tr>
	  <td><?php echo $cliente->getNombre() ?></td>
	  <td><?php echo $cliente->getTelefono() ?></td>
	  <td>
		  <div class="btn btn-group btn-block">
			  <a class="btn btn-default" title="Editar cliente" href="<?php echo url_for('cliente/edit?id='.$cliente->getId()) ?>"><i class="glyphicon glyphicon-pencil"></i></a>
			  <?php echo link_to('<i class="glyphicon glyphicon-trash"></i>',
								'cliente/delete?id='.$cliente->getId(),
								array('class' => 'btn btn-danger ', 'method' => 'delete', 'confirm' => '¿Estás seguro de querer eliminar este cliente?')); ?>
		  </div>
	  </td>
	</tr>
	<?php endforeach; ?>
  </tbody>
</table>

<a href="#"><- Anterior</a>

<a href="#">Siguiente -></a>

</center>
