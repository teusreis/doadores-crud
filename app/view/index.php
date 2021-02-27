<?php $this->layout('layouts/main') ?>

<div class="container">
    <div class="row py-3">
        <div class="col-6">
            <h1 class="h3">
                Doadores castrados!
            </h1>
        </div>
        <div class="col-6 text-right">
            <a href="<?= url("/create") ?>" class="text-dark font-weight-bold">Novo doador</a>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="table-responsive-md">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>
                                CPF
                            </th>
                            <th>
                                Nome
                            </th>
                            <th>
                                Telefone
                            </th>
                            <th>
                                Nacimento
                            </th>
                            <th>
                                Intervalo de Doação
                            </th>
                            <th>
                                Ações
                            </th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php foreach ($doadores as $i => $doador) : ?>

                            <tr>
                                <td scope="row">
                                    <?= $doador->cpf ?>
                                </td>
                                <td>
                                    <?= $doador->nome ?>
                                </td>
                                <td>
                                    <?= $doador->telefone ?>
                                </td>
                                <td>
                                    <?= $doador->nasc ?>
                                </td>
                                <td>
                                    <?= $doador->intervaloDoacao ?>
                                </td>
                                <td>
                                    <button class="btn btn-sm btn-secondary visualizaDoador" data-id="<?= $doador->id ?>" data-toggle="modal" data-target="#modelVisualizarDoador">Visualizar</button>

                                    <a href="<?= url("/edit/{$doador->id}") ?>" class="btn btn-sm btn-primary">Editar</a>

                                    <button class="btn btn-sm btn-danger deleteDoardor" data-id="<?= $doador->id ?>" data-nome="<?= $doador->nome ?>" data-toggle="modal" data-target="#modalDeleteDoador">
                                        Deletar
                                    </button>
                                </td>
                            </tr>

                        <?php endforeach ?>

                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>

<!-- Modal Para visualizar os dados dos doadores! -->
<div class="modal" id="modelVisualizarDoador" tabindex="-1">
    <div class="modal-dialog modal-dialog-scrollable modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Visualizar Doador</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="nome">Nome</label>
                            <input type="text" name="nome" id="nome" class="form-control" readonly>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="cpf">CPF</label>
                        <input type="text" name="cpf" id="cpf" class="form-control" readonly>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <label for="email">E-mail</label>
                            <input type="email" name="email" id="email" class="form-control" readonly>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <label for="endereco">Endereço</label>
                            <input type="text" name="endereco" id="endereco" class="form-control" readonly>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="telefone">Telefone</label>
                            <input type="text" name="telefone" id="telefone" class="form-control" readonly>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <label for="nasc">Data de nacimento</label>
                        <input type="date" name="nasc" id="nasc" class="form-control" readonly>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="valorDoacao">Valor da Doação</label>
                            <input type="text" name="valorDoacao" id="valorDoacao" class="form-control" readonly>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="formaPagamento">Forma de Pagamento </label>
                            <input type="text" name="formaPagamento" id="formaPagamento" class="form-control" readonly>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="intervaloDoacao">Intervalo de Doação </label>
                            <input type="text" name="intervaloDoacao" id="intervaloDoacao" class="form-control" id="" value="" readonly>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Close</button>
                <a href="<?= url("/edit") ?>" class="btn btn-sm btn-primary linkEditar">Editar Doador</a>
            </div>
        </div>
    </div>
</div>

<!-- Modal para excluir os doadores! -->
<div class="modal fade" id="modalDeleteDoador" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Deletar Doador</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p class="modalMessage"></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-sm btn-sm btn-secondary" data-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-sm btn-danger btnDelete">Deletar</button>
            </div>
        </div>
    </div>
</div>

<?php $this->start("script") ?>
<script type="module" src="<?= loadJs("index.js") ?>"></script>
<?php $this->end() ?>