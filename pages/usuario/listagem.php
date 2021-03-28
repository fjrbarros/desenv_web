<?php

$mensagem = '';
if (isset($_GET['status'])) {
    switch ($_GET['status']) {
        case 'success':
            $mensagem = '<div class="alert alert-success">Operação realizada com sucesso!</div>';
            break;
        case 'error':
            $mensagem = '<div class="alert alert-success">Erro ao realizar operação!</div>';
            break;
    }
}

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
            <a style="text-decoration:none;" href="./editar_usuario.php?id=' . $usuario->id . '">
                <button type="button" class="btn btn-primary btn-sm"><i class="fas fa-user-edit"></i>&nbsp;<span>Editar</span></button>
            </a>
            <a style="text-decoration:none;" href="./excluir_usuario.php?id=' . $usuario->id . '">
                <button type="button" class="btn btn-danger btn-sm"><i class="fas fa-user-times"></i>&nbsp;<span>Excluir</span></button>
            </a>
        </td>
    </tr>';
}

$resultado = strlen($resultado) ? $resultado : '<tr><td colspan="7" class="text-center">Nenhum usuário encontrado!</td></tr>';

?>
<main>

    <!-- <?= $mensagem ?> -->

    <section>
        <a href="./cadastro_usuario.php">
            <button class="btn btn-success btn-sm">
                <i class="fas fa-plus"></i>
                <span>Cadastrar</span>
            </button>
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