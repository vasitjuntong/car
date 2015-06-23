<?php

$this->title = Yii::t('car', 'Create Car');
$this->params['breadcrumbs'][] = ['label' => Yii::t('car', 'Cars'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<?= $this->render('_form', [
    'model' => $model,
]) ?>
