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
    <body>
    <?php $this->beginBody() ?>

    <?= $content ?>


    <? include Yii::getAlias("@app")."/includes/scripts.php" ;?>
    <?php if (isset($this->blocks['script'])): ?>
        <?= $this->blocks['script'] ?>
    <?php endif; ?>

    <?php $this->endBody(); ?>
    </body>

    </html>
<?php $this->endPage(); ?>