<?php

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

require_once "../../vendor/autoload.php";

define('TITLE', 'Cadastrar usuário');

use \App\entity\Usuario;
use \App\entity\Util;

$usuario = new Usuario();
$util = new Util();

$msgError = "";

$usuario->nome = empty($_POST['nome']) ? "" : $_POST['nome'];
$usuario->email = empty($_POST['email']) ? "" : $_POST['email'];
$usuario->senha = empty($_POST['senha']) ? "" : $_POST['senha'];
$usuario->estado = empty($_POST['estado']) ? "" : $_POST['estado'];
$usuario->cidade = empty($_POST['cidade']) ? "" : $_POST['cidade'];
$usuario->cliente = empty($_POST['cliente']) ? "" : $_POST['cliente'];
$usuario->administrador = empty($_POST['administrador']) ? "" : $_POST['administrador'];

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
        $usuario->cadastrar();
        header('location: ./index.php?status=success');
        exit;
    }
}

include_once "../../includes/header.php";
include_once "./formulario_usuario.php";
include_once "../../includes/footer.php";
