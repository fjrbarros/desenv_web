<main>
    <form method="POST" style="max-width: 600px; margin: 0 auto;">
        <p>Deseja realmente deseja excluir o usuário <strong><?= $usuario->nome ?></strong>?</p>

        <div class="mb-3 mt-3" style="display: flex; justify-content:space-between;">
            <button type="submit" class="btn btn-danger">
                <i class="fas fa-user-times"></i>&nbsp;<span>Excluir</span>
            </button>

            <a href="./index.php">
                <button type="button" class="btn btn-success">
                    <i class="fas fa-arrow-left"></i>&nbsp;<span>Voltar</span>
                </button>
            </a>
        </div>
    </form>
</main>