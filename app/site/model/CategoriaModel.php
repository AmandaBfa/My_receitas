<?php

namespace App\site\model;

use App\core\view;
use App\core\model; // Adicione esta linha


class CategoriaModel
{
    private $pdo;

    public function __construct()
    {
        $this->pdo = new Model();
    }

    public function inserir(string $titulo, string $slug)
    {
        $sql = "INSERT INTO categoria (titulo, slug) VALUES (:titulo, :slug)";
        $params = [
            ':titulo' => $titulo,
            ':slug' => $slug
        ];

        if (!$this->pdo->executeNonQuery($sql, $params)) {
            return -1; // Retorna false se a inserção falhar
        }
        return $this->pdo->getLastId();
    }

    public function alterar(int $id, string $titulo, string $slug)
    {
        $sql = "UPDATE categoria SET titulo = :titulo, slug = :slug WHERE id = :id";
        $params = [
            ':id' => $id,
            ':titulo' => $titulo,
            ':slug' => $slug
        ];

        return $this->pdo->executeNonQuery($sql, $params);
    }

    public function lerPorId(int $categoriaId)
    {
        $sql = "SELECT * FROM categoria WHERE id = :id";

        $dr = $this->pdo->executeQueryOneRow($sql, [':id' => $categoriaId]);

        return $this->collection($dr);
    }

    private function collection($arr)
    {

        return (object) [
            'id' => $arr['id'] ?? null,
            'titulo' => $arr['titulo'] ?? null,
            'slug' => $arr['slug'] ?? null
        ];
    }
}
