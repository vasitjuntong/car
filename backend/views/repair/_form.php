<?php

use app\models\Car;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Repair */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="panel panel-default row col-sm-offset-1 col-sm-10 col-md-offset-2 col-md-8 col-lg-offset-3 col-lg-6">
    <div class="panel-body">
        <div class="repair-form">

            <?php $form = ActiveForm::begin([
                'options' => ['enctype' => 'multipart/form-data']
            ]); ?>

            <div class="row">
                <div class="col-sm-6">
                    <?= $form->field($model, 'car_id')
                        ->dropDownList(
                            ArrayHelper::map(Car::find()->all(), 'id', 'license_no'),
                            ['prompt' => 'เลือก']
                        ) ?>
                </div>
                <div class="col-sm-6">
                    <?= $form->field($model, 'amount')->textInput(['maxlength' => true]) ?>
                </div>
            </div>

            <?= $form->field($modelFile, 'file')->fileInput() ?>

            <div class="form-group">
                <?= Html::submitButton($model->isNewRecord ?
                    Yii::t('main', 'Create') :
                    Yii::t('main', 'Update'), [
                    'class' => $model->isNewRecord ? 'btn btn-success btn-block' : 'btn btn-primary btn-block'
                ]) ?>
            </div>
        </div>
        <?php ActiveForm::end(); ?>
    </div>
</div>


