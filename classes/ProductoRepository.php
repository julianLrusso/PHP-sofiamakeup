<?php

/**
 * Class ProductoRepository
 * 
 * Realiza acciones contra una fuente externa (base de datos) y retorna la informacion en estructuras (objetos) listas para utilizar.
 */
class ProductoRepository {
    /** @var PDO/null */
    private $db;

    public function __construct(PDO $db){
        $this->db = $db;
    }

    /**
     * Retorna un array con todos los productos
     * 
     * @return Producto[]
     */
    public function getAll(): array {
        $query = "SELECT * FROM productos";
        $stmt = $this->db->prepare($query);
        $stmt->execute();

        $stmt->setFetchMode(PDO::FETCH_CLASS, Producto::class);

        $output=[];
        while($product = $stmt->fetch()) {

            $output[] = $product;
        }
        return $output;
    }

    /**
     * Retorna un array con el producto de la ID seleccionada.
     * 
     * @param int $id
     * @return Producto[]
     */
    public function getById(int $id): Producto {
        $query = "SELECT * FROM productos WHERE id_producto = ?";

        $stmt = $this->db->prepare($query);
        $stmt->execute([$id]);
        $stmt->setFetchMode(PDO::FETCH_CLASS, Producto::class);

        $product = $stmt->fetch();

        return $product;
    }

    /**
     * Retorna un array con productos de la categoría según el ID seleccionado.
     * 
     * @param int $categoria_id
     * @return Producto[]
     */
    public function getByCategoriaId(int $categoria_id): array {
        $query = "SELECT * FROM productos WHERE categoria_id = ?";

        $stmt = $this->db->prepare($query);
        $stmt->execute([$categoria_id]);
        $stmt->setFetchMode(PDO::FETCH_CLASS, Producto::class);
        $output=[];
        while($product = $stmt->fetch()) {

            $output[] = $product;
        }
        return $output;
    }

    /**
     * Crea un producto nuevo en la base de datos.
     * Retorna true de ser exitoso, false de no serlo.
     * 

     * @param array $nuevoProducto
     * @return bool
     */
    function create(array $nuevoProducto): bool {
        $query = "INSERT INTO productos (nombre, precio, descripcion, texto, imagen, alt, categoria_id, usuario_id)
                VALUES (:nombre, :precio, :descripcion, :texto, :imagen, :alt, :categoria_id, '1')";
        
        $stmt = $this->db->prepare($query);
        $exito = $stmt->execute([
            'nombre'            =>$nuevoProducto['nombre'],
            'precio'            =>$nuevoProducto['precio'],
            'descripcion'       =>$nuevoProducto['descripcion'],
            'texto'             =>$nuevoProducto['texto'],
            'imagen'            =>$nuevoProducto['imagen'],
            'alt'               =>$nuevoProducto['alt'],
            'categoria_id'      =>$nuevoProducto['categoria_id'],
        ]);

        return $exito;
    }

    /**
     * Edita el producto en la base de datos.
     * Retorna true de ser exitoso, false de no serlo.
     * 
     *
     * @param int $id
     * @param array $datosProducto
     * @return bool
     */
    function update(int $id, array $datosProducto): bool {
        $query = "UPDATE productos 
                SET nombre          = :nombre,
                    precio          = :precio,
                    descripcion     = :descripcion,
                    texto           = :texto,
                    imagen          = :imagen,
                    alt             = :alt,
                    categoria_id    = :categoria_id
                WHERE 
                    id_producto     = :id_producto";
        
        $stmt = $this->db->prepare($query);
        $exito = $stmt->execute([
            'nombre'            =>$datosProducto['nombre'],
            'precio'            =>$datosProducto['precio'],
            'descripcion'       =>$datosProducto['descripcion'],
            'texto'             =>$datosProducto['texto'],
            'imagen'            =>$datosProducto['imagen'],
            'alt'               =>$datosProducto['alt'],
            'categoria_id'      =>$datosProducto['categoria_id'],
            'id_producto'       =>$id,
        ]);

        return $exito;
    }

    /**
     * Elimina un producto de la base de datos.
     * Retorna true o false dependiendo de si tuvo o no éxito.
     * 
     * @param int $id
     * @return bool
     */
    public function delete(int $id)
    {
        $query = "DELETE FROM productos WHERE id_producto = ?";
        $stmt = $this->db->prepare($query);
        $exito = $stmt->execute([$id]);
        return $exito;
    }
}