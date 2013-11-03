<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>

<form action="<?php echo url_for('cliente/'.($form->getObject()->isNew() ? 'create' : 'update').(!$form->getObject()->isNew() ? '?id='.$form->getObject()->getId() : '')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
<?php if (!$form->getObject()->isNew()): ?>
<input type="hidden" name="sf_method" value="put"/>
<?php endif; ?>
<div align="center">
  <table class="table table-bordered table-hover" style="width: 80%">
	<tfoot>
	  <tr>
		<td colspan="2">
		  <?php echo $form->renderHiddenFields(false) ?>
		  <a class="btn btn-default" href="<?php echo url_for('cliente/index') ?>"><i class="glyphicon glyphicon-chevron-left"></i><strong> Volver</strong></a>
		  <input class="btn btn-primary" type="submit" value="Guardar"/>
		</td>
	  </tr>
	</tfoot>
	<tbody>
	  <?php echo $form->renderGlobalErrors() ?>
	  <tr>
		<th><?php echo $form['nombre']->renderLabel() ?></th>
		<td>
		  <?php echo $form['nombre']->renderError() ?>
		  <?php echo $form['nombre'] ?>
		</td>
	  </tr>
	  <tr>
		<th><?php echo $form['telefono']->renderLabel() ?></th>
		<td>
		  <?php echo $form['telefono']->renderError() ?>
		  <?php echo $form['telefono'] ?>
		</td>
	  </tr>
	</tbody>
  </table>
</div>
</form>
