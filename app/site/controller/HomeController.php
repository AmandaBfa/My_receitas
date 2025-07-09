<?php

namespace app\site\controller;

use App\Core\Controller;
// use app\site\model\ReceitaModel;

class HomeController extends Controller
{
    public function __construct() {}

    public function index()
    {
        $this->load('home/main', ['teste' => '1234']);
    }
}
