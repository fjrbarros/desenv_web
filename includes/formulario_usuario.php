<main>
    <form method="POST" style="max-width: 600px; margin: 0 auto;">
        <h3 class="text-center">Cadastro de usuário</h3>
        <input required placeholder="Nome" type="text" class="form-control mb-3" name="nome">
        <input required placeholder="E-mail" type="email" class="form-control mb-3" name="email">
        <input required placeholder="Senha" type="password" class="form-control mb-3" name="senha">
        <div class="form-check mb-1">
            <input name="cliente" class="form-check-input" type="checkbox" value="s" id="checkcliente" checked>
            <label class="form-check-label" for="checkcliente">
                Cliente
            </label>
        </div>
        <div class="form-check">
            <input name="administrador" class="form-check-input" type="checkbox" value="s" id="checkadm">
            <label class="form-check-label" for="checkadm">
                Administrador
            </label>
        </div>

        <div class="mb-3 mt-3" style="display: flex; justify-content:space-between;">
            <button type="submit" class="btn btn-success" name="salvar">Salvar</button>
            <a href="index.php">
                <button type="button" class="btn btn-success">voltar</button>
            </a>
        </div>
    </form>
</main>