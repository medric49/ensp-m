<?php
use yii\helpers\Html;

?>
<?php $this->beginBlock('title') ?>
Profil membre
<?php $this->endBlock()?>
<?php $this->beginBlock('style') ?>
<style>
    .error {
        color: red;
    }

    .form-block {
        padding: 20px;
        background-color: white;
        border-radius: 5px;
        box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.49);
    }
</style>
<?php $this->endBlock()?>


<div class="container mt-5 mb-5">
    <img src="<?= \app\managers\FileManager::loadAvatar($this->params['user'],"512")?>" class="profile-icon" alt="<?= $this->params['member']->username ?>">
</div>
<div>
            <label class="informations"><strong>Nom d'utilisateur:  </strong><?= Html::encode("{$member->username}") ?></label><br/>
            <label class="informations"><strong>Nom:  </strong> <?= Html::encode("{$user->name}") ?></label><br/>
            <label class="informations"><strong>Prénom:  </strong><?= Html::encode("{$user->first_name}") ?></label><br/>
            <label class="informations"><strong>Tél:  </strong><?= Html::encode("{$user->tel}") ?></label><br/>
            <label class="informations"><strong>Email:  </strong><?= Html::encode("{$user->email}") ?></label><br/>
<div>
<div class="form-group text-right">
    <a href="<?= Yii::getAlias("@member.home") ?>" >
        <button class="btn btn-primary">Modifier</button>
    </a>
</div>