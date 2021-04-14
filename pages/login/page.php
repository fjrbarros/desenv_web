<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="stylesheet" href="./style.css">
    <title>Desenvolvimento Web</title>
</head>

<body class="bg-dark">
    <form method="POST">
        <input required placeholder="E-mail" type="text" class="form-control mb-3" name="email" value="<?= $usuario ? $usuario->email : '' ?>">
        <input required placeholder="Senha" type="password" class="form-control mb-3" name="senha" value="<?= $usuario ? $usuario->senha : '' ?>">
        <?= $errorText ?>
        <button class="btn btn-outline-primary" name="login">Entrar</button>
    </form>
</body>

</html>