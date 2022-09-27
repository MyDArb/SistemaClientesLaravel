<?php
if (isset($_GET['id'])) {
    require 'data.php';
    // Creando objeto cliente
    $cliente = new Data();
    // Convirtiendo numero entero
    $id = intval($_GET['id']);
    // Ejecutando la funcion delete y pasandole el id
    $res = $cliente->delete($id);
    session_start();
    if ($res) {
        $_SESSION['mensaje'] = "Cliente eliminado correctamente";
    } else {

        $_SESSION['mensaje'] = "Cliente no existe";
    }
    // Redireccionando a index.php
    header('location:index.php');
}

?>
