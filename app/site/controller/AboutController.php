<?php

namespace App\Site\Controller;

class AboutController
{
    public function __construct()
    {
        // Constructor can be used for dependency injection or initialization
        // echo 'teste 123<br>';
    }

    public function index()
    {
        // This method can be used to render the about page
        echo 'Estamos na index do About <br>';
    }

    public function teste($name = '')
    {
        echo $name . '<<<<<< TESTE!!!!! :D<br>';
    }
}
