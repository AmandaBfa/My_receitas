<?php

namespace App\site\controller;

use App\core\Controller;
use App\site\model\CategoriaModel;

class CategoriaController extends Controller
{
    private $categoriaModel;

    public function __construct()
    {
        $this->categoriaModel = new CategoriaModel();
    }

    public function index()
    {

        $this->load('categoria/main', [
            'listaCategoria' => $this->categoriaModel->lerTodos(0)
        ]);
    }

    public function adicionar()
    {
        $this->load('categoria/adicionar');
    }


    public function editar($categoriaId = 0)
    {

        $categoriaId = filter_var($categoriaId, FILTER_SANITIZE_NUMBER_INT);

        if ($categoriaId <= 0) {
            $this->showMessage(
                'Formulário inválido',
                'Os dados fornecidos estão incompletos ou são inválidos',
                'categoria/'
            );
            return;
        }

        $categoria = $this->categoriaModel->lerPorId($categoriaId);

        if ($categoria->titulo == null) {
            $this->showMessage(
                'Categoria não encontrada',
                'Os dados fornecidos estão incompletos ou são inválidos',
                'categoria/'
            );
            return;
        }

        $this->load('categoria/editar', [
            'categoria'   => $categoria,
            'categoriaId' => $categoriaId
        ]);
    }

    public function alterar($categoriaId = 0)
    {
        $categoriaId = filter_var($categoriaId, FILTER_SANITIZE_NUMBER_INT);


        $titulo = filter_input(INPUT_POST, 'Titulo', FILTER_SANITIZE_SPECIAL_CHARS);
        $slug = filter_input(INPUT_POST, 'Slug', FILTER_SANITIZE_SPECIAL_CHARS);

        if ($categoriaId <= 0 || strlen($titulo) < 2 || strlen($slug) < 3) {
            $this->showMessage(
                'Erro ao editar categoria',
                'Preencha corretamente todos os campos',
                'categoria/'
            );
            return;
        }

        if (!$this->categoriaModel->alterar($categoriaId, $titulo, $slug)) {
            $this->showMessage(
                'Erro',
                'Houve um erro ao tentar editar, tenta novamente mais tarde',
                'categoria/editar/' . $categoriaId
            );
            return;
        }

        redirect(BASE . 'categoria/editar/' . $categoriaId);
    }

    public function insert()
    {
        $titulo = filter_input(INPUT_POST, 'Titulo', FILTER_SANITIZE_SPECIAL_CHARS);
        $slug = filter_input(INPUT_POST, 'Slug', FILTER_SANITIZE_SPECIAL_CHARS);

        if (strlen($titulo) < 2 || strlen($slug) < 3) {

            $this->showMessage(
                'Erro ao adicionar categoria',
                'Preencha corretamente todos os campos',
                'categoria/adicionar'
            );

            return;
        }

        $result = $this->categoriaModel->inserir($titulo, $slug);

        if ($result <= 0) {

            $this->showMessage(
                'Erro',
                'Houve um erro ao tentar cadastrar, tenta novamente mais tarde',
                'categoria/adicionar'
            );
            return;
        }

        redirect(BASE . 'categoria/editar/' . $result);
    }
}
