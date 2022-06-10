<?php

namespace App\Controllers;

use App\Models\Entrega;

class EntregaController
{
    private $model;

    public function __construct()
    {
        $this->model = new Entrega();
    }

    public function index()
    {
        $entregas = $this->model->getAll();

        return $entregas;
    }
}
