<?php

namespace App\site\controller;

use App\core\Controller;
use App\site\model\ReceitaModel;

class HomeController extends Controller
{
    public function index()
    {
        $receitaModel = new ReceitaModel();

        $receitas = [
            $receitaModel->lerTodas()

        ];

        $this->load('home/main', ['listaReceitas' => $receitas]);
    }
}
