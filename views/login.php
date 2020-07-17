<!DOCTYPE html>
<html>

<head>
	<title>Inicio | SGAF</title>
	<?php include 'views/includes/link.html' ?>
</head>

<body class="bg-light">
	<div class="login p-3 border rounded d-flex flex-column align-items-center shadow">
		<img class="img-fluid cimg" src="<?php URL ?>assets/img/logo.png">
		<form action="" method="POST" class="d-inline-flex flex-column">
			<div class="form-group">
				<label class="m-0">Correo electrónico:</label>
				<div class="group-icon d-flex align-items-center rounded">
					<i class="fas fa-user p-2"></i>
					<input type="text" class="p-1" placeholder="Ej: pepito@example.com" name="email" autocomplete="off">
				</div>
			</div>
			<div class="form-group">
				<label class="m-0">Contraseña:</label>
				<div class="group-icon d-flex align-items-center rounded">
					<i class="fas fa-key p-2"></i>
					<input type="text" class="p-1" placeholder="Ej: 12345" name="pass" autocomplete="off">
				</div>
			</div>
			<?php echo $message ?>
			<button type="submit" class="btn btn-primary centro">Ingresar</button>
		</form>
	</div>
	<?php include 'views/includes/jslinks.html' ?>
</body>

</html>