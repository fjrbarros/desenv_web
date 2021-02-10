<?php

require __DIR__ . '/vendor/autoload.php';

use \App\entity\Usuario;

if (isset($_POST['salvar'])) {
    if (empty($_POST['nome']) || empty($_POST['email']) || empty($_POST['senha'])) {
        die("Dados não informados");
    }

    if (empty($_POST['cliente']) && empty($_POST['administrador'])) {
        die("Informar cliente ou administrador");
    }

    $usuario = new Usuario();

    $usuario->nome = $_POST['nome'];
    $usuario->email = $_POST['email'];
    $usuario->senha = $_POST['senha'];
    if (isset($_POST['cliente'])) {
        $usuario->cliente = $_POST['cliente'];
    }
    if (isset($_POST['administrador'])) {
        $usuario->administrador = $_POST['administrador'];
    }

    $usuario->cadastrar();

    header('location: index.php?status=success');
    exit();
}


include __DIR__ . '/includes/header.php';
include __DIR__ . '/includes/formulario_usuario.php';
include __DIR__ . '/includes/footer.php';
