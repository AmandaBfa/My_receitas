<?php

namespace App\site\controller;

use App\core\Controller;
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
}
