<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Question */

$this->params['breadcrumbs'][] = ['label' => 'Soal', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="question-view">

    <p>
        <?= Html::a('Edit', ['update', 'id' => $model->id_question], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Hapus', ['delete', 'id' => $model->id_question], [
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
            'id_question',
            'question',
            'status',
            'id_chapter',
        ],
    ]) ?>
    
    <p>
        <?= Html::a('Pilihan Ganda', ['/question-choice/'], ['class' => 'btn btn-success']) ?>
    </p>

</div>
