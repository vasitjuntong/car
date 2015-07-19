<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Repair */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('repair', 'Repairs'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="repair-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('repair', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('repair', 'Delete'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('repair', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'user_id',
            'car_id',
            'amount',
            'file',
            'file_name',
            'created_at',
            'updated_at',
        ],
    ]) ?>

</div>
