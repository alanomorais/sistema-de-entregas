<?php

use App\Controllers\EntregaController;

$entregas = new EntregaController();

return $entregas->index();