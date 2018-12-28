<?php
use yii\helpers\Html;
use app\models\Administrator;
use app\models\Exercise;
use app\models\Help;
use app\models\Help_type;
use app\models\Member;
use app\models\Session;
?>
<?php $this->beginBlock('title') ?>
Contributions membre
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
            <th>Montant</th>
            <th>Date</th>
            <th>Administrateur</th>
            <th>Membre aidé </th>
            <th>Motif</th>
        </tr>
            
        <?php foreach ($contributions as $contribution): 
            $admin = Administrator::findOne(['id'=> $contribution->administrator_id]);
            $help = Help::findOne(['id'=> $contribution->help_id]);
            $helptype = Help_type::findOne(['id'=> $help->help_type_id]);
            $member = Member::findOne(['id'=> $help->member_id]);
            //$session = Session::findOne(['id'=> $borrowing->session_id]);
            //$exercise = Exercise::findOne(['id'=> $session->exercise_id]); ?>

            <tr>
                <td><?= Html::encode("{$help->unit_amount}") ?></td>
                <td><?= Html::encode("{$contribution->date}") ?></td>
                <td><?= Html::encode("{$admin->username}") ?></td>
                <td><?= Html::encode("{$member->username}") ?></td> 
                <td><?= Html::encode("{$helptype->title}") ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
</div>