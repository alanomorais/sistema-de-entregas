<?php

namespace App\Controllers;

use App\Models\Entrega;
use Exception;

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
        include_once('src/views/incluir.php');
    }

    public function insert()
    {
        if (isset($_POST['titulo'], $_POST['descricao'], $_POST['previsao_entrega'])) {
            $entrega = new Entrega();
            $titulo     = $_POST['titulo'];
            $descricao  = $_POST['descricao'];
            $previsao   = $_POST['previsao_entrega'];

            $entrega->setTitulo($titulo);
            $entrega->setDescricao($descricao);
            $entrega->setPrevisao($previsao);

            try {
                $entrega->insert();

                $mensagem = 'dados inseridos com sucesso';
                header("Location: {$_SERVER['HTTP_HOST']}?msg=$mensagem");
            } catch (Exception $e) {
                return "ERROR: ".$e->getMessage();
            }
        } else {
            echo "não pode ter campo vazio";
        }
    }
}
