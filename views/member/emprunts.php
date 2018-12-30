<?php
use yii\helpers\Html;
use app\models\Administrator;
use app\models\Exercise;
use app\models\Session;
?>
<?php $this->beginBlock('title') ?>
Mes emprunts
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

    <?php if (count($borrowings)):?>
        <div class="row">
            <div class="col-12 white-block">
                <div class="row table-head py-2">
                    <h5 class="col-2">
                    Session d'emprunt  
                    </h5>
                    <h5 class="col-2">
                    Administrateur        
                    </h5>
                    <h5 class="col-2">
                    Montant  
                    </h5>
                    <h5 class="col-2">
                    Intérêt  
                    </h5>
                
                    <h5 class="col-2">
                    Date limite  
                    </h5>
                    <h5 class="col-2">
                    Etat  
                    </h5>
                </div>

                <?php foreach($borrowings as $borrowing): 
                $admin = Administrator::findOne(['id'=> $borrowing->administrator_id]);
                $session = Session::findOne(['id'=> $borrowing->session_id]);
                //$exercise = Exercise::findOne(['id'=> $session->exercise_id]); ?>

                    <div class="row py-3" style="border-bottom: 1px solid #e6e6e6">
                    
                        <div class="col-2">
                            <?= $session->date ?> 
                        </div>
                        <div class="col-2">
                            <?= $admin->username ?> 
                        </div>
                        <div class="col-2">
                            <?= $borrowing->amount ?> XAF
                        </div>
                        <div class="col-2">
                            <?= $borrowing->interest ?> %
                        </div>
                    
                        <div class="col-2">
                            <?= $borrowing->limit_date ?>
                        </div>
                        <div class="col-2">
                            <?php if ($borrowing->state):?>
                                Remboursé
                            <?php else:?>
                                Non remboursé
                            <?php endif;?> 
                        </div>
                    
                    </div>
                <?php endforeach;?>
            </div>
        </div>



        <?php else: ?>
        <div class="row">
            <h1 class="col-12 text-center text-muted">Vous n'avez aucun emprunt.</h1>
        </div>
    <?php endif;?>

</div>