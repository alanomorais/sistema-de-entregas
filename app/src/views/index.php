<?php
require_once('./src/views/includes/header.php');
require_once('./src/views/includes/navbar.php');
?>

<?php
if (isset($_GET['message'])) {    
?>
    <div class="alert alert-success" role="alert">
        Entrega inserida com sucesso!
    </div>
<?php
}
?>
<main class="flex-shrink-0">
    <div class="container">
        <h1 class="mt-5">Listagem de Entregas</h1>
        <p class="lead">Cliente no Botão novo para Adicionar uma nova entrega</p>
        <div class="card">
            <h5 class="card-header"><a href="incluir.php"><button type="button" class="btn btn-success">Novo</button></a></h5>
            <div class="card-body">
                <table class="table table-responsive">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Titulo</th>
                            <th scope="col">Descrição</th>
                            <th scope="col">Prazo de Entrega</th>
                            <th scope="col">Status</th>
                            <th scope="col">Ação</th>
                        </tr>
                    </thead>
                    <tbody class="table-group-divider">
                        <?php
                        foreach ($entregas as $key => $entrega) {
                            # code...
                        
                        ?>
                        <tr>
                            <th scope="row"><?= $entrega['id'] ?></th>
                            <td><?= $entrega['titulo'] ?></td>
                            <td><?= $entrega['descricao'] ?></td>
                            <td><?= date('d/m/Y', strtotime("{$entrega['previsao_entrega']}")); ?></td>
                            <td><?=  $entrega['status'] == 0 ? '<span class="badge bg-danger">Pendente</span>' : '<span class="badge bg-success">Entregue</span>' ?></td>
                            <td>
                                <ul class="list-inline">
                                    <li class="list-inline-item" <button type="button" class="btn btn-link"><span class="material-icons">
                                            edit
                                        </span></button>
                                    </li>
                                    <li class="list-inline-item" <button type="button" class="btn btn-link"><span class="material-icons">
                                            restore_from_trash
                                        </span></button>
                                    </li>
                                </ul>
                            </td>
                        </tr>
                        <?php } ?>                        
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</main>

<?php

require_once('./src/views/includes/footer.php');