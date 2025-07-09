<?php

namespace App\site\controller;

use App\core\Controller;

class SobreController extends Controller
{
    public function index()
    {
        $this->load('sobre/main');
    }
}
