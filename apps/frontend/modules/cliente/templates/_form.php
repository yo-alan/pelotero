<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>

<form action="<?php echo url_for('cliente/'.($form->getObject()->isNew() ? 'create' : 'update').(!$form->getObject()->isNew() ? '?id='.$form->getObject()->getId() : '')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
<?php if (!$form->getObject()->isNew()): ?>
<input type="hidden" name="sf_method" value="put"/>
<?php endif; ?>
<div class="container" align="center">
	<?php echo $form; ?>
	<div class="form-group">
		<button class="btn btn-primary" type="submit">Agregar</button>
	</div>
</div>
</form>
