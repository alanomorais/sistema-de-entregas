<?php

namespace App\Controllers;

use App\Models\Entrega;

class EntregaController
{
    public function index()
    {
        $entregas = new Entrega();
        $entregas = $entregas->getAll();

        include_once('src/views/index.php');

        return $entregas;
    }

    public function create()
    {
        $entrega = new Entrega();
        $entrega->setTitulo($_POST['titulo']);

        $entrega->insert();
    }
}
