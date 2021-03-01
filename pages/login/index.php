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
    $usuario->email = $_POST['email'];
    $usuario->senha = $_POST['senha'];

    $data = $usuario->login();

    if (count($data) === 0) {
        $errorText = "Dados inválidos!";
    } else {
        $_SESSION['LOGADO'] = true;
        $_SESSION['ADM'] = strtoupper($data[0]->administrador) === "S";
        $_SESSION['ID_USUARIO'] = $data[0]->id;
        header('location: ../../index.php');
        exit;
    }
}

include_once "./page.php";
