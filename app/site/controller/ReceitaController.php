<?php

namespace App\site\controller;

use App\core\Controller;
use App\site\entities\Receita;
use App\site\model\ReceitaModel;
use App\site\model\CategoriaModel;

class ReceitaController extends Controller
{
    private $receitaModel;

    public function __construct()
    {
        $this->receitaModel = new ReceitaModel();
    }

    public function index()
    {
        $receitas = [];

        if (filter_input(INPUT_POST, 'slCategoria', FILTER_SANITIZE_NUMBER_INT)) {
            $receitas = $this->receitaModel->lerTodosPorCategoria(
                filter_input(INPUT_POST, 'slCategoria', FILTER_SANITIZE_NUMBER_INT)
            );
        } else {
            $receitas = $this->receitaModel->lerUltimos(15);
        }

        $this->load('receita/main', [
            'listaCategorias' => (new CategoriaModel())->lerTodos(0),
            'receitas' => $receitas,
            'categoriaId' => filter_input(INPUT_POST, 'slCategoria', FILTER_SANITIZE_NUMBER_INT)
        ]);
    }

    public function adicionar()
    {
        $this->load('receita/adicionar', ['listaCategorias' => (new CategoriaModel())->lerTodos(0)]);
    }

    public function editar($receitaId)
    {

        $receitaId = filter_var($receitaId, FILTER_SANITIZE_NUMBER_INT);

        if ($receitaId <= 0) {
            $this->showMessage(
                'Receita não encontrada',
                'A receita solicitada não foi encontrada',
                'artigo/'
            );
            return;
        }

        $this->load('receita/editar', [
            'listaCategorias' => (new CategoriaModel())->lerTodos(0),
            'receita' => $this->receitaModel->lerPorId($receitaId),
            'receitaId' => $receitaId
        ]);
    }

    public function ver(string $slug)
    {

        $receitaId = filter_var($slug, FILTER_SANITIZE_SPECIAL_CHARS);

        if (strlen($slug) <= 2) {
            $this->showMessage(
                'Receita não encontrada',
                'A receita solicitada não foi encontrada',
                'artigo/'
            );
            return;
        }

        $this->load('receita/ver', [
            'receita' => $this->receitaModel->lerPorSlug($slug)
        ]);
    }

    // ----------------------------------------------------------------------------

    public function inserir()
    {
        $receita = $this->getInput();

        if (!$this->validar($receita, false)) {
            $this->showMessage(
                'Formulário inválido',
                'Os dados fornecidos estão incompletos ou são inválidos',
                'artigo/adicionar'
            );
            return;
        }

        $result = $this->receitaModel->inserir($receita);

        if ($result <= 0) {
            $this->showMessage(
                'Erro ao inserir',
                'Ocorreu um erro ao inserir a receita',
                'receita/adicionar'
            );

            return;
        }

        redirect(BASE . 'receita/editar/' . $result);
    }

    public function alterar($receitaId)
    {
        $receita = $this->getInput();
        $receita->setId($receitaId);

        if (!$this->validar($receita)) {
            $this->showMessage(
                'Receita não encontrada',
                'A receita solicitada não foi encontrada',
                'artigo/adicionar'
            );
            return;
        }

        if (!$this->receitaModel->alterar($receita)) {
            $this->showMessage(
                'Erro ao alterar',
                'Ocorreu um erro ao alterar a receita',
                'receita/editar/' . $receitaId
            );
            return;
        }
        redirect(BASE . 'receita/' . $receitaId);
    }

    private function validar(Receita $receita, bool $validateId = true)
    {
        if ($validateId && $receita->getId() <= 0)
            return false;

        if (strlen($receita->getTitulo()) < 2)
            return false;


        if (strlen($receita->getSlug()) < 3)
            return false;

        if (strlen($receita->getLinhaFina()) < 10)
            return false;

        if (strlen($receita->getDescricao()) < 10)
            return false;

        if ($receita->getCategoriaId() <= 0)
            return false;

        if (strlen($receita->getThumb()) < 1)
            return false;

        return true;
    }

    private function getInput()
    {
        $receita = new Receita();
        $receita->setTitulo(filter_input(INPUT_POST, 'txtTitulo', FILTER_SANITIZE_SPECIAL_CHARS));
        $receita->setSlug(filter_input(INPUT_POST, 'txtSlug', FILTER_SANITIZE_SPECIAL_CHARS));
        $receita->setLinhaFina(filter_input(INPUT_POST, 'txtLinhaFina', FILTER_SANITIZE_SPECIAL_CHARS));
        $receita->setDescricao(filter_input(INPUT_POST, 'txtDescricao', FILTER_SANITIZE_SPECIAL_CHARS));
        $receita->setCategoriaId(filter_input(INPUT_POST, 'slCategoria', FILTER_SANITIZE_NUMBER_INT));
        $receita->setThumb(filter_input(INPUT_POST, 'txtThumb', FILTER_SANITIZE_SPECIAL_CHARS));
        $receita->setData(getCurrentDate());

        return $receita;
    }
}
