<?php use yii\widgets\LinkPager;

$this->beginBlock('title') ?>
Mes épargnes
<?php $this->endBlock() ?>
<?php $this->beginBlock('style') ?>
<style>
</style>
<?php $this->endBlock() ?>


<div class="container mt-5 mb-5">
    <div class="row">
        <?php if (count($sessions)): ?>
            <?php $activeSession = \app\models\Session::findOne(['active' => true]); ?>

            <?php foreach ($sessions as $session): ?>

                <?php $admin = \app\models\Administrator::findOne(['id' => $session->administrator_id]); ?>
                <?php $saving = \app\models\Saving::findOne(['member_id'=> $member->id, 'session_id' => $session->id]); ?>

                <div class="col-12 white-block mb-2">
                    <h5 class="mb-4">Session du <span class="text-secondary"><?= (new DateTime($session->date))->format("d-m-Y") ?> <?= $session->active ? '(active)' : '' ?></span></span></h5>
                    <h5 class="blue-grey lighten-4">Administrateur : <span class="text-secondary"><?= $admin->username ?></span></h5>

                    <?php if ($saving): ?>
                        <h5 class="mb-4">Montant : <span class="blue-text"><?= $saving->amount ?> XAF</span></h5>
                    <?php else: ?>
                        <h3 class="text-center text-muted">Aucune épargne à cette session</h3>
                    <?php endif; ?>


                </div>
            <?php endforeach; ?>

            <div class="col-12 p-2">
                <nav aria-label="Page navigation example">
                    <?= LinkPager::widget(['pagination' => $pagination,
                        'options' => [
                            'class' => 'pagination pagination-circle justify-content-center pg-blue mb-0',
                        ],
                        'pageCssClass' => 'page-item',
                        'disabledPageCssClass' => 'd-none',
                        'prevPageCssClass' => 'page-item',
                        'nextPageCssClass' => 'page-item',
                        'firstPageCssClass' => 'page-item',
                        'lastPageCssClass' => 'page-item',
                        'linkOptions' => ['class' => 'page-link']
                    ]) ?>
                </nav>

            </div>

        <?php else: ?>
            <div class="col-12 white-block">
                <h1 class="text-muted text-center">Aucune session créée.</h1>
            </div>

        <?php endif; ?>
    </div>
</div>
