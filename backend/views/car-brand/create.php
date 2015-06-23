<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\CarBrand */

$this->title = Yii::t('car_brand', 'Create Car Brand');
$this->params['breadcrumbs'][] = ['label' => Yii::t('car_brand', 'Car Brands'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="car-brand-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
