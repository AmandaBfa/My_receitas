<?php

namespace App\site\controller;

use App\core\Controller;

class CategoriaController extends Controller
{
    // public function __construct() {}

    public function index()
    {
        $this->load('categoria/main');
    }

    public function add()
    {
        $this->load('categoria/add');
    }

    public function edit()
    {
        $this->load('categoria/edit');
    }
}
