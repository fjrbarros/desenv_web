<?php

$resultado = "";
foreach ($usuarios as $usuario) {
    $resultado .= '<tr>
        <td>' . $usuario->id . '</td>
        <td>' . $usuario->nome . '</td>
        <td>' . $usuario->email . '</td>
        <td>' . (strtoupper($usuario->cliente) === 'S' ? 'Sim' : 'Não') . '</td>
        <td>' . (strtoupper($usuario->administrador) === 'S' ? 'Sim' : 'Não') . '</td>
        <td>' . date('d/m/Y', strtotime($usuario->data_cadastro)) . '</td>
        <td style="text-align: center;">
            <a style="text-decoration:none;" href="editar_usuario.php?id=' . $usuario->id . '">
                <button type="button" class="btn btn-primary">Editar</button>
            </a>
            <a style="text-decoration:none;" href="editar_usuario.php?id=' . $usuario->id . '">
                <button type="button" class="btn btn-danger">Excluir</button>
            </a>
        </td>
    </tr>';
}
?>
<main>
    <section>
        <a href="cadastro_usuario.php">
            <button class="btn btn-success">Cadastrar</button>
        </a>
    </section>

    <section>
        <table class="table bg-light mt-3">
            <thead>
                <tr>
                    <th>Código</th>
                    <th>Nome</th>
                    <th>E-mail</th>
                    <th>Cliente</th>
                    <th>Administrador</th>
                    <th>Data cadastro</th>
                    <th style="text-align: center;">Açoes</th>
                </tr>
            </thead>
            <tbody>
                <?= $resultado ?>
            </tbody>
        </table>
    </section>
</main>