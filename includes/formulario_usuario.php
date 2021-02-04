<main>
    <section>
        <a href="index.php">
            <button class="btn btn-success">voltar</button>
        </a>
    </section>

    <h2 class="mt-3">Cadastro de usuário</h2>

    <form method="POST">
        <div class="mb-2">
            <label class="form-label">Nome</label>
            <input type="text" class="form-control" name="nome">
        </div>

        <div class="mb-2">
            <label class="form-label">E-mail</label>
            <input type="email" class="form-control" name="email">
        </div>

        <div class="mb-2">
            <label class="form-label">Senha</label>
            <input type="password" class="form-control" name="senha">
        </div>

        <div class="mb-2">
            <div class="form-check">
                <input id="chek-cliente" class="form-check-input" name="cliente" type="checkbox" value="c" checked>
                <label class="form-check-label" for="chek-cliente">
                    Cliente
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" id="checkadm" name="administrador" type="checkbox" value="a">
                <label class="form-check-label" for="checkadm">
                    Administrador
                </label>
            </div>
        </div>

        <div>
            <button type="submit" class="btn btn-success">Enviar</button>
        </div>
    </form>
</main>