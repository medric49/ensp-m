<?php $this->beginBlock('title') ?>
Membres
<?php $this->endBlock()?>
<?php $this->beginBlock('style') ?>
<style>
    #btn-add {
        position: fixed!important;
        bottom: 25px;
        right: 25px;
        z-index: 1000;
        border-radius: 100px;
        font-size: 1.3rem;
        width: 50px;
        height: 50px;
        padding: 10px;
    }
</style>
<?php $this->endBlock()?>

<div class="container mt-5">
    <div class="row">
        <?php if (count($members) ):?>
            <h1 class="col-12 text-center">Il y a <?= count($members) ?> inscrit(s) sur la plate-forme</h1>
        <?php else:?>
            <h1 class="col-12 text-center text-muted">Aucun membre inscrit</h1>
        <?php endif;?>
    </div>

</div>
<a href="<?= Yii::getAlias("@administrator.new_member") ?>" class="btn btn-primary" id="btn-add"><i class="fas fa-plus"></i></a>