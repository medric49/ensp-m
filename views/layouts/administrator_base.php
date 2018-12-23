<?php
use yii\helpers\Html;
$this->title = "Mutuelle - ENSP"
?>

<?php $this->beginPage() ?>
    <!DOCTYPE html>
    <html lang="<?= Yii::$app->language ?>">
    <head>
        <? include Yii::getAlias("@app")."/includes/links.php" ;?>

        <title><?= Html::encode($this->title) ?></title>


        <?php if (isset($this->blocks['style'])): ?>
            <?= $this->blocks['title'] ?>
        <?php endif; ?>
    </head>
    <?php $this->beginBody() ?>
    <body>




    <? include Yii::getAlias("@app")."/includes/scripts.php" ;?>
    <?php if (isset($this->blocks['script'])): ?>
        <?= $this->blocks['script'] ?>
    <?php endif; ?>


    </body>
    <?php $this->endBody(); ?>
    </html>
<?php $this->endPage(); ?>