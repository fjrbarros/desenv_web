<?php

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

require_once "../../vendor/autoload.php";

define('TITLE', 'Cadastrar usuário');

use \App\entity\Usuario;

$usuario = new Usuario();

if (isset($_POST['salvar'])) {
    if (empty($_POST['cliente']) && empty($_POST['administrador'])) {
        $_SESSION['MSG_ALERT'] = "Obrigatório selecionar um tipo de usuário!";
        $_SESSION['LINK_ALERT'] = "/desenv_web/pages/usuario/cadastro_usuario.php";
        header('location: /desenv_web/util/msg.php');
        exit;
    }

    $usuario->nome = $_POST['nome'];
    $usuario->email = $_POST['email'];
    $usuario->senha = $_POST['senha'];
    $usuario->estado = $_POST['estado'];
    $usuario->cidade = $_POST['cidade'];
    $usuario->cliente = $_POST['cliente'] ? $_POST['cliente'] : "";
    $usuario->administrador = $_POST['administrador'] ? $_POST['administrador'] : "";

    $usuario->cadastrar();
    header('location: ./index.php?status=success');
    exit();
} else {
    $usuario->nome = "";
    $usuario->email = "";
    $usuario->senha = "";
    $usuario->estado = "";
    $usuario->cidade = "";
    $usuario->cliente = "";
    $usuario->administrador = "";
}

include_once "../../includes/header.php";
include_once "./formulario_usuario.php";
include_once "../../includes/footer.php";
