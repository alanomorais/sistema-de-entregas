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

                $msg = 'dados inseridos com sucesso';
                $response = [
                    'success' => true,
                    'message' => $msg
                ];

                $this->index();

            } catch (Exception $e) {
                return "ERROR: " . $e->getMessage();
            }
        } else {
            echo "não pode ter campo vazio";
        }
    }

    public function edit(){
        
        $id = $_GET['id'];

        $entrega = new Entrega();
        $entrega->setId($id);
        
        $response = $entrega->show();

        require_once('src/views/editar.php');

        return $response;
    }

    public function update(){

        $entrega = new Entrega();
        $id     = $_POST['id'];
        $titulo     = $_POST['titulo'];
        $descricao  = $_POST['descricao'];
        $previsao   = $_POST['previsao_entrega'];

        $entrega->setId($id);
        $entrega->setTitulo($titulo);
        $entrega->setDescricao($descricao);
        $entrega->setPrevisao($previsao);

        if($_POST['data_entrega']) $entrega->setEntrega($_POST['data_entrega']);
        
        if($_POST['status'] == 1) $entrega->setStatus($_POST['status']);

        $entrega->update();

        $this->index();
            
    }

    public function destroy(){

        $entrega = new Entrega();
        $id = $_GET['id'];
       
        $entrega->setId($id);
       
        $entrega->delete();

        $this->index();
            
    }
}
