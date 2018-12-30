<?php $this->beginBlock('title') ?>
Accueil
<?php $this->endBlock() ?>
<?php $this->beginBlock('style') ?>
<style>
    #saving-amount-title {
        font-size: 5rem;
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
                <h1 id="saving-amount-title">
                    <?= $savingAmount ? $savingAmount : 0 ?> XAF
                </h1>
                <?php if ($session->state == "SAVING"):
                    ?>
                    <div class="mt-3 text-right">
                        <button class="btn btn-primary" data-target="#modal-passer-remboursement" data-toggle="modal">
                            Passer aux remboursements
                        </button>
                    </div>

                    <div class="modal fade" id="modal-passer-remboursement" tabindex="-1" role="dialog"
                         aria-labelledby="myModalLabel"
                         aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-body">
                                    <p>Attention ! Lorsque vous passez aux remboursements vous ne pourrez plus
                                        enregistrer de nouvelles epargnes pour cette session.</p>
                                    <div class="mt-3">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler
                                        </button>
                                        <a href="<?= Yii::getAlias("@administrator.go_to_refunds") . "?q=" . $session->id ?>"
                                           class="btn btn-primary">Continuer</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                <?php
                elseif ($session->state == "REFUND"):
                    ?>
                    <div class="mt-3 text-right">
                        <button class="btn btn-secondary" data-toggle="modal" data-target="#modal-rentrer-epargne">
                            Rentrer aux epargnes
                        </button>
                        <button class="btn btn-primary" data-toggle="modal" data-target="#modal-passer-emprunt">Passer
                            aux emprunts
                        </button>
                    </div>
                    <div class="modal fade" id="modal-rentrer-epargne" tabindex="-1" role="dialog"
                         aria-labelledby="myModalLabel"
                         aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-body">
                                    <p>Attention ! Lorsque vous rentrez aux epargnes tous les remboursements enregistrés
                                        de cette session seront perdus.</p>
                                    <div class="mt-3 text-right">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler
                                        </button>
                                        <a href="<?= Yii::getAlias("@administrator.back_to_savings") . "?q=" . $session->id ?>"
                                           class="btn btn-primary">Continuer</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal fade" id="modal-passer-emprunt" tabindex="-1" role="dialog"
                         aria-labelledby="myModalLabel"
                         aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-body">
                                    <p>Attention ! Lorsque vous passez aux emprunts vous ne pourrez plus enregistrer de
                                        nouvaux remboursements pour cette session.</p>
                                    <div class="mt-3">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler
                                        </button>
                                        <a href="<?= Yii::getAlias("@administrator.go_to_borrowings") . "?q=" . $session->id ?>"
                                           class="btn btn-primary">Continuer</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php
                elseif ($session->state == "BORROWING"):
                    ?>
                    <div class="mt-3 text-right">
                        <button class="btn btn-secondary" data-toggle="modal"
                                data-target="#modal-rentrer-remboursement">Rentrer aux remboursements
                        </button>
                        <?php if (\app\managers\FinanceManager::numberOfSession() < 12): ?>
                            <button class="btn btn-primary" data-toggle="modal" data-target="#modal-cloturer">Cloturer
                                la session
                            </button>
                        <?php else: ?>
                            <button class="btn btn-primary" data-toggle="modal" data-target="#modal-cloturer">Cloturer
                                l'exercice
                            </button>
                        <?php endif; ?>
                    </div>
                    <div class="modal fade" id="modal-rentrer-remboursement" tabindex="-1" role="dialog"
                         aria-labelledby="myModalLabel"
                         aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-body">
                                    <p>Attention ! Lorsque vous rentrez aux remboursements tous les emprunts enregistrés
                                        pour cette session seront perdus.</p>
                                    <div class="mt-3">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler
                                        </button>
                                        <a href="<?= Yii::getAlias("@administrator.back_to_refunds") . "?q=" . $session->id ?>"
                                           class="btn btn-primary">Continuer</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <?php if (\app\managers\FinanceManager::numberOfSession() < 12): ?>
                    <div class="modal fade" id="modal-cloturer" tabindex="-1" role="dialog"
                         aria-labelledby="myModalLabel"
                         aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-body">
                                    <p>Attention ! Vous vous appretez à cloturer la session, lorsque la session est
                                        cloturée, vous ne pourrez plus faire aucun enregistrerment.</p>
                                    <div class="mt-3">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler
                                        </button>
                                        <a href="<?= Yii::getAlias("@administrator.cloture_session") . "?q=" . $session->id ?>"
                                           class="btn btn-primary">Continuer</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php else: ?>
                    <div class="modal fade" id="modal-cloturer" tabindex="-1" role="dialog"
                         aria-labelledby="myModalLabel"
                         aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-body">
                                    <p class="text-center blue-text">Félicitations !</p>
                                    <p>Vous êtes au terme de cette période de 12 sessions. Vous êtes sur le point de
                                        passer au décaissement, voulez-vous continuer ?</p>
                                    <div class="mt-3">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler
                                        </button>
                                        <a href="<?= Yii::getAlias("@administrator.cloture_exercise") . "?q=" . $session->id ?>"
                                           class="btn btn-primary">Continuer</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>

                <?php endif; ?>
            <?php else: ?>
                <h3 class="mb-3">Aucune session en activité</h3>
                <button class="btn btn-primary <?= $model->hasErrors() ? 'in' : '' ?>" data-toggle="modal"
                        data-target="#modalLRFormDemo">Lancer une nouvelle session
                </button>

                <div class="modal fade" id="modalLRFormDemo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                     aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <?php $form = \yii\widgets\ActiveForm::begin([
                                'errorCssClass' => 'text-secondary',
                                'method' => 'post',
                                'action' => '@administrator.new_session',
                                'options' => ['class' => 'modal-body']
                            ]) ?>

                            <?= $form->field($model, 'date')->input('date', ['required' => 'required'])->label("Date de la rencontre") ?>

                            <div class="form-group text-right">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                                <button type="submit" class="btn btn-primary">Créer la session</button>
                            </div>
                            <?php \yii\widgets\ActiveForm::end(); ?>

                        </div>
                    </div>
                </div>
            <?php endif; ?>

        </div>
    </div>

</div>