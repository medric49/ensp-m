<?php $this->beginBlock('title') ?>
Membres
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

    <?php if (count($members)):?>
    <div class="row">
        <div class="col-12 white-block">
            <div class="row table-head py-2">
                <h3 class="col-8">
                    Membre
                </h3>
            </div>

            <?php foreach($members as $member): ?>
                <div class="row py-3" style="border-bottom: 1px solid #e6e6e6">
                    <div class="col-8">
                        <a href="<?= Yii::getAlias("@member.profilmembre")."?m=".$member->user_id."&n=".$member->id?>" class="link">
                        <?= $member->username ?>
                    </div>
                </div>
            <?php endforeach;?>
        </div>
    </div>



    <?php else: ?>
        <div class="row">
            <h1 class="col-12 text-center text-muted">Aucun autre membre!</h1>
        </div>
    <?php endif;?>

</div>