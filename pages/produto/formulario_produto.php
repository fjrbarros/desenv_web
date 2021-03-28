<main>
    <form method="POST" style="max-width: 600px; margin: 0 auto;">
        <h3 class="text-center">Cadastro de produto</h3>
        <input required placeholder="Nome" class="form-control mb-3" name="nome">
        <input class="form-control mb-3" type="file" id="formFile">
        <textarea required rows="3" class="form-control mb-3" placeholder="Descrição"></textarea>
        <input required placeholder="Valor" type="number" class="form-control mb-3" name="valor">
        <div class="mb-3 mt-3" style="display: flex; justify-content:flex-end;">
            <button type="submit" class="btn btn-primary btn-sm" name="salvar"><i class="fas fa-save"></i>&nbsp;<span>Salvar</span></button>
        </div>
    </form>
</main>