<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\CarType */

$this->title = Yii::t('app', 'Create Car Type');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Car Types'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="car-type-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
