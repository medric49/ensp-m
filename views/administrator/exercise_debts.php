<?php $this->beginBlock('title') ?>
    Dettes d'exercices
<?php $this->endBlock() ?>
<?php $this->beginBlock('style') ?>
    <style>

        .warning-block {
            border : 2px solid darkorange;
            color: #c76c00;
            background-color: rgba(255, 140, 0, 0.17);
            padding: 10px;
            border-radius: 5px;
        }
    </style>
<?php $this->endBlock() ?>
<?php
$refunds = \app\models\Refund::find()->where(['is not','exercise_id',null])->all();
?>
<div class="container mb-5 mt-5">
    <div class="row">

        <p class="col-12 warning-block text-center">
            Attention ! Il s'agit dans cette section des dettes d'exercices qui n'ont pas été remboursées.<br>
            Pour le bon déroulement de la mutuelle, ces dettes ont été supposées réglées dans l'exercice concerné,
            mais pour des raisons de sécurité ces dettes sont conservées
            et devront être réglées par le membre sous peine de poursuite judiciaire.
        </p>

        <div class="col-12 white-block">

            <?php
            if (count($refunds)):
            ?>
            <table class="table table-hover">
                <thead class="blue-grey lighten-4">
                <tr>
                    <th>#</th>
                    <th>Membre</th>
                    <th>Montant</th>
                    <th>Année de l'exercice</th>
                    <th></th>
                </tr>

                </thead>
                <tbody>
                <?php foreach ($refunds as $index => $refund): ?>
                    <?php $member = \app\models\Member::findOne((\app\models\Borrowing::findOne($refund->borrowing_id))->member_id);
                    $memberUser = \app\models\User::findOne($member->user_id);
                    $exercise = \app\models\Exercise::findOne($refund->exercise_id);
                    ?>
                    <tr>
                        <th scope="row"><?= $index + 1 ?></th>
                        <td class="text-capitalize"><?= $memberUser->name . " " . $memberUser->first_name ?></td>
                        <td class="blue-text"><?= $refund->amount ?> XAF</td>
                        <td class="text-capitalize"><?= $exercise->year ?></td>
                        <td><button class="btn btn-primary m-0 p-2" data-toggle="modal" data-target="#modal<?= $index?>">Régler la dette</button></td>
                    </tr>


                <div class="modal  fade" id="modal<?= $index ?>" tabindex="-1" role="dialog"
                     aria-labelledby="myModalLabel"
                     aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-body">

                                <p class="text-center">Vous vous appretez à regler cette dette.<br>
                                    Cela suggère que le membre a finalement remboursé sa dette laissée.<br>
                                    Voulez-vous continuer ?
                                </p>

                                <div class="form-group text-center">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                                    <a href="<?= Yii::getAlias("@administrator.treat_debt")."?q=".$refund->id?>" class="btn btn-primary">Continuer</a>
                                </div>
                            </div>
                        </div>
                    </div>

                <?php endforeach; ?>
                </tbody>
            </table>

            <?php
            else:
            ?>
            <h3 class="text-muted text-center">Aucune dette d'exercice enregistrée</h3>

            <?php
            endif;
            ?>
        </div>

    </div>
</div>
