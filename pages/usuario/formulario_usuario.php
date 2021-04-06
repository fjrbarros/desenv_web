<?php

if (!isset($_SESSION['ADM'])) {
    $_SESSION['ADM'] = "N";
}

$hiddenAdm = strtoupper($_SESSION['ADM']) === "N" ? "hidden" : "";

?>


<main>
    <form method="POST" style="max-width: 600px; margin: 0 auto;" id="form-user">
        <h3 class="text-center"><?= TITLE ?></h3>
        <input type="hidden" id="value-estado" value="<?= $usuario ? $usuario->estado : '' ?>"></input>
        <input type="hidden" id="value-cidade" value="<?= $usuario ? $usuario->cidade : '' ?>"></input>
        <input required placeholder="Nome" type="text" class="form-control mb-3" name="nome" value="<?= $usuario ? $usuario->nome : '' ?>">
        <select class="form-select mb-3" id="select-estado" name="estado">
            <option selected disabled>Selecione um estado</option>
        </select>
        <select class="form-select mb-3" id="select-cidade" name="cidade">
            <option selected disabled>Selecione uma cidade</option>
        </select>
        <input required placeholder="E-mail" type="email" class="form-control mb-3" name="email" value="<?= strlen($usuario->email) ? $usuario->email : '' ?>">
        <input required placeholder="Senha" type="password" class="form-control mb-3" name="senha">
        <div class="form-check mb-1">
            <input name="cliente" class="form-check-input" type="checkbox" value="s" id="checkcliente" checked>
            <label class="form-check-label" for="checkcliente">
                Cliente
            </label>
        </div>
        <div class="form-check" <?= $hiddenAdm ?>>
            <input name="administrador" class="form-check-input" type="checkbox" value="s" id="checkadm" <?= $usuario->administrador === 's' ? 'checked' : ''  ?>>
            <label class="form-check-label" for="checkadm">
                Administrador
            </label>
        </div>

        <div class="mb-3 mt-3" style="display: flex; justify-content:flex-end;">
            <button type="submit" class="btn btn-primary btn-sm" name="salvar"><i class="fas fa-save"></i>&nbsp;<span>Salvar</span></button>
        </div>
    </form>
</main>