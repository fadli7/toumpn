<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\ScorepsiSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="scorepsi-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_scorePsi') ?>

    <?= $form->field($model, 'id_exam') ?>

    <?= $form->field($model, 'id_student') ?>

    <?= $form->field($model, 'benar') ?>

    <?= $form->field($model, 'totalSoal') ?>

    <?php // echo $form->field($model, 'skala') ?>

    <?php // echo $form->field($model, 'description') ?>

    <?php // echo $form->field($model, 'date') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
