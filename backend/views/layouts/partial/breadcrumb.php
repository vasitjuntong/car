<?php use yii\widgets\Breadcrumbs; ?>
<div id="breadcrumb">
    <?= Breadcrumbs::widget([
        'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
    ]) ?>
</div><!-- /breadcrumb-->