<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Scorepsi */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="scorepsi-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_exam')->textInput() ?>

    <?= $form->field($model, 'id_student')->textInput() ?>

    <?= $form->field($model, 'benar')->textInput() ?>

    <?= $form->field($model, 'totalSoal')->textInput() ?>

    <?= $form->field($model, 'skala')->textInput() ?>

    <?= $form->field($model, 'description')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'date')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
