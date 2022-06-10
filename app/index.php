<?php
namespace App;
use App\Controllers\EntregaController;

require __DIR__.'./Controllers/EntregaController.php';

$entregas = new EntregaController();

return $entregas->index();