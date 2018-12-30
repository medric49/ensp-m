<?php
use yii\helpers\Html;
use app\models\Administrator;
use app\models\Exercise;
use app\models\Help;
use app\models\Help_type;
use app\models\Member;
use app\models\Session;
?>
<?php $this->beginBlock('title') ?>
Mes contributions
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

    <?php if (count($contributions)):?>
    <div class="row">
        <div class="col-12 white-block">
            <div class="row table-head py-2">
                <h4 class="col-2">
                    Montant
                </h4>
                <h4 class="col-2">
                    Date
                </h4>
                <h4 class="col-3">
                    Administrateur
                </h4>
                <h4 class="col-3">
                    Membre aidé
                </h4>
                <h4 class="col-2">
                    Motif
                </h4>
            </div>

            <?php foreach ($contributions as $contribution): 
            $admin = Administrator::findOne(['id'=> $contribution->administrator_id]);
            $help = Help::findOne(['id'=> $contribution->help_id]);
            $helptype = Help_type::findOne(['id'=> $help->help_type_id]);
            $member = Member::findOne(['id'=> $help->member_id]);
            //$session = Session::findOne(['id'=> $borrowing->session_id]);
            //$exercise = Exercise::findOne(['id'=> $session->exercise_id]); ?>

                <div class="row py-3" style="border-bottom: 1px solid #e6e6e6">
                    <div class="col-2">
                        <?= $help->unit_amount ?> XAF
                    </div>
                    <div class="col-2">
                        <?= $contribution->date ?> 
                    </div>
                    <div class="col-3">
                        <?= $admin->username ?> 
                    </div>
                    <div class="col-3">
                        <?= $member->username ?> 
                    </div>
                    <div class="col-2">
                        <?= $helptype->title ?> 
                    </div>
                </div>
            <?php endforeach;?>
        </div>
    </div>



    <?php else: ?>
        <div class="row">
            <h1 class="col-12 text-center text-muted">Vous n'avez fait aucune contribution.</h1>
        </div>
    <?php endif;?>

</div>