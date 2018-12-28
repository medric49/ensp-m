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
            <th>Intitulé </th>
            <th>Montant</th>
            
        </tr>
            
        <?php foreach ($helptype as $ht): ?>

            <tr>
                <td><?= Html::encode("{$ht->title}") ?></td>
                <td><?= Html::encode("{$ht->amount}") ?></td>
                
            </tr>
        <?php endforeach; ?>
    </table>
</div>