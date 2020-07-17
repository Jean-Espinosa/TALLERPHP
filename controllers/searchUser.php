<?php

    require_once './../models/dbModel.php';
    $db = new database;
    $mysqli = $db->connect();

    $printOut = "";
    $sql = 'SELECT*FROM usuario';
    

    if (isset($_POST['consulta'])) {
        
        $q = $mysqli->real_escape_string($_POST['consulta']);
        $sql = "SELECT*FROM usuario WHERE Nombre LIKE '%" . $q . "%'
                OR apellido LIKE '%" . $q . "%' 
                OR idUsuario LIKE '%" . $q . "%' 
                OR Correo LIKE '%" . $q . "%' 
                OR Cargo LIKE '%" . $q . "%' ";
    }

    $query = $db->executeQuery($sql);

    if ($query->num_rows>0) {
        
        $printOut .= ' <table class="table table-bordered table-striped table-hover my-3">
                            <thead class=" thead-dark">
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">First</th>
                                    <th scope="col">Last</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Position</th>
                                    <th scope="col">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>';
        
        while ($con = $query->fetch_assoc()) {
            $printOut .= '<tr>
                            <td>' . $con['idUsuario'] . '</td>
                            <td>' . $con['Nombre'] . '</td>
                            <td>' . $con['Apellido'] . '</td>
                            <td>' . $con['Correo'] . '</td>
                            <td>' . $con['Cargo'] . '</td>
                            <td class="d-flex justify-content-center px-0">
                                <button class="btn btn-danger mx-2"><i class="fas fa-trash"></i></button> 
                                <button class="btn btn-warning mx-2"><i class="fas fa-edit"></i></button>
                            </td>
                         </tr>';
        }

        $printOut .= '</tbody></table>';

    }else{
        $printOut .= '<table class="table table-bordered table-striped table-hover my-3">
                            <thead class=" thead-dark">
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">First</th>
                                    <th scope="col">Last</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Position</th>
                                    <th scope="col">Acciones</th>
                                </tr>
                            </thead>
                            <tbody></tbody></table>';
    }

    echo $printOut;
?>