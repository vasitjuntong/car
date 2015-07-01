<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PlaceSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('place', 'Places');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="place-index">

    <div class="panel panel-default">
        <div class="panel-heading">
            <?= Html::a(Yii::t('place', 'Create Place'), ['create'], ['class' => 'btn btn-success']) ?>
        </div>
        <div class="panel-body">
            <?php
            ?>
            ?>
            <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'filterModel'  => $searchModel,
                'columns'      => [
                    [
                        'class'          => 'yii\grid\SerialColumn',
                        'contentOptions' => [
                            'class' => 'text-center',
                        ],
                        'headerOptions'  => [
                            'class' => 'text-center',
                            'width' => '5%',
                        ],
                    ],

                    [
                        'attribute' => 'name',
                        'value'     => function ($model) {
                            return $model->name;
                        }
                    ],
                    [
                        'attribute'      => 'created_at',
                        'value'          => function ($model) {
                            return $model->created_at;
                        },
                    ] + Yii::$app->params['gridOptions']['created_at'],
                    [
                        'attribute'      => 'updated_at',
                        'value'          => function ($model) {
                            return $model->created_at;
                        },
                    ] + Yii::$app->params['gridOptions']['updated_at'],

                    [
                        'class' => 'yii\grid\ActionColumn',
                    ] + Yii::$app->params['gridOptions']['actionColumn'],
                ],
            ]); ?>
        </div>
    </div>

</div>
