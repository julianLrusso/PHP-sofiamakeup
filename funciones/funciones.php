<?php

/**
 * Retorna un array con todos los productos
 * 
 * @param PDO $db
 * @return Producto[]
 */
function productosGetAll(PDO $db): array {
    $query = "SELECT * FROM productos";
    $stmt = $db->prepare($query);
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
 * @param PDO $db, int $id
 * @param int $id
 * @return Producto[]
 */
function productoGetById(PDO $db, int $id): Producto {
    $query = "SELECT * FROM productos WHERE id_producto = ?";

    $stmt = $db->prepare($query);
    $stmt->execute([$id]);
    $stmt->setFetchMode(PDO::FETCH_CLASS, Producto::class);

    $product = $stmt->fetch();

    return $product;
}

/**
 * Crea un producto nuevo en la base de datos.
 * Retorna true de ser exitoso, false de no serlo.
 * 
 * @param PDO $db
 * @param array $nuevoProducto
 * @return bool
 */
function productoCreate(PDO $db, array $nuevoProducto): bool {
    $query = "INSERT INTO productos (nombre, precio, descripcion, texto, imagen, alt, categoria_id, usuario_id)
            VALUES (:nombre, :precio, :descripcion, :texto, :imagen, :alt, :categoria_id, '1')";
    
    $stmt = $db->prepare($query);
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