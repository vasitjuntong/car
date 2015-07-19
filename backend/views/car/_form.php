<?php

use app\models\Car;
use app\models\CarBrand;
use kartik\date\DatePicker;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Car */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="car-form">

    <?php $form = ActiveForm::begin([
        'options' => ['enctype' => 'multipart/form-data']
    ]); ?>

    <div class="row">
        <div class="col-sm-6">
            <?= $form->field($model, 'car_type')->dropDownList(Car::carTypes(),
                ['prompt' => 'เลือก']) ?>
        </div>
        <div class="col-sm-6">
            <?= $form->field($model, 'car_brand_id')
                ->dropDownList(ArrayHelper::map(CarBrand::find()->all(), 'id', 'name'),
                    ['prompt' => 'เลือก']) ?>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-6">
            <?= $form->field($model, 'license_no')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-sm-6">
            <?= $form->field($model, 'registration_at')->widget(
                DatePicker::classname(), [
                'pluginOptions' => [
                    'autoclose' => true,
                    'format'    => 'yyyy-mm-dd'
                ]
            ]) ?>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-6">
            <?= $form->field($model, 'car_no')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-sm-6">
            <?= $form->field($model, 'engine_no')->textInput(['maxlength' => true]) ?>
        </div>
    </div>

    <?= $form->field($modelUpload, 'imageFile')->fileInput(['enctype' => 'multipart/form-data']) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ?
            Yii::t('main', 'Create') : Yii::t('main', 'Update'), [
            'class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary'
        ]) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
