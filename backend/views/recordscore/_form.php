<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\date\DatePicker;

/* @var $this yii\web\View */
/* @var $model backend\models\Recordscore */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="recordscore-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_exam')->textInput() ?>

    <?= $form->field($model, 'id_student')->textInput() ?>

    <?= $form->field($model, 'benar')->textInput() ?>

    <?= $form->field($model, 'salah')->textInput() ?>

    <?= $form->field($model, 'score')->textInput() ?>

    <?= $form->field($model, 'date')->widget(DatePicker::className(), [
        'name' => 'dp_2',
        'type' => DatePicker::TYPE_COMPONENT_PREPEND,
        'value' => '08-Apr-2004',
        'pluginOptions' => [
        'autoclose'=>true,
        'format' => 'yyyy-mm-dd'
        ]
    ]);?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
