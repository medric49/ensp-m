<?php $this->beginBlock('title') ?>
Profil
<?php $this->endBlock()?>
<?php $this->beginBlock('style')?>
<style>
.img-container {
        display: inline-block;
        width: 200px;
        height: 200px;
    }
    .img-container img{
        width: 100%;
        height: 100%;
        border-radius: 1000px;
    }
    .white-block {
        padding: 20px;
        background-color: white;
        border-radius: 5px;
        box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.49);
    }

    .labels .col-7 {
        color: dodgerblue;
    }
</style>
<?php $this->endBlock()?>



<div class="container mt-5 mb-5">
    <div class="row">
        <div class="col-md-4 text-center">
            <div class="img-container">
                <img src="<?= \app\managers\FileManager::loadAvatar($this->params['user'],"512")?>" alt="">
            </div>
            <h2 class="mt-2 text-capitalize"><?= $this->params['member']->username?></h2>
        </div>
        <div class="col-md-8 white-block">
            <?php $form1 = \yii\widgets\ActiveForm::begin(['method' => 'post',
                'action' => '@member.enregistrer_modifier_profil',
                'options' => ['enctype' => 'multipart/form-data','class' => 'col-md-5 mb-2 white-block mr-md-2'],
                'errorCssClass' => 'text-secondary'
            ])?>

            <?= $form1->field($socialModel,'username')->input('text',['required'=>'required'])->label("Nom d'utilisateur") ?>
            <?= $form1->field($socialModel,'first_name')->input('text',['required' => 'required'])->label('Prénom') ?>
            <?= $form1->field($socialModel,'name')->input('text',['required' => 'required'])->label('Nom') ?>
            <?= $form1->field($socialModel,'tel')->input('tel',['required'=>'required'])->label("Téléphone") ?>
            <?= $form1->field($socialModel,'email')->input('email',['required'=> 'required'])->label('Email')?>
            <?= $form1->field($socialModel,'avatar')->fileInput(['accept'=>'.png,.jpg,.jpeg,.gif'])->label('Photo de profil')?>

            <div class="form-group text-right">
            <button type="submit" class="btn btn-primary">Enregistrer</button>
            </div>

            <?php \yii\widgets\ActiveForm::end()?>

            <?php $form2 = \yii\widgets\ActiveForm::begin(['method' => 'post',
                'action' => '@member.modifiermotdepasse',
                'options' => ['enctype' => 'multipart/form-data','class' => 'col-md-5 mb-2 white-block mr-md-2'],
                'errorCssClass' => 'text-secondary'
            ])?>
            <?= $form2->field($passwordModel,'password')->input('password',['required'=> 'required'])->label('Ancien mot de passe') ?>
            <?= $form2->field($passwordModel,'new_password')->input('password',['required'=> 'required'])->label('Nouveau mot de passe') ?>
            <?= $form2->field($passwordModel,'confirmation_new_password')->input('password',['required'=>'required'])->label('Confirmation du nouveau mot de passe') ?>

            <div class="form-group text-right">
            <button type="submit" class="btn btn-primary">Enregistrer</button>
            </div>
            <?php \yii\widgets\ActiveForm::end()?>
        </div>
        
    </div>
</div>