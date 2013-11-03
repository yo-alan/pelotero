<h1><strong><i>Listado de clientes</i></strong></h1>

<div align="center">
	<table class="table table-striped table-bordered table-hover" style="width: 80%">
	  <thead>
		<tr>
		  <th>Nombre</th>
		  <th>Telefono</th>
		  <th>Acción</th>
		</tr>
	  </thead>
	  <tbody>
		<?php foreach ($clientes as $cliente): ?>
		<tr>
		  <td><?php echo $cliente->getNombre() ?></td>
		  <td><?php echo $cliente->getTelefono() ?></td>
		  <td>
			  <div class="btn btn-group">
				  <a class="btn btn-default btn-sm" title="Editar cliente" href="<?php echo url_for('cliente/edit?id='.$cliente->getId()) ?>"><i class="glyphicon glyphicon-pencil"></i></a>
				  <a class="btn btn-danger btn-sm" title="Eliminar cliente" href="<?php echo url_for('cliente/delete?id='.$cliente->getId(), array('method' => 'delete', 'confirm' => 'Are you sure?')) ?>"><i class="glyphicon glyphicon-trash"></i></a>
			  </div>
		  </td>
		</tr>
		<?php endforeach; ?>
	  </tbody>
	  <tfoot>
		<td colspan="3">*Ultimos 10 clientes</td>
	  </tfoot>
	</table>
</div>


<a class="btn btn-primary btn-lg" href="<?php echo url_for('cliente/new') ?>">Agregar cliente</a>
