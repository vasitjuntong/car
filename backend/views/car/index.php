<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\CarSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('car', 'Cars');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="car-index">

    <div class="panel panel-default">
        <div class="panel-heading">
            <?= Html::a(Yii::t('main', 'Create {name}', [
                'name' => Yii::t('car', 'Cars')
            ]), ['create'], ['class' => 'btn btn-success']) ?>
        </div>
        <div class="panel-body">
            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'filterModel'  => $searchModel,
                'columns'      => [
                    ['class' => 'yii\grid\SerialColumn'],

                    [
                        'attribute' => 'user_id',
                        'value' => function($model){
                            return $model->user->username;
                        },
                    ],
                    'car_type',
                    'car_brand_id',
                    'license_no',
                    // 'registration_at',
                    // 'car_no',
                    // 'engine_no',
                    // 'image_name',
                    // 'image_path',
                    // 'created_at',
                    // 'updated_at',

                    ['class' => 'yii\grid\ActionColumn'],
                ],
            ]); ?>
        </div>
    </div>

</div>
