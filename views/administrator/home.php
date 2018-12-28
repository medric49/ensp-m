<?php $this->beginBlock('title') ?>
Accueil
<?php $this->endBlock()?>
<?php $this->beginBlock('style') ?>
<style>

</style>
<?php $this->endBlock()?>

<div class="container mt-5 mb-5">
    <div class="row mb-2">
        <div class="col-12 white-block text-center">
            <?php if ($session): ?>

                <h1></h1>

            <?php else: ?>
                <h3 class="mb-3">Aucune session en activité</h3>
                <button class="btn btn-primary" data-toggle="modal" data-target="#modalLRFormDemo">Lancer une nouvelle session</button>

                <!--Modal: Login / Register Form Demo-->
                <div class="modal fade" id="modalLRFormDemo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                     aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <?php $form = \yii\widgets\ActiveForm::begin([
                                'errorCssClass' => 'text-secondary',
                                'method' => 'post',
                                'action' => '@administrator.new_session',
                                'options' => ['class'=> 'modal-body']
                            ]) ?>



                            <?= $form->field($model,'date')->input('date',['required' => 'required'])->label("Date de la rencontre") ?>

                            <div class="form-group text-right">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                                <button type="submit" class="btn btn-primary">Créer la session</button>
                            </div>
                            <?php \yii\widgets\ActiveForm::end(); ?>

                        </div>
                    </div>
                </div>
                <!--Modal: Login / Register Form Demo-->

            <?php endif; ?>
        </div>
    </div>

    <div class="row">

    </div>
</div>