<?php

//Debugger
// echo "<pre>";
// print_r($usuarios);
// echo "</pre>";
// exit;

require __DIR__ . '/vendor/autoload.php';

use \App\entity\Usuario;

$usuarios = Usuario::getUsuarios();

include __DIR__ . '/includes/header.php';
include __DIR__ . '/includes/listagem.php';
include __DIR__ . '/includes/footer.php';
