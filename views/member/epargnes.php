<?php
use yii\helpers\Html;
use app\models\Administrator;
use app\models\Exercise;
use app\models\Session;
?>
<?php $this->beginBlock('title') ?>
Epargnes membre
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
            <th>Exercice</th>
            <th>Session</th>
            <th>Montant</th>
            <th>Administrateur</th>
            <th>Date</th>
        </tr>
            
        <?php foreach ($savings as $saving): 
            $admin = Administrator::findOne(['id'=> $saving->administrator_id]);
            $session = Session::findOne(['id'=> $saving->session_id]);
            $exercise = Exercise::findOne(['id'=> $session->exercise_id]); ?>

            <tr>
                <td><?= Html::encode("{$exercise->year}") ?></td>
                <td><?= Html::encode("{$session->date}") ?></td>
                <td><?= Html::encode("{$saving->amount}") ?></td>
                <td><?= Html::encode("{$admin->username}") ?></td>
                <td><?= Html::encode("{$saving->created_at}") ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
</div>