<?php

/**
 * Class Producto
 * Representa un producto de la base de datos.
 */
class Producto {

    /** @var int La PK del producto. */
    protected $id_producto;

    /** @var int La FK con el ID de la categoría del producto. */
    protected $categoria_id;

    /** @var int La FK con el ID del usuario que publicó el producto. */
    protected $usuario_id;

    /** @var string */
    protected $nombre;

    /** @var float */
    protected $precio;

    /** @var string */
    protected $descripcion;

    /** @var string  */
    protected $texto;

    /** @var string  */
    protected $imagen;

    /** @var string  */
    protected $alt;

    /**
     * Carga todos los datos del array $data en las propiedades de la clase.
     * Las claves del array deben llamarse igual que las propiedades a las que se van a asociar.
     * 
     * @param array $data
     */

    public function loadDataFromArray(array $data): void{
        $this->setProductoId($data['id_producto']);
        $this->setUsuarioId($data['usuario_id']);
        $this->setCategoriaId($data['categoria_id']);
        $this->setNombre($data['nombre']);
        $this->setPrecio($data['precio']);
        $this->setDescripcion($data['descripcion']);
        $this->setTexto($data['texto']);
        $this->setImagen($data['imagen']);
        $this->setAlt($data['alt']);
    }


    /**
     * Retorna el valor de la PK del producto.
     *
     * @return int
     */
    public function getProductoId(): int
    {
        return $this->id_producto;
    }

    /**
     * @param int $id_producto
     */
    public function setProductoId(int $id_producto): void
    {
        $this->id_producto = $id_producto;
    }

    /**
     * @return int
     */
    public function getCategoriaId(): int
    {
        return $this->categoria_id;
    }

    /**
     * @param int $categoria_id
     */
    public function setCategoriaId(int $categoria_id): void
    {
        $this->categoria_id = $categoria_id;
    }

    /**
     * @return int
     */
    public function getUsuarioId(): int
    {
        return $this->usuario_id;
    }

    /**
     * @param int $usuario_id
     */
    public function setUsuarioId(int $usuario_id): void
    {
        $this->usuario_id = $usuario_id;
    }

    /**
     * @return string
     */
    public function getNombre(): string
    {
        return $this->nombre;
    }

    /**
     * @param string $nombre
     */
    public function setNombre(string $nombre): void
    {
        $this->nombre = $nombre;
    }

    /**
     * @return float
     */
    public function getPrecio(): float
    {
        return $this->precio;
    }

    /**
     * @param float $precio
     */
    public function setPrecio(float $precio): void
    {
        $this->precio = $precio;
    }

    /**
     * @return string
     */
    public function getDescripcion(): string
    {
        return $this->descripcion;
    }

    /**
     * @param string $descripcion
     */
    public function setDescripcion(string $descripcion): void
    {
        $this->descripcion = $descripcion;
    }

    /**
     * @return string
     */
    public function getTexto(): string
    {
        return $this->texto;
    }

    /**
     * @param string $descripcion
     */
    public function setTexto(string $texto): void
    {
        $this->texto = $texto;
    }

    /**
     * @return string|null
     */
    public function getImagen(): ?string
    {
        return $this->imagen;
    }

    /**
     * @param string $imagen
     */
    public function setImagen(string $imagen): void
    {
        $this->imagen = $imagen;
    }

    /**
     * @return string|null
     */
    public function getAlt(): ?string
    {
        return $this->alt;
    }

    /**
     * @param string $imagen
     */
    public function setAlt(string $alt): void
    {
        $this->alt = $alt;
    }
}