<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use app\models\Car;

?>

<div class="car-form">
    <div class="panel panel-default">
        <div class="panel-body">

            <?php
            $form = ActiveForm::begin(Yii::$app->params['formSetting']);
            ?>

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
                <div class="col-md-offset-3 col-md-6">
                    <?= Html::submitButton(
                        $model->isNewRecord ? Yii::t('car', 'Create') : Yii::t('car', 'Update'),
                        ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
                </div>
            </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
