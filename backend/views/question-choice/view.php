<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\QuestionChoice */

$this->params['breadcrumbs'][] = ['label' => 'Pilhan Ganda', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="question-choice-view">


    <p>
        <?= Html::a('Edit', ['update', 'id' => $model->id_qchoice], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Hapus', ['delete', 'id' => $model->id_qchoice], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id_qchoice',
            'choice_1',
            'choice_2',
            'choice_3',
            'choice_4',
            'choice_5',
            'true_answer',
            'id_question',
        ],
    ]) ?>

</div>
