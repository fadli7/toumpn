<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\QuestionChoiceSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="question-choice-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_qchoice') ?>

    <?= $form->field($model, 'choice_1') ?>

    <?= $form->field($model, 'choice_2') ?>

    <?= $form->field($model, 'choice_3') ?>

    <?= $form->field($model, 'choice_4') ?>

    <?php // echo $form->field($model, 'choice_5') ?>

    <?php // echo $form->field($model, 'true_answer') ?>

    <?php // echo $form->field($model, 'id_question') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
