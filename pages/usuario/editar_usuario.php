<?php

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

require_once "../../vendor/autoload.php";

define('TITLE', 'Editar usuário');

use \App\entity\Usuario;
use \App\entity\Util;

if (!isset($_GET['id']) or !is_numeric($_GET['id'])) {
    header('location: ./index.php?status=error');
    exit;
}

$msgError = "";

$util = new Util();
$usuario = Usuario::getUsuarioId($_GET['id']);

if (!$usuario instanceof Usuario) {
    header('location: ./index.php?status=error');
    exit;
}

if (isset($_POST['salvar'])) {

    if (empty($_POST['cliente']) && empty($_POST['administrador'])) {
        $msgError .= "Obrigatório selecionar um tipo de usuário! <br>";
    }

    if (strlen($_POST['senha']) < 6) {
        $msgError .= "Senha deve possuir 6 ou mais caracteres! <br>";
    }

    if (strlen($msgError) > 0) {
        $msgError = $util->MsgError($msgError);
    } else {
        $usuario->nome = $_POST['nome'];
        $usuario->email = $_POST['email'];
        $usuario->senha = $_POST['senha'];
        $usuario->estado = $_POST['estado'];
        $usuario->cidade = $_POST['cidade'];
        $usuario->cliente = empty($_POST['cliente']) ? "" : $_POST['cliente'];
        $usuario->administrador = empty($_POST['administrador']) ? "" : $_POST['administrador'];
        $usuario->atualizar();
        header('location: ./index.php?status=success');
        exit;
    }
}

include_once "../../includes/header.php";
include_once "./formulario_usuario.php";
include_once "../../includes/footer.php";
