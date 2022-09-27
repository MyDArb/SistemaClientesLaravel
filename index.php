<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round|Open+Sans">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <title>Lista de Clientes</title>
</head>

<body>

    <div class="container">

        <div class="table-wrapper">
            <div class="table-title">
                <div class="col-sm-8">
                    <h2>Datos de <strong>Clientes</strong></h2>
                </div>
                <div class="col-sm-4">
                    <a href="create.php" class="btn btn-success add-new"><i class="fa fa-plus"></i> Agregar Nuevo Cliente</a>
                </div>
            </div>
        </div>


        <hr />
        <br />
        <div class="row">
            <?php
            // Inicializando la variable global $_SESSION[]
            session_start();
            if (isset($_SESSION['mensaje'])) {
            ?>
                <div class="alert alert-warning">
                    <!-- Mostrando la variable mensaje -->
                    <?php echo $_SESSION['mensaje']; ?>
                </div>
                <!-- Destruyendo la variable mensaje -->
            <?php
                unset($_SESSION['mensaje']);
                
            }
            ?>
        </div>


        <div class="row">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>NOMBRE</th>
                        <th>APELLIDO</th>
                        <th>DIRECCION</th>
                        <th>TELEFONO</th>
                        <th>CORREO</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    require 'data.php';
                    $datos = new Data();
                    $lista = $datos->listaClientes();
                    foreach ($lista as $fila) {

                    ?>
                        <tr>
                            <td><?php echo $fila->id; ?> </td>
                            <td><?php echo $fila->nombre; ?> </td>
                            <td><?php echo $fila->apellido; ?> </td>
                            <td><?php echo $fila->direccion; ?> </td>
                            <td><?php echo $fila->telefono; ?> </td>
                            <td><?php echo $fila->correo; ?> </td>
                            <td>
                                <!-- <a href="update.php" class="edit"><i class="fa fa-edit"></i></a> -->
                                <a href="update.php?id=<?php echo $fila->id; ?>" class="btn btn-primary"><i class="fa fa-edit"></i></a>
                                <a href="delete.php?id=<?php echo $fila->id; ?>" class="btn btn-danger"><i class="fa fa-remove"></i></a>
                            </td>
                        </tr>
                    <?php

                    }

                    ?>
                </tbody>
            </table>
        </div>


        <div class="row">

        </div>
    </div>

    </div>

</body>

</html>