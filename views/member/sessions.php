<?php
use yii\helpers\Html;
use app\models\Administrator;
use app\models\Exercise;
?>
<?php $this->beginBlock('title') ?>
Sessions
<?php $this->endBlock()?>
<?php $this->beginBlock('style') ?>
<style>
    table{
    border-collapse: collapse;
    border: 1px solid black;
    padding: 10px;
    width: 50%;
    text-align: center;
    }

    td, th {
    border: 1px solid black;
    padding: 10px;
    width: 50%;
    text-align: center;
    }
</style>
<?php $this->endBlock()?>


<div class="container mt-5 mb-5">
    
    <table>
        <tr>
            <th>Numero </th>
            <th>Exercice </th>
            <th>Date </th>
            <th>Administrateur</th>
            
        </tr>
            
        <?php foreach ($sessions as $session):  
            $exercise = Exercise::findOne(['id'=> $session->exercise_id]);
            $admin = Administrator::findOne(['id'=> $session->administrator_id]); ?>

            <tr>
                <td>
                    <a href="<?= Yii::getAlias("@member.detailsession")."?m=".$session->id?>" class="link">
                        <?= $session->id ?>
                    </a>
                </td>
                <td><?= Html::encode("{$exercise->year}") ?></td>
                <td><?= Html::encode("{$session->date}") ?></td>
                <td><?= Html::encode("{$admin->username}") ?></td>
                
            </tr>
        <?php endforeach; ?>
    </table>
</div>