<main>
    <form method="POST" style="max-width: 600px; margin: 0 auto;">
        <p>Deseja realmente deseja excluir o usuário <strong><?= $produto->nome ?></strong>?</p>

        <div class="mb-3 mt-3" style="display: flex; justify-content:space-between;">
            <button type="submit" name="excluir" class="btn btn-danger btn-sm">
                <i class="fas fa-user-times"></i>&nbsp;<span>Excluir</span>
            </button>

            <a href="/desenv_web/index.php">
                <button type="button" class="btn btn-success btn-sm">
                    <i class="fas fa-arrow-left"></i>&nbsp;<span>Voltar</span>
                </button>
            </a>
        </div>
    </form>
</main>