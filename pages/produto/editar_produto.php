<?php

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

require_once "../../vendor/autoload.php";

define('TITLE', 'Editar produto');

use \App\entity\Produto;

if (!isset($_GET['id']) or !is_numeric($_GET['id'])) {
    header('location: ./index.php?status=error');
    exit;
}

$produto = Produto::getProdutoId($_GET['id']);


if (!$produto instanceof Produto) {
    header('location: ./index.php?status=error');
    exit;
}

$msg_erro = "";

if (isset($_POST['salvar'])) {

    $nome = trim($_POST['nome']);
    $descricao = trim($_POST['descricao']);
    $valor = trim($_POST['valor']);

    if (strlen($nome) === 0 || empty($nome)) {
        $msg_erro .= "Obrigatório informar nome do produto! <br>";
    } else {
        $produto->nome = $nome;
    }

    if (strlen($descricao) === 0 || empty($descricao)) {
        $msg_erro .= "Obrigatório informar a descrição do produto! <br>";
    } else {
        $produto->descricao = $descricao;
    }

    if (strlen($valor) === 0 || empty($valor)) {
        $msg_erro .= "Obrigatório informar o valor do produto! <br>";
    } else {
        $produto->valor = $valor;
    }

    $msg_erro = montaMsgErro($msg_erro);

    if (strlen($msg_erro) === 0) {
        $produto->atualizar();

        header('location: /desenv_web/index.php');
        exit;
    }
}

function montaMsgErro($msg)
{
    return strlen($msg) ? '<div class="alert alert-danger""> ' . $msg . '</div>' : "";
}

include_once "../../includes/header.php";
include_once "./formulario_produto.php";
include_once "../../includes/footer.php";
