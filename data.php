<?php
require 'cliente.php';
class Data
{
    private $con;
    private $host;
    private $user;
    private $pass;
    private $base;
    private $port;

    public function __construct()
    {
        $this->host = "127.0.0.1";
        $this->user = "root";
        $this->pass = "Dim34*43//";
        $this->base = "sistemaclientes";
        $this->port = 3309;
    }

    // Parametro de conexión
    public function connect()
    {
        $this->con = new mysqli($this->host, $this->user, $this->pass, $this->base, $this->port);

        if ($this->con->connect_error) {
            die("No se logro la conexión:" . $this->con->connect_error);
        } else {

            // Corrigiendo error de acentos en las palabras
            mysqli_set_charset($this->con, "utf8");
            // Retornando conexión
            return $this->con;
        }
    }

    // Creando cliente
    public function create(Cliente $objCliente)
    {
        $nombre = $this->connect()->real_escape_string($objCliente->getNombre());
        $apellido = $this->connect()->real_escape_string($objCliente->getApellido());
        $telefono = $this->connect()->real_escape_string($objCliente->getTelefono());
        $direccion = $this->connect()->real_escape_string($objCliente->getDireccion());
        $correo = $this->connect()->real_escape_string($objCliente->getCorreo());

        // Verificando si existe registro
        $sql = "SELECT * FROM clientes WHERE CORREO='$correo';";
        $res =  $this->connect()->query($sql);

        if ($res->num_rows > 0) {
            return false;
        } else {

            // $sql = "INSERT INTO clientes (nombre,apellido,telefono,direccion,correo)  VALUES (DEFAULT, '$nombre','$apellido', '$telefono','$direccion','$correo');";
            $sql = "INSERT INTO clientes VALUES (DEFAULT, '$nombre','$apellido', '$telefono','$direccion','$correo');";

            $res =  $this->connect()->query($sql);


            if ($res) {
                return true;
            } else {
                return false;
            }
        }
    }

    // Actualizando cliente
    public function update(Cliente $objCliente)
    {
        $id = $this->connect()->real_escape_string($objCliente->getId());
        $nombre = $this->connect()->real_escape_string($objCliente->getNombre());
        $apellido = $this->connect()->real_escape_string($objCliente->getApellido());
        $telefono = $this->connect()->real_escape_string($objCliente->getTelefono());
        $direccion = $this->connect()->real_escape_string($objCliente->getDireccion());
        $correo = $this->connect()->real_escape_string($objCliente->getCorreo());

        // Verificando si existe registro
        $sql = "SELECT * FROM clientes WHERE id='$id';";
        $res =  $this->connect()->query($sql);

        if ($res->num_rows == 0) {
            return false;
        } else {

            // $sql = "INSERT INTO clientes (nombre,apellido,telefono,direccion,correo)  VALUES (DEFAULT, '$nombre','$apellido', '$telefono','$direccion','$correo');";
            $sql = "UPDATE clientes SET nombre='$nombre',apellido='$apellido', telefono='$telefono',direccion='$direccion',correo='$correo' WHERE id=$id;";

            $res =  $this->connect()->query($sql);


            if ($res) {
                return true;
            } else {
                return false;
            }
        }
    }


    // Funcion permite agregar datos
    public function listaClientes()
    {
        // Declarando array o vector
        $datos = array();
        // Verificando si existe registro
        $sql = "SELECT * FROM clientes;";

        $res =  $this->connect()->query($sql);
        if ($res->num_rows > 0) {
            while ($fila = $res->fetch_object()) {
                $datos[] = $fila;
            }
        }
        return $datos;
    }

    // Buscar cliente
    public function findCliente($id): Cliente
    {
        // Declarando array o vector
        $clientee = new Cliente();
        // Evaluando no vayan inyectar algun script 
        $id = $this->connect()->real_escape_string($id);
        // Verificando si existe registro
        $sql = "SELECT * FROM clientes WHERE id=$id;";

        $res =  $this->connect()->query($sql);
        if ($res->num_rows > 0) {
            $datos = $res->fetch_object();
            $clientee->setId($datos->id);
            $clientee->setNombre($datos->nombre);
            $clientee->setApellido($datos->apellido);
            $clientee->setTelefono($datos->telefono);
            $clientee->setDireccion($datos->direccion);
            $clientee->setCorreo($datos->correo);
        }
        return $clientee;
    }

    // Funcion para borrar datos 
    public function delete($id)
    {
        // Evaluando no vayan inyectar algun script 
        $id = $this->connect()->real_escape_string($id);

        // Eliminando registro
        $sql = "DELETE FROM clientes WHERE id=$id;";

        $res =  $this->connect()->query($sql);
        if ($res) {
            return true;
        }
        return false;
    }
}
