<?php

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

require_once "../../vendor/autoload.php";

use \App\entity\Usuario;
use \App\entity\Util;


if (isset($_SESSION['LOGADO'])) {
    header('location: ../../index.php');
    exit;
}

$usuario = new Usuario();
$util = new Util();


$errorText = "";

if (isset($_POST['login'])) {

    $usuario->email = $_POST['email'];
    $usuario->senha = $_POST['senha'];

    if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        $errorText .= "E-mail inválido. </br>";
    }

    if (strlen($_POST['senha']) < 6) {
        $errorText .= "Senha deve possuir 6 ou mais caracteres";
    }

    if (strlen($errorText) != 0) {
        $errorText = $util->MsgError($errorText);
    } else {
        $data = $usuario->login();

        if (count($data) === 0) {
            $errorText = $util->MsgError("Usuário não cadastrado!");
        } else {
            $_SESSION['LOGADO'] = true;
            $_SESSION['ADM'] = strtoupper($data[0]->administrador);
            $_SESSION['ID_USUARIO'] = $data[0]->id;
            header('location: ../../index.php');
            exit;
        }
    }
}

include_once "./page.php";
