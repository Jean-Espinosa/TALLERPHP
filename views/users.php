<div class="my-3 container-fluid">
    <div class="mb-3 border-bottom row d-flex justify-content-between">
        <div class="col-6">
            <h2>Usuarios</h2>
        </div>
        <div class="col-6 d-flex align-items-center mb-3">
            <input class="form-control mr-sm-2" type="text" placeholder="Buscar" name="search" id="search">
            <button class="btn btn-primary my-2 my-sm-0 mx-1"><i class="fas fa-search"></i></button>
            <button class="btn btn-success my-2 my-sm-0 mx-1"><i class="fas fa-user-plus"></i></button>
        </div>
    </div>
    <!--<table class="table table-bordered table-striped table-hover my-3">
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
        <tbody>
            <?php

                $db /*= new database;
                $query = $db->executeQuery('SELECT*FROM usuario');
                
                $data = $query->fetch_all(MYSQLI_ASSOC);

                foreach ($data as $key => $value) {
                    echo '<tr>
                            <td>' . $value['idUsuario'] . '</td>
                            <td>' . $value['Nombre'] . '</td>
                            <td>' . $value['Apellido'] . '</td>
                            <td>' . $value['Correo'] . '</td>
                            <td>' . $value['Cargo'] . '</td>
                            <td class="d-flex justify-content-center px-0">
                                <button class="btn btn-danger mx-2"><i class="fas fa-trash"></i></button> 
                                <button class="btn btn-warning mx-2"><i class="fas fa-edit"></i></button>
                            </td>
                         </tr>';
                }*/

            ?>
        </tbody>
    </table>-->
    <div id="searchBox">
        
    </div>
    <script src="<?php echo URL ?>assets/js/jquery.min.js"></script>
    <script src="<?php echo URL?>assets/js/liveSearch.js"></script>
    
</div>