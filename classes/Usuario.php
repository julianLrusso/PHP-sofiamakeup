<?php

/**
 * Class Usuario
 * 
 * Representa un usuario de la base de datos.
 */
class Usuario
{
    /** @var int */
    protected $id_usuario;

    /** @var string */
    protected $email;

    /** @var string */
    protected $password;

    /** @var string */
    protected $nombre;

    /** @var string */
    protected $apellido;

    /**
     * Carga todos los datos del array $data en las propiedades de la clase.
     * Las claves del array deben llamarse igual que las propiedades a las que se van a asociar.
     * 
     * @param array $data
     */
    public function loadDataFromArray(array $data): void
    {
        $this->setUsuarioId($data['id_usuario']);
        $this->setEmail($data['email']);
        $this->setPassword($data['password']);
        $this->setNombre($data['nombre']);
        $this->setApellido($data['apellido']);
    }

    /**
     * Retorna el valor de la PK del usuario.
     *
     * @return int
     */
    public function getUsuarioId(): int
    {
        return $this->id_usuario;
    }

    /** @param int $id_usuario */
    public function setUsuarioId($id_usuario): void
    {
        $this->id_usuario = $id_usuario;
    }

     /** @return string */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @param string $email
     */
    public function setEmail($email): void
    {
        $this->email = $email;
    }

     /** @return string */
    public function getPassword(): string
    {
        return $this->password;
    }

    /** @param string $password */
    public function setPassword($password): void
    {
        $this->password = $password;
    }

     /** @return string */
    public function getNombre(): ?string
    {
        return $this->nombre;
    }

    /**
     * @param string $nombre
     */
    public function setNombre($nombre): void
    {
        $this->nombre = $nombre;
    }

     /** @return string */
     public function getApellido(): ?string
     {
         return $this->apellido;
     }
 
     /**
      * @param string $apellido
      */
     public function setApellido($apellido): void
     {
         $this->apellido = $apellido;
     }
}