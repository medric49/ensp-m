<?php
use yii\helpers\Html;
$this->title = "Mutuelle - ENSP"
?>

<?php $this->beginPage() ?>
    <!DOCTYPE html>
    <html lang="<?= Yii::$app->language ?>">
    <head>
        <?php include Yii::getAlias("@app") . "/includes/links.php"; ?>

        <title>
            <?php if (isset($this->blocks['title'])): ?>
                <?= $this->blocks['title'] ?>
            <?php else: ?>
                <?= Html::encode($this->title) ?>
            <?php endif; ?>
        </title>

        <?php if (isset($this->blocks['style'])): ?>
            <?= $this->blocks['title'] ?>
        <?php endif; ?>
    </head>
    <body>
    <?php $this->beginBody() ?>


    <?= $content ?>


    <?php include Yii::getAlias("@app") . "/includes/scripts.php"; ?>
    <?php if (isset($this->blocks['script'])): ?>
        <?= $this->blocks['script'] ?>
    <?php endif; ?>

    <?php $this->endBody(); ?>
    </body>

    </html>
<?php $this->endPage(); ?>