<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\CarBrandSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('car_brand', 'Car Brands');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="car-brand-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <div class="panel panel-default">
        <div class="panel-heading">
            <?= Html::a(Yii::t('car_brand', 'Create Car Brand'), ['create'], ['class' => 'btn btn-success']) ?>
        </div>
        <div class="panel-body">
            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'filterModel'  => $searchModel,
                'columns'      => [
                    ['class' => 'yii\grid\SerialColumn'],

                    'name',
                    'created_at',
                    'updated_at',

                    ['class' => 'yii\grid\ActionColumn'],
                ],
            ]); ?>
        </div>
    </div>

</div>
