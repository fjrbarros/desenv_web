<?php

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

require_once "../../vendor/autoload.php";

use \App\entity\Usuario;


if (isset($_SESSION['LOGADO'])) {
    header('location: ../../index.php');
    exit;
}

$usuario = new Usuario();


$errorText = "";

if (isset($_POST['login'])) {

    $usuario->email = $_POST['email'];
    $usuario->senha = $_POST['senha'];

    if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        $errorText .= "E-mail inválido. </br>";
    }

    if (strlen($_POST['senha']) === 0) {
        $errorText .= "Senha inválida!";
    }

    $errorText = montaMsgErro($errorText);

    if (strlen($errorText) === 0) {
        $data = $usuario->login();

        if (count($data) === 0) {
            $errorText = montaMsgErro("Usuário não cadastrado!");
        } else {
            $_SESSION['LOGADO'] = true;
            $_SESSION['ADM'] = strtoupper($data[0]->administrador);
            $_SESSION['ID_USUARIO'] = $data[0]->id;
            header('location: ../../index.php');
            exit;
        }
    }
}

function montaMsgErro($msg)
{
    return strlen($msg) ? '<div class="border border-danger p-2 text-danger""> ' . $msg . '</div>' : "";
}

include_once "./page.php";
