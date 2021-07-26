<?php

/**
 * Class Categorias
 * Representa na categoría de la base de datos.
 */
class Categoria {
    /**
     * La PK de la categoria. 
     * @var int */
    protected $id_categorias;

    /** @var string */
    protected $nombre;

    /**
     * Carga todos los datos del array $data en las propiedades de la clase.
     * Las claves del array deben llamarse igual que las propiedades a las que se van a asociar.
     * 
     * @param array $data
     */
    public function loadDataFromArray(array $data): void
    {
        $this->setCategoriaId($data['id_categorias']);
        $this->setNombre($data['nombre']);
    }

    /**
     * Retorna el valor de la PK de la categoría.
     *
     * @return int
     */
    public function getCategoriaId(): int
    {
        return $this->id_categorias;
    }

    /** @param int $id_categoria */
    public function setCategoriaId($id_categorias): void
    {
        $this->id_categorias = $id_categorias;
    }

    /** @return string */
    public function getNombre(): string
    {
        return $this->nombre;
    }

    /** @param string $nombre */
    public function setNombre($nombre): void
    {
        $this->nombre = $nombre;
    }
}