<main>
    <form method="POST" style="max-width: 600px; margin: 0 auto;">
        <h3 class="text-center"><?= TITLE ?></h3>
        <input required placeholder="Nome" type="text" class="form-control mb-3" name="nome" value="<?= $usuario ? $usuario->nome : '' ?>">
        <select class="form-select mb-3" id="select-stado">
        <option value="" disabled>Selecione um estado</option>
        </select>
        <input required placeholder="E-mail" type="email" class="form-control mb-3" name="email" value="<?= strlen($usuario->email) ? $usuario->email : '' ?>">
        <input required placeholder="Senha" type="password" class="form-control mb-3" name="senha">
        <div class="form-check mb-1">
            <input name="cliente" class="form-check-input" type="checkbox" value="s" id="checkcliente" checked>
            <label class="form-check-label" for="checkcliente">
                Cliente
            </label>
        </div>
        <div class="form-check">
            <input name="administrador" class="form-check-input" type="checkbox" value="s" id="checkadm" <?= $usuario->administrador === 's' ? 'checked' : ''  ?>>
            <label class="form-check-label" for="checkadm">
                Administrador
            </label>
        </div>

        <div class="mb-3 mt-3" style="display: flex; justify-content:flex-end;">
            <button type="submit" class="btn btn-success" name="salvar"><i class="fas fa-save"></i>&nbsp;<span>Salvar</span></button>
        </div>
    </form>
</main>