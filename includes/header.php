<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['ADM'])) {
    $_SESSION['ADM'] = "N";
}

?>
<!doctype html>
<html lang="pt-BR">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">
    <link rel="stylesheet" href="/desenv_web/styles/header.css">
    <link rel="stylesheet" href="/desenv_web/styles/inicio.css">

    <title>Desenvolvimento Web</title>
</head>

<body class="bg-dark text-light">
    <header class=" mb-3 header text-center">
        <h1>Game Store</h1>
        <nav class="nav-list">
            <ul>
                <li>
                    <a href="/desenv_web/index.php">
                        <i class="fas fa-home"></i>
                        <span>Home</span>
                    </a>
                </li>
                <li>
                    <a href="/desenv_web/pages/usuario/index.php">
                        <i class="fas fa-users"></i>
                        <span>Usuários</span>
                    </a>
                </li>
                <?php
                if (strtoupper($_SESSION['ADM']) === "S") {
                    echo '<li>
                            <a href="/desenv_web/pages/produto/index.php">
                                <i class="fas fa-box-open"></i>
                                <span>Produtos</span>
                            </a>
                        </li>';
                }
                ?>
                <li>
                    <a href="#">
                        <i class="fas fa-shopping-cart"></i>
                        <span>Carrinho</span>
                    </a>
                </li>
                <?php
                if (isset($_SESSION['LOGADO'])) {
                    echo "<li>" .
                        "<a href='/desenv_web/util/logout.php'>" .
                        "<i class='fas fa-power-off'></i>" .
                        "<span>&nbsp;Logout</span>" .
                        "</a>" .
                        "</li>";
                } else {
                    echo "<li>" .
                        "<a href='/desenv_web/pages/login/index.php'>" .
                        "<i class='fas fa-sign-in-alt'></i>" .
                        "<span>&nbsp;Login</span>" .
                        "</a>" .
                        "</li>";
                }
                ?>
                <!-- <li>
                    <a href="/desenv_web/pages/login/index.php">
                        <i class="fas fa-sign-in-alt"></i>
                        <span>Login</span>
                    </a>
                </li> -->
                <!-- <li>
                    <a href="#">Cadastro</a>
                    <ul>
                        <li><a href="/desenv_web/pages/usuario/cadastro_usuario.php">Usuário</a></li>
                        <li><a href="#">Produto</a></li>
                    </ul>
                </li> -->
            </ul>
        </nav>
    </header>
    <div class="container">