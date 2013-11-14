<center>
<h1><strong><i>Listado de clientes</i></strong></h1>

<form method="POST" action="<?php echo url_for('cliente/create') ?>">
	<input type="hidden" name="cliente[<?php echo $form->getCSRFFieldName() ?>]" value="<?php echo $form->getCSRFToken() ?>"/>
	<table class="table table-bordered table-hover table-condensed" style="width: 80%">
	  <thead>
		<tr>
		  <th>Nombre</th>
		  <th>Teléfono</th>
		  <th>Acción</th>
		</tr>
	  </thead>
	  <tbody>
		<tr>
			<td><input name="cliente[nombre]" class="form-control" type="text"/></td>
			<td><input name="cliente[telefono]" class="form-control" type="text"/></td>
			<td><button class="btn btn-success btn-block" type="submit">Agregar</button></td>
		</tr>
		<?php foreach($clientes as $cliente): ?>
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
</form>
<div align="left" style="width: 80%">
	<a href="<?php echo url_for('cliente/index?pg='. ($pagina-1)) ?>"><- Anterior</a>
</div>
<div align="right" style="width: 80%">
	<a href="<?php echo url_for('cliente/index?pg='. ($pagina+1)) ?>">Siguiente -></a>
</div>

</center>
