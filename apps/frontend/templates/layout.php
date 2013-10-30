<html>
	<head>
		<?php include_http_metas() ?>
		<?php include_metas() ?>
		<?php include_title() ?>
		<link rel="shortcut icon" href="/favicon.ico" />
		<?php include_stylesheets() ?>
		<?php include_javascripts() ?>
		<?php use_javascript('jquery')?>
	</head>
	<body>
		<header>
			<div class="container">
				<a href="home"><h1 style="color: green">PELOTERO S.A.</h1></a>
				<div class="btn-toolbar">
					<div class="btn-group">
						<button class="btn dropdown-toggle" data-toggle="dropdown" data-hover="dropdown">
							Reservas <span class="caret"></span>
						</button>
						<ul class="dropdown-menu">
							<li><a href="agregar">Agregar reserva</a></li>
							<li><a href="eliminar">Eliminar reserva</a></li>
							<li><a href="editar">Editar reserva</a></li>
						</ul>
					</div>
					<div class="btn-group">
						<button class="btn dropdown-toggle" data-toggle="dropdown" data-hover="dropdown">
							Clientes <span class="caret"></span>
						</button>
						<ul class="dropdown-menu">
							<li><a href="../web/agregarReserva.php">Buscar cliente</a></li>
							<li><a href="../web/eliminarReserva.php">Eliminar cliente</a></li>
							<li><a href="../web/editarReserva.php">Editar cliente</a></li>
						</ul>
					</div>
				</div>
			</div>
			<div class="container">
				<?php if(!isset($_SESSION['usuario'])): ?>
				<form method="POST" action="logIn" class="form-inline" role="form" style="float: right">
					<label>Registrate:</label>
					<div class="form-group">
						<input autofocus type="text" class="form-control" name="usuario" placeholder="Usuario">
					</div>
					<div class="form-group">
						<input type="password" class="form-control" name="contrasena" placeholder="Contraseña">
					</div>
					<button type="submit" class="btn btn-default">Entrar</button>
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
			<p>Página creada por Alan Marchán</p>
		</footer>
	</body>
</html>
