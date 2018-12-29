<?php
use yii\helpers\Html;
use app\models\Administrator;
use app\models\Exercise;
use app\models\Session;
?>
<?php $this->beginBlock('title') ?>
Mes épargnes
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

    <?php if (count($savings)):?>
    <div class="row">
        <div class="col-12 white-block">
            <div class="row table-head py-2">
                <h3 class="col-8">
                    Exercice
                </h3>
                <h3 class="col-4">
                    Session
                </h3>
                <h3 class="col-4">
                    Montant
                </h3>
                <h3 class="col-4">
                    Administrateur
                </h3>
                <h3 class="col-4">
                    Date
                </h3>
            </div>

            <?php foreach($savings as $saving): 
                $admin = Administrator::findOne(['id'=> $saving->administrator_id]);
                $session = Session::findOne(['id'=> $saving->session_id]);
                $exercise = Exercise::findOne(['id'=> $session->exercise_id]); ?>

                <div class="row py-3" style="border-bottom: 1px solid #e6e6e6">
                    <div class="col-8">
                        <?= $exercise->year ?>
                    </div>
                    <div class="col-4">
                        <?= $session->date ?> 
                    </div>
                    <div class="col-4">
                        <?= $saving->amount ?> XAF
                    </div>
                    <div class="col-4">
                        <?= $admin->username ?> 
                    </div>
                    <div class="col-4">
                        <?= $saving->created_at ?> 
                    </div>
                </div>
            <?php endforeach;?>
        </div>
    </div>



    <?php else: ?>
        <div class="row">
            <h1 class="col-12 text-center text-muted">Vous n'avez aucune épargne.</h1>
        </div>
    <?php endif;?>

</div>