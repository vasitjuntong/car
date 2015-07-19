<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Car */

$this->title = Yii::t('main', 'Create {name}', ['name' => Yii::t('car', 'Cars')]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('car', 'Cars'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="car-create">

    <?= $this->render('_form', [
        'model'       => $model,
        'modelUpload' => $modelUpload,

    ]) ?>

</div>
