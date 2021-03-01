<?php

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

require_once "../../vendor/autoload.php";

define('TITLE', 'Editar usuário');

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

if (isset($_POST['salvar'])) {
    if (empty($_POST['cliente']) && empty($_POST['administrador'])) {
        $_SESSION['MSG_ALERT'] = "Obrigatório selecionar um tipo de usuário!";
        $_SESSION['LINK_ALERT'] = "/desenv_web/pages/usuario/editar_usuario.php?id=" . $_GET['id'];
        header('location: /desenv_web/util/msg.php');
        exit;
    }

    $usuario->nome = $_POST['nome'];
    $usuario->email = $_POST['email'];
    $usuario->senha = $_POST['senha'];
    $usuario->cliente = $_POST['cliente'] ? $_POST['cliente'] : '';
    $usuario->administrador = $_POST['administrador'] ? $_POST['administrador'] : '';
    $usuario->atualizar();

    header('location: ./index.php?status=success');
    exit;
}

include_once "../../includes/header.php";
include_once "./formulario_usuario.php";
include_once "../../includes/footer.php";
