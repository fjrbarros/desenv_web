<!DOCTYPE html>
<html lang="pt_br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/reset.css">
    <link rel="stylesheet" href="../styles/cadastro_usuario.css">
    <title>Cadastro de usuário</title>
</head>

<body>
    <?php require("../components/header.php") ?>
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