<?php
require_once('./src/views/includes/header.php');
require_once('./src/views/includes/navbar.php');

$titulo = $response[0]['id'];
$titulo = $response[0]['titulo'];
$descricao = $response[0]['descricao'];
$previsao_entrega = date('Y-m-d', strtotime($response[0]['previsao_entrega']));

?>

<main class="flex-shrink-0">
    
    <div class="container">
        <h1 class="mt-5">Editar Entregas</h1>
        <p class="lead"></p>
        <div class="card">
            <div class="card-body">
                <form action="update" method="POST" name="update">
                <input type="hidden" class="form-control" id="id" name="id" value="<?= $id;?>">
                    <div class="mb-3">
                        <label for="titulo" class="form-label">Título</label>
                        <input type="text" class="form-control" id="titulo" name="titulo" value="<?= $titulo;?>">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label">Descrição</label>
                        <textarea class="form-control" id="descricao" name="descricao" rows="3"><?= $descricao;?></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="previsao_entrega" class="form-label">Previsão de Entrega</label>
                        <input id="previsao_entrega" type="date" class="form-control" id="previsao_entrega" name="previsao_entrega" value="<?= $previsao_entrega;?>">
                    </div>
                    <div class="mb-3">
                        <label for="previsao_entrega" class="form-label">Data da Entrega</label>
                        <input id="data_entrega" type="date" class="form-control" id="data_entrega" name="data_entrega">
                    </div>
                    <div class="mb-3">
                        <div class="form-check form-check form-check-inline">
                            <input id="status" class="form-check-input" type="radio" name="status" value="0" checked>
                            <label for="status" class="form-check-label">Pendente</label>
                        </div>
                        <div class="form-check form-check form-check-inline">
                            <input id="status" class="form-check-input" type="radio" name="status" value="1">
                            <label for="status" class="form-check-label">Concluída</label>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-success" name="button"value="update">Salvar</button>
                </form>
            </div>
        </div>
    </div>
</main>

<?php

require_once('./src/views/includes/footer.php');