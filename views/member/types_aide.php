<?php $this->beginBlock('title') ?>
Types d'aide
<?php $this->endBlock()?>
<?php $this->beginBlock('style')?>
<style>
    .table-head {
        background-color: rgba(30, 144, 255, 0.31);
        border-bottom: 1px solid dodgerblue;
    }
</style>
<?php $this->endBlock()?>


<div class="container mt-5 mb-5">

    <?php if (count($helptype)):?>
    <div class="row">
        <div class="col-12 white-block">
            <div class="row table-head py-2">
                <h3 class="col-8">
                    Titre
                </h3>
                <h3 class="col-4">
                    Montant
                </h3>
            </div>

            <?php foreach($helptype as $ht): ?>
                <div class="row py-3" style="border-bottom: 1px solid #e6e6e6">
                    <div class="col-8">
                        <?= $ht->title ?>
                    </div>
                    <div class="col-4">
                        <?= $ht->amount ?> XAF
                    </div>
                </div>
            <?php endforeach;?>
        </div>
    </div>



    <?php else: ?>
        <div class="row">
            <h1 class="col-12 text-center text-muted">Aucun type d'aide enregistré.</h1>
        </div>
    <?php endif;?>

</div>