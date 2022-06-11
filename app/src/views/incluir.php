<?php
require_once('./src/views/includes/header.php');
require_once('./src/views/includes/navbar.php');

$http_host =  $_SERVER['HTTP_HOST'];
?>

<main class="flex-shrink-0">
    
    <div class="container">
        <h1 class="mt-5">Inclusão de Entregas</h1>
        <p class="lead"></p>
        <div class="card">
            <div class="card-body">
                <form action="insert" method="POST" name='inserir'>
                    <div class="mb-3">
                        <label for="titulo" class="form-label">Título</label>
                        <input type="text" class="form-control" id="titulo" name="titulo">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label">Descrição</label>
                        <textarea class="form-control" id="descricao" name="descricao" rows="3"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="previsao_entrega" class="form-label">Previsão de Entrega</label>
                        <input id="previsao_entrega" type="date" class="form-control" id="previsao_entrega" name="previsao_entrega">
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
                    <div class="mb-3 form-check">
                        <input type="checkbox" class="form-check-input" id="continuar" name="continuar">
                        <label class="form-check-label" for="continuar">Continuar Incluindo?</label>
                    </div>
                    <button type="submit" class="btn btn-primary" name="button" value="insert">Incluir</button>
                </form>
            </div>
        </div>
    </div>
</main>

<?php

require_once('./src/views/includes/footer.php');