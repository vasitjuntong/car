<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Place */

$this->title = Yii::t('place', 'Update {modelClass}: ', [
    'modelClass' => 'Place',
]) . ' ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('place', 'Places'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('place', 'Update');
?>
<div class="place-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
