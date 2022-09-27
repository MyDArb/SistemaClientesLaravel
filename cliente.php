<?php
// Declarando  clase de objeto cliente
class Cliente
{

    private $id;
    private $nombre;
    private $apellido;
    private $direccion;
    private $telefono;
    private $correo;

    public function __construct()
    {
        $this->id = 0;
        $this->nombre = "";
        $this->apellido = "";
        $this->direccion = "";
        $this->telefono = "";
        $this->correo = "";
    }

    public function setId($id)
    {
        $this->id = $id;
    }
    public function getId()
    {
        return $this->id;
    }

    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }
    public function getNombre()
    {
        return $this->nombre;
    }

    public function setApellido($apellido)
    {
        $this->apellido = $apellido;
    }
    public function getApellido()
    {
        return $this->apellido;
    }

    public function setDireccion($direccion)
    {
        $this->direccion = $direccion;
    }
    public function getDireccion()
    {
        return $this->direccion;
    }

    public function setTelefono($telefono)
    {
        $this->telefono = $telefono;
    }
    public function getTelefono()
    {
        return $this->telefono;
    }

    public function setCorreo($correo)
    {
        $this->correo = $correo;
    }
    public function getCorreo()
    {
        return $this->correo;
    }
}
