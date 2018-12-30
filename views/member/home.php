<?php $this->beginBlock('title') ?>
Accueil
<?php $this->endBlock() ?>
<?php $this->beginBlock('style') ?>
<style>
    #saving-amount-title {
        font-size: 5rem;
    }
    .img-bravo {
        width: 100px;
        height: 100px;
        border-radius: 100px;
        box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.51);
    }
</style>
<?php $this->endBlock() ?>

<div class="container mt-5 mb-5">
    <div class="row mb-2">
        <div class="col-12 white-block text-center">
            <?php if ($session): ?>

                <?php

                $savingAmount = \app\models\Saving::find()->where(['session_id' => $session->id])->sum('amount');
                $borrowings = \app\models\Borrowing::findAll(['session_id' => $session->id]);

                ?>
                <h1 >
                    Session active 
                    Numéro:<?= $session->id ?> 
                </h1>
                <h1 id="saving-amount-title">
                    Montant total des epargnes : <?= $savingAmount ? $savingAmount : 0 ?> XAF
                </h1>

            <?php else: ?>
                <h3 class="mb-3">Aucune session en activité</h3>
            <?php endif; ?>

        </div>
    </div>

</div>