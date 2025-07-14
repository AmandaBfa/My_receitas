<?php

namespace App\site\model;

use App\core\model;

class ReceitaModel
{
    private $pdo;

    public function __construct()
    {
        $this->pdo = new Model();
    }
}
