<?php

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

require_once "../../vendor/autoload.php";

use \App\entity\Usuario;


if (isset($_SESSION['LOGADO'])) {
    header('location: ../../index.php');
}

$usuario = new Usuario();


$errorText = "";

if (isset($_POST['login'])) {

    if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        $errorText .= "E-mail inválido. </br>";
    }

    if (strlen($_POST['senha']) < 6) {
        $errorText .= "Senha deve possuir mais 6 ou mais caracteres";
    }

    if (strlen($errorText) == 0) {
        $usuario->email = $_POST['email'];
        $usuario->senha = $_POST['senha'];

        $data = $usuario->login();

        if (count($data) === 0) {
            $errorText = "Erro ao recuperar dados!";
        } else {
            $_SESSION['LOGADO'] = true;
            $_SESSION['ADM'] = strtoupper($data[0]->administrador) === "S";
            $_SESSION['ID_USUARIO'] = $data[0]->id;
            header('location: ../../index.php');
            exit;
        }
    }
}

include_once "./page.php";
