<?php
require_once 'controllers/news-Register.php';
?>
<h2>Ingresar novedad</h2>
<div class="my-3">
    <div class="card">
        <h5 class="card-header text-center">Aula <b><?php echo $views[2] ?></b></h5>
        <div class="card-body p-4">
            <form method="POST" action="" class="container row justify-content-between m-0">
                <div class="col-8">
                    <h6>Datos del usuario:</h6>
                    <div class="row border p-3 mb-2">
                        <div class="col-6">
                            <label>ID del usuario:</label>
                            <input class="form-control" type="text" name="" readonly value="<?php echo $user->getData('id') ?>">
                        </div>
                        <div class="col-6">
                            <label>Nombre y apellido:</label>
                            <input class="form-control" type="text" name="" readonly value="<?php echo $user->getData('nombre') . ' ' . $user->getData('apellido') ?>">
                        </div>
                    </div>
                    <label>Datos del aula:</label>
                    <div class="row border p-3">
                        <div class="col-6">
                            <label>ID del aula:</label>
                            <input class="form-control" type="text" name="" readonly value="<?php echo $aula->getData('id') ?>">
                        </div>
                        <div class="col-6">
                            <label>Docente a cargo:</label>
                            <input class="form-control" type="text" name="" readonly value="<?php echo $aula->getData('userNombre') . ' ' . $aula->getData('userApellido') ?>">
                        </div>
                    </div>
                </div>
                <div class="col-4">
                    <div class="form-group">
                        <h6>Descripción:</h6>
                        <textarea class="form-control" name="desc" rows="5"></textarea>
                    </div>
                    <div class="form-group d-flex justify-content-end">
                        <input type="submit" value="Registrar novedad" class="btn btn-primary w-100">
                    </div>
                    <?php echo $message ?>
                </div>
            </form>
        </div>
    </div>
</div>