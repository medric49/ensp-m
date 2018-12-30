<?php
use yii\helpers\Html;
use app\models\Administrator;
use app\models\Exercise;
?>
<?php $this->beginBlock('title') ?>
Sessions
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

    <?php if (count($sessions)):?>
        <div class="row">
            <div class="col-12 white-block">
                <div class="row table-head py-2">
                    <h4 class="col-3">
                    Numéro
                    </h4>
                    <h4 class="col-3">
                    Exercice
                    </h4>
                    <h4 class="col-3">
                    Date
                    </h4>
                    <h4 class="col-3">
                    Administrateur
                    </h4>
                </div>

                <?php foreach ($sessions as $session):  
                    $exercise = Exercise::findOne(['id'=> $session->exercise_id]);
                    $admin = Administrator::findOne(['id'=> $session->administrator_id]); ?>

                    <div class="row py-3" style="border-bottom: 1px solid #e6e6e6">
                        <div class="col-3">
                            <a href="<?= Yii::getAlias("@member.detailsession")."?m=".$session->id?>" class="link">
                            <?= $session->id ?>
                            </a>
                        </div>
                        <div class="col-3">
                            <?= $exercise->year ?> 
                        </div>
                        <div class="col-3">
                            <?= $session->date ?> 
                        </div>
                        <div class="col-3">
                            <?= $admin->username ?> 
                        </div>
                    </div>
                <?php endforeach;?>
            </div>
        </div>
    <?php else: ?>
        <div class="row">
            <h1 class="col-12 text-center text-muted">Il ne s'est tenu aucune session jusqu'à présent.</h1>
        </div>
    <?php endif;?>

</div>