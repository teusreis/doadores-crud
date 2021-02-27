<?php $this->layout('layouts/main') ?>

<div class="container">
    <div class="row">
        <div class="col-md-8 offset-md-2">

            <div class="row my-3 border-bottom">
                <div class="col-6">
                    <h1 class="h3">
                        Novo Doador
                    </h1>
                </div>
            </div>

            <?= $this->insert("_form", ["doador" => $doador, "url" => "/edit/{$doador->id}"]) ?>
        </div>
    </div>
</div>

<?php $this->start("script") ?>
    <script type="module" src="<?= loadJs("form.js"); ?>"></script>
<?php $this->end() ?>