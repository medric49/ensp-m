<?php
use yii\helpers\Html;
use app\models\Administrator;
use app\models\Exercise;
use app\models\Saving;
use app\models\Member;
use app\models\Borrowing;
use app\models\Refund;
use app\models\Help;
?>
<?php $this->beginBlock('title') ?>
Détails session <?= $m ?>
<?php $this->endBlock()?>
<?php $this->beginBlock('style')?>
<style>
    .table-head {
        background-color: rgba(30, 144, 255, 0.31);
        border-bottom: 1px solid dodgerblue;
    }
    
</style>
<?php $this->endBlock()?>

<?php 
$savings= Saving::find(['session_id'=> $m])->all();
$borrowings= Borrowing::find(['session_id'=> $m])->all();
$refunds= Refund::find(['session_id'=> $m])->all();
?>

<div class="container mt-5 mb-5">

    <?php if (count($savings)):?>
        
        <div class="row">
            <div>
                <h2>Liste des epargnes</h2>
            </div>
            <div class="col-12 white-block">
                <div class="row table-head py-2">
                    <h3 class="col-6">
                    Membre
                    </h3>
                    <h3 class="col-6">
                    Montant
                    </h3>
                    
                </div>

                <?php foreach ($savings as $saving):  
                    $member = Member::findOne(['id'=> $saving->member_id]); ?>

                    <div class="row py-3" style="border-bottom: 1px solid #e6e6e6">
                        <div class="col-6">
                            <?= $member->username ?> 
                        </div>
                        <div class="col-6">
                            <?= $saving->amount ?> XAF
                        </div>
                    </div>
                <?php endforeach;?>
            </div>
        </div>
    <?php else: ?>
        <div class="row">
            <h1 class="col-12 text-center text-muted">Il n'y a eu aucune épargne à cette session.</h1>
        </div>
    <?php endif;?>
    <div>
        <p>


        
    </div>
    <?php if (count($borrowings)):?>
        <div class="row">
            <div>
                <h2>Liste des emprunts</h2>
            </div>
            <div class="col-12 white-block">
                <div class="row table-head py-2">
                    <h3 class="col-6">
                    Membre
                    </h3>
                    <h3 class="col-6">
                    Montant
                    </h3>
                </div>

                <?php foreach ($borrowings as $bor):  
                    $member = Member::findOne(['id'=> $bor->member_id]); ?>

                    <div class="row py-3" style="border-bottom: 1px solid #e6e6e6">
                        <div class="col-6">
                            <?= $member->username ?> 
                        </div>
                        <div class="col-6">
                            <?= $bor->amount ?> XAF
                        </div>
                    </div>
                <?php endforeach;?>
            </div>
        </div>
    <?php else: ?>
        <div class="row">
            <h1 class="col-12 text-center text-muted">Il n'y a eu aucun emprunt à cette session.</h1>
        </div>
    <?php endif;?>
    <div>
        <p>



    </div>
    <?php if (count($refunds)):?>
        <div class="row">
            <div>
                <h2>Liste des remboursements</h2>
            </div>
            <div class="col-12 white-block">
                <div class="row table-head py-2">
                    <h3 class="col-4">
                        Membre
                    </h3>
                    <h3 class="col-4">
                        Montant
                    </h3>
                    <h3 class="col-4">
                        Montant emprunté
                    </h3>
                </div>

                <?php foreach ($refunds as $ref):  
                     $borr = Borrowing::findOne(['id'=> $ref->borrowing_id]);
                     $member = Member::findOne(['id'=> $borr->member_id]); ?>

                    <div class="row py-3" style="border-bottom: 1px solid #e6e6e6">
                        <div class="col-4">
                            <?= $member->username ?> 
                        </div>
                        <div class="col-3">
                            <?= $ref->amount ?> XAF
                        </div>
                        <div class="col-3">
                            <?= $borr->amount ?> XAF
                        </div>
                    </div>
                <?php endforeach;?>
            </div>
        </div>
    <?php else: ?>
        <div class="row">
            <h1 class="col-12 text-center text-muted">Il n'y a eu aucun remboursement à cette session.</h1>
        </div>
    <?php endif;?>

</div>