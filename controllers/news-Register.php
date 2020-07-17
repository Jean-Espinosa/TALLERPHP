<?php

    require_once 'models/aulaModel.php';
    
    $aula = new aula;
    $message='';

    if (!$aula->validate($views[2])) {
        header('location: ' . URL . 'home');
    } else {
        $aula->setAula($views[2]);
    }

    if (!empty($_POST)) {
        $message='<div class="alert alert-success p-2 m-0">Se registró la novedad</div>';
    }

?>