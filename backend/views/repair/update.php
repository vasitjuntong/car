<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Repair */

$this->title = Yii::t('main', 'Update {name}: ', [
        'name' => Yii::t('repair', 'Repair'),
    ]) . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('repair', 'Repairs'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('repair', 'Update');
?>
<div class="repair-update">

    <?= $this->render('_form', [
        'model'     => $model,
        'modelFile' => $modelFile,
    ]) ?>

</div>
