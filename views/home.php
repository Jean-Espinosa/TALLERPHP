<!DOCTYPE html>
<html lang="en">

<head>
	<title>SGAF</title>
	<?php include 'views/includes/link.html' ?>
</head>

<body class="bg-gradient-light">

	<div class="container-fluid bg-white border-bottom py-2">
		<div class="row">
			<div class="col-7">
				<a href="<?php echo URL ?>home" class="d-flex align-items-center ml-4" style="width: fit-content">
					<img src="<?php echo URL ?>/assets/img/logo.png" class="cimg mr-3 img-thumbnail">
					<h2 class="text-body link-color">Sistema Gestor <br> de Ambientes de Formación</h2>
				</a>
			</div>
			<div class="col-5 d-flex justify-content-end align-items-center">

				<?php if ($pos) {
					echo '<div class="px-3 border-right border-secondary">
							<a href="' . URL . 'home/users" class="mx-1">
								<button class="btn btn-outline-primary">Usuarios</button>
							</a>
							<a href="#" class="mx-1">
								<button class="btn btn-outline-primary">Aulas</button>
							</a>
						</div>';
				}
				?>
				<div class="px-3 head">
					<a href="<?php echo URL ?>home/user-Update/<?php echo $user->getData('id') ?>" class="mx-1">
						<button class="btn btn-primary"><i class="fas fa-user mr-1"></i>
							<p>Usuario</p>
						</button>
					</a>
					<a onclick="javascript:return confirm('¿Está seguro de cerrar sesión?');" href="<?php echo URL ?>logout" class="mx-1">
						<button class="btn btn-info"><i class="fas fa-sign-out-alt"></i>
							<p>Salir</p>
						</button>
					</a>
				</div>
			</div>
		</div>
	</div>

	<main class="bg-white container rounded p-3 my-4 border d-flex flex-column align-items-center min-vh-50 shadow">
		<?php require_once 'controllers/routes.php'; ?>
	</main>

	<?php include 'views/includes/footer.html' ?>

</body>

</html>