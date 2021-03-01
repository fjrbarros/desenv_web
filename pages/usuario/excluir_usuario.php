<?php

require_once "../../vendor/autoload.php";

use \App\entity\Usuario;

if (!isset($_GET['id']) or !is_numeric($_GET['id'])) {
    header('location: ./index.php?status=error');
    exit;
}

$usuario = Usuario::getUsuarioId($_GET['id']);

if (!$usuario instanceof Usuario) {
    header('location: ./index.php?status=error');
    exit;
}

if (isset($_POST['excluir'])) {
    $usuario->excluir();

    header('location: ./index.php?status=success');
    exit();
}

include_once "../../includes/header.php";
include_once "./confirmar_exclusao.php";
include_once "../../includes/footer.php";
