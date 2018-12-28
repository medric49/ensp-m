<?php
use yii\helpers\Html;

?>
<?php $this->beginBlock('title') ?>
Types_aide membre
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
            <th>Titre </th>
            <th>Montant</th>
            
        </tr>
            
        <?php foreach ($members as $member): ?>

            <tr>
                <td><?= Html::encode("{$ht->title} ") ?></td>
                <td><?= Html::encode("{$ht->amount} XAF") ?></td>
                
            </tr>
        <?php endforeach; ?>
    </table>
</div>