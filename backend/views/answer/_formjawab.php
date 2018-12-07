<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use backend\models\Chapter;
use backend\models\Question;
use backend\models\QuestionChoice;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model backend\models\Answer */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="answer-form">

    <?php $form = ActiveForm::begin(['id' => 'login-form', 'options' => ['class' => 'form-horizontal']]);?>
    <?php $no=0; $i=0; foreach ($data as $key) { ?>
        <?= ($no+1).". ".$key['question'];?>

            <?php echo $form->field($model, 'answer['.$i.'][]')->radio(['label'=>$key['choice_1'], 'value'=>$key['choice_1']]); ?>
            <?php echo $form->field($model, 'answer['.$i.'][]')->radio(['label'=>$key['choice_2'], 'value'=>$key['choice_2']]); ?>
            <?php echo $form->field($model, 'answer['.$i.'][]')->radio(['label'=>$key['choice_3'], 'value'=>$key['choice_3']]); ?>
            <?php echo $form->field($model, 'answer['.$i.'][]')->radio(['label'=>$key['choice_4'], 'value'=>$key['choice_4']]); ?>
            <?php echo $form->field($model, 'answer['.$i.'][]')->radio(['label'=>$key['choice_5'], 'value'=>$key['choice_5']]); ?>
      
    <?php $no++; $i++;} ?>
    <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
    <?php ActiveForm::end(); ?>
</div>