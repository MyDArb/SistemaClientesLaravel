<?php
// Enviando dato de la base de datos
// header('Content-Type:text/html; charset=utf-8');
$mensaje = "";
// print_r($_POST);
if (isset($_POST['guardar'])) {

    // echo "Enviado";
    // LLamando modulo data.php
    require 'data.php';
    // require 'cliente.php';

    $cliente = new Cliente();
    // Para corregir error por acento en las palabras
    // utf8_encode()
    $cliente->setNombre($_POST['nombre']);
    $cliente->setApellido($_POST['apellido']);
    $cliente->setDireccion($_POST['direccion']);
    $cliente->setTelefono($_POST['telefono']);
    $cliente->setCorreo($_POST['correo']);


    $db = new Data();
    $respuesta = $db->create($cliente);
    if ($respuesta) {
        // echo 'Ok';
        // print_r($_POST);
        $mensaje = "Cliente registrado con exitos";
        $class = "alert alert-success";
    } else {
        // echo 'Ya existe';

        $mensaje = "Cliente ya existe";
        $class = "alert alert-danger";
    }
    // print_r($_POST);

}
?>

<!-- Creando formulario de envio de datos para nuevo cliente -->

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

    <title>Creando Nuevos Clientes</title>
</head>

<body>

    <div class="container">

        <div class="table-wrapper">
            <div class="table-title">
                <div class="col-sm-8">
                    <h2>Nuevo <strong>Cliente</strong></h2>
                </div>
                <div class="col-sm-4">
                    <a href="index.php" class="btn btn-info add-new"><i class="fa fa-arrow-left"></i> Regresar</a>
                </div>
            </div>
        </div>

        <div class="row">
            <form action="" method="POST">
                <div class="col-md-6">
                    <label for="nombre">Nombre:</label>
                    <input type="text" name="nombre" id="nombre" class="form-control" maxlength="60" required />
                </div>

                <div class="col-md-6">
                    <label for="apellido">Apellido:</label>
                    <input type="text" name="apellido" id="apellido" class="form-control" maxlength="60" required />
                </div>

                <div class="col-md-12">
                    <label for="direccion">Direción:</label>
                    <input type="text" name="direccion" id="direccion" class="form-control" maxlength="60" required />
                </div>

                <div class="col-md-6">
                    <label for="telefono">Teléfono:</label>
                    <input type="text" name="telefono" id="telefono" class="form-control" maxlength="60" required />
                </div>

                <div class="col-md-6">
                    <label for="correo">Correo:</label>
                    <input type="email" name="correo" id="correo" class="form-control" maxlength="60" required />
                </div>

                <div class="col-md-12 pull-right">
                    <hr>
                    <button name="guardar" class="btn btn-success">Guardar Cliente</button>
                </div>

            </form>
        </div>

        <hr>
        <div class="row">
            <div class="<?php echo $class; ?>">
                <?php echo $mensaje; ?>
            </div>
        </div>

    </div>

</body>

</html>