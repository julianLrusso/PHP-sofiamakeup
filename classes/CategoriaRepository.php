<?php
/**
 * Class CategoriaRepository
 * 
 * Realiza acciones contra una fuente externa (base de datos) y retorna la informacion en estructuras (objetos) listas para utilizar.
 */
class CategoriaRepository {
    /** @var PDO/null */
    private $db;

    public function __construct(PDO $db){
        $this->db = $db;
    }

    /**
     * Retorna un array con todas las categorias
     * 
     * @return Categoria[]
     */
    public function getAll(): array {
        $query = "SELECT * FROM categorias";
        $stmt = $this->db->prepare($query);
        $stmt->execute();

        $stmt->setFetchMode(PDO::FETCH_CLASS, Categoria::class);

        $output=[];
        while($category = $stmt->fetch()) {

            $output[] = $category;
        }
        return $output;
    }

    /**
     * Retorna un array con la categoria de la ID seleccionada.
     * 
     * @param int $id
     * @return Categoria[]
     */
    public function getById(int $id): Categoria {
        $query = "SELECT * FROM categorias WHERE id_categorias = ?";

        $stmt = $this->db->prepare($query);
        $stmt->execute([$id]);
        $stmt->setFetchMode(PDO::FETCH_CLASS, Categoria::class);

        $category = $stmt->fetch();

        return $category;
    }

}