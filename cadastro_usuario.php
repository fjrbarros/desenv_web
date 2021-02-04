<?php

require __DIR__ . '/vendor/autoload.php';

if (empty($_POST['nome']) || empty($_POST['email']) || empty($_POST['senha'])) {
    die("Dados não informados");
}

if (empty($_POST['cliente']) && empty($_POST['administrador'])) {
    die("Informar cliente ou administrador");
}

include __DIR__ . '/includes/header.php';
include __DIR__ . '/includes/formulario_usuario.php';
include __DIR__ . '/includes/footer.php';
