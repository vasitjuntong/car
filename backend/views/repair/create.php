<?php

/* @var $this yii\web\View */
/* @var $model app\models\Repair */
/* @var $modelFile  app\models\UploadFileForm */

$this->title = Yii::t('main', 'Create {name}', [
    'name' => Yii::t('repair', 'Repairs')
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('repair', 'Repairs'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="repair-create">

    <?=
    $this->render('_form', [
        'model'     => $model,
        'modelFile' => $modelFile,
    ]) ?>

</div>
