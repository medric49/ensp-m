<?php
use yii\helpers\Html;
use app\models\Administrator;
use app\models\Exercise;
use app\models\Saving;
use app\models\Member;
use app\models\Borrowing;
use app\models\Refund;
use app\models\Help;
?>
<?php $this->beginBlock('title') ?>
Details session
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

<?php 
$savings= Saving::find(['session_id'=> $session->id])->all();
$borrowings= Borrowing::find(['session_id'=> $session->id])->all();
$refunds= Refund::find(['session_id'=> $session->id])->all();
?>

<div class="container mt-5 mb-5">
    <div>
        <h2>Liste des epargnes</h2>
        <table>
            <tr>
                <th>Membre </th>
                <th>Montant </th>

            </tr>
            
            <?php foreach ($savings as $saving):  
                $member = Member::findOne(['id'=> $saving->member_id]); ?>

                <tr>
                    <td><?= Html::encode("{$member->username}") ?></td>
                    <td><?= Html::encode("{$saving->amount} XAF") ?></td>
                
                </tr>
            <?php endforeach; ?>
        </table>
    </div>
    <div>
        <h2>Liste des emprunts</h2>
        <table>
            <tr>
                <th>Membre </th>
                <th>Montant </th>

            </tr>
            
            <?php foreach ($borrowings as $bor):  
                $member = Member::findOne(['id'=> $bor->member_id]); ?>

                <tr>
                    <td><?= Html::encode("{$member->username}") ?></td>
                    <td><?= Html::encode("{$bor->amount} XAF") ?></td>
                
                </tr>
            <?php endforeach; ?>
        </table>
    </div>
    <div>
        <h2>Liste des remboursements</h2>
        <table>
            <tr>
                <th>Membre </th>
                <th>Montant</th>
                <th>Montant emprunté</th>

            </tr>
            
            <?php foreach ($refunds as $ref):  
                $borr = Borrowing::findOne(['id'=> $ref->borrowing_id]);
                $member = Member::findOne(['id'=> $borr->member_id]); ?>

                <tr>
                    <td><?= Html::encode("{$member->username}") ?></td>
                    <td><?= Html::encode("{$ref->amount} XAF") ?></td>
                    <td><?= Html::encode("{$borr->amount} XAF") ?></td>
                
                </tr>
            <?php endforeach; ?>
        </table>
    </div>
    
</div>