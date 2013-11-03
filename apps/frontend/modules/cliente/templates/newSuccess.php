<h1>Agregar cliente</h1>
<?php if($sf_user->hasFlash('error')):?>
		<center><?php include_partial('global/error', array('mensaje' => $sf_user->getFlash('error')));?></center>
<?php endif; ?>
<?php include_partial('form', array('form' => $form)) ?>
