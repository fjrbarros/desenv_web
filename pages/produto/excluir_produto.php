<?php

require_once "../../vendor/autoload.php";

use \App\entity\Produto;

if (!isset($_GET['id']) or !is_numeric($_GET['id'])) {
    header('location: /desenv_web/index.php?status=error');
    exit;
}

$produto = Produto::getProdutoId($_GET['id']);

if (!$produto instanceof Produto) {
    header('location: /desenv_web/index.php?status=error');
    exit;
}

if (isset($_POST['excluir'])) {
    $produto->excluir();

    header('location: /desenv_web/index.php');
    exit();
}

include_once "../../includes/header.php";
include_once "./confirmar_exclusao.php";
include_once "../../includes/footer.php";
