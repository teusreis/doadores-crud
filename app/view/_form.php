<form action="<?= url($url) ?>" method="post" id="form">
    <div class="row d-none">
        <input type="text" name="doadorId" id="doadorId" class="form-control" value="<?= $doador->id ?? "null" ?>">
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="nome">Nome</label>
                <input type="text" name="nome" id="nome" class="form-control" value="<?= $doador->nome ?? "" ?>">
                <div class="invalid-message"></div>
            </div>
        </div>
        <div class="col-md-6">
            <label for="cpf">CPF</label>
            <input type="text" name="cpf" id="cpf" class="form-control" value="<?= $doador->cpf ?? "" ?>" maxlength="14">
            <div class="invalid-message"></div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="form-group">
                <label for="email">E-mail</label>
                <input type="email" name="email" id="email" class="form-control" value="<?= $doador->email ?? "" ?>">
                <div class="invalid-message"></div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="form-group">
                <label for="endereco">Endereço</label>
                <input type="text" name="endereco" id="endereco" class="form-control" value="<?= $doador->endereco ?? "" ?>">
                <div class="invalid-message"></div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="telefone">Telefone</label>
                <input type="text" name="telefone" id="telefone" class="form-control" value="<?= $doador->telefone ?? "" ?>">
                <div class="invalid-message"></div>
            </div>
        </div>

        <div class="col-md-6">
            <label for="nasc">Data de nacimento</label>
            <input type="date" name="nasc" id="nasc" class="form-control" value="<?= $doador->nasc ?? "" ?>" min="1900-01-01" max="2019-12-31">
            <div class="invalid-message"></div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="valorDoacao">Valor da Doação</label>
                <input type="int" name="valorDoacao" id="valorDoacao" class="form-control" value="<?= $doador->valorDoacao ?? "" ?>">
                <div class="invalid-message"></div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                <label for="formaPagamento">Forma de Pagamento </label>
                <select name="formaPagamento" id="formaPagamento" class="form-control" value="<?= $doador->formaPagamento ?? "" ?>">
                    <option value="Debito" <?php if (isset($doador->formaPagamento) && $doador->formaPagamento == "Debito") echo "selected='selected'"; ?>>Debito</option>
                    <option value="Crédito" <?php if (isset($doador->formaPagamento) && $doador->formaPagamento == "Crédito") echo "selected='selected'"; ?>>Crédito</option>
                </select>
                <div class="invalid-message"></div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                <label for="intervaloDoacao">Intervalo de Doação </label>
                <select name="intervaloDoacao" id="intervaloDoacao" class="form-control" value="<?= $doador->intervaloDoacao ?? "" ?>">
                    <option value="Único" <?php if (isset($doador->intervaloDoacao) && $doador->intervaloDoacao == "Único") echo "selected='selected'"; ?>>Único</option>
                    <option value="Bimestral" <?php if (isset($doador->intervaloDoacao) && $doador->intervaloDoacao == "Bimestral") echo "selected='selected'"; ?>>Bimestral</option>
                    <option value="Semestral" <?php if (isset($doador->intervaloDoacao) && $doador->intervaloDoacao == "Semestral") echo "selected='selected'"; ?>>Semestral</option>
                    <option value="Anual" <?php if (isset($doador->intervaloDoacao) && $doador->intervaloDoacao == "Anual") echo "selected='selected'"; ?>>Anual</option>
                </select>
                <div class="invalid-message"></div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12 d-flex justify-content-end">
            <a href="<?= url() ?>" class="btn btn-secondary">
                Cancelar
            </a>
            <button type="submit" class="btnSubmit btn btn-primary ml-2">
                Criar
            </button>
        </div>
    </div>
</form>