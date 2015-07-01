<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\grid\DataColumn;

/* @var $this yii\web\View */
/* @var $searchModel app\models\NewsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('news', 'News');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="news-index">
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <div class="panel panel-default">
        <div class="panel-heading">
            <?= Html::a(Yii::t('news', 'Create News'), ['create'], ['class' => 'btn btn-success']) ?>
        </div>
        <div class="panel-body">
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
                            'width' => '5%'
                        ],
                    ],
                    [
                        'attribute'      => 'user_id',
                        'format'         => 'text',
                        'contentOptions' => [
                            'class' => 'text-center',
                        ],
                        'headerOptions'  => [
                            'class' => 'text-center',
                            'width' => '20%'
                        ],
                        'value'          => function ($model) {
                            return $model->user->username;
                        },
                    ],
                    [
                        'attribute'      => 'title',
                        'format'         => 'text',
                        'contentOptions' => [],
                        'headerOptions'  => [
                            'class' => 'text-center',
                            'width' => '65%'
                        ],
                        'value'          => function ($model) {
                            return $model->title;
                        },

                    ],
                    // 'created_at',
                    // 'updated_at',

                    [
                        'class'          => 'yii\grid\ActionColumn',
                        'contentOptions' => [
                            'class' => 'text-center',
//                    'width' => '15%'
                        ],
                    ],
                ],
            ]); ?>
        </div>
    </div>
</div>
