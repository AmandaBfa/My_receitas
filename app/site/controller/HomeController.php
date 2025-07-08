<?php

namespace App\Site\Controller;

class HomeController
{
    public function __construct()
    {
        echo 'teste 123<br>';
    }

    public function index()
    {
        // This method can be used to render the home page
        echo 'Estamos na index <br>';
    }
}
