<?php

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['ADM'])) {
    $_SESSION['ADM'] = "N";
}

require_once "./vendor/autoload.php";

use \App\entity\Produto;

$produto = new Produto();

$produtos = $produto::getProdutos();

$resultado = "";

$count = 0;

foreach ($produtos as $produto) {
    $count += 1;
    $resultado .= '
    <div class="card bg-secondary card-extra">
        <img class="card-img" src="/desenv_web/img/' . $count . '.jpg" alt="header" />
        <div class="card-info text-white">
            <span class="d-block h4 nome-card">' . $produto->nome . '</span>
            <span class="d-block h6" style="height: 55px;max-height: 55px; overflow:auto;">' . $produto->descricao . '</span>
            <span class="d-block mt-1 mb-2">R$ ' . number_format($produto->valor, 2, ",", ".") . '</span>
            ' . getActionsAdm($produto) . '
            <button type="button" class="btn btn-outline-primary btn-sm float-end">
                <i class=" fas fa-shopping-cart"></i>
                <span>Adicionar</span>
            </button>
        </div>
    </div>';
    if ($count === 5) {
        $count = 0;
    }
}

function getActionsAdm($produto)
{
    if (strtoupper($_SESSION['ADM']) === "S") {
        return '<div class="float-start">
                <a style="text-decoration:none;" href="./pages/produto/editar_produto.php?id=' . $produto->id . '"  title="Editar">
                    <button type="button" class="btn btn-outline-primary btn-sm">
                        <i class="fas fa-edit"></i>
                    </button>
                </a>
                <a style="text-decoration:none;" href="./pages/produto/excluir_produto.php?id=' . $produto->id . '" title="Remover">
                    <button type="button" class="btn btn-outline-primary btn-sm">
                        <i class="far fa-trash-alt"></i>
                    </button>
                </a>
            </div>';
    }
    return "";
}

$semProduto = !strlen($resultado) ? '<div class="produtos-nao-cadastrados">Nenhum produto encontrado!</div>' : '';
?>

<main class="mb-2">
    <?= $semProduto ?>
    <div class="grid-cards">
        <?= $resultado ?>
    </div>
</main>