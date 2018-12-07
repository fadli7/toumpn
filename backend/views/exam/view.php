<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Exam */

$this->params['breadcrumbs'][] = ['label' => 'Ujian', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="exam-view">
    <p>
        <?= Html::a('Edit', ['update', 'id' => $model->id_exam], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Hapus', ['delete', 'id' => $model->id_exam], [
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
            'id_exam',
            'name',
            'datetime',
            'status',
        ],
    ]) ?>

</div>
