<?php

require_once "../../vendor/autoload.php";

use \App\entity\Usuario;

$usuarios = Usuario::getUsuarios();

include_once "../../includes/header.php";
include_once './listagem.php';
include_once "../../includes/footer.php";
