<?php
require_once('./src/views/includes/header.php');
require_once('./src/views/includes/navbar.php');

?>

<main class="flex-shrink-0">
    <div class="container">
        <h1 class="mt-5">Listagem de Entregas</h1>
        <p class="lead">Cliente no Botão novo para Adicionar uma nova entrega</p>
        <div class="card">
            <h5 class="card-header"><a href="/?page=create"><button type="button" class="btn btn-success">Novo</button></a></h5>
            <div class="card-body">
                <table class="table table-responsive">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Titulo</th>
                            <th scope="col">Descrição</th>
                            <th scope="col">Prazo de Entrega</th>
                            <th scope="col">Data de Entrega</th>
                            <th scope="col">Status</th>
                            <th scope="col">Ação</th>
                        </tr>
                    </thead>
                    <tbody class="table-group-divider">
                        <?php
                        $qtde = 0;
                        foreach ($entregas as $key => $entrega) {
                            $qtde = $qtde + 1 ;

                        ?>
                            <tr>
                                <th scope="row"><?= $entrega['id'] ?></th>
                                <td><?= $entrega['titulo'] ?></td>
                                <td><?= substr($entrega['descricao'],0,30); ?></td>
                                <td><?= date('d/m/Y', strtotime("{$entrega['previsao_entrega']}")); ?></td>
                                <td><?= $entrega['data_entrega'] != null ? date('d/m/Y', strtotime("{$entrega['data_entrega']}")) : ''; ?></td>
                                <td><?= $entrega['status'] == 0 ? '<span class="badge bg-danger">Pendente</span>' : '<span class="badge bg-success">Entregue</span>' ?></td>                                
                                <td>
                                    <ul class="list-inline">
                                        <?php if ($entrega['status'] == 0) { ?>
                                            <li class="list-inline-item"> <a href="/?page=edit&id=<?= $entrega['id'] ?>"><button type="button" class="btn btn-link"><span class="material-icons">
                                                            edit
                                                        </span></button></a>
                                            </li>
                                            <li class="list-inline-item"> <a href="/?page=destroy&id=<?= $entrega['id'] ?>"><button type="button" class="btn btn-link"><span class="material-icons">
                                                            restore_from_trash
                                                        </span></button></a>
                                            </li>
                                        <?php } ?>
                                    </ul>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
            <div class="card-footer">
                <p><h5>Total de Entregas: <?=  $qtde ?></h5></p>
            </div>
        </div>
    </div>
</main>

<?php

require_once('./src/views/includes/footer.php');
