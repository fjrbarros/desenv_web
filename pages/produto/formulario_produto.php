<main>
    <form method="POST" style="max-width: 600px; margin: 0 auto;">
        <h3 class="text-center"><?= TITLE ?></h3>
        <?= $msg_erro ?>
        <input placeholder="Nome" class="form-control mb-3" name="nome" value="<?= $produto->nome ?>">
        <input class="form-control mb-3" type="file" id="formFile" hidden>
        <textarea rows="3" class="form-control mb-3" placeholder="Descrição" name="descricao"><?= $produto->descricao ?></textarea>
        <input placeholder="Valor" type="number" class="form-control mb-3" name="valor" value="<?= $produto->valor ?>">
        <div class="mb-3 mt-3" style="display: flex; justify-content:flex-end;">
            <button type="submit" class="btn btn-primary btn-sm" name="salvar"><i class="fas fa-save"></i>&nbsp;<span>Salvar</span></button>
        </div>
    </form>
</main>