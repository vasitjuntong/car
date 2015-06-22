<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Car */

$this->title = Yii::t('car', 'Create Car');
$this->params['breadcrumbs'][] = ['label' => Yii::t('car', 'Cars'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="car-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
