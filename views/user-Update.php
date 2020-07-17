<?php
    include 'controllers/user-Update.php';

    if ($views[2] <> $user->getData('id')) {
        header('location: ' . URL . 'home/userUpdate/' . $user->getData('id'));
    }
?>
<h2>Actualizar usuario</h2>
<?php echo $message ?>
<div class="my-3">
    <div class="card">
        <h5 class="card-header text-center"><?php echo $user->getData('id'); ?></h5>
        <div class="card-body">
            <form method="POST" action="">
                <div class="row">
                    <div class="form-group col-6">
                        <input class="form-control" type="hidden" name="id" value="<?php echo $user->getData('id') ?>">
                        <label>Nombre:</label>
                        <input class="form-control" type="text" name="name" value="<?php echo $user->getData('nombre') ?>" autocomplete="off">
                    </div>
                    <div class="form-group col-6">
                        <label>Apellido:</label>
                        <input class="form-control" type="text" name="second" value="<?php echo $user->getData('apellido') ?>" autocomplete="off">
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-6">
                        <label>Correo electrónico:</label>
                        <input class="form-control" type="text" name="email" value="<?php echo $user->getData('correo') ?>" autocomplete="off">
                    </div>
                    <div class="form-group col-6">
                        <label>Contraseña:</label>
                        <input class="form-control" type="text" name="pass" value="<?php echo $user->getData('clave') ?>" autocomplete="off">
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-6">
                        <label>Cargo:</label>
                        <input class="form-control" type="text" name="position" value="<?php echo $user->getData('cargo') ?>" readonly>
                    </div>
                    <div class="form-group col-6 d-flex align-items-end"> 
                        <input class="form-control btn btn-success" type="submit" name="" value="Actualizar">
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>