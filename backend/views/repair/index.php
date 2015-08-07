<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel app\models\RepairSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('repair', 'Repairs');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="repair-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('main', 'Create {name}', [
            'name' => Yii::t('repair', 'Repairs')
        ]), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel'  => $searchModel,
        'columns'      => [
            ['class' => 'yii\grid\SerialColumn'],

            [
                'attribute' => 'user_id',
                'value'     => function ($data) {
                    return $data->user->username;
                }
            ],
            [
                'attribute' => 'car_id',
                'value'     => function ($data) {
                    return $data->car->license_no;
                }
            ],
            [
                'attribute'    => 'amount',
                'value'       => function($data){
                    return Yii::$app->formatter->asCurrency($data->amount, 'THB');
                },
//                'format'       => [
//                    'class' => 'yii\i18n\Formatter ',
//                    'currencyCode' => '฿',
//                ],
            ],
            [
                'attribute' => 'file_name',
                'value'     => function ($model) {
                    return Html::a($model->file_name, Url::to(['/repair/download-file', 'id' => $model->id]));
                },
                'format'    => 'html',
                'filter'    => false,
            ],
            // 'created_at',
            // 'updated_at',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
