<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use dosamigos\tinymce\TinyMce;
use backend\models\Subject;
use backend\models\Exam;
/* @var $this yii\web\View */
/* @var $model backend\models\Chapter */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="chapter-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->widget(TinyMce::className(), [
        'options' => ['rows' => 6],
        'language' => 'en',
        'clientOptions' => [
            //set br for enter
            'force_br_newlines' => true,
            'force_p_newlines' => false,
            'forced_root_block' => '',
            
            'plugins' => [
                "eqneditor advlist autolink lists link charmap print preview anchor",
                "searchreplace visualblocks code fullscreen",
                "insertdatetime media table contextmenu paste"
            ],
            'toolbar' => "undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | eqneditor link image"
        ]
    ]); ?>

    <?= $form->field($model, 'id_subject')->dropDownList(
        ArrayHelper::map(Subject::find()->all(),'id_subject', 'name'), 
        ['prompt'=>'Pilih Mapel']
    )?>

    <?= $form->field($model, 'id_exam')->dropDownList(
        ArrayHelper::map(Exam::find()->all(),'id_exam', 'name'), 
        ['prompt'=>'Pilih Ujian']
    )?>
    <div class="form-group">
        <?= Html::submitButton('Simpan', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
