<html>
	<head>
		<?php include_http_metas() ?>
		<?php include_metas() ?>
		<?php include_title() ?>
		<link rel="shortcut icon" href="/favicon.ico" />
		<?php include_stylesheets() ?>
		<?php include_javascripts() ?>
	</head>
	<body>
		<header>
			<div class="container">
				<a href="<?php echo url_for("reserva/index"); ?>" title="Pelotero"><img src="<?php echo image_path('logo.png'); ?>"/></a>
				<?php if($sf_user->isAuthenticated()): ?>
					<div class="btn-toolbar">
						<div class="btn-group">
							<a class="btn btn-primary" data-toggle="dropdown" data-hover="dropdown">
								Reservas <span class="caret"></span>
							</a>
							<ul class="dropdown-menu">
								<li><a href="<?php echo url_for("reserva/agregar"); ?>">Agregar reserva</a></li>
								<li><a href="<?php echo url_for("reserva/eliminar"); ?>">Eliminar reserva</a></li>
								<li><a href="<?php echo url_for("reserva/editar"); ?>">Editar reserva</a></li>
							</ul>
							<a class="btn btn-primary" href="<?php echo url_for("cliente/index"); ?>">Clientes</a>
						</div>
					</div>
				<?php endif; ?>
			</div>
			<div class="container">
				<?php if($sf_user->isAuthenticated()): ?>
				<p align="right"><a class="btn btn-primary" href="<?php echo url_for('reserva/cerrarSesion'); ?>">Cerrar sesión</a></p>
				<?php else: ?>
				<p align="right"><a class="btn btn-primary" href="<?php echo url_for('reserva/entrar'); ?>">Ingresar</a></p>
				<?php endif; ?>
			</div>
		</header>
		<article align="center">
			<?php echo $sf_content ?>
  		</article>
		<footer align="right">
			<p class="text-right">Página creada por Alan Marchán</p>
		</footer>
	</body>
</html>
