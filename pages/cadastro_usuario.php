<!DOCTYPE html>
<html lang="pt_br">

<head>
    <?php
    require("../util/util.php");
    echo getHead();
    ?>
    <title>Cadastro</title>
    <link rel="stylesheet" href="/desenv_web/styles/cadastro_usuario.css">
</head>

<body>
    <?php require("../util/header.php") ?>
    <form action="">
        <input type="email" placeholder="E-mail" name="email">
        <input type="text" placeholder="Nome" name="nome">
        <input type="text" placeholder="Endereço" name="endereco">
        <input type="text" placeholder="Cpf" name="cpf">
        <div>
            <label>Masculino <input type="checkbox" name="maculino"></label>
            <label>Feminino <input type="checkbox" name="feminino"></label>
        </div>
        <input type="submit" value="Salvar">
    </form>
</body>

</html>