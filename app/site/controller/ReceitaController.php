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
        $this->load('receita/main', []);
    }

    public function adicionar()
    {
        $this->load('receita/adicionar', ['listaCategorias' => (new CategoriaModel())->lerTodos(0)]);
    }

    // ----------------------------------------------------------------------------

    public function inserir()
    {
        $receita = $this->getInput();

        if (!$this->validar($receita)) {
            $this->showMessage(
                'Formulário inválido',
                'Os dados fornecidos estão incompletos ou são inválidos',
                'artigo/adicionar'
            );
            return;
        }
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
        // $receita->setThumb(filter_input(INPUT_POST, 'txtThumb', FILTER_SANITIZE_STRING));
        // $receita->setData(getCurrentDate());

        return $receita;
    }
}
