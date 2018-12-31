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

<div class="container mt-5 mb-5">
    <div class="row">
        <?php
        $exercise = \app\models\Exercise::findOne(['active' => true])
        ?>
        <?php if (count($members) ):?>
        <div class="col-12 mt-2">
            <div class="row">
                <?php foreach ($members as $member):?>
                    <?php

                $user = $member->user();
                $borrowing = $member->activeBorrowing();
                $savedAmount = $member->savedAmount($exercise);
                    ?>
                    <div class="col-4">
                        <div class="card">
                            <!-- Card image -->
                            <div class="view overlay">
                                <img class="card-img-top" src="<?= \app\managers\FileManager::loadAvatar($user,"512") ?>" style="height: 12rem" alt="Card image cap">
                                <a href="<?= Yii::getAlias("@administrator.member")."?q=".$member->id ?>">
                                    <div class="mask rgba-white-slight"></div>
                                </a>
                            </div>

                            <!-- Card content -->
                            <div class="card-body">

                                <!-- Title -->
                                <h4 class="card-title"><?= $user->name.' '.$user->first_name ?></h4>
                                <!-- Text -->
                                <p class="card-text">
                                    <span>Epargne : </span><span class="blue-text"><?= $savedAmount?$savedAmount:0 ?> XAF</span>
                                    <br>
                                    <span>Emprunt : </span><span class="text-secondary"><?= $borrowing?( $borrowing->refundedAmount() ."/". $borrowing->intendedAmount() ." XAF"):"Aucun emprunt" ?></span>
                                </p>
                                <!-- Button -->
                                <a href="<?= Yii::getAlias("@administrator.member")."?q=".$member->id ?>" class="btn btn-primary">Details</a>

                            </div>

                        </div>
                    </div>
                <?php
                        endforeach;
                ?>

            </div>
        </div>

        <?php else:?>
            <h3 class="col-12 text-center text-muted">Aucun membre inscrit</h3>
        <?php endif;?>
    </div>

</div>
<a href="<?= Yii::getAlias("@administrator.new_member") ?>" class="btn btn-primary" id="btn-add"><i class="fas fa-plus"></i></a>