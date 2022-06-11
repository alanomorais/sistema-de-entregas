<?php

use App\Controllers\EntregaController;

require __DIR__ . './vendor/autoload.php';
//use App\Controllers\EntregaController;

$entregas = new EntregaController();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {    
    $post = isset($_POST['button']) ? $_POST['button'] : 'index';
    $entregas->{$post}();
} else {
    $get = isset($_GET['page']) ? $_GET['page'] : 'index';
    $entregas->{$get}();
}
