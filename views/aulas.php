<h2>Ambientes de formación</h2>
<div class="container row d-flex justify-content-between">
    <?php

    $db = new database;
    $data = $db->getTableData('aula_user');

    foreach ($data as $key => $value) {
        echo '<div class="card border-secondary shadow-sm col-3 m-3 p-0" style="max-width: 18rem;">
                <div class="card-header text-center"><h4 class="m-0">'.$value['idAula'].'</h4></div>
                <div class="card-body text-dark">
                <h5 class="card-title">'.$value['Nombre'].'</h5>
                <a href="' . URL . 'home/aula/' . $value['idAula'] . '" class="btn btn-success btn-sm d-flex justify-content-center  mb-2">Ingresar novedad</a>
                <a href="' . URL . 'home/aula/' . $value['idAula'] . '" class="btn btn-info btn-sm d-flex justify-content-center ">Consultar</a>
                </div>
            </div>  ';
    }
    ?>
</div>