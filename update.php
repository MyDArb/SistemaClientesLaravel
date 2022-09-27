<?php
// Enviando dato de la base de datos
// header('Content-Type:text/html; charset=utf-8');
$mensaje = "";
// print_r($_POST);
if (isset($_POST['actualizar'])) {

    // echo "Enviado";
    // LLamando modulo data.php
    require 'data.php';
    // require 'cliente.php';

    $cliente = new Cliente();
    // Para corregir error por acento en las palabras
    // utf8_encode()
    $cliente->setId($_POST['id']);
    $cliente->setNombre($_POST['nombre']);
    $cliente->setApellido($_POST['apellido']);
    $cliente->setDireccion($_POST['direccion']);
    $cliente->setTelefono($_POST['telefono']);
    $cliente->setCorreo($_POST['correo']);


    $db = new Data();
    $respuesta = $db->update($cliente);
    if ($respuesta) {
        // echo 'Ok';
        // print_r($_POST);
        $mensaje = "Cliente actualizado exitosamente";
        $class = "alert alert-success";
    } else {
        // echo 'Ya existe';

        $mensaje = "Cliente no existe";
        $class = "alert alert-danger";
    }
    // print_r($_POST);

}else if (isset($_GET['id'])) {
    require 'data.php';
    $cliente = new Data();
    $cliente = $cliente->findCliente($_GET['id']);



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
                    <h2>Actualizar <strong>Cliente</strong></h2>
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
                    <input type="text" name="nombre" id="nombre" class="form-control" maxlength="60" required value="<?php echo $cliente->getNombre(); ?>" />
                </div>

                <div class="col-md-6">
                    <label for="apellido">Apellido:</label>
                    <input type="text" name="apellido" id="apellido" class="form-control" maxlength="60" required value="<?php echo $cliente->getApellido(); ?>"/>
                    <input type="hidden" name="id"  value="<?php echo $cliente->getId(); ?>"/>
                </div>

                <div class="col-md-12">
                    <label for="direccion">Direción:</label>
                    <input type="text" name="direccion" id="direccion" class="form-control" maxlength="60" required value="<?php echo $cliente->getDireccion(); ?>"/>
                </div>

                <div class="col-md-6">
                    <label for="telefono">Teléfono:</label>
                    <input type="text" name="telefono" id="telefono" class="form-control" maxlength="60" required value="<?php echo $cliente->getTelefono(); ?>"/>
                </div>

                <div class="col-md-6">
                    <label for="correo">Correo:</label>
                    <input type="email" name="correo" id="correo" class="form-control" maxlength="60" required value="<?php echo $cliente->getCorreo(); ?>" />
                </div>

                <div class="col-md-12 pull-right">
                    <hr>
                    <button name="actualizar" class="btn btn-success">Actualizar Cliente</button>
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