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
				<a href="<?php echo url_for("reserva/index"); ?>"><h1 style="color: green">PELOTERO <small>S.A.</small></h1></a>
			<!--<a href="<?php //echo url_for("reserva/index"); ?>" title="Pelotero"><img src="images/logo.png"/></a>-->
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
			</div>
			<div class="container">
				<?php if(!isset($_SESSION['usuario'])): ?>
				<form method="POST" action="<?php echo url_for('reserva/entrar'); ?>" class="form-inline" role="form" style="float: right">
					<label>Registrate:</label>
					<div class="form-group">
						<input autofocus type="text" class="form-control" name="usuario" placeholder="Usuario">
					</div>
					<div class="form-group">
						<input type="password" class="form-control" name="contrasena" placeholder="Contraseña">
					</div>
					<button type="submit" class="btn btn-primary">Entrar</button>
				</form>
				<?php else: ?>
				<p align="right"><a class="btn btn-primary" href="salir">Cerrar sesión</a></p>
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
