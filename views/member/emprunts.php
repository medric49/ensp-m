<?php
use yii\helpers\Html;
use app\models\Administrator;
use app\models\Exercise;
use app\models\Session;
?>
<?php $this->beginBlock('title') ?>
Emprunts membre
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
            <th>Intérêt</th>
            <th>Date emprunt</th>
            <th>Date limite </th>
            <th>Etat</th>
            <th>Date remboursement</th>
            <th>Administrateur</th>
        </tr>
            
        <?php foreach ($borrowings as $borrowing): 
            $admin = Administrator::findOne(['id'=> $borrowing->administrator_id]);
            $session = Session::findOne(['id'=> $borrowing->session_id]);
            $exercise = Exercise::findOne(['id'=> $session->exercise_id]); ?>

            <tr>
                <td><?= Html::encode("{$exercise->year}") ?></td>
                <td><?= Html::encode("{$session->date}") ?></td>
                <td><?= Html::encode("{$borrowing->amount}") ?></td>
                <td><?= Html::encode("{$borrowing->interest}") ?></td>
                <td><?= Html::encode("{$borrowing->created_at}") ?></td>
                <td><?= Html::encode("{$borrowing->limit_date}") ?></td> 
                <td><?= Html::encode("{$borrowing->state}") ?></td>
                <td><?= Html::encode("{$borrowing->refund_date}") ?></td>
                <td><?= Html::encode("{$admin->username}") ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
</div>