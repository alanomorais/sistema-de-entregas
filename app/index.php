<?php

use App\Controllers\EntregaController;

require __DIR__ . './vendor/autoload.php';
//use App\Controllers\EntregaController;

$entregas = new EntregaController();


$get = isset($_GET['page']) ? $_GET['page'] : '';
switch($get){
    case('insert'): echo 'insert';
        break;
    default: $entregas->index();
    break;
}



