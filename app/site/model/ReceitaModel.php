<?php

namespace App\site\model;

use App\core\model;
use App\site\entities\Receita;

class ReceitaModel
{
    private $pdo;

    public function __construct()
    {
        $this->pdo = new Model();
    }

    public function inserir(Receita $receita)
    {

        $sql = "INSERT INTO receita (titulo, slug, linha_fina, descricao, categoria_id, thumb, data) VALUES (:titulo, :slug, :linha_fina, :descricao, :categoria_id, :thumb, :data)";
        $params = [
            ':titulo' => $receita->getTitulo(),
            ':slug' => $receita->getSlug(),
            ':linha_fina' => $receita->getLinhaFina(),
            ':descricao' => $receita->getDescricao(),
            ':categoria_id' => $receita->getCategoriaId(),
            ':thumb' => $receita->getThumb(),
            ':data' => $receita->getData()
        ];

        if (!$this->pdo->executeNonQuery($sql, $params)) {
            return -1;
        }
        return $this->pdo->getLastId();
    }

    public function alterar(Receita $receita)
    {
        $sql = "UPDATE receita SET titulo = :titulo, slug = :slug, linha_fina = :linha_fina, descricao = :descricao, thumb = :thumb, categoria_id = :categoria_id WHERE id = :id";
        $params = [
            ':id' => $receita->getId(),
            ':titulo' => $receita->getTitulo(),
            ':slug' => $receita->getSlug(),
            ':linha_fina' => $receita->getLinhaFina(),
            ':descricao' => $receita->getDescricao(),
            ':thumb' => $receita->getThumb(),
            ':categoria_id' => $receita->getCategoriaId()
        ];

        return $this->pdo->executeNonQuery($sql, $params);
    }

    public function lerPorId(int $receitaId)
    {
        $sql = 'SELECT r.*, c.titulo as categoria_titulo FROM receita r INNER JOIN categoria c ON c.id = r.categoria_id WHERE r.id = :id';

        $dr = $this->pdo->executeQueryOneRow($sql, [
            ':id' => $receitaId
        ]);

        return $this->collection($dr);
    }

    public function lerPorSlug(string $slug)
    {
        $sql = 'SELECT r.*, c.titulo as categoria_titulo FROM receita r INNER JOIN categoria c ON c.id = r.categoria_id WHERE r.slug = :slug';

        $dr = $this->pdo->executeQueryOneRow($sql, [
            ':slug' => $slug
        ]);

        return $this->collection($dr);
    }

    public function lerUltimos($limit = 4)
    {
        $sql = 'SELECT r.*, c.titulo as categoria_titulo FROM receita r INNER JOIN categoria c ON c.id = r.categoria_id ORDER BY r.data DESC LIMIT :limit';
        $dt = $this->pdo->executeQuery($sql, [
            ':limit' => $limit
        ]);

        $lista = [];

        foreach ($dt as $dr)
            $lista[] =  $this->collection($dr);

        return $lista;
    }

    public function lerTodosPorCategoria(int $categoriaId)
    {
        $sql = 'SELECT r.*, c.titulo as categoria_titulo FROM receita r INNER JOIN categoria c ON c.id = r.categoria_id WHERE r.categoria_id = :categoriaid ORDER BY r.data DESC ';
        $dt = $this->pdo->executeQuery($sql, [
            ':categoriaid' => $categoriaId
        ]);

        $lista = [];

        foreach ($dt as $dr)
            $lista[] =  $this->collection($dr);

        return $lista;
    }

    public function lerPorCategoriaLimit(int $categoriaId, $limit = 100)
    {
        $sql = 'SELECT r.*, c.titulo as categoria_titulo FROM receita r INNER JOIN categoria c ON c.id = r.categoria_id WHERE r.categoria_id = :categoriaid ORDER BY r.data DESC LIMIT :limit';
        $dt = $this->pdo->executeQuery($sql, [
            ':categoriaid' => $categoriaId,
            ':limit' => $limit
        ]);

        $lista = [];

        foreach ($dt as $dr)
            $lista[] =  $this->collection($dr);

        return $lista;
    }

    public function lerTodas()
    {
        $sql = 'SELECT r.*, c.titulo as categoria_titulo FROM receita r INNER JOIN categoria c ON c.id = r.categoria_id ORDER BY r.data DESC';
        $dt = $this->pdo->executeQuery($sql, []);

        $lista = [];

        foreach ($dt as $dr)
            $lista[] =  $this->collection($dr);

        return $lista;
    }

    public function pesquisar(string $termo)
    {
        $sql = 'SELECT r.*, c.titulo as categoria_titulo FROM receita r INNER JOIN categoria c ON c.id = r.categoria_id WHERE UPPER(r.titulo) LIKE :titulo OR UPPER(r.linha_fina) LIKE :linhafina ORDER BY r.titulo ASC ';
        $dt = $this->pdo->executeQuery($sql, [
            ':titulo' => strtoupper("%{$termo}%"),
            ':linhafina' => strtoupper("%{$termo}%")
        ]);

        $lista = [];

        foreach ($dt as $dr)
            $lista[] =  $this->collection($dr);

        return $lista;
    }

    private function collection($arr)
    {
        $receita = new Receita();
        $receita->setId($arr['id'] ?? null);
        $receita->setTitulo($arr['titulo'] ?? null);
        $receita->setSlug($arr['slug'] ?? null);
        $receita->setLinhaFina($arr['linha_fina'] ?? null);
        $receita->setDescricao(html_entity_decode($arr['descricao'] ?? null));
        $receita->setCategoriaId($arr['categoria_id'] ?? null);
        $receita->setCategoriaTitulo($arr['categoria_titulo'] ?? null);
        $receita->setThumb($arr['thumb'] ?? null);
        $receita->setData($arr['data'] ?? null);

        return $receita;
    }
}
