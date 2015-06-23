<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\CarBrand */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="car-brand-form">

    <div class="panel panel-default">
    	<div class="panel-body">
            <?php
            $form = ActiveForm::begin(Yii::$app->params['formSetting']);
            ?>

            <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

            <div class="form-group">
                <div class="col-md-offset-3 col-md-6">
                    <?= Html::submitButton($model->isNewRecord ? Yii::t('car_brand', 'Create') : Yii::t('car_brand', 'Update'),
                        ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
                </div>
            </div>

            <?php ActiveForm::end(); ?>
    	</div>
    </div>

</div>
