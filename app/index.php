<?php

use App\Controllers\EntregaController;

require __DIR__ . './vendor/autoload.php';
//use App\Controllers\EntregaController;

$entregas = new EntregaController();

if(isset($_POST) && !empty($_POST)){
    $entregas->insert();
    $post = $_POST;
}else{
    $get = isset($_GET['page']) ? $_GET['page'] : 'index';
    $entregas->{$get}();
}

