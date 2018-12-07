<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\datetime\DateTimePicker;
/* @var $this yii\web\View */
/* @var $model backend\models\Exam */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="exam-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'datetime')->widget(DateTimePicker::className(), [
        'name' => 'datetime',
        'value' => date('format'),
        'type' => DateTimePicker::TYPE_COMPONENT_PREPEND,
        'pluginOptions' => [
            'orientation' => 'bottom right',
            'format' => 'yyyy-mm-dd HH:ii P',
            'autoclose' => true,
        ]
    ]); ?>

    <?= $form->field($model, 'status')->radioList(['Y' => 'Aktif', 'N' => 'Tidak']) ?>

    <div class="form-group">
        <?= Html::submitButton('Simpan', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
