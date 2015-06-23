<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\CarBrand */

$this->title = Yii::t('car_brand', 'Update {modelClass}: ', [
    'modelClass' => 'Car Brand',
]) . ' ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('car_brand', 'Car Brands'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('car_brand', 'Update');
?>
<div class="car-brand-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
