<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Car;

/* @var $this yii\web\View */
/* @var $model app\models\Car */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="car-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'car_type')->dropDownList([
        Car::CAR_STATUS => Car::CAR_LABEL,
        Car::BUS_STATUS => Car::BUS_LABEL],
        ['prompt' => 'Select']) ?>

    <?= $form->field($model, 'car_brand_id')->textInput() ?>

    <?= $form->field($model, 'license_no')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'registration_at')->textInput() ?>

    <?= $form->field($model, 'car_no')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'engine_no')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'image_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'image_path')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'created_at')->textInput() ?>

    <?= $form->field($model, 'updated_at')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('car', 'Create') : Yii::t('car', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
