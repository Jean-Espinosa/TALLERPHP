<?php

if ($_GET['view'] <> 'home') {

    $views = explode('/', $_GET['view']);

    if ($views[1]=='users' AND !$pos) {

        header('location: ./');

    }else if (is_file('views/' . $views[1] . '.php')) {

        include 'views/'.$views[1].'.php';

    }else{
        
        header('location: '.URL.'home');
    }

}elseif ($_GET['view']=='home') {

    include 'views/aulas.php';

}




?>