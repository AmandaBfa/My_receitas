<?php

namespace App\Site\Controller;

use App\Core\Controller;

class HomeController extends Controller
{
    public function __construct()
    {
        echo 'teste 123<br>';
    }

    public function index()
    {
        $this->load('home/main', [
            'teste' => '1234',
        ]);
    }
}
